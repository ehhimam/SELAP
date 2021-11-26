<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    // ubah profile admin
    public function update_profile($id, $data){
        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('user');
    }

    public function hapus_user($id)
    {
    	// melakukan keri ke db
        $this->db->where('id_user', $id);
    	$this->db->delete('user');

    }

    public function hapus_penyedia($id)
    {
        $this->db->where('id_penyedia', $id);
        $this->db->delete('penyedia');

    }

    public function view_penyedia($id)
    {
        $query = $this->db->where('id_penyedia', $id)->get('penyedia');

        return $query->row_array();
    }

    // menampilkan julah seluruh user
    public function jumlah_user()
    {
        $query = 'SELECT count(*) as users  FROM user';
        $aa = $this->db->query($query);
        return $aa->row()->users;
    }

    // menampilkan jumlah penarikan dari seluruh penyedua
    public function jumlah_penarikan()
    {
        $query = 'SELECT SUM(jumlah_penarikan) as penarikan  FROM penarikan';
        $aa = $this->db->query($query);
        return $aa->row()->penarikan;
    }

    // menampilkan jumlah seluruh lapangan
    public function jumlah_lapangan()
    {
        $query = 'SELECT count(*) as lapangan  FROM lapangan';
        $aa = $this->db->query($query);
        return $aa->row()->lapangan;
    }

    // menampilkan jumlah selulruh penyedia
    public function jumlah_penyedia()
    {
        $query = 'SELECT count(*) as peneydia  FROM penyedia';
        $aa = $this->db->query($query);
        return $aa->row()->peneydia;
    }


    // mengambil data dari db penyedia yang melakkan penarikan
    public function ambil_penarikan()
    {
        $this->db->from('penarikan');
        $this->db->where('status_penarikan', 'Diproses');
        $this->db->order_by('id_penarikan', 'DESC');
        return $this->db->get();
    }

    // data selesai penarikan
     public function selesai()
    {
        // $this->db->from('penarikan');
        // $this->db->where('status_penarikan', 'Selesai');

        // $this->db->order_by('id_penarikan', 'DESC');

        $sql = "SELECT * FROM penarikan WHERE status_penarikan = 'Selesai' OR status_penarikan = 'Ditolak' order by id_penarikan DESC ";

        return $this->db->query($sql);
    }

    // proses terima
    public function terima($id, $data)
    {
        $this->db->Set($data);
        $this->db->where('id_penarikan', $id);
        $this->db->update('penarikan');
    }

    public function tolak($id, $data)
    {
        $this->db->Set($data);
        $this->db->where('id_penarikan', $id);
        $this->db->update('penarikan');
    }
}