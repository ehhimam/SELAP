
<?php
Class M_cetak extends CI_Model{
	
	function getData($id)
	{

        $this->db->from('pembayaran');
        $this->db->where('id_sewa', $id);

        return $this->db->get();
        
       
		
	}

	function getData2($id)
	{

        $this->db->from('sewa');
        $this->db->where('id_sewa', $id);

        return $this->db->get();
        
       
		
	}
}
?>