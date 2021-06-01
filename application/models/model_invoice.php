<?php

class model_invoice extends CI_Model{
    public function index(){
        $nama_pemesan = $this->input->post('nama_pemesan');
        $alamat = $this->input->post('alamat');
        $noTelp = $this->input->post('noTelp');
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        $total = $this->input->post('total');
        $catatan = $this->input->post('catatan');
        //$status_pesanan = $this->input->post('status_pesanan');
        //$status_pesanan = $this->input->post('status_pesanan');
        //$denda = 0;

        $invoice = array(
            'nama_pemesan' => $nama_pemesan,
            'alamat' => $alamat,
            'noTelp' => $noTelp,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'status_invoice' => "Sedang Dikirim",
            'returnDate' => 0,
            'total' => $total,
            'catatan' => $catatan,
        );
        $this->db->insert('invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item){
            $data = array(
                'id_invoice' => $id_invoice,
                'id_user' => $item['id_user'],
                'id_console' => $item['id'],
                'fromDate' => $item['fromDate'],
                'toDate' => $item['toDate'],
                'multiplayer_tr' => $item['multiplayer_tr'],
                'ad_hoc_tr' => $item['ad_hoc_tr'],
                'online_tr' => $item['online_tr'],
                'subscription_tr' => $item['subscription_tr'],
                'storage' => $item['storage'],
                'status_invoice' => 'Sedang Dikirim',
                'harga' => $item['price'],
                'harga_transaksi' => $total,
                'returnDate' => 0,
            );
            $this->db->insert('transaksi', $data);
            $this->db->query("UPDATE console SET stock = stock-1 WHERE id_console = {$item['id']}");

        }
        return true;
    }

    public function tampil_data() {
        $result = $this->db->get('invoice');
        if($result->num_rows() > 0){
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_invoice($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('invoice');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('transaksi');
        if($result->num_rows() > 0){
            return $result->result();
        } else {
            return false;
        }
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}



