function add_edit_page_form_submit()
{
     $('#formText').val(tinyMCE.activeEditor.getContent());
     $('#add-edit').ajaxSubmit({
          url: "/admin/pages/add_edit/",
          success:   after_add_edit,
          type:      'post',
          dataType:  'json'
     });
     return false;
}


function after_add_edit(data, status_text)
{
    $('#message').text(data.message);
    update_list();
    alert('Готово!');
}

function update_list()
{
     $.post("/admin/pages/get_list_html/",
          {'cat_id': $("input[name=cat_id]").val()},
          function(data){
               $('#list').html(data.html);
          },
          "json"
     );
}

function remove(id)
{
     if (alert_delete()) {
          $.post("/admin/pages/delete/" + id,
               function(data){
                    $('#message').text(data.message);
                    update_list();
               },
               "json"
          );
     }
     return false;
}

/**
 * init tinymce editor for #formText
 * @returns {undefined}
 */
function tiny_init()
{
     tinymce.remove();
     tinymce.init({
          selector: '#formText',
          plugins: [
               'advlist autolink lists link image charmap print preview anchor',
               'searchreplace visualblocks code fullscreen',
               'insertdatetime media table contextmenu paste code autoresize'
          ],
          toolbar: 'undo redo | insert | styleselect | bold italic |' +
               'alignleft aligncenter alignright alignjustify | ' +
               'bullist numlist outdent indent | link image',

          file_browser_callback: function(field_name, url, type, win) {
               if(type=='image') {
                    $('#tiny_field_name').val(field_name);
                    $('#tiny_image').click();
               }
          },
          image_class_list: [
               {title: '', value: 'img-responsive'}
          ]
     });
}

/**
 * Load page and init tiny editor
 * @param {int} id
 * @returns {Boolean}
 */
function load(id)
{
     $('div#add-edit-form').show();
     $.post("/admin/pages/load_edit_form_html/" + id,
          function(data){
               $('#add-edit-form').html(data.html);
               tiny_init();
          },
          "json"
     );
     return false;
}

function tinyImageSubmit()
{
    var file_data = $('#tiny_image').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('tiny_image', file_data);
                           
    $.ajax({
          url: '/admin/pages/upload_image',
          dataType: 'text', 
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,                         
          type: 'post',
          success: function(data){
               field_name = $('#tiny_field_name').val();
               $('#' + field_name).val(data);
          }
     });
}

/**
 * Click to Add Page button <br/>
 * @returns {undefined}
 */
function add_page()
{
     if ($('div#add-edit-form').css('display') == "none") {
          $('div#add-edit-form').show();
          tiny_init();
     } else {
          tinymce.remove();
          $('input[name=id]').val('');
          $('input[name=name]').val('');
          $('textarea[name=text]').val('');
          $('textarea[name=title]').val('');
          $('textarea[name=description]').val('');
          tiny_init();
     }
}