<?php 
	/**
	*    
	*/ 
	class DetailPosisi extends CI_Controller
	{
 
		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_KriteriaPosisi");
			$this->load->model("m_kriteria");
		}

		/*detail*/
		public function DetailKritPosisi($id_kegiatan, $id_sie){


			$data['detailpos'] = $this->m_KriteriaPosisi->doDetailPos($id_kegiatan,$id_sie);
			$data['sie'] = $this->m_KriteriaPosisi->getNama($id_sie);

			$data['idkegiatan'] = $id_kegiatan;
			$data['idsie'] = $id_sie;
			$this->load->view('admin/datakriteria/kriteriaposisi/detail',$data);
		}

		public function tambahDetPos($id_kegiatan,$id_sie){

			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['sie'] = $this->m_KriteriaPosisi->getNama($id_sie);
			$data['select_kriteria'] = $this->m_kriteria->getAllKriteria();
			$data['idkegiatan']= $id_kegiatan;
			$data['idsie'] = $id_sie;

			$this->load->view('admin/datakriteria/kriteriaposisi/tambah_detail',$data);

		}
		public function addDetPos($id_kegiatan,$id_sie){

			$ket_himpunan = $this->input->post('bobot');

			if ($ket_himpunan  == 1) {
				$ket_himpunan = 'Sangat Tinggi';
			}else if($ket_himpunan == 0.8) {
				$ket_himpunan = 'Tinggi';
			}else if($ket_himpunan == 0.6) {
				$ket_himpunan = 'Tengah';
			}else if($ket_himpunan == 0.4 ) {
				$ket_himpunan = 'Sedang';
			}else if($ket_himpunan == 0.2) {
				$ket_himpunan = 'Rendah';
			}else if($ket_himpunan == 0) {
				$ket_himpunan = 'Sangat Rendah';
			}


			$data = array(
				'id_kegiatan' => $id_kegiatan,
				'id_sie' => $id_sie,
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bobot' =>$this->input->post('bobot'),
				'keterangan'=> $ket_himpunan
				);

			$this->m_KriteriaPosisi->addNewDetPos($data);

			redirect('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/'.$id_kegiatan.'/'.$id_sie);
		}
		

		/*edit detail*/
		public function editDetailPos($id_kegiatan, $id_sie,$id){

			$data['sie'] = $this->m_KriteriaPosisi->getNama($id_sie);
			$data['select_event'] = $this->m_KriteriaPosisi->getAllKegiatan();
			$data['select_kriteria'] = $this->m_kriteria->getAllKriteria();
			
			$where = array('id_kriteria_posisi' => $id);
			$data['select'] = $this->m_KriteriaPosisi->getDetailPos($where);

			$this->load->view('admin/datakriteria/KriteriaPosisi/ubah_detail', $data);
		}
		public function doEditDetailPos($id){
			
			$ket_himpunan = $this->input->post('bobot');

			if ($ket_himpunan  == 1) {
				$ket_himpunan = 'Sangat Tinggi';
			}else if($ket_himpunan == 0.8) {
				$ket_himpunan = 'Tinggi';
			}else if($ket_himpunan == 0.6) {
				$ket_himpunan = 'Tengah';
			}else if($ket_himpunan == 0.4 ) {
				$ket_himpunan = 'Sedang';
			}else if($ket_himpunan == 0.2) {
				$ket_himpunan = 'Rendah';
			}else if($ket_himpunan == 0) {
				$ket_himpunan = 'Sangat Rendah';
			}
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_sie' => $this->input->post('id_sie'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bobot' => $this->input->post('bobot'),
				'keterangan' => $ket_himpunan
				);

			$idkegiatan = $this->input->post('id_kegiatan');
			$idsie = $this->input->post('id_sie');
			$where = array('id_kriteria_posisi' => $id);

			if ($this->m_KriteriaPosisi->updateDetailPos($where, $data)) {
				redirect('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/'.$idkegiatan.'/'.$idsie);

			} else {
				// redirect('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/');
				redirect('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/'.$idkegiatan.'/'.$idsie);
			}
		}
		
			
		/*delete detail*/
		public function DeleteDetailPos($id_kegiatan,$id_sie,$id_kriteria_posisi){
			$idsie = $this->m_KriteriaPosisi->groupidsie($id_kriteria_posisi);
			$this->m_KriteriaPosisi->doDeletePos($id_kriteria_posisi);

			redirect('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/'.$id_kegiatan.'/'.$id_sie.'');
		}

		
		
	}
	?>