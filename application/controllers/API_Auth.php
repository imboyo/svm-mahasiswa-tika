<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_Auth extends CI_Controller{
  public function __construct(){
    parent::__construct();

    $this->load->model('M_user');
  }

  public function login(){
    $this->load->library('form_validation');
    $this->load->library('session');

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    $user = $this->M_user->check_login($username, $password);

    // Check apakah ada user yang dimasukkan di form
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password','password', 'required');

    if($this->form_validation->run() == FALSE){
      $error = [
        'error' => true,
        'username' => strip_tags(form_error('username')),
        'password' => strip_tags(form_error('password')),
      ];

      echo json_encode($error, JSON_PRETTY_PRINT);
    } else {
      if(!empty($user)){
        $session_data = [
          'username' => $username,
          'password' => $password
        ];

        $this->session->set_userdata($session_data);

        echo 202;
      } else {
        echo 401;
      }
    }
  }
}