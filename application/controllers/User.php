<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model(['M_user', 'M_mahasiswa']);
  }

  public function profil(){
    redirect_to_login_if_not_role('normal');
    $data['title'] = 'Profil';

    // Detail
    $username = $_SESSION['username'];
    $q = $this->db->where('username', $username)->get('user')->row();

    $instance = $this->M_mahasiswa->get_mahasiswa_detail($q->id);
    
    $data['detail'] = $instance;

    $this->load->view('templates/header', $data);
    $this->load->view('user/profil');
    $this->load->view('templates/footer');

  }

}