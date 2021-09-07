<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model(['M_user', 'M_mahasiswa']);
    $this->load->library('pagination');
  }

  public function list(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Admin';

    // Pagination
    $role = 'admin';
    $num_rows = $this->M_user->num_rows_by_role($role);
    $config = my_pagination(base_url('admin/list'), $num_rows, 20, 3);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
    $data['admin'] = $this->M_user->user_by_role($config['per_page'], $page, $role);
    
    $data['pagination'] = $this->pagination->create_links();
    $data['table_num'] = table_num($page, $config['per_page']);

    $this->load->view('templates/header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Tambah Admin';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/tambah');
    $this->load->view('templates/footer');
  }

  public function edit_admin(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Edit Admin';

    $uri = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);

    $user = $this->M_user->get_by_id($uri, TRUE);

    if(empty($user)){
      redirect(base_url('admin')); die();
    }

    $data['user'] = $user; 
    
    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_admin', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_mahasiswa(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Tambah Mahasiswa';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/tambah_mahasiswa');
    $this->load->view('templates/footer');
  }

  public function edit_mahasiswa(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Edit Mahasiswa';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/edit_mahasiswa');
    $this->load->view('templates/footer');
  }

  public function mahasiswa(){
    redirect_to_login_if_not_admin();
    $data['title'] = 'Mahasiswa';
    
    // Pagination
    $role = 'normal';
    $num_rows = $this->M_user->num_rows_by_role($role);
    $config = my_pagination(base_url('admin/mahasiswa/list'), $num_rows, 2, 4);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);
    $mahasiswa = $this->M_mahasiswa->get_mahasiswa($config['per_page'], $page);

    // Data
    $data['mahasiswa'] = $mahasiswa;
    $data['table_num'] = table_num($page, $config['per_page']);
    $data['pagination'] = $this->pagination->create_links();

    // Views
    $this->load->view('templates/header', $data);
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('templates/footer');

  }
}