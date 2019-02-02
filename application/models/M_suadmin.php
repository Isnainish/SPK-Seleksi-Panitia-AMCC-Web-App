<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 
	/**
	*  
	*/
	class M_suadmin extends CI_Model
	{

		var $level = 'tb_level';
		var $user = 'tb_user';
		var $duser = 'tb_detail_user';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}

		/*SUPER ADMIN*/
		/*detail suadmin*/
		public function getDetailSuad(){
			$this->db->select('duser.*,user.*,k.*, level.*');
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','duser.id_user = user.id_user');
			$this->db->join('tb_kegiatan k','duser.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_level level','duser.id_level = level.id_level');

			$this->db->where('level.id_level = 1');

			return $this->db->get()->result();
		}

		public function getJmlKegiatan(){
			$this->db->from($this->kegiatan);
			return $this->db->get()->num_rows();
		}
		public function getJmlAdmin(){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','duser.id_user = user.id_user');
			$this->db->join('tb_level level','duser.id_level = level.id_level');
			$this->db->where('duser.id_level = 2');

			return $this->db->get()->num_rows();
		}

		/*ubah data suadmin*/
		public function getDataSuad($id){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, user.*');
			$this->db->where($this->session->userdata['auth_session']['id_user'], $id);

			return $this->db->get()->row_array();
		}

		public function updatedtuser($id,$datauser){
			$this->db->where($id);
			return $this->db->update($this->user, $datauser);
		}

		// public function updateSuad($id, $datauser){
		// 	$this->db->from('tb_detail_user duser');
		// 	$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
		// 	$this->db->join('tb_user user','user.id_user = duser.id_user');
		// 	$this->db->join('tb_level level','level.id_level = duser.id_level');
			
		// 	$this->db->where($id);
		// 	return $this->db->update($this->duser, $datauser);
		// }

		public function updateSuad($id,$datauser){
			$this->db->from('tb_user');
			$this->db->where('id_user',$id);

			return $this->db->update($this->user,$datauser);
		}
		

		/*DATA KEGIATAN*/

		public function getAllKegiatan(){
			$this->db->from('tb_kegiatan k');
			return $this->db->get();
		}

		/*add kegiatan*/
		public function addNewKegiatan($data){
			$this->db->insert($this->kegiatan,$data);
		}

		/*ubah kegiatan*/
		public function getDataKegiatan($id){
			$this->db->from($this->kegiatan);
			$this->db->where($id);
			return $this->db->get()->row_array();
		}

		public function updateKegiatan($id,$data){
			$this->db->where($id);
			$this->db->update($this->kegiatan,$data);
		}

		/*hapus kegiatan*/

		public function DeleteKegiatan($id_kegiatan){
			$this->db->where('id_kegiatan', $id_kegiatan);
			$this->db->delete($this->kegiatan);
		}

		/*DATA ADMIN*/
		public function getAllAdmin(){

			$this->db->select('duser.*,user.*,k.*, level.*');
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','duser.id_user = user.id_user');
			$this->db->join('tb_kegiatan k','duser.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_level level','duser.id_level = level.id_level');

			$this->db->where('level.id_level = 2');

			return $this->db->get();
		}
		/*tambah admin*/
		public function getKegiatan(){
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		public function getUser(){
			$this->db->from($this->user);
			return $this->db->get();
		}

		public function insert($datauser){
			$this->db->insert('tb_user',$datauser);
			return $this->db->insert_id();

		}

		public function addAdmins($dataduser){
			$this->db->insert('tb_detail_user', $dataduser);
			return $this->db->insert_id();
		
		}

		public function addAdmin($dataduser){
			return $this->db->insert('tb_detail_user', $dataduser);
		
		}
		/*detail admin*/
		public function getDetailAdmin($id){

			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.*, user.*, level.*');

			$this->db->where('level.id_level = 2');
			$this->db->where($id);
			return $this->db->get();

		}

		/*hapus admin*/
		public function DeleteAdmin($id_detail_user){
			$this->db->where('id_detail_user', $id_detail_user);
			$this->db->delete($this->duser);
		}


	}
?>

