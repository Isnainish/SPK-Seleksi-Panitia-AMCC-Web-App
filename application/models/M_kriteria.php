<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 
	/**
	*  
	*/
	class M_kriteria extends CI_Model
	{

		var $table = 'tb_kriteria';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllKriteria($id_kegiatan) {
			$this->db->select('krit.*,k.*');
			$this->db->from('tb_kegiatan k');
			$this->db->join('tb_kriteria krit', 'krit.id_kegiatan = k.id_kegiatan');
			
			$this->db->where(array('krit.id_kegiatan' => $id_kegiatan));

			return $this->db->get();
		}

		public function getKegiatan() {
			$this->db->from($this->kegiatan);
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