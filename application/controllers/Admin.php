<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct() {
    parent::__construct();
    redirect_to_login_if_not_admin();

    $this->load->model('M_user');
    $this->load->library('pagination');
  }

  public function index(){
    $data['title'] = 'Admin';

    // Pagination
    $role = 'admin';
    $num_rows = $this->M_user->num_rows_by_role($role);
    $config = my_pagination(base_url($role), $num_rows, 20, 1);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(1) ? $this->uri->segment(1) : 0);
    $data['admin'] = $this->M_user->user_by_role($config['per_page'], $page, $role);
    
    $data['pagination'] = $this->pagination->create_links();

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