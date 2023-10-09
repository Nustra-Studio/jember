<?php 

class Register_model extends CI_Model {

    public function inputdata($data, $table){
        $this->db->insert($table,$data);
        }
}