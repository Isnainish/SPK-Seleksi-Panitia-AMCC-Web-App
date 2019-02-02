<?php 
	/**
	* 
	*/
	class Rekomendasi extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();
            if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
                redirect('auth/Auth');
            }
			$this->load->model("m_hitung");
			
		} 

		public function index()
		{
			$posisi = $this->session->userdata('posisi');
            $idLevel = $this->session->userdata['auth_session']['id_level'];
            $idUser = $this->session->userdata['auth_session']['id_user'];
            $data['select_option'] = $this->m_hitung->getAllKegiatan();

			$data['pilihansie'] = $this->m_hitung->ambilPilihanPosisi($posisi['id_kegiatan']);
            $data['detail_kegiatan'] = count($this->m_hitung->getAllDetailKegiatan($posisi['id_kegiatan'], $idLevel, $idUser));

			$this->load->view('admin/dataperhitungan/rekomendasi',$data);

		}

        public function doSearchKegiatan(){
            $posisi['id_kegiatan'] = $this->input->post('id_kegiatan');
            $this->session->set_userdata('posisi', $posisi);
            redirect('admin/DataPerhitungan/Rekomendasi');
        }

		public function viewNilai($id_kegiatan){
            /*menampilkan nama sie-kepanitiaan*/
			$sie = $this->m_hitung->ambilDataSie($id_kegiatan);
    
			/*mengambil data sesuai posisi1 dan posisi2*/
            for ($i=0; $i < count($sie) ; $i++) { 
            
                $pendaftar[] = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $sie[$i]['id_sie']);

            }

			$data =  array(
				'sie' => $sie,
                'pendaftar' =>$pendaftar		
			);

			$this->load->view('admin/dataperhitungan/tampil_rekomendasi',$data);
                        
        }

        public function hitungrekomendasi($id_kegiatan,$id_sie){

			//langkah 1
        	//data nilai pendaftar berdasarkan posisi yg dipilih
        	$nilaibaru = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $id_sie);

			//jumlah penndaftar
            $jumlahPendaftar = $this->m_hitung->JumlahPendaftarSesuaiPosisi($id_kegiatan, $id_sie);
            //data kriteria
            $kriteria = $this->m_hitung->ambilNilaiKriteriaPosisi($id_kegiatan, $id_sie);
            //data bobot
            $bobotkriteria = $this->m_hitung->ambilNilaiBobotKriteriaPosisi($id_kegiatan, $id_sie)->result();
			
            if ($jumlahPendaftar < 2) {
                redirect('admin/DataPerhitungan/Rekomendasi/DataTunggal/'.$id_kegiatan.'/'.$id_sie);
            }else{

                $c1 = array();
                $c2 = array();
                $c3 = array();
                $c4 = array();
                $c5 = array();
                $c6 = array();
                $c7 = array();


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

            //langkah 4 : mencari nilai preferensi (v) nilai normalisasi*bobot kriteria  :

                        $hasil = [];

                        for($i = 0; $i < count($hasilc1); $i++) {
                                $hasil[$i]['c1'] = $hasilc1[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc2); $i++) {
                                $hasil[$i]['c2'] = $hasilc2[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc3); $i++) {
                                $hasil[$i]['c3'] = $hasilc3[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc4); $i++) {
                                $hasil[$i]['c4'] = $hasilc4[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc6); $i++) {
                                $hasil[$i]['c6'] = $hasilc6[$i] * $bobotkriteria[0]->bobot;
                        }for($i = 0; $i < count($hasilc7); $i++) {
                                $hasil[$i]['c7'] = $hasilc7[$i] * $bobotkriteria[0]->bobot;
                        }

            //langkah 5 : tampilkan nilai total preferensi(v) masing2 alternatif 

                        foreach ($hasil as $v) {
                            $rangking[] =(array_sum($v));
                        }
            }
            $data = array(
                'nilaibaru' => $nilaibaru,
                'normalisasi' => $normalisasi,
                'hasil' => $hasil,
                'rangking' => $rangking,
                'idsie' => $id_sie,
                'idkegiatan' => $id_kegiatan
            );  
        	$this->load->view('admin/dataperhitungan/detail_rekomendasi',$data);              
        }


        public function simpan_rekomendasi($id_kegiatan,$id_sie){
            
            //langkah 1
                //data nilai pendaftar berdasarkan posisi yg dipilih
                $nilaibaru = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $id_sie);

                //jumlah penndaftar
                $jumlahPendaftar = $this->m_hitung->JumlahPendaftarSesuaiPosisi($id_kegiatan, $id_sie);
                //data kriteria
                $kriteria = $this->m_hitung->ambilNilaiKriteriaPosisi($id_kegiatan, $id_sie);
                //data bobot
                $bobotkriteria = $this->m_hitung->ambilNilaiBobotKriteriaPosisi($id_kegiatan, $id_sie)->result();
            
            if ($jumlahPendaftar < 2) {
                    redirect('admin/DataPerhitungan/Rekomendasi/DataTunggal/'.$id_sie);
            }else{

                    $c1 = array();
                    $c2 = array();
                    $c3 = array();
                    $c4 = array();
                    $c5 = array();
                    $c6 = array();
                    $c7 = array();


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

            //langkah 4 : mencari nilai preferensi (v) nilai normalisasi*bobot kriteria  :

                        $hasil = [];

                        for($i = 0; $i < count($hasilc1); $i++) {
                                $hasil[$i]['c1'] = $hasilc1[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc2); $i++) {
                                $hasil[$i]['c2'] = $hasilc2[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc3); $i++) {
                                $hasil[$i]['c3'] = $hasilc3[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc4); $i++) {
                                $hasil[$i]['c4'] = $hasilc4[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobotkriteria[0]->bobot;
                        }
                        for($i = 0; $i < count($hasilc6); $i++) {
                                $hasil[$i]['c6'] = $hasilc6[$i] * $bobotkriteria[0]->bobot;
                        }for($i = 0; $i < count($hasilc7); $i++) {
                                $hasil[$i]['c7'] = $hasilc7[$i] * $bobotkriteria[0]->bobot;
                        }

            //langkah 5 : tampilkan nilai total preferensi(v) masing2 alternatif 

                        foreach ($hasil as $v) {
                            $rangking[] =(array_sum($v));
                        }
            }
            $data = array(
                'nilaibaru' => $nilaibaru,
                'normalisasi' => $normalisasi,
                'hasil' => $hasil,
                'rangking' => $rangking

            );   

            //langkah 6: input database : di filter dari terbesar ke terkecil masukkan nilai rangking ke database

            /*INPUT KEDATABASE*/

            for ($i=0; $i < count($rangking); $i++) {

                $this->m_hitung->insertrekomendasi($id_sie,$id_kegiatan,$kriteria[$i]['id_pendaftar'],$rangking[$i]);
                                
            }

            
            redirect('admin/DataPerhitungan/Rekomendasi/viewNilai/'.$id_kegiatan);
                        
        
        }

        public function DataTunggal($id_kegiatan,$id_sie){
            
            $nama_pendaftar = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $id_sie);

            $data = array(
                'nama_pendaftar' => $nama_pendaftar,
                'idsie' => $id_sie,
                'idkegiatan' => $id_kegiatan
            );
            

        	$this->load->view('admin/dataperhitungan/notifikasi',$data);
        }

        public function simpan_data_tunggal($id_kegiatan,$id_sie){

             $pendaftar  = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan, $id_sie);
             
            for($i=0; $i<count($pendaftar) ; $i++){

                $this->m_hitung->insertdatatunggal($id_sie,$id_kegiatan,$pendaftar[$i]['id_pendaftar']);

            }


           redirect('admin/DataPerhitungan/Rekomendasi/viewNilai/'.$id_kegiatan);
            

        }
	}
 ?>
