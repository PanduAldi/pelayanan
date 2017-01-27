<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelayanan_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('pelayanan_model', 'jenis_model', 'user_model'));
		$this->load->library('form_validation');

		if ($this->session->userdata('u_login') == false) 
		{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function index()
	{
	
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama',  'trim|xss_clean');

		if ($this->form_validation->run() == true) {
		
			$ar = array('pelayanan_id' => '', 'pelayanan_name' => $this->input->post('nama')); 
			$this->pelayanan_model->add($ar);

			$this->session->set_flashdata('notif', 'Tambah Data Pelayanan Berhasil');
			redirect('setting-pelayanan', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('failed', 'Ada kesalahan..!!');
		}
	}

	public function edit(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
	
		if ($this->form_validation->run() == true) 
		{
			$ar = array('pelayanan_name' => $this->input->post('nama'));

			$this->pelayanan_model->edit($ar, $this->input->post('id'));

			$this->session->set_flashdata('notif', 'Edit Data Pelayanan Berhasil');
			redirect('setting-pelayanan', 'refresh');	
		}
		else
		{
			$this->session->set_flashdata('failed', 'Ada kesalahan..!!');
		}
	}


	public function del()
	{
		$id = $this->input->post('id');

		$this->pelayanan_model->del($id);
		$this->session->set_flashdata('failed', 'Data Berhasil di Hapus');

		redirect('setting-pelayanan','refresh');
	}

	public function view_pelayanan()
	{
		$data = array(
						"title" => "Setting Pelayanan",
						"data_pel" => $this->pelayanan_model->get(array('select' => '*'))
					);

		$this->template->display('pelayanan/pelayanan_list', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */