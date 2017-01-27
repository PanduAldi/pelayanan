<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('pelayanan_model', 'role_model', 'jenis_model'));

		if ($this->session->userdata('u_login') == false) 
		{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard Panel";
		$select = 'role';
		$data['u'] = $this->role_model->get(array('select' => $select, 'id' => $this->session->userdata('u_role')));
		$this->template->display('dashboard', $data);
	}

	public function role()
	{
		echo json_encode($this->role_model->get(array('id' => $this->session->userdata('u_role'),'select' => "role")));
	}

}

/* End of file  */
/* Location: ./application/controllers/ */