<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dosen extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jurusan');
		$this->load->model('M_dosen');
		$this->load->model('M_matakuliah');
	}

	public function index()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['matakuliah']=$this->M_matakuliah->listMatakuliah();
		$this->load->view('dosen', $data);
	}

	public function getAjax($id_jurusan = null)
	{
		$data['data'] = $this->M_dosen->getDosen();
		if($id_jurusan != null)
			$data['data'] = $this->M_dosen->getDosenWhereKj($id_jurusan);
		echo json_encode($data);
	}

	public function loadDelete($id){
		$data['record']=$this->M_dosen->getDosenWhereId($id);//record dari getBiodata
		$this->load->view('dosen/delete', $data);
	}

	public function loadEdit($id){
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['matakuliah']=$this->M_matakuliah->listMatakuliah();
		$data['record']=$this->M_dosen->getDosenWhereId($id);//record dari getBiodata
		$this->load->view('dosen/edit', $data);
	}

	public function add(){
		$upload=$this->M_dosen->upload();
		if($upload['result']=="success"){
			$data = array(
				'nip'	=>	$this->input->post('nip'),
				'nama'	=>	$this->input->post('nama'),
				'jk'	=>	$this->input->post('jk'),
				'alamat'	=>	$this->input->post('alamat'),
				'kode_jurusan'	=>	$this->input->post('kode_jurusan'),
				'kode_matkul'	=>	$this->input->post('kode_matkul'),
				'foto'=> $upload['file']['file_name']
			);
			$level=1;
			$data2 = array(
				'uname'	=>	$this->input->post('nip'),
				'pwd'	=>	md5($this->input->post('nip')),
				'level'	=>	$level
			);
			$this->M_dosen->insert($data);
			$this->M_dosen->insertAkun($data2);
			redirect('dosen');
		}else{
			$data['message']=$upload['error'];
			$this->load->view('dosen', $data);
		}
	}

	public function update()
	{
		if($_FILES['foto']['name']!="") //"foto" name dari input file, "name" itu punyanya $_FILES jdi ada tmp_name dll
		{
			$upload=$this->M_dosen->upload();
			if($upload['result']=="success"){
				$image_name=$upload['file']['file_name'];
			}else{
				$data['message']=$upload['error'];
				$this->load->view('dosen', $data);
			}
		}
		else{
			$image_name=$this->input->post('foto_old');
		}

		$data = array(
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'jk'	=>	$this->input->post('jk'),
			'alamat'	=>	$this->input->post('alamat'),
			'kode_jurusan'	=>	$this->input->post('kode_jurusan'),
			'kode_matkul'	=>	$this->input->post('kode_matkul'),
			'foto'=> $image_name
		);
		$where=$this->input->post('id_old');
		$this->M_dosen->update($data, $where);
		redirect('dosen');
	}

	public function delete(){
		$where=$this->uri->segment(3);
		$photo=$this->M_dosen->dropFoto($where);
		if ($photo->num_rows() > 0)
		{
			$row = $photo->row();
			$file_photo = $row->foto;
			$path_file = './foto/';
			unlink($path_file.$file_photo);
			$this->M_dosen->delete($where);
		}
		redirect('dosen');
	}
}