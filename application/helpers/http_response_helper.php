<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('http_response')){
  function http_response($response){
    http_response_code($response);
  }
}
