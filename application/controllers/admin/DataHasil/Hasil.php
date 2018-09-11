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
			$data = $this->m_hasil->getSiePanitia();
			$data['rangking'] = $this->m_hasil->getHasilRangking();
			$data['rekomendasi'] = $this->m_hasil->getHasilRekomendasi();
			$this->load->view('admin/datahasil/hasil',$data);
		}

		public function hasilakhir(){
			$data['lolos'] = $this->m_hasil->getHasilRangking();
			$this->load->view('admin/datahasil/hasilakhir',$data);
		}

		public function addstatus(){
			$lolos= $this->m_hasil->getHasilRangking();
		

		}

	}
 ?>