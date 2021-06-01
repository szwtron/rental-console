<?php 

class Invoice extends CI_Controller {
    public function index(){
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice){
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi o, console cs, user us WHERE o.id_console = cs.id_console AND o.id_user = us.id AND o.id_invoice = $id_invoice")->result();
        
        // $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        // $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function transaction_dikirim($id){
        // $this->load->model('transaction');
        // $this->transaction->
        $result = $this->db->get('invoice')->result();
        $this->db->query("UPDATE invoice SET status_invoice = 'Sudah Dikirim' WHERE id_invoice = '$id'");
        redirect('admin/invoice');
        // $data['invoice'] = $this->model_invoice->tampil_data();
        // $this->load->view('templates_admin/header');
        // $this->load->view('templates_admin/sidebar');
        // $this->load->view('admin/invoice', $data);
        // $this->load->view('templates_admin/footer');
    }

    public function transaction_selesai($id){
        // $this->load->model('transaction');
        // $this->transaction->
        $result = $this->db->get('invoice')->result();
        $date = $this->model_invoice->get_date();

        $this->db->query("UPDATE invoice SET status_invoice = 'Selesai' WHERE id_invoice = '$id'");
        $this->db->query("UPDATE invoice SET returnDate = '$date' WHERE id_invoice = '$id'");

        $done = $this->db->query("SELECT id_console FROM transaksi WHERE id_invoice = '$id'")->result();
        foreach($done as $dn) :
            $this->db->query("UPDATE console SET stock = stock+1 WHERE id_console = '$dn->id_console'");
        endforeach;

        redirect('admin/invoice');
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
        redirect('admin/invoice');

    }
}

?>