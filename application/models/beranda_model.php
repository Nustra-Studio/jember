<?php

class beranda_model extends CI_Model {
	
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


public function hitungJumlahHotspot()
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

public function hitungJumlahKeluhan()
{   
    $query = $this->db->get('m_keluhan');
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
	
}

?>