<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_hasil extends CI_Model
	{
		var $rangking = 'tb_hasil_rangking';
		var $rekomendasi = 'tb_hasil_rekomendasi';
		var $siepanitia = 'tb_siepanitia';


		function __construct()
		{
			parent::__construct();
		}

		public function getHasilRangking(){
			$this->db->from($this->rangking);
			$this->db->order_by('hasil','desc');

			return $this->db->get()->result_array();
		}

		public function getHasilRekomendasi(){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_hasil_rekomendasi hr','sie.id_sie = hr.id_sie');
			$this->db->select('sie.nama_sie, hr.nama_pendaftar, hasil_rekomendasi');
			
			$this->db->order_by('hasil_rekomendasi desc');

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