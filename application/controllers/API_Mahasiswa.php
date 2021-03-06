<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(['M_user', 'M_mahasiswa']);
		$this->load->library('form_validation');
	}

	public function tambah_mahasiswa()
	{
		redirect_to_login_if_not_admin();

		header('Content-Type: application/json; charset=utf-8');
		$this->load->library('form_validation');

		$edit = $this->input->get('edit');

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
				'rules' => 'trim|required|is_unique[user.username]'
			]
		];

		$form = ['password', 'nama', 'jenis_kelamin', 'ipk', 'sks_keseluruhan', 'organisasi', 'lama_studi', 'password'];

		// Make validation for each form because is same so its better use looping
		foreach ($form as $i) {
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

			foreach ($form as $i) {
				$error[$i] = strip_tags(form_error($i));
			}
			echo json_encode($error);
		} else {
			$user_data =
				[
					'username' => $username,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'role' => 'normal'
				];
			$mahasiswa_data =
				[
					'nama' => $nama,
					'jenis_kelamin' => $jenis_kelamin,
					'ipk' => $ipk,
					'sks_keseluruhan' => $sks_keseluruhan,
					'organisasi' => $organisasi,
					'lama_studi' => $lama_studi,

					// Hasil Dari Machine Learning - Prediksi
					'prediksi' => analyze_prediction($ipk,$sks_keseluruhan,$organisasi,$lama_studi),
				];

			if (!$edit) {
				$this->M_mahasiswa->tambah_mahasiswa($user_data, $mahasiswa_data);

				echo 201;
			} else {
				$id = $this->input->get('id');

				$this->M_mahasiswa->edit_mahasiswa($id, $user_data, $mahasiswa_data);
				echo 200;
			}
		}

	}

	public function delete_mahasiswa()
	{
		redirect_to_login_if_not_admin();
		$uri = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);

		$mahasiswa = $this->M_user->get_by_id($uri);

		if (empty($mahasiswa)) {
			echo 400;
		} else {
			$this->M_user->delete_user($uri);
			echo 200;
		}
	}
}
