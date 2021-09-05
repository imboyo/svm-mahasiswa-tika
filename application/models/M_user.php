<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{
  // Check Login
  public function check_login($username, $password){
    $query = $this->db->where('username', $username)->get('user');
    $user = $query->row();

    // Check Password
    if(!empty($user)){
      if(password_verify($password, $user->password)){
        return $user;
      } else {
        return FALSE;
      }
    } else {
      return FALSE;
    }
  }
}