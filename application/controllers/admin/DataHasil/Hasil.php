<?php 
	/**
	* 
	*/
	class Hasil extends CI_Controller
	{	

		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_hasil");
			
		} 
		public function index()
		{
			$pilihnamakegiatan = $this->session->userdata('pilihnamakegiatan');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['nama_kegiatan'] = $this->m_hasil->getAllKegiatan();
			$data['detail_kegiatan'] = count($this->m_hasil->getAllDetailKegiatan($pilihnamakegiatan['id_kegiatan'], $idLevel, $idUser));

			/*data*/
			$data['rangking'] = $this->m_hasil->getHasilRangking($pilihnamakegiatan['id_kegiatan']);

			$data['rekomendasi'] = $this->m_hasil->getHasilRekomendasi($pilihnamakegiatan['id_kegiatan']);
			
			$this->load->view('admin/datahasil/hasil',$data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$pilihnamakegiatan['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('pilihnamakegiatan', $pilihnamakegiatan);
			redirect('admin/DataHasil/Hasil');
		}

		public function addstatus($id_kegiatan){

			/*mengubah nilai status dari nilai 0=peserta menjadi 1=panitia*/
			$cekstatus = $this->input->post('status');
			$value = 1;
			
			for ($i=0; $i < count($cekstatus) ; $i++) { 
			
				$data =$this->m_hasil->updateCekStatus($cekstatus[$i], $value);
			}
			
			redirect('admin/DataHasil/Hasil/hasilakhir/'.$id_kegiatan);

			
		}

		/*pengumuman*/
		public function hasilakhir(){
			$carihasil = $this->session->userdata('carihasil');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['nama_kegiatan'] = $this->m_hasil->getAllKegiatan();
			$data['detail_kegiatan'] = count($this->m_hasil->getAllDetailKegiatan($carihasil['id_kegiatan'], $idLevel, $idUser));

			$data['lolos'] = $this->m_hasil->getHasilAkhir($carihasil['id_kegiatan']);
			$this->load->view('admin/datahasil/hasilakhir',$data);
		}

		public function doSearchHasilKegiatan(){
			$carihasil['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('carihasil', $carihasil);
			redirect('admin/DataHasil/Hasil/hasilakhir/'.$carihasil['id_kegiatan']);
		}

		public function hapushasilakhir($id_kegiatan,$id_rangking){
			$value = 0;
			$this->m_hasil->DeleteHasilAkhir($id_rangking, $value);
			redirect('admin/DataHasil/Hasil/hasilakhir/'.$id_kegiatan);
		}

		



	}
 ?>