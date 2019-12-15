<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menu1 extends CI_Controller {
	function __construct(){  
		parent::__construct();   
		//******** MODEL *********  
		$this->load->model('M_krs');
		$this->load->model('M_jurusan');
		$this->load->model('M_jadwal');
		$this->load->model('M_dosen');
		//******** DEFAULT SESSION *********  
		if($this->session->userdata('level') != "1") {  
			redirect(base_url("signin"));  
		}
	}

	public function index()
	{
		$this->load->view('menudsn');
	}

	public function jadwal()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menudsn/jadwal', $data);
	}

	public function krs()
	{
		$nip = $this->session->userdata('uname');
		$data['mahasiswa']=$this->M_krs->getMhsWhereNip($nip);
		$this->load->view('menudsn/krs', $data);
	}

	public function khs()
	{
		$nip = $this->session->userdata('uname');
		$data['jadwal']=$this->M_jadwal->getJadwalNip($nip);
		$this->load->view('menudsn/khs', $data);
	}

	public function jurusan()
	{
		$this->load->view('menudsn/jurusan');
	}

	public function dosen()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menudsn/dosen', $data);
	}

	public function mahasiswa()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menudsn/mahasiswa', $data);
	}

	public function matakuliah()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menudsn/matakuliah', $data);
	}

	public function ruang()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menudsn/ruang', $data);
	}

	public function profil()
	{
		$where=$this->session->userdata('uname');
		$data['dsn']=$this->M_dosen->getDosenWhereId($where);
		$this->load->view('menudsn/profil', $data);
	}
}
