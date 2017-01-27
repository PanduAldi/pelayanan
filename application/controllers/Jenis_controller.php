<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('pelayanan_model', 'jenis_model', 'persyaratan_model', 'log_model'));
		$this->load->library('form_validation');

		if ($this->session->userdata('u_login') == false) 
		{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function index()
	{

		$data = array(
						"title" => "Setting Jenis Pelayanan",
						"data" => $this->jenis_model->get(array('select' => '*'))
					);

		$this->template->display('jenis_pelayanan/jenis_list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('pelayanan', 'Pelayanan', 'trim|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');

		if ($this->form_validation->run() == true) {
			
			$r = array('jenis_id' => '', 'pelayanan_id' => $this->input->post('pelayanan'), 'jenis_name' => $this->input->post('nama'), 'link' => $this->input->post('link'));
			$this->jenis_model->add($r);

			$this->session->set_flashdata('notif', 'Data Jenis Pelayanan Berhasil di tambah');

			redirect('setting-jenis_pelayanan','refresh');
		}
		else
		{
			$this->session->set_flashdata('failed', 'Ada kesalahan input.. cek syntax');
			redirect('setting-jenis_pelayanan','refresh');
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');

		if ($this->form_validation->run() == true) {
			
			$this->jenis_model->edit(array('jenis_name' => $this->input->post('nama'), 'link' => $this->input->post('link')), $this->input->post('id'));
			$this->session->set_flashdata('notif', 'Edit Jenis Pelayanan Berhasil');

			redirect('setting-jenis_pelayanan','refresh');

		} else {
			$this->session->set_flashdata('failed', 'Ada kesalahan di validasi..!!!');
		}
	}

	public function del()
	{
		$this->jenis_model->del($this->input->post('id'));
		$this->session->set_flashdata('failed', 'Jenis Pelayanan Berhasil dihapus');
		redirect('setting-jenis_pelayanan','refresh');
	}

	public function load_pelayanan()
	{
		$d = $this->pelayanan_model->get(array('select' => '*'));

		echo '<option value=""> -- Pilih Pelayanan -- </option>';
		foreach ($d as $a) {
			if ($a['pelayanan_id'] == 1) {
				echo "";
			}
			else
			{
				echo '<option value="'.$a['pelayanan_id'].'">'.strtoupper($a['pelayanan_name']).'</option>';
			}
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */