<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model {
  public function get_kriteria(){
    $q = $this->db->order_by('order', 'ASC')->get('kriteria');

    if($q->num_rows() > 0){
      return $q->result();
    } else {
      return FALSE;
    }
  }
}