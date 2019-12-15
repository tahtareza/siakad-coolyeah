<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listMhs()
	{
		$query=$this->db->query("SELECT * FROM mhs");
		return $query->result();
	}

	public function getIdJurusan($nim) {
		$this->db->select('kode_jurusan');
	    $this->db->from('mhs');
	    $this->db->where('nim', $nim);
	    $query = $this->db->get();
		$hasil = $query->row();
		return $hasil->kode_jurusan;
	}

	public function getMhs()
	{
		$this->db->select('mhs.*, jurusan.nama as jn');
		$this->db->from('mhs');
		$this->db->join('jurusan','mhs.kode_jurusan=jurusan.kode');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMhsWhereId($id){
		$query=$this->db->query("SELECT * FROM mhs where nim='$id'");
		return $query->result();
	}

	public function getMhsSearch($keyword) {
		$this->db->select('*');
		$this->db->from('mhs');
		$this->db->like('nim', $keyword);
		$this->db->or_like('nama', $keyword);
		return $this->db->get()->result();
	}

	public function getJrsSearch($keyword) {
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->like('kode', $keyword);
		$this->db->or_like('nama', $keyword);
		return $this->db->get()->result();
	}

	// public function getMhsWhereId($where)
	// {
	// 	$query=$this->db->query("SELECT * FROM mhs WHERE nim='$where'");
	// 	if($query->num_rows()>0){
	// 		foreach ($query->result() as $value) {
	// 			$data=array(
	// 				'nim' => $value->nim,
	// 				'nama' => $value->nama,
	// 				'jk' => $value->jk,
	// 				'alamat' => $value->alamat,
	// 				'kode_jurusan' => $value->kode_jurusan,
	// 				'nip_wali' => $value->nip_wali,
	// 				'foto' => $value->foto
	// 			);
	// 		}
	// 	}
	// 	return $data;
	// }

	public function getMhsWhereKj($where)
	{
		$query=$this->db->query("SELECT * FROM mhs where kode_jurusan='$where'");
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
		$this->db->insert('mhs', $data);
	}

	public function insertAkun($data)
	{
		$this->db->insert('akun', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("nim", $where);
		$this->db->update('mhs', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM mhs where nim='$where'");
	}

	public function dropFoto($where){
		$this->db->where('nim',$where);
		$query = $getData = $this->db->get('mhs');
		if($getData->num_rows() > 0)
			return $query;
		else
			return null;
	}
}
?>