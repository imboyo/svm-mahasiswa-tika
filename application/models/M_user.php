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

  public function get_by_id($id, $admin=FALSE){
    if (!$admin){
      $q = $this->db->where('id', $id)->get('user');
    } else {
      $q = $this->db->where(['id'=> $id, 'role' => 'admin'])->get('user');
    }
    $user = $q->row();
    if(!empty($user)){
      return $user;
    } else {
      return FALSE;
    }
  }

  public function delete_user($id){
    $this->db->where('id', $id);
    $this->db->delete('user');
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

  public function tambah_admin($data){
    $this->db->insert('user', $data);
  }

  public function edit_by_id($id, $role ,$data){
    $this->db->where(['id' => $id, 'role' => $role]);
    $this->db->update('user', $data);
  }
  
}