<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct() {
    parent::__construct();
    redirect_to_login_if_not_admin();
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
    $this->load->view('admin/tambah');
    $this->load->view('templates/footer');
  }

  public function edit_admin(){
    $data['title'] = 'Edit Admin';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_admin');
    $this->load->view('templates/footer');
  }

  public function tambah_mahasiswa(){
    $data['title'] = 'Tambah Mahasiswa';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/tambah_mahasiswa');
    $this->load->view('templates/footer');
  }

  public function edit_mahasiswa(){
    $data['title'] = 'Edit Mahasiswa';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_mahasiswa');
    $this->load->view('templates/footer');
  }

  public function mahasiswa(){
    $data['title'] = 'Mahasiswa';
    
    $this->load->view('templates/header', $data);
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('templates/footer');
  }
}