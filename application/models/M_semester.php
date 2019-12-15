<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_semester extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listSemester()
	{
		$query=$this->db->query("SELECT * FROM semester");
		return $query->result();
	}

	public function getSemWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM semester WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'nama' => $value->nama,
					'status' => $value->status 
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('semester', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('semester', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM semester where kode='$where'");
	}
}
?>
