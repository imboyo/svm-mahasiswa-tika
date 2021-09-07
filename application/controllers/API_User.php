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

    $edit = $this->input->get('edit');

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

      if ($edit == true){
        $id = $this->input->get('id');
        $admin_instance = $this->M_user->get_by_id($id, TRUE);

        if(empty($admin_instance)) {
          echo 400; die();
        } else {
          $this->M_user->edit_by_id($id, 'admin', $data);

          echo 200;
        }
        
      } else {
        $this->M_user->tambah_admin($data);
        echo 201;
      }

    }

  }

  public function delete_admin(){
    redirect_to_login_if_not_admin();
    $uri = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);

    $user = $this->M_user->get_by_id($uri, TRUE);

    if (empty($user)){
      echo 400;
    } else if ( $_SESSION['username'] == $user->username ){
      echo "cant delete your own account";
    } else {
      $this->M_user->delete_user($uri);

      echo 202;
    }
  }

}