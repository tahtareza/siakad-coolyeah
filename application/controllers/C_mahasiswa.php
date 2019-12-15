<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jurusan');
		$this->load->model('M_mahasiswa');
		$this->load->model('M_dosen');
	}

	public function index()
	{
		$data['mahasiswa']=$this->M_mahasiswa->listMhs();
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['dosen']=$this->M_dosen->listDosen();
		$this->load->view('mahasiswa', $data);
	}

	public function getAjax($id_jurusan = null)
	{
		$data['data'] = $this->M_mahasiswa->getMhs();
		if($id_jurusan != null)
			$data['data'] = $this->M_mahasiswa->getMhsWhereKj($id_jurusan);
		echo json_encode($data);
	}

	public function loadDelete($id){
		$data['record']=$this->M_mahasiswa->getMhsWhereId($id);//record dari getBiodata
		$this->load->view('mhs/delete', $data);
	}

	public function loadEdit($id){
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['dosen']=$this->M_dosen->listDosen();
		$data['record']=$this->M_mahasiswa->getMhsWhereId($id);//record dari getBiodata
		$this->load->view('mhs/edit', $data);
	}

	public function add(){
		$upload=$this->M_mahasiswa->upload();
		if($upload['result']=="success"){
			$data = array(
				'nim'	=>	$this->input->post('nim'),
				'nama'	=>	$this->input->post('nama'),
				'jk'	=>	$this->input->post('jk'),
				'alamat'	=>	$this->input->post('alamat'),
				'kode_jurusan'	=>	$this->input->post('kode_jurusan'),
				'nip_wali'	=>	$this->input->post('nip_wali'),
				'foto'=> $upload['file']['file_name']
			);
			$level=2;
			$data2 = array(
				'uname'	=>	$this->input->post('nim'),
				'pwd'	=>	md5($this->input->post('nim')),
				'level'	=>	$level
			);
			$this->M_mahasiswa->insert($data);
			$this->M_mahasiswa->insertAkun($data2);
			redirect('mahasiswa');
		}else{
			$data['mahasiswa']=$this->M_mahasiswa->listMhs();
			$data['message']=$upload['error'];
			$this->load->view('mahasiswa', $data);
		}
	}

	// public function update(){
	// 	$upload=$this->M_mahasiswa->upload();
	// 	if($upload['result']=="success"){
	// 		$data = array(
	// 			'nim'	=>	$this->input->post('nim'),
	// 			'nama'	=>	$this->input->post('nama'),
	// 			'jk'	=>	$this->input->post('jk'),
	// 			'alamat'	=>	$this->input->post('alamat'),
	// 			'kode_jurusan'	=>	$this->input->post('kode_jurusan'),
	// 			'nip_wali'	=>	$this->input->post('nip_wali'),
	// 			'foto'=> $upload['file']['file_name']
	// 		);
	// 		$where=$this->input->post('id_old');
	// 		$this->M_mahasiswa->update($data, $where);
	// 		redirect('mahasiswa');
	// 	}else{
	// 		$data['mahasiswa']=$this->M_mahasiswa->listMhs();
	// 		$data['message']=$upload['error'];
	// 		$this->load->view('mahasiswa', $data);
	// 	}
	// }


	public function update()
	{
		if($_FILES['foto']['name']!="") //"foto" name dari input file, "name" itu punyanya $_FILES jdi ada tmp_name dll
		{
			$upload=$this->M_mahasiswa->upload();
			if($upload['result']=="success"){
				$image_name=$upload['file']['file_name'];
			}else{
				$data['mahasiswa']=$this->M_mahasiswa->listMhs();
				$data['message']=$upload['error'];
				$this->load->view('mahasiswa', $data);
			}
		}
		else{
			$image_name=$this->input->post('foto_old');
		}

		$data = array(
			'nim'	=>	$this->input->post('nim'),
			'nama'	=>	$this->input->post('nama'),
			'jk'	=>	$this->input->post('jk'),
			'alamat'	=>	$this->input->post('alamat'),
			'kode_jurusan'	=>	$this->input->post('kode_jurusan'),
			'nip_wali'	=>	$this->input->post('nip_wali'),
			'foto'=> $image_name
		);
		$where=$this->input->post('id_old');
		$this->M_mahasiswa->update($data, $where);
		redirect('mahasiswa');
	}

	public function delete(){
		$where=$this->uri->segment(3);
		$photo=$this->M_mahasiswa->dropFoto($where);
		if ($photo->num_rows() > 0)
		{
			$row = $photo->row();
			$file_photo = $row->foto;
			$path_file = './foto/';
			unlink($path_file.$file_photo);
			$this->M_mahasiswa->delete($where);
		}
		redirect('mahasiswa');
	}
}