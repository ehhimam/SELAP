<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapangan extends CI_Model {

    public function add_futsal($data)
    {
    	return $this->db->insert('lapangan', $data);

    }

    public function all_lapangan()
    {
        $this->db->select('*');
        $this->db->from('lapangan');
        $this->db->where('kategori', 'Futsal');
        $this->db->order_by('id_futsal', 'DESC');
        return $this->db->get();
    }

    public function all_lapangan2()
    {
        $this->db->select('*');
        $this->db->from('lapangan');
        $this->db->where('kategori', 'Badminton');
        $this->db->order_by('id_futsal', 'DESC');
        return $this->db->get();
    }

    public function get_lapangan()
    {
    	$this->db->select('*');
    	$this->db->from('lapangan');
        $this->db->where('id_penyedia', $this->session->userdata('id_penyedia'));
    	$this->db->order_by('id_futsal', 'DESC');
    	return $this->db->get();
    }

    public function edit_lap($id)
    {
       $query = $this->db->where('id_futsal', $id)->get('lapangan');

        return $query->row_array();
    }

    public function update_lapangan($data, $penyedia)
    {
        $this->db->Set($data);
        $this->db->where('id_futsal', $penyedia);
        $this->db->update('lapangan');


    }

    public function hapus_lapangan($id)
    {
        $this->db->where('id_futsal', $id);
        $this->db->delete('lapangan');

    }

    
}