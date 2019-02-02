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

		public function getAllDetailKegiatan($id_kegiatan, $id_level, $id_user)
		{
			$this->db->from('tb_detail_user duser');
			$this->db->where('duser.id_kegiatan', $id_kegiatan);
			$this->db->where('duser.id_level' , $id_level);
			$this->db->where('duser.id_user' , $id_user);
			$result = $this->db->get(); 
			return $result -> result_array();
		}

		/*Perangkingan nilai tes*/

		public function ambilNilaiAwal($id_kegiatan){
			
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_pendaftar pendaftar', 'nilai.id_pendaftar = pendaftar.id_pendaftar');
			$this->db->join('tb_kegiatan k', 'nilai.id_kegiatan =  k.id_kegiatan');
			
			$this->db->group_by('nilai.id_pendaftar');
			$this->db->where(array('nilai.id_kegiatan' => $id_kegiatan));
			
			return $this->db->get()->result();
		}

		public function ambilNilaiKriteria($id_kegiatan){
			
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_pendaftar pendaftar', 'nilai.id_pendaftar = pendaftar.id_pendaftar');
			$this->db->join('tb_kegiatan k', 'nilai.id_kegiatan = k.id_kegiatan');
			$this->db->group_by('nilai.id_pendaftar');

			$this->db->where(array('nilai.id_kegiatan' => $id_kegiatan));
			$this->db->select('pendaftar.id_pendaftar,pendaftar.nama_pendaftar, nilai.c1, nilai.c2, nilai.c3, nilai.c4, nilai.c5, nilai.c6, nilai.c7, k.*');
			
			return $this->db->get()->result_array();
		}

		public function ambilNilaiBobotKriteria(){
			$this->db->from('tb_kriteria krit');
			$this->db->select('krit.nama_kriteria, krit.kode, krit.bobot');
			return $this->db->get();
		}

		public function ambilNilaiPendaftarArray(){
			$this->db->select('pendaftar.nim, pendaftar.nama_pendaftar, pendaftar.program_studi, nilai.*');
			$this->db->from('tb_pendaftar pendaftar');
			$this->db->join('tb_penilaian nilai', 'nilai.id_pendaftar = pendaftar.id_pendaftar');
			$this->db->from($this->nilai);
			$this->db->group_by('nilai.id_pendaftar');
			
			return $this->db->get()->result_array();
		}


		public function insert($id_pendaftar,$id_kegiatan,$rangking){
			$sql = "INSERT INTO tb_hasil_rangking (id_rangking, id_pendaftar, id_kegiatan, hasil, status) VALUES(' ','$id_pendaftar', '$id_kegiatan','$rangking',0)";
			return $this->db->query($sql);

		}


		


		/*Rekomendasi Posisi*/
		
		public function ambilPilihanPosisi($id_kegiatan){
			$this->db->select('pendaftar.*, sie.nama_sie as pos1, sie2.nama_sie as pos2, k.*');
			$this->db->from('tb_pendaftar pendaftar');
			$this->db->join('tb_siepanitia sie','pendaftar.posisi1 =  sie.id_sie');
			$this->db->join('tb_siepanitia sie2','pendaftar.posisi2 =  sie2.id_sie');
			$this->db->join('tb_kegiatan k', 'pendaftar.id_kegiatan =  k.id_kegiatan');
			$this->db->from($this->pendaftar);
			$this->db->group_by('pendaftar.id_pendaftar');
			$this->db->where(array('pendaftar.id_kegiatan' => $id_kegiatan));

			return $this->db->get()->result_array();
		}

		public function ambilDataSie($id_kegiatan){
			$this->db->from('tb_siepanitia sie');
			$this->db->join('tb_kegiatan k', 'sie.id_kegiatan =  k.id_kegiatan');
			$this->db->select('sie.*');
			$this->db->where('sie.id_kegiatan', $id_kegiatan);
			return $this->db->get()->result_array();
		}

		public function ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $id_sie){
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_kegiatan k','nilai.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_pendaftar pendaftar','nilai.id_pendaftar = pendaftar.id_pendaftar');

			$this->db->select('nilai.*, pendaftar.*, k.*');
			$this->db->where('nilai.id_kegiatan',$id_kegiatan);
			$this->db->where('pendaftar.posisi1',$id_sie);
			$this->db->or_where('pendaftar.posisi2',$id_sie);

			
			return $this->db->get()->result_array();
			
		}


		public function JumlahPendaftarSesuaiPosisi($id_kegiatan, $id_sie){
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_kegiatan k','nilai.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_pendaftar pendaftar','nilai.id_pendaftar = pendaftar.id_pendaftar');

			$this->db->select('nilai.id_pendaftar');
			$this->db->where('nilai.id_kegiatan',$id_kegiatan);
			$this->db->where('pendaftar.posisi1',$id_sie);
			$this->db->or_where('pendaftar.posisi2',$id_sie);
			
			return $this->db->count_all_results();
			
		}

		public function ambilNilaiKriteriaPosisi($id_kegiatan,$id_sie){
			
			$this->db->from('tb_penilaian nilai');
			$this->db->join('tb_kegiatan k','nilai.id_kegiatan = k.id_kegiatan');
			$this->db->join('tb_pendaftar pendaftar','nilai.id_pendaftar = pendaftar.id_pendaftar');

			$this->db->where('nilai.id_kegiatan',$id_kegiatan);
			$this->db->where('pendaftar.posisi1',$id_sie);
			$this->db->or_where('pendaftar.posisi2',$id_sie);
			$this->db->group_by('nilai.id_pendaftar');

			$this->db->select('nilai.id_pendaftar,pendaftar.nama_pendaftar, nilai.c1, nilai.c2, nilai.c3, nilai.c4, nilai.c5, nilai.c6, nilai.c7, k.*');
			
			return $this->db->get()->result_array();
		}


		public function ambilNilaiBobotKriteriaPosisi($id_kegiatan, $id_sie){
			$this->db->from('tb_kriteria_posisi kritpos');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = kritpos.id_kegiatan');
			$this->db->join('tb_siepanitia sie','sie.id_sie = kritpos.id_sie');
			$this->db->join('tb_kriteria krit','krit.id_kriteria = kritpos.id_kriteria');

			$this->db->where('kritpos.id_kegiatan',$id_kegiatan);
			$this->db->where('kritpos.id_sie',$id_sie);

			$this->db->select('krit.nama_kriteria, krit.kode, kritpos.*, k.*, sie.*');
			return $this->db->get();
		}

		public function insertrekomendasi($id_sie,$id_kegiatan,$id_pendaftar,$rangking){
			$sql = "INSERT INTO tb_hasil_rekomendasi (id_rekomendasi, id_sie, id_kegiatan, id_pendaftar,  hasil_rekomendasi) VALUES(' ','$id_sie','$id_kegiatan','$id_pendaftar','$rangking')";
			return $this->db->query($sql);
		}

		public function insertdatatunggal($id_sie,$id_kegiatan,$id_pendaftar){
			$sql = "INSERT INTO tb_hasil_rekomendasi (id_rekomendasi, id_sie, id_kegiatan, id_pendaftar, hasil_rekomendasi) VALUES(' ','$id_sie', '$id_kegiatan', '$id_pendaftar','100')";
			return $this->db->query($sql);

		}

	}
		
?>