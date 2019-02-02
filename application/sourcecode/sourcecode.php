<?php 

<!-- ADMIN -->

/*ubah pewawancara*/
		public function ubahPewawancara($id){
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['pilih_kegiatan'] = $this->m_pewawancara->getKegiatan($idUser,$idLevel);
			$data['pilih_level'] = $this->m_pewawancara->getLevel();

			$where = array('id_detail_user'=>$id);
			$data['detail'] = $this->m_pewawancara->getPewawancara($where);
			$this->load->view('admin/datapewawancara/ubah_pewawancara',$data);
		}

		public function doEditPewawancara($id){
			$datadetuser = array(
				'id_level' => '3'
				);

			$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password')
			);

			if ($this->m_pewawancara->doUpdateUser($id, $datadetuser,$datauser)) {
				redirect('admin/Pewawancara');
			} else {
				redirect('admin/Pewawancara');
			}
		}

		/*model*/

		public function getPewawancara($id){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.*, user.*, level.*');
			$this->db->where($id);
			return $this->db->get()->row_array();
		}
		
		public function doUpdateUser($id, $datadetuser, $datauser){
			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id);
			$idUser = $this->db->get()->row()->id_user;

			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->from('tb_detail_user');
			$this->db->where('id_kegiatan', $idKegiatan);
			$this->db->where('id_detail_user', $id);
			return $this->db->update($this->duser, $datadetuser) AND $this->updateUser($datauser, $idUser);
		}

		public function updateUser($datauser, $idUser)
		{
			$this->db->where('id_user', $idUser);
			return $this->db->update($this->user, $datauser);
		}

/*Kriteria*/
	public function tambahKriteria()
		{
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['select_option'] = $this->m_kriteria->getKegiatan($idUser, $idLevel);
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
	/*model*/
	public function getKegiatan($idUser, $idLevel) {
			// $this->db->from($this->kegiatan);
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan kegiatan', 'kegiatan.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user', 'user.id_user = duser.id_user');
			$this->db->where('duser.id_level', $idLevel);
			$this->db->where('duser.id_user', $idUser);
			return $this->db->get();
		}

		public function getAllDetailKegiatan($id_kegiatan, $id_level, $id_user)
		{
			$this->db->from('tb_detail_user duser');
			$this->db->where('duser.id_kegiatan', $id_kegiatan);
			$this->db->where('duser.id_level' , $id_level);
			$this->db->where('duser.id_user' , $id_user);
			$result = $this->db->get(); 
			return $result -> result_array();
		}

		public function getAllKegiatan() {
			$this->db->from($this->kegiatan);
			return $this->db->get();
		}

		/*add*/
		public function addNewKriteria($data) {
			$this->db->insert($this->table, $data);
		}

		/*Edit*/
		public function getKriteria($id){
			return $this->db->get_where($this->table, $id)->row_array();
		}
		
		public function doUpdateKriteria($id_kriteria, $data)
		{
			$this->db->from('tb_kriteria');
			$this->db->where('id_kriteria',$id_kriteria);
			$idKegiatan = $this->db->get()->row()->id_kegiatan;

			$this->db->where('id_kegiatan',$idKegiatan);
			$this->db->where('id_kriteria',$id_kriteria);
			$this->db->update($this->table, $data);
		}


		/*Delete*/
		public function DeleteNewKriteria($id_kriteria){
			$this->db->where('id_kriteria', $id_kriteria);
			$this->db->delete($this->table);
		}
/*SUADMIN*/
/*ubah admin*/
		public function UbahAdmin($id){
			$data['pilih_kegiatan'] = $this->m_suadmin->getKegiatan();
			$where = array(
				'id_detail_user'=>$id,
			);
			$data['edit'] = $this->m_suadmin->getDataAdmin($where);
			$this->load->view('suadmin/ubah_admin',$data);
		}

		public function doEditAdmin($id){
			$datadetuser = array(
				'id_kegiatan' => $this->input->post('id_kegiatan')
			);

			$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
			);

			if ($this->m_suadmin->updateAdmin($id, $datadetuser, $datauser)) {
				redirect('suadmin/SuAdmin/DataAdmin');
			} else {
				redirect('suadmin/SuAdmin/DataAdmin');
			}
		
		}
	/*MODEL*/
	/*ubah admin*/
		public function getDataAdmin($id){
			$this->db->from('tb_detail_user duser');
			$this->db->join('tb_kegiatan k','k.id_kegiatan = duser.id_kegiatan');
			$this->db->join('tb_user user','user.id_user = duser.id_user');
			$this->db->join('tb_level level','level.id_level = duser.id_level');
			$this->db->select('duser.*, k.*, user.*, level.*');
			$this->db->where($id);
			return $this->db->get()->row_array();
		}


		public function updateAdmin($id,$datadetuser, $datauser){
			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id);
			$idUser = $this->db->get()->row()->id_user;

			$this->db->from('tb_detail_user');
			$this->db->where('id_detail_user', $id);
			return $this->db->update($this->duser, $datadetuser) AND $this->updateUser($datauser, $idUser);
		}

		public function updateUser($datauser, $idUser)
		{
			$this->db->where('id_user', $idUser);
			return $this->db->update($this->user, $datauser);
		}

?>