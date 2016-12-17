<?php

class Pages extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
          $this->load->library('auth');
          $this->load->library('session');
          $this->auth->set_session_lib($this->session);

          if (!$this->auth->has_identity()) {
              return redirect('admin/login');
          }

          $this->load->model('pages_model');
    }
    
    function index($message = '')
    {
        $data['message'] = $message;

        $data['pages'] = $this->pages_model->getList();
        $this->load->view('admin/pages.phtml', $data);
    }
    
    function add_edit()
    {
          $res = [];
          $data['id']              = $this->input->post('id');
          $data['name']            = $this->input->post('name');
          $data['text']            = $this->input->post('text');
          $data['category_id']     = $this->input->post('cat_id');
          $data['title']           = htmlspecialchars($this->input->post('title'));
          $data['description']     = htmlspecialchars($this->input->post('description'));
          $data['date']            = time();

          if ($data['id']) {
                 $res['status'] = $this->pages_model->update($data);     
          } else {
                 $res['status'] = $this->pages_model->add($data);
          }

          echo json_encode($res);
    }
    
     function category($category_id, $page_id = false)
     {
          $data['pages'] = $this->pages_model->getListByCategory($category_id);
          $data['cat_id'] = $category_id;
          $data['edit_page_id'] = $page_id;
          $this->load->view('admin/pages/pages', $data);
     }
     
     function get_list_html()
     {
          $res = array();
          $data['pages'] = $this->pages_model->getListByCategory($this->input->post('cat_id'));

          $res['html'] = $this->load->view('admin/pages/list', $data, true);
          echo json_encode($res);
     }
     
    
    /**
     * 
     * @param type $id
     */
    function delete($id)
    {
          $res = ['status'];
          $res['status'] = $this->pages_model->delete($id);
          echo json_encode($res);
    }
    
    function load_edit_form_html($id)
    {
         $res = array();
         $data['one'] = $this->pages_model->getOne($id);

         $res['html'] = $this->load->view('admin/pages/add_edit_form', $data, true);
         echo json_encode($res);
    }
}
