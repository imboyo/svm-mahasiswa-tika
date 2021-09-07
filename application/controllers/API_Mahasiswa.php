<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_Mahasiswa extends CI_Controller{
  public function __construct(){
    parent::__construct();

    $this->load->model(['M_user', 'M_mahasiswa']);
    $this->load->library('form_validation');
  }

  public function tambah_mahasiswa(){
    // TODO: Only admin can access

    header('Content-Type: application/json; charset=utf-8');
    $this->load->library('form_validation');

    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $ipk = $this->input->post('ipk');
    $sks_keseluruhan = $this->input->post('sks_keseluruhan');
    $organisasi = $this->input->post('organisasi');
    $lama_studi = $this->input->post('lama_studi');
    $password = $this->input->post('password');

    $config_validation = [
      [
        'field' => 'username', 
        'label' => 'username',
        'rules' => 'required|is_unique[user.username]'
      ]
    ];

    $form = ['password','nama', 'jenis_kelamin', 'ipk', 'sks_keseluruhan', 'organisasi','lama_studi', 'password'];

    // Make validation for each form because is same so its better use looping
    foreach($form as $i){
      array_push(
        $config_validation, 
          [
            'field' => $i,
            'label' => $i,
            'rules' => 'required',
          ]
      );
    }

    $this->form_validation->set_rules($config_validation);

    if ($this->form_validation->run() === FALSE) {
      $error = [];
      $error['username'] = strip_tags(form_error('username'));
      
      foreach ($form as $i){
        $error[$i] = strip_tags(form_error($i));
      }
      echo json_encode($error);

      http_response(400);
    } else {
      $user_data = 
        [
          'username' => $username,
          'password' => password_hash($password, PASSWORD_DEFAULT),
          'role' => 'mahasiswa'
        ];
      $mahasiswa_data = 
        [
          'nama' => $nama,
          'jenis_kelamin' => $jenis_kelamin,
          'ipk' => $ipk,
          'sks_keseluruhan' => $sks_keseluruhan,
          'organisasi' => $organisasi,
          'lama_studi' => $lama_studi,

          // TODO: Hasil Dari Machine Learning - Prediksi
          'prediksi' => 'Tepat Waktu',
        ];

      $this->M_mahasiswa->tambah_mahasiswa($user_data, $mahasiswa_data);

      http_response(201);
    }

  }
}