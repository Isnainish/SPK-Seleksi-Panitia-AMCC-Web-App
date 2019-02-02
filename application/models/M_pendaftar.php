<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 
	/**
	*  
	*/
	class M_pendaftar extends CI_Model
	{

		var $pendaftar = 'tb_pendaftar';
		var $sie = ' tb_siepanitia';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}


		public function getAllPendaftar($id_kegiatan) {
			$this->db->select('pendaftar.*,k.*');
			$this->db->from('tb_kegiatan k');
			$this->db->join('tb_pendaftar pendaftar', 'pendaftar.id_kegiatan = k.id_kegiatan');
			
			$this->db->where(array('pendaftar.id_kegiatan' => $id_kegiatan));

			return $this->db->get();
		}

		public function getAllKegiatan() {
			$this->db->from($this->kegiatan);
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

		public function doDetailPendaftar($id_pendaftar){
			$this->db->from('tb_pendaftar pendaftar');
			$this->db->join('tb_siepanitia sie','pendaftar.posisi1 = sie.id_sie');
			$this->db->join('tb_siepanitia sie2','pendaftar.posisi2 = sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'pendaftar.id_kegiatan = k.id_kegiatan');
			$this->db->select('pendaftar.*,sie.nama_sie as pos1, sie2.nama_sie as pos2 ,k.*');
			$this->db->where(array('pendaftar.id_pendaftar' => $id_pendaftar));
			return $this->db->get();
		}

		public function getSelectSie($idKegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k', 'sie.id_kegiatan = k.id_kegiatan');
			$this->db->select('sie.*, k.*');
			$this->db->where('sie.id_kegiatan', $idKegiatan);
			return $this->db->get();
		}

		public function getSieSesuaiKegiatan($idUser, $idLevel) {
			// $this->db->from($this->kegiatan);
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);
			return $this->db->get();
		}

		public function getPendaftar($id_pendaftar){

			$this->db->select('pendaftar.*, sie1.id_sie as pos1,sie1.nama_sie, sie2.id_sie as pos2, sie2.nama_sie ,k.*');
			$this->db->from('tb_pendaftar pendaftar');
			$this->db->join('tb_siepanitia sie1','pendaftar.posisi1 = sie1.id_sie');
			$this->db->join('tb_siepanitia sie2','pendaftar.posisi2 = sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = pendaftar.id_kegiatan');
			$this->db->where('pendaftar.id_pendaftar', $id_pendaftar);
			
			return $this->db->get()->row_array();
		}

		public function updatePendaftar($id_pendaftar,$data){
			$this->db->from('tb_pendaftar');
			$this->db->where('id_pendaftar',$id_pendaftar);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->from('tb_pendaftar');
			$this->db->where('id_kegiatan',$idKegiatan);
			$this->db->where('id_pendaftar',$id_pendaftar);

			$this->db->update($this->pendaftar, $data);

		}

		public function doDropPendaftar($id_pendaftar){
			$this->db->where('id_pendaftar', $id_pendaftar);
			$this->db->delete($this->pendaftar);
		}
	}
?>

