<?php 
	/**
	*   
	*/
	class Pendaftar extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();
			$this->load->model("m_pendaftar");
			
		} 

		public function index()
		{
			$data['listPendaftar'] = $this->m_pendaftar->getAllPendaftar();
			$this->load->view('admin/datapendaftar/pendaftar', $data);
		}
		
		/*detail*/
		public function DetailPendaftar($id)
		{

			$where = array('id_pendaftar'=>$id);

			$data['listDetail'] = $this->m_pendaftar->doDetailPendaftar($where);

			$this->load->view('admin/datapendaftar/detail',$data);
		}
		
		/*delete*/
		public function doDeletePendaftar ($id_pendaftar){

			$this->m_pendaftar->doDropPendaftar($id_pendaftar);

			redirect('admin/DataPendaftar/Pendaftar');
		}

		
		
	}
 ?>