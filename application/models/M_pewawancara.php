<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_pewawancara extends CI_Model
	{

		var $user2 = 'tb_pewawancara';
		var $kegiatan = 'tb_kegiatan';
		var $duser = 'tb_detail_user';
		var $user = 'tb_user';
		var $level = 'tb_level'; 

		function __construct()
		{
			parent::__construct();
		}

		public function getAllKegiatan()
		{
			$this->db->from($this->kegiatan);
			return $this->db->get();
		
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

		public function getAllPewawancara($id_kegiatan){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->where('duser.id_level = 3');
			$this->db->select('duser.*, k.*, user.*, level.*');
			$this->db->where(array('duser.id_kegiatan' => $id_kegiatan));

			return $this->db->get();
		}

		// model hak akses admin
		public function getAllDetailKegiatan($id_kegiatan, $id_level, $id_user)
		{
			$this->db->from('tb_detail_user duser');
			$this->db->where('duser.id_kegiatan', $id_kegiatan);
			$this->db->where('duser.id_level' , $id_level);
			$this->db->where('duser.id_user' , $id_user);
			
			$result = $this->db->get(); 
			return $result -> result_array();
		}

		public function getNamaUser() {
			$this->db->from('tb_user user');
			return $this->db->get();
		}

		public function getLevel() {
			$this->db->from('tb_level level');
			$this->db->where('level.id_level = 3');
			return $this->db->get();
		}
		
		public function insert($datauser){
			$this->db->insert('tb_user',$datauser);
			return $this->db->insert_id();

		}
		public function addNewPewawancara($dataduser){
			$this->db->insert('tb_detail_user', $dataduser);
			return $this->db->insert_id();

		}

		public function getInfoDetailPewawancara($id){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.nama_kegiatan, user.*, level.nama_level');
			$this->db->where($id);
			return $this->db->get();
		}

		public function DeletePewawancara($id_detail_user){
			$this->db->where('id_detail_user', $id_detail_user);
			$this->db->delete($this->duser);
		}

			
	}
?>