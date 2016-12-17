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
}
