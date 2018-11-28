<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('supplier_model','supplier');
	}

	public function index()
	{
		cek_session_admin();
		$data['get'] = $this->supplier->get_all();
		$this->template->load('home/home','supplier_view',$data);
	}

	public function add()
	{
		
		$data = array(
						'nm_supplier' 	=> $this->input->post('nm_supplier'),
						'alamat' 	=> $this->input->post('alamat')
						
					);

		$this->supplier->save($data);
		redirect(base_url('supplier'));
	}

	public function update()
	{
		$id_bidang =  $this->input->post('id',TRUE);
		
		$data = array(
						'nm_supplier' 	=> $this->input->post('nm_supplier'),
						'alamat' 	=> $this->input->post('alamat')
					
					);
		
		$this->supplier->update($id_bidang,$data);
		redirect(base_url('supplier'));	
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$this->supplier->delete_by_id($id);
		redirect(base_url('supplier'));	
	}

}