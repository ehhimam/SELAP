<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function update_profile($id, $data)
	{
		$this->db->Set($data);
        $this->db->where('nohp_user', $id);
        $this->db->update('user');
	}
}