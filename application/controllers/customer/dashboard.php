<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->transaction->cek_stock();
        $data['console'] = $this->rental->get_data('console')->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/dashboard', $data);
        $this->load->view('templates_customer/footer');
    }

    public function detail_console($id)
    {
        $data['detail'] = $this->rental->get_id_console($id);
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_console', $data);
        $this->load->view('templates_customer/footer');
    }

    public function daftar_transaksi($id)
    {
        $this->load->model('transaction');
        $this->transaction->cek_denda();
        $data['invoice'] = $this->model_invoice->tampil_data_id($id);

        $this->load->view('templates_customer/header');
        $this->load->view('customer/daftar_transaksi', $data);
        $this->load->view('templates_customer/footer');
    }

    public function tambah_keranjang($id)
    {
        $console = $this->rental->get_id_console($id);
        $check = $this->cart->contents();

        $data = array(
            'id'      => $console[0]->id_console,
            'id_user' => $this->session->userdata['id'],
            'qty'     => 1,
            'price'   => $console[0]->harga,
            'name'    => $console[0]->nama_console,
            'fromDate' => 0,
            'toDate' => 0,
            'multiplayer_tr' => $console[0]->multiplayer,
            'ad_hoc_tr' => $console[0]->ad_hoc,
            'online_tr' => $console[0]->online,
            'subscription_tr' => $console[0]->subscription,
            'storage' => 0,
            'status' => 'Sedang Dikirim',
            'harga' => $console[0]->harga,
            'game_list' => $console[0]->game_list,
            'gambar' => $console[0]->gambar,
            'returnDate' => 0
        );

        if($check->id_console == $console[0]->id_console){
            redirect(base_url('customer/dashboard'));
        }else{
            $this->cart->insert($data);

            redirect(base_url('customer/dashboard'));
        }

    }

    public function detail_keranjang2($id)
    {
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_keranjang2');
        $this->load->view('templates_customer/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect(base_url('customer/dashboard'));
    }

    public function checkout()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $id = $this->session->userdata('id');
            $this->detail_keranjang2($id);
        } else {
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $duration = abs(strtotime($fromDate) - strtotime($toDate));
            $years = floor($duration / (365 * 60 * 60 * 24));
            $months = floor(($duration - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            $data['date'] = array(
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'years' => $years,
                'months' => $months,
                'days' => $days
            );
            $this->load->view('templates_customer/header');
            $this->load->view('customer/checkout', $data);
            $this->load->view('templates_customer/footer');
        }
    }

    public function proses_checkout()
    {
        $is_processed = $this->model_invoice->index();
        if($is_processed){
            $this->cart->destroy();
            $id = $this->session->userdata('id');
            $this->daftar_transaksi($id);
        } else {
            echo "Maaf, pesanan anda gagal diproses";
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('fromDate', 'Tanggal Rental', 'required');
        $this->form_validation->set_rules('toDate', 'Tanggal Kembali', 'required');
    }

}
