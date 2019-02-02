<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_hasil extends CI_Model
	{
		var $kegiatan = 'tb_kegiatan';
		var $rangking = 'tb_hasil_rangking';
		var $rekomendasi = 'tb_hasil_rekomendasi';
		var $siepanitia = 'tb_siepanitia';


		function __construct()
		{
			parent::__construct();
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

		public function getHasilRangking($id_kegiatan){
			$this->db->from('tb_hasil_rangking rangking');
			$this->db->join('tb_pendaftar pendaftar','pendaftar.id_pendaftar = rangking.id_pendaftar');
			$this->db->join('tb_kegiatan kegiatan','kegiatan.id_kegiatan = rangking.id_kegiatan');

			$this->db->select('rangking.*,pendaftar.nama_pendaftar,kegiatan.*');
			$this->db->where('rangking.id_kegiatan',$id_kegiatan);

			$this->db->order_by('rangking.hasil','desc');

			return $this->db->get()->result_array();
		}

		public function updateCekStatus($id_rangking, $value){
			$this->db->from('tb_hasil_rangking rangking');
			$this->db->where('rangking.id_rangking',$id_rangking);
			$this->db->set('rangking.status',$value);
			return $this->db->update();
		}

		public function getHasilAkhir($id_kegiatan){
			$this->db->from('tb_hasil_rangking rangking');
			$this->db->join('tb_pendaftar pendaftar','pendaftar.id_pendaftar = rangking.id_pendaftar');
			$this->db->join('tb_kegiatan kegiatan','kegiatan.id_kegiatan = rangking.id_kegiatan');

			$this->db->select('rangking.*,pendaftar.nama_pendaftar,kegiatan.*');
			$this->db->where('rangking.id_kegiatan',$id_kegiatan);
			$this->db->where('rangking.status',1);

			$this->db->order_by('rangking.hasil','asc');

			return $this->db->get()->result_array();
		}

		public function DeleteHasilAkhir($id_rangking, $value){
			$this->db->from('tb_hasil_rangking rangking');
			$this->db->where('rangking.id_rangking',$id_rangking);
			$this->db->set('rangking.status',$value);
			return $this->db->update();
		}

		public function getHasilRekomendasi($id_kegiatan){
			$this->db->from('tb_hasil_rekomendasi rekomendasi');
			$this->db->join('tb_siepanitia sie','sie.id_sie = rekomendasi.id_sie');
			$this->db->join('tb_kegiatan kegiatan','kegiatan.id_kegiatan = rekomendasi.id_kegiatan');
			$this->db->join('tb_pendaftar pendaftar','pendaftar.id_pendaftar = rekomendasi.id_pendaftar');

			$this->db->select('rekomendasi.*,pendaftar.nama_pendaftar,kegiatan.*,sie.*');
			$this->db->where('rekomendasi.id_kegiatan',$id_kegiatan);
			$this->db->order_by('rekomendasi.hasil_rekomendasi','desc');

			return $this->db->get()->result_array();
		}

		public function getSiePanitia(){
			$this->db->from($this->siepanitia);
			return $this->db->get()->result_array();
		}

		public function getId(){
			$this->db->from('tb_hasil_rangking has');
			$this->db->select('has.id_rangking');

			return $this->db->count_all_results();
		}

	}
?>