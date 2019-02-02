<?php 
	/**
	*   
	*/ 
	class Himp_Kriteria extends CI_Controller
	{	

			var $ST = 'Sangat Tinggi';
			var $T = 'Tinggi';
			var $C =  'Cukup';
			var $R = 'Rendah';
			var $SR = 'Sangat Rendah';

		function __construct(){
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_himpKriteria");
		}
		public function index(){
			$cari = $this->session->userdata('cari');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['select_event'] = $this->m_himpKriteria->getAllEvent();
			$data['select_option'] = $this->m_himpKriteria->getAllOption();
			
			$data['listHimpunan'] = $this->m_himpKriteria->getAllHimpunan($cari['id_kegiatan'],$cari['id_kriteria']);
			$data['detail_kegiatan'] = count($this->m_himpKriteria->getAllDetailKegiatan($cari['id_kegiatan'], $idLevel, $idUser));

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
			$search = $this->session->userdata('search');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$kegiatan = $this->m_himpKriteria->getKegiatan($idUser, $idLevel);
			$kriteria = $this->m_himpKriteria->getAllOption();

			$data = array(
				'select_event' => $kegiatan,
				'select_option' => $kriteria
			);
			
			$this->load->view('admin/datakriteria/Himpunan/tambah',$data);
		} 

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$search['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('search', $search);
			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria/tambahHimp');
		}

		public function addHimpunan($id_kegiatan) {


			$ket_himpunan = $this->input->post('bobot_himpunan');

			if ($ket_himpunan  == 5) {
				$ket_himpunan = 'Sangat Tinggi';
			}else if($ket_himpunan == 4) {
				$ket_himpunan = 'Tinggi';
			}else if($ket_himpunan == 3) {
				$ket_himpunan = 'Cukup';
			}else if($ket_himpunan ==2 ) {
				$ket_himpunan = 'Rendah';
			}else if($ket_himpunan == 1) {
				$ket_himpunan = 'Sangat Rendah';
			}


			$data = array(
				'id_kegiatan' => $id_kegiatan,
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nilai_himpunan' => $this->input->post('nilai_himpunan'),
				'bobot' => $this->input->post('bobot_himpunan'),
				'keterangan' => $ket_himpunan
				);

			$this->m_himpKriteria->addNewHimpunan($data);

			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
		}

		/*edit*/
		public function editHimp($id_kegiatan,$id_himp)
		{
			
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['select_kegiatan'] = $this->m_himpKriteria->getKegiatan($idUser, $idLevel);
			$data['select_option'] = $this->m_himpKriteria->getAllOption();
			$data['himp'] = $this->m_himpKriteria->getHimpunan($id_kegiatan,$id_himp);
			

			$this->load->view('admin/datakriteria/Himpunan/ubah', $data);
		}

		public function doEditHimpunan($id_himp){

			$ket_himpunan = $this->input->post('bobot');

			if ($ket_himpunan  == 5) {
				$ket_himpunan = 'Sangat Tinggi';
			}else if($ket_himpunan == 4) {
				$ket_himpunan = 'Tinggi';
			}else if($ket_himpunan == 3) {
				$ket_himpunan = 'Cukup';
			}else if($ket_himpunan ==2 ) {
				$ket_himpunan = 'Rendah';
			}else if($ket_himpunan == 1) {
				$ket_himpunan = 'Sangat Rendah';
			}
			
			$data = array(
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nilai_himpunan' => $this->input->post('nilai_himpunan'),
				'bobot' => $this->input->post('bobot'),
				'keterangan' => $ket_himpunan
				);


			if ($this->m_himpKriteria->doUpdateHimpunan($id_himp, $data)) {
				redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
			} else {
				redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');
			}
		}


		/*delete*/
		public function DeleteHimpunan($id_himp){
			$this->m_himpKriteria->DeleteNewHimpunan($id_himp);

			redirect('admin/DataKriteria/HimpKriteria/Himp_Kriteria');

		}
		
	}
 ?>