<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('navigasi_by_role')){
  function navigasi_by_role($role){
    $CI = get_instance();
    $CI->load->model('M_Navigasi');

    $navs = $CI->M_Navigasi->get_navigasi_by_role($role);
    return $navs;
  }
}