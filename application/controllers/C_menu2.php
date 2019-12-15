<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menu2 extends CI_Controller {
	function __construct(){  
		parent::__construct();
		$this->load->library('cart');
		//******** MODEL *********
		$this->load->model('M_krs');  
		$this->load->model('M_jurusan');
		$this->load->model('M_mahasiswa');
		$this->load->model('M_jadwal');
		//******** DEFAULT SESSION *********  
		if($this->session->userdata('level') != "2") {  
			redirect(base_url("signin"));  
		}
	}

	public function index()
	{
		$this->load->view('menumhs');
	}

	public function jadwal()
	{
		$nim = $this->session->userdata('uname');
		$idJurusan = $this->M_mahasiswa->getIdJurusan($nim);
		$data['jurusan']=$idJurusan;
		$data['jadwal']=$this->M_jadwal->getJadwalMhs($idJurusan);
		$this->load->view('menumhs/jadwal', $data);
	}

	public function krs()
	{
		$nim = $this->session->userdata('uname');
		$idJurusan = $this->M_mahasiswa->getIdJurusan($nim);
		$data['jadwal']=$this->M_jadwal->getJadwalMhs($idJurusan);
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data = $this->cart->contents();
		$this->load->view('menumhs/krs', $data);
	}

	public function krsCheckout()
	{
		$nim = $this->session->userdata('uname');
		$data['krs']=$this->M_krs->getKrsMhs($nim);
		$this->load->view('menumhs/krsCheckout', $data);
	}

	public function khs()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menumhs/khs', $data);
	}

	public function jurusan()
	{
		$this->load->view('menumhs/jurusan');
	}

	public function dosen()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menumhs/dosen', $data);
	}

	public function matakuliah()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menumhs/matakuliah', $data);
	}

	public function ruang()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('menumhs/ruang', $data);
	}

	public function profil()
	{
		$where=$this->session->userdata('uname');
		$data['mhs']=$this->M_mahasiswa->getMhsWhereId($where);
		$this->load->view('menumhs/profil', $data);
	}

	//CART
	public function tambah_cart($kode)
	{
		$datas=$this->M_jadwal->getJadwalId($kode);
    	//kuota jadwal
		$sisa=$datas->kuota-1;
		$dat=array('kuota' => $sisa);
		$this->M_jadwal->update($dat, $kode);
    	//insert data cart
		$data= array(
			'id' => $datas->kode,
			'name' => $datas->mk,
			'qty' => 1,
			'price' => 0,
			'nd' => $datas->nd,
			'kode_ruang' => $datas->kode_ruang,
			'ns'=>$datas->ns,
			'hari' => $datas->hari,
			'waktu_mulai' =>$datas->waktu_mulai,
			'waktu_akhir' => $datas->waktu_akhir
		);
		$this->cart->insert($data);
		redirect('C_menu2/jadwal');
	}

	public function hapus_cart($rowid, $kode) 
	{
		$datas=$this->M_jadwal->getJadwalId($kode);
    		//kuota jadwal
		$sisa=$datas->kuota+1;
		$dat=array('kuota' => $sisa);
		$this->M_jadwal->update($dat, $kode);

		$data = array(
			'rowid' => $rowid,
			'qty' => 0);
		$this->cart->update($data);
		redirect('C_menu2/krs');
	}

	public function check_out() {
		$nim = $this->session->userdata('uname');
		//-------------------------Input data detail order-----------------------       
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data=array('kode' => '',
		        			'nim' => $nim,
		        			'kode_jadwal' => $item['id'],
		        			'status' => '0'
		        		);        
                        $proses = $this->M_krs->insert($data);
                    }
            }
        //-------------------------Hapus shopping cart--------------------------        
        $this->cart->destroy();
        redirect('C_menu2/krsCheckout');
	}

}
