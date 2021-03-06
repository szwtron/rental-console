<?php

class Rental extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function get_id_console($id)
    {
        $result = $this->db->where('id_console', $id)->get('console');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function cek_login()
    {
        $email = set_value('email');
        $password = set_value('password');

        $result = $this->db
            ->where('email', $email)
            ->where('password', md5($password))
            ->limit(1)
            ->get('user');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_transaksi($id)
    {
        $result = $this->db->query("SELECT * FROM transaksi o, console cs WHERE o.id_console = cs.id_console AND o.id_user = $id")->result();
        
        return $result;
    }

    public function get_category_name($id)
    {
        $result = $this->db->query("SELECT nama_cat FROM category WHERE id_category = $id")->result();
        return $result;
    }

}
