<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function get_login($nohp, $password)
    {
    	// melakukan keri ke db
    	return $this->db->get_where('user', ['nohp_user' => $nohp])->row_array();
    }


    public function get_register($data)
    {
    	// masukkan ke dalam database
    	return $this->db->insert('user', $data);
    }
}