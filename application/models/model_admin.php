<?php

class model_admin extends CI_Model {
	
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

public function hitungJumlahHotspot()
{   
    $query = $this->db->get('t.hotspot');
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
    $query = $this->db->get('m.kecamatan');
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