     <? $this->load->view('admin/inc/head'); ?>
     <? if (isset($current->id) && $current->id) {?>
         <script type="text/javascript" src="<?=site_url('js/admin/ckeditor/ckeditor.js');?>"></script>
         <script type="text/javascript" src="<?=site_url('js/admin/ckfinder/ckfinder.js');?>"></script>
         <script type="text/javascript">
         $(document).ready(function(){
             /*var ckeditor = CKEDITOR.replace('page-editor');
             AjexFileManager.init({
                 returnTo: 'ckeditor',
                 editor: ckeditor,
                 skin: 'light'
             });*/
             var editor = CKEDITOR.replace( 'page-editor' );
             CKFinder.SetupCKEditor( editor, '<?=site_url('js/admin/ckfinder/');?>' );
         })
         </script>
     <? } ?>
     <script src="<?=site_url('/www/js/admin/pages.js');?>"></script>
     <script src="http://malsup.github.com/jquery.form.js"></script> 
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
          <button type="button" class="btn btn-default" onclick="return show_hide($('div#add-edit-form'));">Добавить статью</button>
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