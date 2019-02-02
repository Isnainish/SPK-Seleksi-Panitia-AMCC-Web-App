<?php 
	/**
	*    
	*/ 
	class Kriteria extends CI_Controller
	{	

		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_kriteria");
			$this->load->model("m_himpKriteria");
		}

		public function index(){
			$cari = $this->session->userdata('cari');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['select_event'] = $this->m_kriteria->getAllEvent();
			$data['detail_kegiatan'] = count($this->m_kriteria->getAllDetailKegiatan($cari['id_kegiatan'], $idLevel, $idUser));

			$data['listKriteria'] = $this->m_kriteria->getAllKriteria($cari['id_kegiatan']);	

			$this->load->view('admin/datakriteria/Kriteria/kriteria', $data);
		}

		public function doSearchKegiatan(){
			$cari['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('cari', $cari);
			redirect('admin/DataKriteria/Kriteria/Kriteria');
		}

	//*Kriteria*/
	public function tambahKriteria()
		{
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$idKegiatan = $this->session->userdata['auth_session']['id_kegiatan'];

			$data['select_event'] = $this->m_kriteria->getKegiatan($idUser, $idLevel);
			$data['select_kriteria'] = $this->m_kriteria->getAllKriteria($idKegiatan);
			$this->load->view('admin/datakriteria/Kriteria/tambah',$data);
		}

		public function addKriteria() {
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'kode' => $this->input->post('kode_kriteria'),
				'bobot' => $this->input->post('bobot_kriteria'),
				'keterangan' => $this->input->post('ket_kriteria')
				);

			$this->m_kriteria->addNewKriteria($data);

			redirect('admin/DataKriteria/Kriteria/Kriteria');
		}

		public function editKriteria($id)
		{
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['select_option'] = $this->m_kriteria->getKegiatan($idUser, $idLevel);

			$where = array('id_kriteria'=>$id);
			$data['detail'] = $this->m_kriteria->getKriteria($where);
			$this->load->view('admin/datakriteria/kriteria/ubah', $data);
		}

		public function doEditKriteria($id_kriteria) 
		{
			$data = array(
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'kode' => $this->input->post('kode_kriteria'),
				'bobot' => $this->input->post('bobot_kriteria'),
				'keterangan' => $this->input->post('ket_kriteria')
				);


			if ($this->m_kriteria->doUpdateKriteria($id_kriteria, $data)) {
				redirect('admin/DataKriteria/Kriteria/Kriteria');
			} else {
				redirect('admin/DataKriteria/Kriteria/Kriteria');
			}
		}

		public function DeleteKriteria($id_kriteria){
			$this->m_kriteria->DeleteNewKriteria($id_kriteria);

			redirect('admin/DataKriteria/Kriteria/Kriteria');

		}
	}
?>