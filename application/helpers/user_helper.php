<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('get_account_by_session')){
  function get_account_by_session(){
    $CI = get_instance();

    // If got session in browser
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      $user = $CI->M_user->check_login($_SESSION['username'], $_SESSION['password']);

      if (!empty($user)){
        return $user;
      } else {
        return FALSE;
      }
    }
  }
}