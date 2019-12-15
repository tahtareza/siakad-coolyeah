<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_login');
		$this->load->library(array('session'));
		$this->load->library('user_agent'); //deklarasi mengaktifkan library pagination 
	} 

	public function index()
	{
		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_menu'));  
		} else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_menu1')); 
		} else if ($this->session->userdata('level') == "2") {
			redirect(base_url('C_menu2')); 
		}else if ($this->session->userdata('level') == "3") {
			redirect(base_url('C_menu3')); 
		}
		$this->load->view('login');
	}

	function aksi_login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$nama=$this->M_login->namaDosen($username);
		$names=$this->M_login->namaMahasiswa($username);
		$cek=$this->M_login->cek_login($username,$password);
		if($cek>0){//jika ada ditabel
			$data_session=array(
					'uname'=>$cek->uname,
					'level'=> $cek->level,
					'nama'=> $nama->nama,
					'names' => $names->nama,
				);
			$this->session->set_userdata($data_session);  
			if($this->session->userdata('level')==0) {   
				redirect('C_menu');  
			}elseif($this->session->userdata('level')==1) {   
				redirect('C_menu1');  
			}elseif($this->session->userdata('level')==2) {   
				redirect('C_menu2');  
			}elseif($this->session->userdata('level')==3) {   
				redirect('C_menu3');  
			}
			// $level=$cek->level;
			// if($level==0){
			// 	$this->session->set_userdata($data_session);
			// 	redirect(base_url("C_menu/index"));
			// }else if($level==1){
			// 	$this->session->set_userdata($data_session);
			// 	redirect(base_url("C_menu/menudsn"));
			// }else{
			// 	$this->session->set_userdata($data_session);
			// 	redirect(base_url("C_menu/menumhs"));
			// }
		}else{
			echo "<script type=\"text/javascript\"> alert('username dan password salah!'); </script>";
			redirect(base_url("signin"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('signin'));
	}
}
