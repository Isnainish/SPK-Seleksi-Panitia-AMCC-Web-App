<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_Beranda extends CI_Model
	{

		var $duser = 'tb_detail_user';
		var $user = 'tb_user';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}


		public function getDataAdmin(){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','duser.id_user = user.id_user');
			$this->db->join('tb_kegiatan k', 'duser.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_level level', 'duser.id_level = level.id_level');
			$this->db->select('duser.*,user.*, k.*, level.*');

			$this->db->where('level.id_level = 2');

			return $this->db->get();
		}
		public function getDetailAdmin($where){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','duser.id_user = user.id_user');
			$this->db->join('tb_kegiatan k', 'duser.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_level level', 'duser.id_level = level.id_level');
			$this->db->select('duser.*,user.*, k.*, level.*');

			$this->db->where('level.id_level = 2');
			$this->db->where('duser.id_user',$where);

			return $this->db->get();
		}

		/*ubah admin*/
		public function getAdmin($id_kegiatan,$id_user){
			$this->db->select('duser.*,user.*, k.*, level.*');
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');

			$this->db->where('duser.id_kegiatan',$id_kegiatan);
			$this->db->where('duser.id_user',$id_user);
			
			return $this->db->get()->row_array();
		}

		public function updateAdmin($id_detail_user,$datadetuser, $datauser){
			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id_detail_user);
			$idUser = $this->db->get()->row()->id_user;

			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id_detail_user);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->from('tb_kegiatan');
			$this->db->where('id_kegiatan', $idKegiatan);
			return $this->db->update($this->kegiatan, $datadetuser) AND $this->updateUser($datauser, $idUser);

		// 	$this->db->from('tb_detail_user');
		// 	$this->db->where('id_detail_user',$id_detail_user);
		// 	return $this->db->update($this->duser, $datadetuser) AND $this->updateUser($datauser, $idUser);
		}

		public function updateUser($datauser, $idUser)
		{

			$this->db->where('id_user', $idUser);
			return $this->db->update($this->user, $datauser);
		}

		

	}
?>