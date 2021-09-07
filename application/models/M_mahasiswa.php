<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
  public function get_mahasiswa($limit, $start){
    $q = $this->db->query("SELECT user.id, user.username, mahasiswa.*
      FROM user
      INNER JOIN mahasiswa
      ON user.id = mahasiswa.user_id
      WHERE user.role = 'normal'
    "
    );

    if(!empty($q) ){
      return $q->result();
    } else {
      return FALSE;
    }
  }

  public function tambah_mahasiswa($user_data, $mahasiswa_data){
    $this->db->trans_start();

    $this->db->insert('user', $user_data);
    $mahasiswa_data['user_id'] = $this->db->insert_id();  
    $this->db->insert('mahasiswa', $mahasiswa_data);

    $this->db->trans_complete();
  }

  public function edit_mahasiswa($id, $user_data, $mahasiswa_data){
    // $this->db->trans_start();

    $this->db->where('id', $id);
    $this->db->update('user',$user_data);
    $this->db->where('user_id', $id);
    $this->db->update('mahasiswa', $mahasiswa_data);

    $this->db->trans_complete();
  }

}