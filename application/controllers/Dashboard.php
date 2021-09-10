<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  // Home Page
  public function index(){redirect_to_login_if_not_logged_in();
    $data['title'] = 'Dashboard';
    
    $this->load->view('templates/header', $data);
    $this->load->view('index');
    $this->load->view('templates/footer');
  }

  public function kriteria(){
    redirect_to_login_if_not_logged_in();
    $this->load->model('M_kriteria');
    $data['title'] = 'Daftar Kriteria';

    $kriteria = $this->M_kriteria->get_kriteria();

    if (empty($kriteria)){
      redirect(base_url()); die();
    } else {
      $data['kriteria'] = $kriteria;
  
      $this->load->view('templates/header', $data);
      $this->load->view('kriteria');
      $this->load->view('templates/footer');
    }
  }
}
