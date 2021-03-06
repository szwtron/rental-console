<?php

class Order extends CI_Controller
{
    public function index()
    {
        $this->load->model('transaction');
        $this->transaction->cek_denda();

        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi o, console cs, user us WHERE o.id_console = cs.id_console AND o.id_user = us.id")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaction', $data);
        $this->load->view('templates_admin/footer');
    }
}
