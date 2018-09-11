<?php 
	/**
	*    
	*/ 
	class KriteriaPosisi extends CI_Controller
	{
 
		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_KriteriaPosisi");
		}

		public function index()
		{
			$caripos = $this->session->userdata('caripos');
			$data['select_kegiatan'] = $this->m_KriteriaPosisi->getAllKegiatan();

			$data['datasie'] = $this->m_KriteriaPosisi->getDataSie($caripos['id_kegiatan']);
			
			$this->load->view('admin/datakriteria/kriteriaposisi/kriteria_posisi',$data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$caripos['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('caripos', $caripos);
			redirect('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi');
		}

		/*add*/
		public function tambahKritPos(){

			$data['select_kegiatan'] = $this->m_KriteriaPosisi->getAllKegiatan();
			// $data['sie'] = $this->m_KriteriaPosisi->getDataSie();
			$this->load->view('admin/datakriteria/kriteriaposisi/tambah',$data);

		}
		public function addKritPos(){
			$data = array(
				'id_sie' => $this->input->post('id_sie'),
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'nama_sie' =>$this->input->post('nama_sie')
				);

			$this->m_KriteriaPosisi->addNewKritPos($data);

			redirect('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi');
		}

		public function DeleteKritPos($id_sie){
			
			$this->m_KriteriaPosisi->doDeleteKritPos($id_sie);

			redirect('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi');
		}

	}
	?>