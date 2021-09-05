<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function __construct() {
    parent::__construct();

    redirect_to_login_if_not_logged_in();
  }

  // Home Page
  public function index(){

    $data['title'] = 'Dashboard';
    
    $this->load->view('templates/header', $data);
    $this->load->view('index');
    $this->load->view('templates/footer');
  }

  public function kriteria(){
    $data['title'] = 'Daftar Kriteria';

    $this->load->view('templates/header', $data);
    $this->load->view('kriteria');
    $this->load->view('templates/footer');
  }
}