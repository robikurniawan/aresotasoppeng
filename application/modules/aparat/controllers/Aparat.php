<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aparat extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('aparat_model','aparat');
	}

	public function index()
	{
		cek_session_admin();
		$data['get'] = $this->aparat->get_all();
		$this->template->load('home/home','aparat_view',$data);
	}

	public function add()
	{

		cek_session_admin();
		$config['upload_path'] = 'assets/image/aparat/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

			$this->upload->do_upload('foto');
			$image = $this->upload->data();

			$data = array(
				'nama' 	=> $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'nip' => $this->input->post('nip'),
				'foto' => $image['file_name']
			);

		$this->aparat->save($data);
		redirect(base_url('aparat'));

	}

	public function update()
	{
		$id_aparat =  $this->input->post('id',TRUE);
		$config['upload_path'] = 'assets/image/aparat/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if (empty($_FILES['foto']['tmp_name'])) {


			$data = array(
				'nama' 	=> $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'nip' => $this->input->post('nip')

			);

		}else{
			$this->upload->do_upload('foto');
			$image = $this->upload->data();

			$data = array(
				'nama' 	=> $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'nip' => $this->input->post('nip'),
				'foto' => $image['file_name']
			);
		}

		$this->aparat->update($id_aparat,$data);
		redirect(base_url('aparat'));
	}


	public function delete()
	{
		$id = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$this->aparat->delete_by_id($id);
		redirect(base_url('aparat'));
	}

}
