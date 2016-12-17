<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

if (! function_exists('top_menu_links'))
{
     function top_menu_links()
     {
          $ci = & get_instance();
          $ci->load->model('category_model');
          $ci->load->model('pages_model');
          $categories_list = $ci->category_model->get_list(true);
          foreach ($categories_list as $one_cat) {
               
          }
          return $ci->load->view('admin/inc/top_menu_item', $one_cat, true);
     }
}