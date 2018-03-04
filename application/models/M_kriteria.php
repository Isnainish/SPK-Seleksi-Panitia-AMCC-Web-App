<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 
	/**
	*  
	*/
	class M_kriteria extends CI_Model
	{

		var $table = 'tb_kriteria';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllKriteria() {
			$this->db->from($this->table);
			return $this->db->get();
		}

		/*add*/
		public function addNewKriteria($data) {
			$this->db->insert($this->table, $data);
		}

		/*Edit*/
		public function getKriteria($id){
			return $this->db->get_where($this->table, $id)->row_array();
		}
		
		public function doUpdateKriteria($id, $data)
		{
			$this->db->where($id);
			$this->db->update($this->table, $data);
		}


		/*Delete*/
		public function DeleteNewKriteria($id_kriteria){
			$this->db->where('id_kriteria', $id_kriteria);
			$this->db->delete($this->table);
		}

	}
?>