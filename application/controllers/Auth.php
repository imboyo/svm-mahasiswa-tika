<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
  }

  public function login(){
    if (get_account_by_session()){
      redirect(base_url()); die();
    } else {
      $data['title'] ='Login';
      
      $this->load->view('auth/templates/header', $data);
      $this->load->view('auth/login', $data);
      $this->load->view('auth/templates/footer');
    }
  }
  
  
}