<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

if (! function_exists('top_menu_links'))
{
     function top_menu_links($admin = false)
     {
          $res = '';
          $ci = & get_instance();
          $ci->load->model('category_model');
          $ci->load->model('pages_model');
          $template = ($admin) ? 'admin/inc/top_menu' : 'inc/top_menu';
          $list = $ci->category_model->get_list(true);
          
          foreach ($list as $key => $val) {
               $list[$key]->pages = $ci->pages_model->getListByCategory($val->id);
          }
          return $ci->load->view($template, ['categories_list' => $list], true);
     }
}