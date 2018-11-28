<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_baku extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('bahan_baku_model','bahan_baku');
		$this->load->model('jenis_bahan/jenis_bahan_model','jenis_bahan');
		$this->load->model('supplier/supplier_model','supplier');
		$this->load->model('bahan/bahan_model','bahan');
	}

	public function index()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all();
		$data['jenis_bahan'] = $this->jenis_bahan->get_all();
		$data['supplier'] = $this->supplier->get_all();
		$data['bahan'] = $this->bahan->get_all();
		$this->template->load('home/home','bahan_baku_view',$data);
	}

	public function pengiriman()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all_pengiriman();
		$data['jenis_bahan'] = $this->jenis_bahan->get_all();
		$data['supplier'] = $this->supplier->get_all();
		$data['bahan'] = $this->bahan->get_all();
		$this->template->load('home/home','bahan_baku_pengiriman_view',$data);
	}

	public function persediaan()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all_persediaan();
		$data['jenis_bahan'] = $this->jenis_bahan->get_all();
		$data['supplier'] = $this->supplier->get_all();
		$data['bahan'] = $this->bahan->get_all();
		$this->template->load('home/home','bahan_baku_persediaan_view',$data);
	}

	public function preorder()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all_preorder();
		$data['jenis_bahan'] = $this->jenis_bahan->get_all();
		$data['supplier'] = $this->supplier->get_all();
		$data['bahan'] = $this->bahan->get_all();
		$this->template->load('home/home','bahan_baku_preorder_view',$data);
	}

	public function cetak_preorder()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all_preorder();

		$this->load->view('cetak_preorder_view',$data);
	}


	public function cetak_bahan_baku()
	{
		cek_session_admin();
		$data['get'] = $this->bahan_baku->get_all_persediaan();

		$this->load->view('cetak_bahan_baku_view',$data);
	}





	public function add()
	{
		$jenis = $this->input->post('jenis');
		$data = array(
						'bahan' 	=> $this->input->post('bahan'),
						'qty' 	=> $this->input->post('qty'),
						'satuan' 	=> $this->input->post('satuan'),
						// 'supplier' 	=> $this->input->post('supplier'),
						'ket' 	=> $this->input->post('ket'),
						'tgl_masuk' 	=> $this->input->post('tgl_masuk'),
						'jenis_bahan' 	=> $this->input->post('jenis_bahan'),
						'jenis' 	=> $this->input->post('jenis')
					);

		$this->bahan_baku->save($data);
		if ($jenis == "permintaan") {
			redirect(base_url('bahan_baku'));
		} elseif($jenis == "persediaan") {
			redirect(base_url('bahan_baku/persediaan'));
		}elseif($jenis == "pengiriman") {
			redirect(base_url('bahan_baku/pengiriman'));
		}else{
			redirect(base_url('bahan_baku/preorder'));
		}
		
		
	}


	public function proses_permintaan()
	{
		$id = $this->uri->segment(3);
		$q  = $this->db->query("UPDATE tbl_bahan_baku SET  jenis = 'pengiriman' WHERE id_bahan_baku = '$id' ");
		redirect(base_url('bahan_baku'));	
	}


	public function update_stok_pengiriman ()
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$q  = $this->db->query("UPDATE tbl_bahan_baku SET qty = '$qty' WHERE id_bahan_baku = '$id' ");
		redirect(base_url('bahan_baku/pengiriman'));	
	}


	public function update()
	{
		$id_bidang =  $this->input->post('id',TRUE);
		
		$data = array(
						'bahan' 	=> $this->input->post('bahan'),
						'qty' 	=> $this->input->post('qty'),
						'satuan' 	=> $this->input->post('satuan'),
						// 'supplier' 	=> $this->input->post('supplier'),
						'ket' 	=> $this->input->post('ket'),
						'tgl_masuk' 	=> $this->input->post('tgl_masuk'),
						'jenis_bahan' 	=> $this->input->post('jenis_bahan')	
					);
		
		$this->bahan_baku->update($id_bidang,$data);
		redirect(base_url('bahan_baku'));	
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$kabupaten = $this->uri->segment(4);
		$this->bahan_baku->delete_by_id($id);
		redirect(base_url('bahan_baku'));	
	}

}