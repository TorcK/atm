     <? $this->load->view('admin/inc/head'); ?>
     <script src="<?=site_url('/www/js/admin/pages.js');?>"></script>
     <script src="http://malsup.github.com/jquery.form.js"></script> 
     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
     <? if ($edit_page_id) {?>
          <script>
               $( document ).ready(function() {
                    load(<?=$edit_page_id;?>);
               });

          </script>
     <? } ?>
</head>
<body>
     <? $this->load->view('admin/inc/top'); ?>
     <div class="container main">
          <button type="button" class="btn btn-default" onclick="add_page();">Добавить статью</button>
          <a name="edit"></a>
          <div id="add-edit-form" class="add-edit-form">
                 <? $this->load->view('admin/pages/add_edit_form'); ?>
          </div>
          
          <div id="list">
              <? $this->load->view('admin/pages/list'); ?>
          </div>
     </div>
    
    <? $this->load->view('admin/inc/footer');?>
</body>
</html>