<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	var $table = 'tbl_profil';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_all()
	{
		$query = $this->db->query("SELECT * FROM tbl_profil");
		return $query->row();
	}


	public function update($data)
	{
		// $this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}




}
