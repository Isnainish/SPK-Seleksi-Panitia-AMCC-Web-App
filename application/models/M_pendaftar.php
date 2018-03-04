<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 
	/**
	*  
	*/
	class M_pendaftar extends CI_Model
	{

		var $pendaftar = 'tb_pendaftar';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllPendaftar() {
			$this->db->from($this->pendaftar);
			return $this->db->get();
		}

		public function doDetailPendaftar($id){
			$this->db->where($id);
			return $this->db->get_where($this->pendaftar, $id);
		}

		public function doDropPendaftar($id_pendaftar){
			$this->db->where('id_pendaftar', $id_pendaftar);
			$this->db->delete($this->pendaftar);
		}
	}
?>