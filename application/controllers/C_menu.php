<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menu extends CI_Controller {
	function __construct(){  
		parent::__construct();  
		//******** MODEL *********  
		$this->load->model('M_jurusan');
		$this->load->model('M_matakuliah');
		$this->load->model('M_ruang');
		$this->load->model('M_semester');
		$this->load->model('M_akun');
		$this->load->model('M_dosen');
		$this->load->model('M_tahunajar');
		$this->load->model('M_mahasiswa');
		// $this->load->model('M_jadwal');
		// $this->load->model('M_krs');
		// $this->load->model('M_khs');
		//******** LIBRARY ********* 

		//******** DEFAULT SESSION *********  
		if($this->session->userdata('level') != "0") {  
			redirect(base_url("signin"));  
		}
	}

	public function index()
	{
		$this->load->view('menu');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['mahasiswa'] = $this->M_mahasiswa->getMhsSearch($keyword);
		$data['jurusan'] = $this->M_mahasiswa->getJrsSearch($keyword);
		$this->load->view('search', $data);
	}

	public function searchMinMax()
	{
		$keywordmin = $this->input->post('keywordmin');
		$keywordmax = $this->input->post('keywordmax');
		$data['ruang'] = $this->M_ruang->getKuotaMinMax($keywordmin, $keywordmax);
		$this->load->view('searchminmax', $data);
	}

	public function jurusan()
	{
		$data['datajurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('jurusan', $data);
	}

	public function dosen()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['matakuliah']=$this->M_matakuliah->listMatakuliah();
		$this->load->view('dosen', $data);
	}

	public function mahasiswa()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['dosen']=$this->M_dosen->listDosen();
		$data['mahasiswa']=$this->M_mahasiswa->listMhs();
		$this->load->view('mahasiswa', $data);
	}

	public function matakuliah()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['semester']=$this->M_semester->listSemester();
		$this->load->view('matakuliah', $data);
	}

	public function ruang()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('ruang', $data);
	}

	public function tahunajar()
	{
		$this->load->view('tahunajar');
	}

	public function semester()
	{
		$this->load->view('semester');
	}

	public function akun()
	{
		$data['akun']=$this->M_akun->listAkun();
		$this->load->view('akun', $data);
	}

	public function jadwal()
	{
		$data['dosen']=$this->M_dosen->listDosen();
		$data['ruang']=$this->M_ruang->listRuang();
		$data['semester']=$this->M_semester->listSemester();
		$data['tahun_ajar']=$this->M_tahunajar->listTahunAjar();
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('jadwal', $data);
	}

	public function krs()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('krs', $data);
	}

	public function khs()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('khs', $data);
	}
}
