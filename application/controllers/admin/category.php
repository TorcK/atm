<?php

class Category extends CI_Controller {
    
     function __construct()
     {
          parent::__construct();

          $this->load->library('auth');
          $this->load->library('session');
          $this->auth->set_session_lib($this->session);

          if (!$this->auth->has_identity()) {
               return redirect('admin/login');
          }
        
          $this->load->model('category_model');
     }

     function index()
     {
          $data['categories'] = $this->category_model->get_list_with_sub();
       
          $this->load->view('admin/categories/categories.phtml', $data);
     }

     function get_list_html()
     {
          $res = array();
          $data['categories'] = $this->category_model->get_list();

          foreach ($data['categories'] as $key => $one) {
               $data['categories'][$key]->subcategories = $this->category_model->get_sub($one->id);
          }

          $res['html'] = $this->load->view('admin/categories/list.phtml', $data, true);
          echo json_encode($res);
     }

     function get_subcategories_html($parent_id)
     {
          $data['categories'] = $this->category_model->get_sub($parent_id);
          $data['count'] = count($data['categories']);
          $res['html'] = $this->load->view('admin/categories/add_edit_form_order.phtml', $data, true);
          echo json_encode($res);
     }
    
    function add_edit()
    {
          $res = array();
          $this->load->helper('translit_helper');
          $category_data['id'] = $this->input->post('id');
          $category_data['name'] = $this->input->post('name');
          $category_data['name_t'] = translit_encode($category_data['name']);
          $category_data['title'] = $this->input->post('title');
          $category_data['description'] = $this->input->post('description');
          $category_data['parent_id'] = $this->input->post('parent_id') ?: false;
          $category_data['order'] = $this->input->post('order');
          $category_data['public'] = $this->input->post('public', 0) ? 1 : 0;

          if ($category_data['id']) {
               $res['status'] = $this->category_model->update_category($category_data);
          } else {
               $res['status'] = $this->category_model->add_category($category_data);
          }

          echo json_encode($res);
    }
    
    function load_edit_form_html($id)
    {
         $res = array();
         $data['one'] = $this->category_model->get_one($id);
         $data['categories'] = $this->category_model->get_list();
         $data['sub_categories'] = $this->category_model->get_sub($data['one']->parent_id); //subcategories with the same parent id

         $res['html'] = $this->load->view('admin/categories/add_edit_form.phtml', $data, true);
         echo json_encode($res);
    }
    
    /**
     * 
     * @param type $id
     */
    function delete($id)
    {
          $res = ['status'];
          $res['status'] = $this->pages_model->deleteByCategory($id);
          
          if ($res) {
               $res['status'] = $this->category_model->delete_category($id);

               if ($res['status']) {
                    $res['message'] = 'Категория удалена';
               } else {
                    $res['message'] = 'Ошибка удаления категории!';
               }
          }
          echo json_encode($res);
    }
}
