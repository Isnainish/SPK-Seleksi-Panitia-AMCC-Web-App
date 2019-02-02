<?php 
	/**
	* 
	*/
	class Pengumuman extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Pewawancara') {
				redirect('auth/Auth');
			}
			$this->load->model("m_hasil");
		}
		
		public function index(){
			$pilihnamakegiatan = $this->session->userdata('pilihnamakegiatan');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['nama_kegiatan'] = $this->m_hasil->getAllKegiatan();
			$data['detail_kegiatan'] = count($this->m_hasil->getAllDetailKegiatan($pilihnamakegiatan['id_kegiatan'], $idLevel, $idUser));

			$data['pengumuman'] = $this->m_hasil->getHasilAkhir($pilihnamakegiatan['id_kegiatan']);
			
			$this->load->view('user/pengumuman',$data);

		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$pilihnamakegiatan['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('pilihnamakegiatan', $pilihnamakegiatan);
			redirect('user/Pengumuman');
		}
	}
?>