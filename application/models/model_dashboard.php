<?php

class model_dashboard extends CI_Model {
	
	public function hitungJumlahArtikel()
{   
    $query = $this->db->get('artikel');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}


public function hitungJumlahData()
{   
    $query = $this->db->get('t_hotspot');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function hitungJumlahUser()
{   
    $query = $this->db->get('user');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function hitungJumlahKecamatan()
{   
    $query = $this->db->get('m_kecamatan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
	
}

?>