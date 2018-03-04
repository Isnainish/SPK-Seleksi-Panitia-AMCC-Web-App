<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**  
	* 
	*/
	class M_himpKriteria extends CI_Model
	{

		var $himpunan = 'tb_himp_kriteria';
		var $kriteria = 'tb_kriteria';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllOption(){
			$this->db->from($this->kriteria);
			return $this->db->get();
		}

		public function getAllHimpunan($id_kriteria){
			$this->db->select('krit.*, himp.*');
			$this->db->from('tb_kriteria krit');
			$this->db->join('tb_himp_kriteria himp', 'krit.id_kriteria = himp.id_kriteria');
			$this->db->where(array('himp.id_kriteria' => $id_kriteria));

			return $this->db->get()->result();
		}
		

		public function addNewHimpunan($data) {
			$this->db->insert($this->himpunan, $data);
		}

		public function getHimpunan($id){
			return $this->db->get_where($this->himpunan, $id)->row_array();
		}
		
		public function doUpdateHimpunan($id, $data)
		{
			$this->db->where($id);
			$this->db->update($this->himpunan, $data);
		}

		public function DeleteNewHimpunan($id_himp){
			$this->db->where('id_himp', $id_himp);
			$this->db->delete($this->himpunan);
		}
	}
?>