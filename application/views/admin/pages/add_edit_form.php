<?
     /* for edit one item */
     $id = isset($one->id) ? $one->id : '';
     $name = isset($one->name) ? $one->name : '';
     $text = isset($one->text) ? $one->text : '';
     $title = isset($one->title) ? $one->title : '';
     $description = isset($one->description) ? $one->description : '';
     if (isset($one->category_id)) {
          $cat_id = $one->category_id;
     }
?>

<div class="col-md-6">
     <form method="post" id="add-edit" name="add-edit">
          <a name="add_edit"></a>
          <fieldset class="add-edit">
               <legend>Изменение страницы</legend>
               <input type="hidden" name="id" value="<?=$id?>"/>
               <input type="hidden" name="cat_id" value="<?=$cat_id?>"/>
               <div class="form-group">
                    <label for="formName">Название</label>
                    <input type="text" size="40" name="name" value="<?=$name?>" class="form-control" id="formName" placeholder="Запускаем самолёт">
               </div>
               <div class="form-group">
                    <label for="formText">Ключевые слова:</label>
                    <textarea name="text" rows="20" cols="60" class="form-control" id="formText" placeholder="Для запуска самолёта на понадобится..."><?=$text?></textarea>
               </div>
               <div class="form-group">
                    <label for="formTitle">Заголовок страницы:</label>
                    <textarea name="title" rows="1" cols="60" class="form-control" id="formTitle" placeholder="Запуск самолётов в Харькове, обслуживание самолётов, починить самолёт Харьков"><?=$title?></textarea>
               </div>

               <div class="form-group">
                    <label for="formDescription">Ключевые слова:</label>
                    <textarea name="description" rows="2" cols="60" class="form-control" id="formTitle" placeholder="Запуск самолётов Харьков, обслуживание самолётов, починить самолёт Харьков"><?=$title?></textarea>
               </div>
          </fieldset>
          <input type="button" onclick="return add_edit_page_form_submit();" value="-->"/> 
     </form>
</div>