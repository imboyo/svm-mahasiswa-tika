<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_User extends CI_Controller{
  public function __construct(){
    parent::__construct();

    $this->load->model('M_user');
    $this->load->library('form_validation');
  }

  public function tambah_admin(){
    redirect_to_login_if_not_admin();

    $this->load->library('form_validation');

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Validation Post Form
    $this->form_validation->set_rules(
      'username', 
      'username', 
      'required|is_unique[user.username]',
      ['is_unique' => 'already exists']
    );
    $this->form_validation->set_rules('password','password', 'required');

    if($this->form_validation->run() === FALSE){
      $error = [
        'error' => true,
        'username' => strip_tags(form_error('username')),
        'password' => strip_tags(form_error('password')),
      ];

      echo json_encode($error, JSON_PRETTY_PRINT);
    } else {
      $data = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role' => 'admin'
      ];

      $this->M_user->tambah_admin($data);

      echo 201;
    }

  }

  public function delete_admin(){
    // TODO - aktifkan validasi admin
    // redirect_to_login_if_not_admin();
    $uri = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);

    $user = $this->M_user->get_by_id($uri);

    if (empty($user)){
      echo 400;
    } else {
      $this->M_user->delete_user($uri);
      
      echo 202;
    }
  }
}