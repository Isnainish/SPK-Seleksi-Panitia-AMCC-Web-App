<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	/**
	*  
	*/
	class M_login extends CI_Model
	{

		var $level = 'tb_level';
		var $user = 'tb_user';
		var $duser = 'tb_detail_user';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getLevelLogin(){

			$this->db->from($this->level);
			return $this->db->get();
		}

		public function loginAdmin($user, $pass, $jabatan){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->where('user.username', $user);
			$this->db->where('user.password', $pass);
			$this->db->where('duser.id_level', $jabatan);

			return $this->db->get();

		}

		public function loginUser($user, $pass){
			$this->db->where('username', $user);
			$this->db->where('password', $pass);

			return $this->db->get($this->user);
		}


	}
	?>

