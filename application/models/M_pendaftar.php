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
			$this->db->select('user1.*,k.*');
			$this->db->from('tb_kegiatan k');
			$this->db->join('tb_pendaftar user1', 'user1.id_kegiatan = k.id_kegiatan');
			
			$this->db->where(array('user1.id_kegiatan' => $id_kegiatan));

			return $this->db->get();
		}

		public function getAllKegiatan() {
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		public function doDetailPendaftar($id_pendaftar){
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_siepanitia sie','user1.posisi1 = sie.id_sie');
			$this->db->join('tb_siepanitia sie2','user1.posisi2 = sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'user1.id_kegiatan = k.id_kegiatan');
			$this->db->select('user1.*,sie.nama_sie as pos1, sie2.nama_sie as pos2 ,k.*');
			$this->db->where(array('user1.id_pendaftar' => $id_pendaftar));
			return $this->db->get();
		}

		public function doDropPendaftar($id_pendaftar){
			$this->db->where('id_pendaftar', $id_pendaftar);
			$this->db->delete($this->pendaftar);
		}
	}
?>

