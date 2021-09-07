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
}