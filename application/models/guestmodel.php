<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestmodel extends CI_Model {

	
	public function RegistrasiData($tableName,$data)
	{
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

	public function InsertData($tableName,$data)
	{
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

	public function UpdateData($tableName,$data)
	{
		$res = $this->db->update($tableName,$data);
		return $res;
	}

	public function DeleteData($tableName,$data)
	{
		$res = $this->db->delete($tableName,$data);
		return $res;
	}
}