<?php 
	/**
	*   
	*/ 
	class Himp_Kriteria extends CI_Controller
	{	

		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_himpKriteria");
		}
		public function index()
		{
			$cari = $this->session->userdata('cari');
			$data['select_event'] = $this->m_himpKriteria->getAllEvent();
			$data['select_option'] = $this->m_himpKriteria->getAllOption();
			

			$data['listHimpunan'] = $this->m_himpKriteria->getAllHimpunan($cari['id_kegiatan'],$cari['id_kriteria']);
			
			$this->load->view('admin/datakriteria/Himpunan/himp_kriteria',$data);
		}

		/*filter kriteria*/
		public function doSearchHimpunan(){
			$cari['id_kegiatan'] = $this->input->post('id_kegiatan');
			$cari['id_kriteria'] = $this->input->post('id_kriteria');
			$this->session->set_userdata('cari', $cari);
			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
		}

		/*add*/
		public function tambahHimp()
		{
			$data['select_event'] = $this->m_himpKriteria->getAllEvent();
			$data['select_option'] = $this->m_himpKriteria->getAllOption();
			
			$this->load->view('admin/datakriteria/Himpunan/tambah',$data);
		} 

		public function addHimpunan() {
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nilai_himpunan' => $this->input->post('nilai_himpunan'),
				'bobot' => $this->input->post('bobot_himpunan'),
				'keterangan' => $this->input->post('ket_himpunan')
				);

			$this->m_himpKriteria->addNewHimpunan($data);

			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
		}

		/*edit*/
		public function editHimp($id)
		{
			/*menampung kegiatan*/
			$data['select_kegiatan'] = $this->m_himpKriteria->getAllEvent();

			/*menampung kriteria*/
			$data['select_option'] = $this->m_himpKriteria->getAllOption();

			$where = array('id_himp'=>$id);
			$data['detail'] = $this->m_himpKriteria->getHImpunan($where);
			$this->load->view('admin/datakriteria/Himpunan/ubah', $data);
		}

		public function doEditHimpunan($id){
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nilai_himpunan' => $this->input->post('nilai_himpunan'),
				'bobot' => $this->input->post('bobot_himpunan'),
				'keterangan' => $this->input->post('ket_himpunan')
				);

			$where = array('id_himp' => $id);

			if ($this->m_himpKriteria->doUpdateHimpunan($where, $data)) {
				redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
			} else {
				redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
			}
		}


		/*delete*/
		public function DeleteHimpunan($id_himp){
			$this->m_himpKriteria->DeletePewawancara($id_himp);

			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');

		}
		
	}
 ?>