     <? $zebra = 'zebra-hi'; ?>
     <table class="table">
          <tr class="table-header">
               <td>Имя</td>
               <td>Текст</td>
               <td>Заголовок</td>
               <td>SEO описание</td>
               <td>Действия</td>
           </tr>
          <? foreach ($pages as $onePage) {
                $zebra = $zebra == 'zebra-hi' ? 'zebra-lo' : 'zebra-hi';?>
               <tr class="<?=$zebra;?>">
                    <td><?=$onePage->name;?></td>
                    <td><?=substr(strip_tags($onePage->text),0,100);?>...</td>
                    <td><?=$onePage->title?'+':'<b style="color:red;">нет</b>'?></td>
                    <td><?=$onePage->description?'+':'<b style="color:red;">нет</b>'?></td>
                    <td>
                         <a href="#" title="Удалить категорию и все статьи" onclick="return remove(<?=$onePage->id?>);">[Удалить]</a>&nbsp;&nbsp;&nbsp;
                         <a href="#" title="Редактировать категорию" onclick="return load(<?=$onePage->id?>);">[Редактировать]</a>
                    </td>
               </tr>
          <? } ?>
     </table>