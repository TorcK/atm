function add_edit_form_submit()
{
     $('#add-edit').ajaxSubmit({
          url: "/admin/category/add_edit/",
          success:   after_add_edit,
          type:      'post',
          dataType:  'json'
     });
     return false;
}


function update_sub_categories_count(parent_id)
{
     $.post("/admin/category/get_subcategories_html/" + parent_id,
          function(data){
               $('td#position').html(data.html);
          },
          "json"
     );
}

function after_add_edit(data, status_text)
{
    $('#message').text(data.message);
    update_list();
}

function update_list()
{
     $.post("/admin/category/get_list_html/",
          function(data){
               $('#list').html(data.html);
          },
          "json"
     );
}

function remove(id)
{
     if (alert_delete()) {
          $.post("/admin/category/delete/" + id,
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
     $.post("/admin/category/load_edit_form_html/" + id,
          function(data){
               $('#add-edit-form').html(data.html);
          },
          "json"
     );
     return false;
}