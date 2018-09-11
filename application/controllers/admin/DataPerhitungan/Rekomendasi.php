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
            $data['select_option'] = $this->m_hitung->getAllKegiatan();
			$data['pilihansie'] = $this->m_hitung->ambilPilihanPosisi($posisi['id_kegiatan']);

			$this->load->view('admin/dataperhitungan/rekomendasi',$data);


		}

        public function doSearchKegiatan(){
            $posisi['id_kegiatan'] = $this->input->post('id_kegiatan');
            $this->session->set_userdata('posisi', $posisi);
            redirect('admin/DataPerhitungan/Rekomendasi');
        }

		public function viewNilai($id_kegiatan){
			$sie = $this->m_hitung->ambilDataSie($id_kegiatan);

			/*mengambil data sesuai id_posisi yang terdiri dari 2 id*/

            $pendaftar = $this->m_hitung->ambilNilaiSesuaiPilihanPosisi($id_kegiatan);
			
			$data =  array(
				'sie' => $sie,
                'pendaftar' =>$pendaftar

				
			);

			$this->load->view('admin/dataperhitungan/tampil_rekomendasi',$data);
                        
        }

        public function hitungrekomendasi($id_sie){

           
			//langkah 1
        	//data nilai berdasarkan posisi
        	$sie = $this->m_hitung->ambilNilaiSesuaiPosisi(array($id_sie,$id_sie));


			//data bobot
			$bobot = $this->m_hitung->ambilNilaiBobot($id_sie);

					$c1 = array();
                	$c2 = array();
                	$c3 = array();
                	$c4 = array();
                	$c5 = array();
                	$c6 = array();
                	$c7 = array();

                	if (count($sie) < 2) {

                		redirect('admin/DataPerhitungan/Rekomendasi/DataTunggal/'.$id_sie);
                		
                	}else{
                		//langkah 2
                		//mencari nilai max dari kriteria
                		
                		foreach ($sie as $val) {
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

                		 // langkah 3 : (normalisasi) memasukkan rumus r : nilai pendaftar dibagi nilai max
                                $normalisasi = [];
                                $i = 0;
                                foreach($c1 as $data) {
                                        // $normalisasi[$i]['nim'] = $nilaibaru[$i]->nim;
                                        // $normalisasi[$i]['nama_pendaftar'] = $nilaibaru[$i]->nama_pendaftar;
                                        $normalisasi[$i]['c1'] = $data / $max_c1;
                                        $hasilc1[] = $normalisasi[$i++]['c1'];
                                }
                                $i = 0;
                                foreach($c2 as $data) {
                                        $normalisasi[$i]['c2'] = $data / $max_c3;
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

                	// langkah 4 : mencari val v bobot kriteria*nilai hasil bagi :

                        $hasil = [];

                        for($i = 0; $i < count($hasilc1); $i++) {
                                $hasil[$i]['c1'] = $hasilc1[$i] * $bobot[0]['bobot'];
                        }

                        for($i = 0; $i < count($hasilc2); $i++) {
                                $hasil[$i]['c2'] = $hasilc2[$i] * $bobot[1]['bobot'];

                        }

                        for($i = 0; $i < count($hasilc3); $i++) {
                                $hasil[$i]['c3'] = $hasilc3[$i] * $bobot[2]['bobot'];
                        }

                        for($i = 0; $i < count($hasilc4); $i++) {
                                $hasil[$i]['c4'] = $hasilc4[$i] * $bobot[3]['bobot'];
                        }

                        for($i = 0; $i < count($hasilc5); $i++) {
                                $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[4]['bobot'];
                        }

                        for($i = 0; $i < count($hasilc6); $i++) {
                                $hasil[$i]['c6'] = $hasilc6[$i] * $bobot[5]['bobot'];
                                
                        }

                        for($i = 0; $i < count($hasilc7); $i++) {
                                $hasil[$i]['c7'] = $hasilc7[$i] * $bobot[6]['bobot'];
                        }



                        foreach ($hasil as $h) {

                                 $v[] =(array_sum($h));
                        }
                       
                        $preferensi = $v;



        	$data = array(
        		'nilaiawal' => $sie,
        		'normalisasi' => $normalisasi,
        		'hasil' => $hasil,
        		'preferensi' => $preferensi,
                'idsie' => $id_sie
                

        	);

        	$this->load->view('admin/dataperhitungan/detail_rekomendasi',$data);
                        
        }


        public function simpan_rekomendasi($id_sie){
            
            //langkah 1
            //data nilai berdasarkan posisi
            $sie = $this->m_hitung->ambilNilaiSesuaiPosisi(array($id_sie,$id_sie));
            

            //data bobot
            $bobot = $this->m_hitung->ambilNilaiBobot($id_sie);
            // echo "<pre>";
            // print_r($bobot);
            
            


                    $c1 = array();
                    $c2 = array();
                    $c3 = array();
                    $c4 = array();
                    $c5 = array();
                    $c6 = array();
                    $c7 = array();

                    
                        
                    
                        //langkah 2
                        //mencari nilai max dari kriteria
                        
                        foreach ($sie as $val) {
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

                        // langkah 3 : (normalisasi) memasukkan rumus r : nilai pendaftar dibagi nilai max
                                $normalisasi = [];
                                $i = 0;
                                foreach($c1 as $data) {
                                        // $normalisasi[$i]['nim'] = $nilaibaru[$i]->nim;
                                        // $normalisasi[$i]['nama_pendaftar'] = $nilaibaru[$i]->nama_pendaftar;
                                        $normalisasi[$i]['c1'] = $data / $max_c1;
                                        $hasilc1[] = $normalisasi[$i++]['c1'];
                                }
                                $i = 0;
                                foreach($c2 as $data) {
                                        $normalisasi[$i]['c2'] = $data / $max_c3;
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

                    

                            // langkah 4 : mencari val v bobot kriteria*nilai hasil bagi :

                                $hasil = [];

                                for($i = 0; $i < count($hasilc1); $i++) {
                                        $hasil[$i]['c1'] = $hasilc1[$i] * $bobot[0]['bobot'];
                                }

                                for($i = 0; $i < count($hasilc2); $i++) {
                                        $hasil[$i]['c2'] = $hasilc2[$i] * $bobot[1]['bobot'];

                                }

                                for($i = 0; $i < count($hasilc3); $i++) {
                                        $hasil[$i]['c3'] = $hasilc3[$i] * $bobot[2]['bobot'];
                                }

                                for($i = 0; $i < count($hasilc4); $i++) {
                                        $hasil[$i]['c4'] = $hasilc4[$i] * $bobot[3]['bobot'];
                                }

                                for($i = 0; $i < count($hasilc5); $i++) {
                                        $hasil[$i]['c5'] = $hasilc5[$i] * $bobot[4]['bobot'];
                                }

                                for($i = 0; $i < count($hasilc6); $i++) {
                                        $hasil[$i]['c6'] = $hasilc6[$i] * $bobot[5]['bobot'];
                                        
                                }

                                for($i = 0; $i < count($hasilc7); $i++) {
                                        $hasil[$i]['c7'] = $hasilc7[$i] * $bobot[6]['bobot'];
                                }



                                foreach ($hasil as $h) {

                                         $v[] =(array_sum($h));
                                }
                               
                                $preferensi = $v;

                                $data = array(
                                    'nilaiawal' => $sie,
                                    'normalisasi' => $normalisasi,
                                    'hasil' => $hasil,
                                    'preferensi' => $preferensi,
                                    'v' => $v

                                );

                                 for ($i=0; $i < count($v); $i++) {

                                    $this->m_hitung->insertrekomendasi($id_sie,$sie[$i]['nama_pendaftar'],$v[$i]);
                                

                                }

            
            redirect('admin/DataPerhitungan/Rekomendasi/viewNilai');
                        
        
        }

        public function DataTunggal($id_sie){
           
            $data['idsie'] = $id_sie;
            $data['nama_pendaftar'] = $this->m_hitung->ambilNilaiSesuaiPosisi(array($id_sie,$id_sie));
            

        	$this->load->view('admin/dataperhitungan/notifikasi',$data);
        }

        public function simpan_data_tunggal($id_sie){

            $sie = $this->m_hitung->ambilNilaiSesuaiPosisi(array($id_sie,$id_sie));



            for($i=0; $i<count($sie) ; $i++){

                $this->m_hitung->insertdatatunggal($id_sie,$sie[$i]['nama_pendaftar']);

            }


            redirect('admin/DataPerhitungan/Rekomendasi/viewNilai');
            

        }
	}
 ?>
