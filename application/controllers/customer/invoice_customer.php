<?php

class Invoice_customer extends CI_Controller {
    public function detail_invoice($id_invoice){
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi o, console cs, user us WHERE o.id_console = cs.id_console AND o.id_user = us.id AND o.id_invoice = $id_invoice")->result();

        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_invoice', $data);
        $this->load->view('templates_customer/footer');
    }

    public function transaction_diterima($id){
        $result = $this->db->get('invoice')->result();
        $this->db->query("UPDATE invoice SET status_invoice = 'Siap di Pick-up' WHERE id_invoice = '$id'");
        $data['invoice'] = $this->model_invoice->tampil_data_id($id);
        redirect('customer/dashboard/daftar_transaksi/'.$this->session->userdata('id'));
    }

    public function transaction_batal($id){

        $where = array('id_invoice' => $id);

        $this->model_invoice->delete_data($where, 'invoice');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('customer/dashboard/daftar_transaksi/'.$this->session->userdata('id'));

    }
}

?>