<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_penyedia extends CI_Model {
  
  public function view(){
    return $this->db->get('penyedia')->result();
  }

  public function update_profile($id, $data)
  {
    $this->db->set($data);
    $this->db->where('nohp_penyedia', $id);
    $this->db->update('penyedia');
  }

  public function allpenyedia()
  {
    $this->db->select('*');
    $this->db->from('penyedia');
    $this->db->order_by('id_penyedia', 'DESC');
    return $this->db->get();
  }

  public function alluser()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('role', 2);
    $this->db->order_by('id_user', 'DESC');
    return $this->db->get();
  }

  public function login_penyedia($nohp, $password){
    // melakukan keri ke db
    return $this->db->get_where('penyedia', ['nohp_penyedia' => $nohp])->row_array();
  }
  
  public function daftar_penyedia($data) {
    return $this->db->insert('penyedia', $data);
  }


  // menampilkan semua sewa dari pelanggan
  public function allsewa()
  {
    $this->db->order_by('id_pembayaran', 'DESC');
    $this->db->from('pembayaran')
          ->join('sewa', 'sewa.id_sewa=pembayaran.id_sewa');
        return $this->db->get();
  }

  // menghitung jumlah pendapatan
  public function pendapatan2($id)
  {
    $sql = "SELECT SUM(jumlah_pembayaran) as total FROM pembayaran where status_pembayaran = 'Lunas!' AND id_penyedia = '$id' ";
    $qq = $this->db->query($sql);
    return $qq->row()->total;

  }

  // masukkan data penarikan
  public function masukkan_penarikan($data)
  {
    return $this->db->insert('penarikan', $data);
  }

  // mengambil data penarikan penyedia
  public function penarikan($id)
  {
    $this->db->order_by('id_penarikan', 'DESC');
    $this->db->where('id_penyedia', $id);
    $this->db->from('penarikan');
    $this->db->limit(5);
    return $this->db->get();
  }

  // menghitung jumlah penarikan
  public function jumlah_tarik($id)
  {
    $sql = "SELECT SUM(jumlah_penarikan) as total FROM penarikan WHERE id_penyedia = '$id' ";
    $qq = $this->db->query($sql);
    return $qq->row()->total;
  }


}