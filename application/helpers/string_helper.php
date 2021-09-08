<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('conditional_bool_rendering')){
  function conditional_bool_rendering($value, $true_value, $false_value){
    if ($value){
      return $true_value;
    } else {
      return $false_value;
    }
  }
}