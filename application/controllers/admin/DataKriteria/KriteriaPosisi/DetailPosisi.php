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
		}

		public function index()
		{
			
		}

		public function tambahDetPos($id_kegiatan,$id_sie){
			$data['select_kriteria'] = $this->m_KriteriaPosisi->getDataKriteria();

			$data['idkegiatan']= $id_kegiatan;
			
			$data['idsie'] = $id_sie;

			$this->load->view('admin/datakriteria/kriteriaposisi/tambah_detail',$data);

		}
		public function addDetPos($id_kegiatan,$id_sie){
			$data = array(
				'id_kegiatan' => $id_kegiatan,
				'id_sie' => $id_sie,
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bobot' =>$this->input->post('bobot'),
				'keterangan'=>$this->input->post('keterangan')
				);

			$this->m_KriteriaPosisi->addNewDetPos($data);

			redirect('admin/DataKriteria/KriteriaPosisi/DetailPosisi/DetailKritPosisi/'.$id_kegiatan.'/'.$id_sie);
		}
		/*detail*/
		public function DetailKritPosisi($id_kegiatan, $id_sie){


			$data['detailpos'] = $this->m_KriteriaPosisi->doDetailPos($id_kegiatan,$id_sie);
			$data['idkegiatan'] = $id_kegiatan;
			$data['idsie'] = $id_sie;
			$this->load->view('admin/datakriteria/kriteriaposisi/detail',$data);
		}

		/*edit detail*/
		public function editDetailPos($id){
			$data['select_event'] = $this->m_KriteriaPosisi->getAllKegiatan();
			$data['select_kriteria'] = $this->m_KriteriaPosisi->getDataKriteria();
			$where = array('id_kriteria_posisi' => $id);

			$data['select'] = $this->m_KriteriaPosisi->getDetailPos($where);
			$this->load->view('admin/datakriteria/KriteriaPosisi/ubah_detail', $data);
		}

		/*update*/

		public function doEditDetailPos($id){
		
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_sie' => $this->input->post('id_sie'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bobot' => $this->input->post('bobot'),
				'keterangan' => $this->input->post('keterangan')
				);

			$idkegiatan = $this->input->post('id_kegiatan');
			$idsie = $this->input->post('id_sie');
			$where = array('id_kriteria_posisi' => $id);

			if ($this->m_KriteriaPosisi->updateDetailPos($where, $data)) {
				redirect('admin/DataKriteria/KriteriaPosisi/KriteriaPosisi/');

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