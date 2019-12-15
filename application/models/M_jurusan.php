<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listJurusan()
	{
		$query=$this->db->query("SELECT * FROM jurusan");
		return $query->result();
	}

	public function getJurusanWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM jurusan WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'nama' => $value->nama 
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('jurusan', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('jurusan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM jurusan where kode='$where'");
	}
}
?>
