<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('bahan_model','bahan');
		$this->load->model('supplier/supplier_model','supplier');
	}

	public function index()
	{
		cek_session_admin();
		$data['get'] = $this->bahan->get_all();
		$data['supplier'] = $this->supplier->get_all();
		$this->template->load('home/home','bahan_view',$data);
	}

	public function add()
	{
		
		$data = array(
						'nm_bahan' 	=> $this->input->post('nm_bahan'),
						'supplier' 	=> $this->input->post('supplier')
						
					);

		$this->bahan->save($data);
		redirect(base_url('bahan'));
	}

	public function update()
	{
		$id_bidang =  $this->input->post('id',TRUE);
		
		$data = array(
						'nm_bahan' 	=> $this->input->post('nm_bahan'),
						'supplier' 	=> $this->input->post('supplier')
					
					);
		
		$this->bahan->update($id_bidang,$data);
		redirect(base_url('bahan'));	
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$this->bahan->delete_by_id($id);
		redirect(base_url('bahan'));	
	}

}