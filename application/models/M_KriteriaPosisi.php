<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	*  
	*/
	class M_KriteriaPosisi extends CI_Model
	{

		var $posisi = 'tb_kriteria_posisi';
		var $kriteria = 'tb_kriteria';
		var $siepanitia ='tb_siepanitia';
		var $kegiatan ='tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllKegiatan() {
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		public function getDataKriteria(){
			$this->db->from($this->kriteria);
			return $this->db->get();
		}
		public function getDataSie($id_kegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k','sie.id_kegiatan = k.id_kegiatan');
			$this->db->select('sie.*,k.*');
			$this->db->where(array('sie.id_kegiatan'=> $id_kegiatan));
			return $this->db->get();
		}

		/*add*/

		public function addNewKritPos($data){
			$this->db->insert($this->siepanitia, $data);
		}
		/*add detail*/
		public function addNewDetPos($data){
			$this->db->insert($this->posisi, $data);
		}
			

		/*detail*/
		public function doDetailPos($id_kegiatan,$id_sie){
			$this->db->select('krit.*, pos.*, sie.*');
			$this->db->from('tb_kriteria krit');
			$this->db->join('tb_kriteria_posisi pos','krit.id_kriteria = pos.id_kriteria');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = krit.id_kegiatan');
			$this->db->join('tb_siepanitia sie','sie.id_sie = pos.id_sie');
			$this->db->where(array('pos.id_kegiatan' => $id_kegiatan));
			$this->db->where(array('pos.id_sie' => $id_sie));
			return $this->db->get()->result();
		}

		/*edit*/
		public function getDetailPosisi(){
			$this->db->select('krit.nama_kriteria, pos.*');
			$this->db->from('tb_kriteria krit');
			$this->db->join('tb_kriteria_posisi pos', 'pos.id_kriteria =  krit.id_kriteria');
			$this->db->where('pos.id_kriteria');
			$this->db->from($this->posisi);
			return $this->db->get()->result();
		}
		/*edit detail*/
		public function getDetailPos($id){

			return $this->db->get_where($this->posisi, $id)->row_array();
		}

		public function updateDetailPos($id, $data){
			$this->db->select('sie.*, pos.*, k.*');
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kriteria_posisi pos','pos.id_sie = sie.id_sie');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = pos.id_kegiatan');
			
			$this->db->where($id);
			$this->db->update($this->posisi, $data);
		}
		
		/*delete*/
		public function doDeleteKritPos($id_sie){
			$this->db->where('id_sie', $id_sie);
			$this->db->delete($this->siepanitia);
		}
		/*delete detail*/
		public function doDeletePos($id_kriteria_posisi){
			$this->db->where('id_kriteria_posisi',$id_kriteria_posisi);
			$this->db->delete($this->posisi);
		}
		public function groupidsie($id_kriteria_posisi){
			// $query =$this->db->query("SELECT id_kegiatan,id_sie from tb_kriteria_posisi as tbkp WHERE tbkp.id_kriteria_posisi=$id_kriteria_posisi")->row();
			// return $query;

			$this->db->from('tb_kriteria_posisi kp');
			$this->db->join('tb_kegiatan k', 'kp.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_siepanitia sie', 'kp.id_sie = sie.id_sie');
			$this->db->select('kp.*,k.id_kegiatan,sie.id_sie');
			$this->db->where('kp.id_kriteria_posisi',$id_kriteria_posisi);
			$this->db->get()->row();




		}
	}
?>