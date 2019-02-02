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

		public function getAllEvent(){
			$this->db->from($this->kegiatan);
			return $this->db->get()->result();
		}

		public function getAllKriteria($id_kegiatan) {
			$this->db->from('tb_kriteria');
			$this->db->where('id_kegiatan',$id_kegiatan);
			return $this->db->get()->result();
		}

		public function getKegiatan($idUser, $idLevel) {
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);
			return $this->db->get();
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

	}
?>