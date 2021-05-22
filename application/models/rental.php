<?php 

class Rental extends CI_model{
    public function get_data($table){
        // return $this->db->get($table);
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }
}

// $this->db->select("*")->from("console")->join("category", "id_category = id_category");

?>