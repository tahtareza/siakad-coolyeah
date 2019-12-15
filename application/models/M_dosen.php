<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listDosen()
	{
		$query=$this->db->query("SELECT * FROM dosen");
		return $query->result();
	}

	public function getDosen()
	{
		$this->db->select('dosen.*, jurusan.nama as jn');
        $this->db->from('dosen');
        $this->db->join('jurusan','dosen.kode_jurusan=jurusan.kode');
        $query = $this->db->get();
        return $query->result();
	}

	public function getDosenWhereId($id){
		$query=$this->db->query("SELECT * FROM dosen where nip='$id'");
		return $query->result();
	}

	public function getDosenWhereKj($where)
	{
		$query=$this->db->query("SELECT * FROM dosen where kode_jurusan='$where'");
		return $query->result();
	}

	public function upload(){
		$config['upload_path']='./foto/'; //folder foto
		$config['allowed_types']='jpg|png|jpeg|';
		$config['max_size']='2048';
		$config['remove_space']=TRUE;

		$this->load->library('upload', $config);//konfig upload
		if($this->upload->do_upload('foto')){
			//jika berhasil upload
			$return = array('result'=>'success','file'=>$this->upload->data(),'error'=>'');
			return $return;
		}else{  
		// Jika gagal :  
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());  
			return $return;
		}
	}

	public function insert($data)
	{
		$this->db->insert('dosen', $data);
	}

	public function insertAkun($data)
	{
		$this->db->insert('akun', $data);
	}


	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("nip", $where);
		$this->db->update('dosen', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM dosen where nip='$where'");
	}

	public function dropFoto($where){
		$this->db->where('nip',$where);
		$query = $getData = $this->db->get('dosen');
		if($getData->num_rows() > 0)
			return $query;
		else
			return null;
	}
}
?>