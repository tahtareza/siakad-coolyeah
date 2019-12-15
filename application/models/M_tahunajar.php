<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahunajar extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listTahunAjar()
	{
		$query=$this->db->query("SELECT * FROM tahun_ajaran");
		return $query->result();
	}

	public function getTAWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM tahun_ajaran WHERE kode='$where'");
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
		$this->db->insert('tahun_ajaran', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('tahun_ajaran', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM tahun_ajaran where kode='$where'");
	}
}
?>
