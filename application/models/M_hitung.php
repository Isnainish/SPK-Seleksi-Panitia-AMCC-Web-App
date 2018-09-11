<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/**  
	* 
	*/
	class M_hitung extends CI_Model
	{
		var $kriteria = 'tb_kriteria';
		var $kritpos = 'tb_kriteria_posisi';
		var $pendaftar = 'tb_pendaftar';
		var $pww = 'tb_pewawancara';
		var $nilai = 'tb_penilaian';
		var $hasil = 'tb_hasil';
		var $pilpos1 = 'tb_pilposisi1';
		var $pilpos2 = 'tb_pilposisi2';
		var $siepanitia = 'tb_siepanitia';
		var $rangking = 'tb_hasil_rangking';
		var $rekomendasi = 'tb_hasil_rekomendasi';
		var $kegiatan = 'tb_kegiatan';
		
		function __construct()
		{
			parent::__construct();
		}

		public function getAllKegiatan() {
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		/*Perangkingan nilai tes*/

		public function ambilNilaiAwal($id_kegiatan){
			$this->db->select('user1.nim, user1.nama_pendaftar, user1.program_studi, nilai.*,k.*');
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_penilaian nilai', 'nilai.id_pendaftar = user1.id_pendaftar');
			$this->db->join('tb_kegiatan k', 'nilai.id_kegiatan =  k.id_kegiatan');
			$this->db->from($this->nilai);
			$this->db->group_by('nilai.id_pendaftar');
			$this->db->where(array('nilai.id_kegiatan' => $id_kegiatan));
			
			return $this->db->get()->result();
		}



		public function ambilJumlahNilaiPendaftar(){
			$this->db->select('user1.nim, user1.nama_pendaftar, user1.program_studi, nilai.*');
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_penilaian nilai', 'nilai.id_pendaftar = user1.id_pendaftar');
			
			$this->db->from($this->nilai);
			$this->db->group_by('nilai.id_pendaftar');
			
			
			return $this->db->count_all_results();
		}


		public function ambilNilaiKriteria(){
			$this->db->select('user1.id_pendaftar,user1.nama_pendaftar, nilai.c1, nilai.c2, nilai.c3, nilai.c4, nilai.c5, nilai.c6, nilai.c7');
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_penilaian nilai', 'nilai.id_pendaftar = user1.id_pendaftar');
			$this->db->from($this->nilai);
			$this->db->group_by('nilai.id_pendaftar');
			
			return $this->db->get()->result_array();
		}

		public function ambilNilaiPendaftarArray(){
			$this->db->select('user1.nim, user1.nama_pendaftar, user1.program_studi, nilai.*');
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_penilaian nilai', 'nilai.id_pendaftar = user1.id_pendaftar');
			$this->db->from($this->nilai);
			$this->db->group_by('nilai.id_pendaftar');
			
			return $this->db->get()->result_array();
		}

		public function ambilNilaiBobotKriteria(){
			$this->db->from($this->kriteria);
			return $this->db->get();
		}

		public function insert($nama_pendaftar,$v){
			$sql = "INSERT INTO tb_hasil_rangking (id_rangking, nama_pendaftar, hasil) VALUES(' ','$nama_pendaftar','$v')";
			return $this->db->query($sql);

			


		}


		


		/*Rekomendasi Posisi*/
		
		public function ambilPilihanPosisi($id_kegiatan){
			$this->db->select('user1.*, sie.nama_sie as pos1, sie2.nama_sie as pos2, k.*');
			$this->db->from('tb_pendaftar user1');
			$this->db->join('tb_siepanitia sie','user1.posisi1 =  sie.id_sie');
			$this->db->join('tb_siepanitia sie2','user1.posisi2 =  sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'user1.id_kegiatan =  k.id_kegiatan');
			$this->db->from($this->pendaftar);
			$this->db->group_by('user1.id_pendaftar');
			$this->db->where(array('user1.id_kegiatan' => $id_kegiatan));

			return $this->db->get()->result_array();
		}

		public function ambilDataSie($id_kegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k', 'sie.id_kegiatan =  k.id_kegiatan');
			$this->db->select('sie.nama_sie, k.*');
			$this->db->where('sie.id_kegiatan', $id_kegiatan);
			return $this->db->get()->result_array();
		}

		public function ambilNilaiSesuaiPilihanPosisi($id_kegiatan){

			
			$this->db->select('user1.nama_pendaftar, user1.posisi1, user1.posisi2, k.*');
			$this->db->join('tb_kegiatan k','user1.id_kegiatan = k.id_kegiatan');
			$this->db->from('tb_pendaftar user1');
			$this->db->where('user1.id_kegiatan',$id_kegiatan);

			

			return $this->db->get()->result_array();
			
		}


		public function ambilNilaiBobot($id_sie){
			
			$this->db->from('tb_kriteria_posisi pos');
			$this->db->join('tb_siepanitia sie','pos.id_sie = sie.id_sie');
			$this->db->join('tb_kriteria krit','pos.id_kriteria = krit.id_kriteria');
			$this->db->select('sie.id_sie, sie.nama_sie, krit.id_kriteria, krit.nama_kriteria,pos.bobot' );
			$this->db->where(array('pos.id_sie'=> $id_sie));

			return $this->db->get()->result_array();
		}

		public function insertrekomendasi($id_sie,$v){
			// $sql = "INSERT INTO tb_hasil_rekomendasi (id_rekomendasi,id_sie,nama_pendaftar, hasil_rekomendasi) VALUES(' ','$id_sie','$nama_pendaftar','$v')";
			// return $this->db->query($sql);
		}

		public function insertdatatunggal($id_sie){
			// $sql = "INSERT INTO tb_hasil_rekomendasi (id_rekomendasi,id_sie,nama_pendaftar, hasil_rekomendasi) VALUES(' ','$id_sie,' ')";
			// return $this->db->query($sql);

		}

	}
		
?>