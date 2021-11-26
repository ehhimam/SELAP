<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sewa extends CI_model {
	// lapangan futsal
	public function get_lapangan()
    {
    	$this->db->select('*');
    	$this->db->from('lapangan');
        $this->db->where('kategori', 'Futsal');
    	$this->db->order_by('id_futsal', 'DESC');
    	return $this->db->get();
    }

    //detail lapangan futsal
    public function detail_futsal($id)
    {
    	$qqq =  $this->db->where('id_futsal', $id)->get('lapangan');


		return $qqq->row_array();
    }


    // detail lapangan badminton
    public function get_lapangan2()
    {
    	$this->db->select('*');
    	$this->db->from('lapangan');
        $this->db->where('kategori', 'Badminton');
    	$this->db->order_by('id_futsal', 'DESC');
    	return $this->db->get();
    }

    public function proses_sewa($id)
    {
    	return $this->db->where('id_futsal', $id)->get('lapangan');

    }
    

    // memasukkan data kedalam tabel sewa dari pelanggan
    public function tmbah_sewa($data)
    {
    	return $this->db->insert('sewa', $data);
    }


    public function untuk_pembayaran($id_lapangan)
    {
    	$this->db->where('id_lapangan', $id_lapangan);
    	$this->db->order_by('id_sewa', 'DESC');
    	return $this->db->get('sewa');
    }

    public function proses_bayar($data)
    {
    	return $this->db->insert('pembayaran', $data);
    }


    // riwayat sewa
    public function riwayat_sewa($user)
    {
        $this->db->order_by('id_pembayaran', 'DESC');
        $this->db->from('pembayaran')
          ->join('sewa', 'sewa.id_sewa=pembayaran.id_sewa');
        return $this->db->where('id_user', $user)->get();
    }

    public function cari_pembayaran($id_sewa)
    {
        $this->db->order_by('id_pembayaran', 'DESC');
        return $this->db->from('pembayaran')
          ->join('sewa', 'sewa.id_sewa=pembayaran.id_sewa')->get();
           $this->db->where('id_sewa', $id_sewa);

    }

    // uppdate pembayaran
    public function update_pembayaran($data, $id_sewa)
    {
        $this->db->Set($data);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('pembayaran');
    }


    public function batal_sewa($id_sewa)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('sewa', 'sewa.id_sewa=pembayaran.id_sewa');
        $this->db->where('id_sewa', $id_sewa);
        $this->db->delete('pembayaran');

        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('sewa', 'sewa.id_sewa=pembayaran.id_sewa');
        $this->db->where('id_sewa', $id_sewa);
        $this->db->delete('sewa');
    }
}


