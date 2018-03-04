<?php 
	/**
	*    
	*/ 
	class Kriteria extends CI_Controller
	{	

		function __construct()
		{
			parent::__construct();
			$this->load->model("m_kriteria");
		}

		public function index()
		{
			$data['listKriteria'] = $this->m_kriteria->getAllKriteria();
			$this->load->view('admin/datakriteria/Kriteria/kriteria', $data);
		}

		public function addKriteria() {
			$data = array(
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
			$where = array('id_kriteria'=>$id);
			$data['detail'] = $this->m_kriteria->getKriteria($where);
			$this->load->view('admin/datakriteria/kriteria/ubah', $data);
		}

		public function doEditKriteria($id) 
		{
			$data = array(
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
		
		public function tambahKriteria()
		{
			$this->load->view('admin/datakriteria/Kriteria/tambah');
		}


		/*public function updateKriteria($id){
			$where = array('id_kriteria' => $id);
			
			$data['kriteria'] = $this->m_kriteria->getKriteria($where);
			$this->load->view('admin/datakriteria/kriteria/ubah', $data);
		}

		public function updateKriteriaDb(){
			$data = array(
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'kode' => $this->input->post('kode_kriteria'),
				'bobot' => $this->input->post('bobot_kriteria'),
				'keterangan' => $this->input->post('ket_kriteria')
				);
			$where = array('id_kriteria' => $id);

			$this->m_kriteria->updateKriteria($data,$where);
				redirect('admin/DataKriteria/Kriteria/Kriteria');
		}*/

	}
	?>