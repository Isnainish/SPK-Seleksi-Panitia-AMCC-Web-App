<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_himpKriteria extends CI_Model
	{

		var $himpunan = 'tb_himp_kriteria';
		var $kriteria = 'tb_kriteria';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllOption(){
			$this->db->from($this->kriteria);
			return $this->db->get();
		}

		public function getAllEvent(){
			$this->db->from($this->kegiatan);
			return $this->db->get()->result();
		}

		public function getAllHimpunan($id_kegiatan,$id_kriteria){
			$this->db->from('tb_himp_kriteria himp');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = himp.id_kegiatan');
			$this->db->join('tb_kriteria krit', 'krit.id_kriteria = himp.id_kriteria');
			
			$this->db->select('himp.*, k.*,krit.*');
			$this->db->where(array('himp.id_kegiatan' => $id_kegiatan));
			$this->db->where(array('himp.id_kriteria' => $id_kriteria));

			return $this->db->get()->result();
		}
		
		/*add*/
		public function getDataHimpunan(){
			$this->db->from($this->himpunan);
			return $this->db->get();
		}

		public function addNewHimpunan($data) {
			$this->db->insert($this->himpunan, $data);
		}

		/*edit*/
		public function getHimpunan($id){
			return $this->db->get_where($this->himpunan, $id)->row_array();
		}
		
		public function doUpdateHimpunan($id, $data)
		{
			$this->db->where($id);
			$this->db->update($this->himpunan, $data);
		}

		/*delete*/
		public function DeleteNewHimpunan($id_himp){
			$this->db->where('id_himp', $id_himp);
			$this->db->delete($this->himpunan);
		}
	}
?>