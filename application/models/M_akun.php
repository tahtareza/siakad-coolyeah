<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listAkun()
	{
		$query=$this->db->query("SELECT * FROM akun");
		return $query->result();
	}

	public function getAkunWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM akun WHERE uname='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'uname' => $value->uname,
					'pwd' => $value->pwd,
					'level' => $value->level 
				);
			}
		}
		return $data;
	}

	public function getAkunWhereLv($where)
	{
		$query=$this->db->query("SELECT * FROM akun where level='$where'");
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('akun', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("uname", $where);
		$this->db->update('akun', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM akun where uname='$where'");
	}
}
?>