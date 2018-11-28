<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_bahan extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('jenis_bahan_model','jenis_bahan');
	}

	public function index()
	{
		cek_session_admin();
		$data['get'] = $this->jenis_bahan->get_all();
		$this->template->load('home/home','jenis_bahan_view',$data);
	}

	public function add()
	{
		
		$data = array(
						'nm_jenis_bahan' 	=> $this->input->post('nm_jenis_bahan')
						
					);

		$this->jenis_bahan->save($data);
		redirect(base_url('jenis_bahan'));
	}

	public function update()
	{
		$id_bidang =  $this->input->post('id',TRUE);
		
		$data = array(
						'nm_jenis_bahan' 	=> $this->input->post('nm_jenis_bahan')
					
					);
		
		$this->jenis_bahan->update($id_bidang,$data);
		redirect(base_url('jenis_bahan'));	
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$this->jenis_bahan->delete_by_id($id);
		redirect(base_url('jenis_bahan'));	
	}

}