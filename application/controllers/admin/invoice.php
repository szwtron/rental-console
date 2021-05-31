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
}

?>