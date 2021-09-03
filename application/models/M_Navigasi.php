<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_navigasi extends CI_Model {
  function get_navigasi_by_role($role){
    $query = $this->db->where('role', $role)->order_by('order', 'ASC')->get('navigasi')->result();
    return $query;
  }
}