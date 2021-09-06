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

  // Pagination by role
  public function user_by_role($limit, $start, $role){
    $this->db->limit($limit, $start);
    $q = $this->db->where('role', $role)->order_by('id', 'DESC')->get('user');

    if($q->num_rows() > 0){
      return $q->result();
    } else {
      return FALSE;
    }
  }

  public function num_rows_by_role($role){
    $q = $this->db->where('role', $role)->get('user');
    return $q->num_rows();
  }
}