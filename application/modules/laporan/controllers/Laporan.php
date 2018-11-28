<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
		$this->load->model('kegiatan/kegiatan_model','kegiatan');
		$this->load->model('realisasi/realisasi_model','realisasi');
		$this->load->model('bidang/bidang_model','bidang');
	}

	public function index()
	{

		cek_session_admin();
		// $data['get'] = $this->profil->get_all();
		$this->template->load('home/home','laporan_view');
	}

	public function kegiatan()
	{

		cek_session_admin();
		$data['get'] = $this->kegiatan->get_all();
		$data['bidang'] = $this->bidang->get_all();
		$this->template->load('home/home','kegiatan',$data);
	}

	public function realisasi()
	{

		cek_session_admin();
		$data['get'] = $this->realisasi->get_all_laporan();
		$this->template->load('home/home','realisasi',$data);
	}

	public function cetak_kegiatan()
	{
		$data['get'] = $this->kegiatan->get_all();
		$this->load->view('cetak',$data);
	}

	public function cetak_realisasi()
	{
		$data['get'] = $this->realisasi->get_all_laporan();
		$this->load->view('cetak_realisasi',$data);
	}





}
