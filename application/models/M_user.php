<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_user extends CI_Model
	{

		var $pendaftar = 'tb_pendaftar';
		var $kriteria = 'tb_kriteria';
		var $nilai = 'tb_penilaian';
		var $kegiatan = 'tb_kegiatan';
		var $sie = 'tb_siepanitia';
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function getAllKegiatan(){
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		public function getKegiatan($idUser, $idLevel){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);

			return $this->db->get();
		}

		public function getSie($id_kegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k', 'sie.id_kegiatan = k.id_kegiatan');
			$this->db->where(array('sie.id_kegiatan'=>$id_kegiatan));
			return $this->db->get();
		}

		public function insert($data){
			$this->db->from('tb_pendaftar user');
			$this->db->join('tb_kegiatan k','user.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_siepanitia sie','user.id_sie=sie.id_sie');
			$this->db->select('user.*, k.*, sie.*');
			return $this->db->insert($this->pendaftar, $data);
		}

		public function insertid($id_sie){
			$this->db->from($this->pendaftar);
			$this->db->insert($this->pendaftar, $id_sie);
		}

		/*Halaman utama pewawancara*/
		public function insertnama($data){
			return $this->db->insert($this->pww,$data);
		}

		public function getPewawancara($id_user){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->select('duser.*, user.*');
			$this->db->where('duser.id_user',$id_user);

			return $this->db->get()->row_array();
		}

		public function updatePewawancara($id_user, $datauser){
			$this->db->from('tb_user');
			$this->db->where('id_user', $id_user);
			$this->db->update('tb_user', $datauser);

		}

		public function getDraftPendaftar($id_kegiatan){
			$this->db->select('user.*,k.*');
			$this->db->from('tb_kegiatan k');
			$this->db->join('tb_pendaftar user', 'user.id_kegiatan = k.id_kegiatan');
			
			$this->db->where(array('user.id_kegiatan' => $id_kegiatan));

			return $this->db->get();
		}

		/*Halaman kriteria pewawancara*/
		public function getDraftKriteria($id_kegiatan){
			$this->db->select('krit.*,k.*');
			$this->db->from('tb_kegiatan k');
			$this->db->join('tb_kriteria krit', 'krit.id_kegiatan = k.id_kegiatan');
			$this->db->where(array('krit.id_kegiatan' => $id_kegiatan));
			return $this->db->get();
		}

		/*Halaman penilaian*/
		public function getDetailPenilaian($id_kegiatan,$id_pendaftar){
			$this->db->from('tb_pendaftar user');
			$this->db->join('tb_siepanitia sie','user.posisi1 = sie.id_sie');
			$this->db->join('tb_siepanitia sie2','user.posisi2 = sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'user.id_kegiatan = k.id_kegiatan');
			$this->db->select('user.*,sie.nama_sie as pos1, sie2.nama_sie as pos2 ,k.*');
			$this->db->where(array('user.id_kegiatan' => $id_kegiatan));
			$this->db->where(array('user.id_pendaftar' => $id_pendaftar));
			return $this->db->get();
		}	

		public function doaddPenilaian($datanilai){
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = nilai.id_kegiatan');
			$this->db->join('tb_pendaftar pendaftar','pendaftar.id_pendaftar = nilai.id_pendaftar');
			$this->db->select('nilai.*, k.*, pendaftar.*');
			return $this->db->insert($this->nilai, $datanilai);
		}

		public function getNamePewawancara(){
			$this->db->from($this->pww);
			return $this->db->get();
		}
		

		
		
	}
?>