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

		public function getKegiatan($idUser, $idLevel) {
			// $this->db->from($this->kegiatan);
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);
			return $this->db->get();
		}


		public function getDataSie($id_kegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k','sie.id_kegiatan = k.id_kegiatan');
			$this->db->select('sie.*,k.*');
			$this->db->where(array('sie.id_kegiatan'=> $id_kegiatan));
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

		/*add*/

		public function addNewKritPos($data){
			$this->db->insert($this->siepanitia, $data);
		}
		/*add detail*/
		public function addNewDetPos($data){
			$this->db->insert($this->posisi, $data);
		}

		/*edit*/
		public function getDataSiePanitia($id_sie){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = sie.id_kegiatan');
			$this->db->select('sie.*, k.*');

			$this->db->where('sie.id_sie', $id_sie);
			return $this->db->get()->row_array();
		}

		public function EditNewKritPos($id_sie, $data){
			$this->db->from('tb_siepanitia');
			$this->db->where('id_sie', $id_sie);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->from('tb_siepanitia');
			$this->db->where('id_kegiatan', $idKegiatan);
			$this->db->where('id_sie',$id_sie);

			return $this->db->update($this->siepanitia, $data);
		}
			

		/*detail*/
		public function doDetailPos($id_kegiatan,$id_sie){
			$this->db->select('krit.*, pos.*, sie.*,k.*');
			$this->db->from('tb_kriteria_posisi pos');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = pos.id_kegiatan');
			$this->db->join('tb_siepanitia sie','sie.id_sie = pos.id_sie');
			$this->db->join('tb_kriteria krit','krit.id_kriteria = pos.id_kriteria');
			$this->db->where('pos.id_kegiatan', $id_kegiatan);
			$this->db->where('pos.id_sie', $id_sie);
			return $this->db->get()->result();
		}

		public function getNama($id_sie){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k','sie.id_kegiatan = k.id_kegiatan');
			$this->db->select('sie.nama_sie,k.nama_kegiatan');
			$this->db->where('sie.id_sie', $id_sie);
			return $this->db->get();
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
			$this->db->select('sie.*, pos.*, k.*');
			$this->db->from('tb_kriteria_posisi pos');
			$this->db->join('tb_siepanitia sie','pos.id_sie = sie.id_sie');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = pos.id_kegiatan');
			
			$this->db->where($id);
			return $this->db->get()->row_array();
		}

		public function updateDetailPos($id, $data){
			$this->db->select('sie.*, pos.*, k.*');
			$this->db->from('tb_kriteria_posisi pos');
			$this->db->join('tb_siepanitia sie','pos.id_sie = sie.id_sie');
			$this->db->join('tb_kegiatan k', 'k.id_kegiatan = pos.id_kegiatan');
			
			$this->db->where($id);
			return $this->db->update($this->posisi, $data);
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