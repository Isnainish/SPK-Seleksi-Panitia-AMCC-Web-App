<?php 
	/**
	* 
	*/
	class Perhitungan extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();
           if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
                redirect('auth/Auth');
            }
			$this->load->model("m_hitung");
			
		} 

		public function index(){
			$carinama = $this->session->userdata('carinama');
            $idLevel = $this->session->userdata['auth_session']['id_level'];
            $idUser = $this->session->userdata['auth_session']['id_user'];
            $data['select_option'] = $this->m_hitung->getAllKegiatan();

			$data['penilaian'] = $this->m_hitung->ambilNilaiAwal($carinama['id_kegiatan']);
            $data['detail_kegiatan'] = count($this->m_hitung->getAllDetailKegiatan($carinama['id_kegiatan'], $idLevel, $idUser));

			$this->load->view('admin/dataperhitungan/penilaian',$data);
		}

        /*filter kegiatan*/
        public function doSearchKegiatan(){
            $carinama['id_kegiatan'] = $this->input->post('id_kegiatan');
            $this->session->set_userdata('carinama', $carinama);
            redirect('admin/DataPerhitungan/Perhitungan');
        }
		
		public function hitung($id_kegiatan){
            //jumlah penndaftar
			$jumlahPendaftarDenganNilai = count($this->m_hitung->ambilNilaiAwal($id_kegiatan));
			//data kriteria
			$kriteria = $this->m_hitung->ambilNilaiKriteria($id_kegiatan);
			//data bobot
			$bobot = $this->m_hitung->ambilNilaiBobotKriteria()->result();
            
        // langkah 1 : mengambil nilai derajat kecocokan dari tabel penilaian
            $nilaibaru = $this->m_hitung->ambilNilaiAwal($id_kegiatan);
                $c1 = array();
                $c2 = array();
                $c3 = array();
                $c4 = array();
                $c5 = array();
                $c6 = array();
                $c7 = array();

                if ($jumlahPendaftarDenganNilai > 0) {
        //langkah 2 : mencari nilai max pada masing-masing kriteria setiap pendaftar(alternatif)
                    	foreach ($kriteria as $val) {
                    		$c1[] = $val['c1'];
                    		$c2[] = $val['c2'];
                    		$c3[] = $val['c3'];
                    		$c4[] = $val['c4'];
                    		$c5[] = $val['c5'];
                    		$c6[] = $val['c6'];
                    		$c7[] = $val['c7'];
                    	}
                    	$max_c1 = max($c1);
                    	$max_c2 = max($c2);
                    	$max_c3 = max($c3);
                    	$max_c4 = max($c4);
                    	$max_c5 = max($c5);
                    	$max_c6 = max($c6);
                    	$max_c7 = max($c7);
        //langkah 3 : (normalisasi) memasukkan rumus R : nilai pendaftar dibagi nilai max
                        $normalisasi = [];     
                        $i = 0;
                        foreach($c1 as $data) {
                            // $normalisasi[$i]['nama_pendaftar'] = $nilaibaru[$i]->nama_pendaftar;
                            $normalisasi[$i]['c1'] = $data / $max_c1;
                            $hasilc1[] = $normalisasi[$i++]['c1'];
                        }
                        $i = 0;
                        foreach($c2 as $data) {
                            $normalisasi[$i]['c2'] = $data / $max_c2;
                            $hasilc2[] = $normalisasi[$i++]['c2'];
                        }
                        $i = 0;
                        foreach($c3 as $data) {
                            $normalisasi[$i]['c3'] = $data / $max_c3;
                            $hasilc3[] = $normalisasi[$i++]['c3'];
                        }
                        $i = 0;
                        foreach($c4 as $data) {
                            $normalisasi[$i]['c4'] = $data / $max_c4;
                            $hasilc4[] = $normalisasi[$i++]['c4'];
                        }
                        $i = 0;
                        foreach($c5 as $data) {
                            $normalisasi[$i]['c5'] = $data / $max_c5;
                            $hasilc5[] = $normalisasi[$i++]['c5'];
                        }
                        $i = 0;
                        foreach($c6 as $data) {
                            $normalisasi[$i]['c6'] = $data / $max_c6;
                            $hasilc6[] = $normalisasi[$i++]['c6'];
                        }
                        $i = 0;
                        foreach($c7 as $data) {
                            $normalisasi[$i]['c7'] = $data / $max_c7;
                            $hasilc7[] = $normalisasi[$i++]['c7'];
                        }

                }
        //langkah 4 : mencari nilai preferensi (v) nilai normalisasi*bobot kriteria  :
                        $hasil = [];
                        for($i = 0; $i < count($hasilc1); $i++) {
                                $hasil[$i]['c1'] = $hasilc1[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc2); $i++) {
                                $hasil[$i]['c2'] = $hasilc2[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc3); $i++) {
                                $hasil[$i]['c3'] = $hasilc3[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc4); $i++) {
                                $hasil[$i]['c4'] = $hasilc4[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc6); $i++) {
                                $hasil[$i]['c6'] = $hasilc6[$i] * $bobot[0]->bobot;
                        }for($i = 0; $i < count($hasilc7); $i++) {
                                $hasil[$i]['c7'] = $hasilc7[$i] * $bobot[0]->bobot;
                        }
        //langkah 5 : tampilkan nilai total preferensi(v) masing2 alternatif 
                        foreach ($hasil as $v) {
                            $rangking[] =(array_sum($v));
                        }
                $data = array(
                    'nilaibaru' => $nilaibaru,
                    'normalisasi' => $normalisasi,
                    'hasil' => $hasil,
                    'rangking' => $rangking,
                    'idkegiatan' => $id_kegiatan            
                );
			 $this->load->view('admin/dataperhitungan/detail',$data);
		}

        public function SimpanHasil($id_kegiatan){

            // langkah 1 : mengubah nilai dari inputan pewawancara sesuai dgn bobot yang sudah ditentukan pada masing2 kriteria
                
                $nilaibaru = $this->m_hitung->ambilNilaiAwal($id_kegiatan);

                //jumlah penndaftar
                $jumlahPendaftarDenganNilai = count($this->m_hitung->ambilNilaiAwal($id_kegiatan));
                //data kriteria
                $kriteria = $this->m_hitung->ambilNilaiKriteria($id_kegiatan);
                //data bobot
                $bobot = $this->m_hitung->ambilNilaiBobotKriteria($id_kegiatan)->result();
                
                    $c1 = array();
                    $c2 = array();
                    $c3 = array();
                    $c4 = array();
                    $c5 = array();
                    $c6 = array();
                    $c7 = array();
                if ($jumlahPendaftarDenganNilai > 0) {
            //langkah 2 : mencari nilai max masing-masing kriteria pada setiap pendaftar(alternatif)
                        foreach ($kriteria as $val) {
                            $c1[] = $val['c1'];
                            $c2[] = $val['c2'];
                            $c3[] = $val['c3'];
                            $c4[] = $val['c4'];
                            $c5[] = $val['c5'];
                            $c6[] = $val['c6'];
                            $c7[] = $val['c7'];
                        }

                        $max_c1 = max($c1);
                        $max_c2 = max($c2);
                        $max_c3 = max($c3);
                        $max_c4 = max($c4);
                        $max_c5 = max($c5);
                        $max_c6 = max($c6);
                        $max_c7 = max($c7);
                    
            //langkah 3 : (normalisasi) memasukkan rumus R : nilai pendaftar dibagi nilai max
                        $normalisasi = [];
                                 
                        $i = 0;
                        foreach($c1 as $data) {
                            // $normalisasi[$i]['nama_pendaftar'] = $nilaibaru[$i]->nama_pendaftar;
                            $normalisasi[$i]['c1'] = $data / $max_c1;
                            $hasilc1[] = $normalisasi[$i++]['c1'];
                        }
                        $i = 0;
                        foreach($c2 as $data) {
                            $normalisasi[$i]['c2'] = $data / $max_c2;
                            $hasilc2[] = $normalisasi[$i++]['c2'];
                        }
                        $i = 0;
                        foreach($c3 as $data) {
                            $normalisasi[$i]['c3'] = $data / $max_c3;
                            $hasilc3[] = $normalisasi[$i++]['c3'];
                        }
                        $i = 0;
                        foreach($c4 as $data) {
                            $normalisasi[$i]['c4'] = $data / $max_c4;
                            $hasilc4[] = $normalisasi[$i++]['c4'];
                        }
                        $i = 0;
                        foreach($c5 as $data) {
                            $normalisasi[$i]['c5'] = $data / $max_c5;
                            $hasilc5[] = $normalisasi[$i++]['c5'];
                        }
                        $i = 0;
                        foreach($c6 as $data) {
                            $normalisasi[$i]['c6'] = $data / $max_c6;
                            $hasilc6[] = $normalisasi[$i++]['c6'];
                        }
                        $i = 0;
                        foreach($c7 as $data) {
                            $normalisasi[$i]['c7'] = $data / $max_c7;
                            $hasilc7[] = $normalisasi[$i++]['c7'];
                        }

                }

            //langkah 4 : mencari nilai preferensi (v) nilai normalisasi*bobot kriteria  :

                        $hasil = [];

                        for($i = 0; $i < count($hasilc1); $i++) {
                                $hasil[$i]['c1'] = $hasilc1[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc2); $i++) {
                                $hasil[$i]['c2'] = $hasilc2[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc3); $i++) {
                                $hasil[$i]['c3'] = $hasilc3[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc4); $i++) {
                                $hasil[$i]['c4'] = $hasilc4[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc6); $i++) {
                                $hasil[$i]['c6'] = $hasilc6[$i] * $bobot[0]->bobot;
                        }for($i = 0; $i < count($hasilc7); $i++) {
                                $hasil[$i]['c7'] = $hasilc7[$i] * $bobot[0]->bobot;
                        }

            //langkah 5 : tampilkan nilai total preferensi(v) masing2 alternatif 

                        foreach ($hasil as $v) {
                            $rangking[] =(array_sum($v));
                        }

                        $data = array(
                                'nilaibaru' => $nilaibaru,
                                'normalisasi' => $normalisasi,
                                'hasil' => $hasil,
                                'rangking' => $rangking
                                                    
                            );

            //langkah 6: input database : di filter dari terbesar ke terkecil masukkan nilai rangking ke database

            /*INPUT KEDATABASE Nilai Hasil Perangkingan*/
            for ($i=0; $i < count($rangking); $i++) {

                $this->m_hitung->insert($kriteria[$i]['id_pendaftar'],$kriteria[$i]['id_kegiatan'],$rangking[$i]);
            }
           
            redirect('admin/DataHasil/Hasil');

        }


	}
 ?>
 <?php  
