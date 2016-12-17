<? foreach ($categories_list as $one_cat) { ?>
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$one_cat->name;?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <? foreach ($one_cat->pages as $one_page) {?>
                    <li><a href="<?=site_url('view/' . $one_page->id);?>"><?=$one_page->name;?></a></li>
               <? } ?>
          </ul>
     </li>
<? } ?>