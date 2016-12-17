<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	/**
	 * General constructor
	 *
	 * @return void
	 */
    function __construct()
    {
          parent::__construct();
          $this->load->library('auth');
          $this->load->library('session');
          $this->auth->set_session_lib($this->session);
        
          $this->load->config('auth');
    }

    function index()
    {
          if (!$this->auth->has_identity()) {
               $this->load->view('admin/auth');
          } else {
               $this->load->view('admin/index');
          }
    }
    
    function login()
    {
          $postUsername = $this->input->post('username');
          $postPass = $this->input->post('password');

          $username = $this->config->item('admin_username');
          $password = $this->config->item('admin_password');

          if (($postUsername == $username) && ($postPass == $password)) {
               $this->auth->set_identity($username);
               return redirect('/admin');            
          } else {
               $data['message'] = "Неправильная пара логин / пароль";
               $this->load->view('admin/auth', $data);
          }
    }
    
    function logout()
    {
        $this->auth->clear_identity();
        redirect('admin/login');
    }
}