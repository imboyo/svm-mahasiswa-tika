<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function profil(){
    $data['title'] = 'Profil';
    
    $this->load->view('templates/header', $data);
    $this->load->view('user/profil');
    $this->load->view('templates/footer');
  }
}