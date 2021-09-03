<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    $data['title'] = 'Admin';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah(){
    $data['title'] = 'Tambah Admin';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/footer');
  }
}