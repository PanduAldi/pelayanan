<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skpd_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('permohonan_model', 'penduduk_model'));
	}

	public function index()
	{
			
	}


	public function input_skpd()
	{
		$data = array(
						
					);
	}

	/**
	 * Permhonan SKPWNI
	 */
	public function data_skpwni()
	{
		$data = array(
						"title" => "Data Permohonan SKPWNI"
					 );
		$this->template->display('skpd/skpwni_list', $data);
	}

	//json skpwni proses
	public function skpwni_proses()
	{
		$data = $this->permohonan_model->get(array('select' => 'permohonan.no_permohonan, permohonan.permohonan_status, permohonan.permohonan_date, penduduk.penduduk_nama, penduduk.penduduk_nik','status' => '0'));

		echo "<tr>";
		$no = 1;
		foreach ($data as $k) {
			echo "	<td>".$no++."</td>";
			echo " 	<td>".$k['no_permohonan']."</td>";
			echo " 	<td>".$k['penduduk_nama']."</td>";
			echo " 	<td>".$k['permohonan_date']."</td>";
		}

		echo "</tr>";
		
	}

	//Json skpwni selesai
	public function skpwni_selesai()
	{
		$data = $this->permohonan_model->get(array('select' => 'permohonan.no_permohonan, permohonan.permohonan_status, permohonan.status_progress_date, penduduk.penduduk_nama, penduduk.penduduk_nik','status' => '1'));

		echo "<tr>";
		$no = 1;
		foreach ($data as $k) 
		{
			echo "	<td>".$no++."</td>";
			echo " 	<td>".$k['no_permohonan']."</td>";
			echo " 	<td>".$k['penduduk_nama']."</td>";
			echo " 	<td>".$k['permohonan_status_date']."</td>";
		}
		echo "</tr>";
	}

	//Json  skpwni ambil
	public function skpwni_ambil()
	{
		
	}
}

/* End of file  */
/* Location: ./application/controllers/ */