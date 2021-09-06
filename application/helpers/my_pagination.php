<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('my_pagination')){
  function my_pagination($url, $num_rows, $per_page, $uri_segment){
    //konfigurasi pagination
    $config['base_url'] = $url;
    $config['total_rows'] = $num_rows;
    $config['per_page'] = $per_page;
    $config["uri_segment"] = $uri_segment;
    $choice = $config["total_rows"] / $config['per_page'];
    $config["num_links"] = floor($choice);
    $config['use_page_numbers'] = TRUE;

     // Membuat Style pagination untuk BootStrap v5
    $config['first_link']       = 'Pertama';
    $config['last_link']        = 'Terakhir';
    $config['next_link']        = '>';
    $config['prev_link']        = '<';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    return $config;
  }
}

if (!function_exists('table_num')) {
    function table_num($page, $per_page){
        return ($page == 0 ? 1 : (($page - 1) * $per_page + 1));
    }
}