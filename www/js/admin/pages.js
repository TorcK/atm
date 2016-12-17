function add_edit_page_form_submit()
{
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

function load(id)
{
     $('div#add-edit-form').show();
     $.post("/admin/pages/load_edit_form_html/" + id,
          function(data){
               $('#add-edit-form').html(data.html);
          },
          "json"
     );
     return false;
}