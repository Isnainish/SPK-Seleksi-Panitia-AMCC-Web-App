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
		}

		public function index()
		{
			$search = $this->session->userdata('search');
			$data['select_option'] = $this->m_kriteria->getKegiatan();

			$data['listKriteria'] = $this->m_kriteria->getAllKriteria($search['id_kegiatan']);
			
			$this->load->view('admin/datakriteria/Kriteria/kriteria', $data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$search['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('search', $search);
			redirect('admin/DataKriteria/Kriteria/Kriteria');
		}

		public function tambahKriteria($id_kegiatan)
		{

			$data['select_option'] = $this->m_kriteria->getAllKegiatan();
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
			$data['select_option'] = $this->m_kriteria->getAllKegiatan();

			$where = array('id_kriteria'=>$id);
			$data['detail'] = $this->m_kriteria->getKriteria($where);
			$this->load->view('admin/datakriteria/kriteria/ubah', $data);
		}

		public function doEditKriteria($id) 
		{
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'kode' => $this->input->post('kode_kriteria'),
				'bobot' => $this->input->post('bobot_kriteria'),
				'keterangan' => $this->input->post('ket_kriteria')
				);

			$where = array('id_kriteria' => $id);

			if ($this->m_kriteria->doUpdateKriteria($where, $data)) {
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