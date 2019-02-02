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
			$this->db->from('tb_kriteria krit');
			$this->db->order_by('krit.kode','ASC');
			return $this->db->get();
		}

		public function getAllEvent(){
			$this->db->from($this->kegiatan);
			return $this->db->get()->result();
		}

		public function getKegiatan($idUser, $idLevel) {
			// $this->db->from($this->kegiatan);
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);
			return $this->db->get();
		}

		public function getKriteria($id_kegiatan){

			$this->db->from('tb_kriteria krit');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = krit.id_kegiatan');
			$this->db->select('krit.*,k.*');
			$this->db->where('krit.id_kegiatan', $id_kegiatan);
			return $this->db->get();
		}

		public function getAllHimpunan($id_kegiatan,$id_kriteria){
			$this->db->from('tb_himp_kriteria himp');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = himp.id_kegiatan');
			$this->db->join('tb_kriteria krit', 'krit.id_kriteria = himp.id_kriteria');
			
			
			$this->db->where(array('himp.id_kegiatan' => $id_kegiatan));
			$this->db->where(array('himp.id_kriteria' => $id_kriteria));
			$this->db->select('himp.*');

			return $this->db->get()->result();
		}
	
		public function getAllDetailKegiatan($id_kegiatan, $id_level, $id_user)
		{
			$this->db->from('tb_detail_user duser');
			$this->db->where('duser.id_kegiatan', $id_kegiatan);
			$this->db->where('duser.id_level' , $id_level);
			$this->db->where('duser.id_user' , $id_user);
			$result = $this->db->get(); 
			return $result -> result_array();
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
		public function getHimpunan($id_kegiatan,$id_himp){
			
			$this->db->from('tb_himp_kriteria himp');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = himp.id_kegiatan');
			$this->db->join('tb_kriteria krit', 'krit.id_kriteria = himp.id_kriteria');
			$this->db->where('himp.id_kegiatan' , $id_kegiatan);
			$this->db->where('himp.id_himp' , $id_himp);
			$this->db->select('himp.*,k.* ,krit.nama_kriteria,krit.id_kriteria');
			return $this->db->get()->row_array();
		}
		
		public function doUpdateHimpunan($id_himp, $data)
		{
			$this->db->from('tb_himp_kriteria');
			$this->db->where('id_himp',$id_himp);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->where('id_kegiatan',$idKegiatan);
			$this->db->where('id_himp',$id_himp);
			$this->db->update($this->himpunan, $data);
		}

		/*delete*/
		public function DeleteNewHimpunan($id_himp){
			$this->db->where('id_himp', $id_himp);
			$this->db->delete($this->himpunan);
		}
	}
?>