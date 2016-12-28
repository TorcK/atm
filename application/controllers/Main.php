<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

     function __construct() {
          parent::__construct();
          $this->load->model('pages_model');
     }
     
     public function index()
     {
          $this->load->view('index', ['content' => $this->pages_model->getOne(20)]);
     }
     
     public function contact()
     {
          $this->load->view('index', ['content' => $this->pages_model->getOne(21)]);
     }
     
     public function view($id)
     {
          $this->load->view('index', ['content' => $this->pages_model->getOne($id)]);
     }
     
     function sitemap()
     {
          $data['urls'] = array();
          $temp = array();

          //Main pages
          $page = $this->pages_model->getOne(20);
          $temp['loc'] = "/";
          $temp['lastmod'] = $page->date;
          $temp['priority'] = 1;

          $data['urls'][] = $temp;

          $page = $this->pages_model->getOne(21);
          $temp['loc'] = "/contact";
          $temp['lastmod'] = $page->date;
          $temp['priority'] = 1;

          $data['urls'][] = $temp;
          
          //pages
          $pages = $this->pages_model->getList();
          foreach ($pages as $page) {
              $temp['loc'] = "/view/{$page->id}";
              $temp['lastmod'] = $page->date;
              $temp['priority'] = 0.7;

              $data['urls'][] = $temp;
          }

          $this->load->view('sitemap', $data);
     }
}
