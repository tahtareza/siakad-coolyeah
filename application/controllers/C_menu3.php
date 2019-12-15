<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menu3 extends CI_Controller {
	function __construct(){  
		parent::__construct();
		$this->load->library('cart');
		//******** MODEL *********
		$this->load->model('M_krs');  
		$this->load->model('M_jurusan');
		$this->load->model('M_mahasiswa');
		$this->load->model('M_jadwal');
		//******** DEFAULT SESSION *********  
		if($this->session->userdata('level') != "3") { 
			redirect(base_url("signin"));  
		}
	}

	public function index()
	{
		$this->load->view('menukajur');
	}

	public function mahasiswa()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menukajur/mahasiswa', $data);
	}

	public function matakuliah()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menukajur/matakuliah', $data);
	}
}
