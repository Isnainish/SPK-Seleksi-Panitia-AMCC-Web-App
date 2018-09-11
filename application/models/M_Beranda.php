<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_Beranda extends CI_Model
	{

		var $duser = 'tb_detail_user';
		var $user = 'tb_user';
		
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

		/*ubah admin*/
		public function getAdmin($id){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.*, user.*, level.*');
			$this->db->where($id);
			return $this->db->get()->row_array();
		}

		public function doUpdateAdmin($id,$data){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.*, user.*, level.*');
			$this->db->where($id);
			$this->db->update($this->duser, $data);
		}

		

	}
?>