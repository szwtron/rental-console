<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
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
        $data['transaksi'] = $this->rental->get_transaksi($id);

        $this->load->view('templates_customer/header');
        $this->load->view('customer/daftar_transaksi', $data);
        $this->load->view('templates_customer/footer');
    }

    public function tambah_keranjang($id){
        $console = $this->rental->get_id_console($id);

        var_dump($console);
        //die();
        

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
            'harga_transaksi' => 0,
            'returnDate' => 0
        );

        

        // $data = array(
        //     'id_user' => $this->sessions->userdata['id'],
        //     'qty'     => 1,
        //     'id_console' => $console[0]->id_console,
        //     'fromDate' => 0,
        //     'toDate' => 0,
        //     'multiplayer_tr' => $console[0]->multiplayer,
        //     'ad_hoc_tr' => $console[0]->ad_hoc,
        //     'online_tr' => $console[0]->online,
        //     'subscription_tr' => $console[0]->subscription,
        //     'storage' => 0,
        //     'status' => 'Sedang Dikirim',
        //     'harga' => $console[0]->harga,
        //     'harga_transaksi' => 0,
        //     'returnDate' => 0
        // );

        $this->cart->insert($data);

        redirect(base_url('customer/dashboard'));
    }

    public function tambah_keranjang2(){
        $multiplayer_tr = 0;
        $ad_hoc_tr = 0;
        $online_tr = 0;
        $subscription_tr = 0;
        $id = $this->session->userdata('id');
        $id_console = $this->input->post('id_console');
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        $storage = $this->input->post('storage');
        $multiplayer_tr = $this->input->post('multiplayer_tr');
        $ad_hoc_tr = $this->input->post('ad_hoc_tr');
        $online_tr = $this->input->post('online_tr');
        $subscription_tr = $this->input->post('subscription_tr');
        $returnDate = $this->input->post('returnDate');
        $harga = $this->input->post('harga');

        


        $data = array(
            'id_user' => $id,
            'id_console' => $id_console,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'multiplayer_tr' => $multiplayer_tr,
            'ad_hoc_tr' => $ad_hoc_tr,
            'online_tr' => $online_tr,
            'subscription_tr' => $subscription_tr,
            'storage' => $storage,
            'status' => 'Sedang Dikirim',
            'harga' => $harga,
            'harga_transaksi' => $harga_transaksi,
            'returnDate' => 0
        );
 
        $this->cart->insert($data);

        redirect(base_url('customer/dashboard'));
    }

    public function detail_keranjang($id){
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_keranjang');
        $this->load->view('templates_customer/footer');
    }

    public function detail_keranjang2($id){
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detail_keranjang2');
        $this->load->view('templates_customer/footer');
    }

    public function hapus_keranjang(){
        $this->cart->destroy();
        redirect(base_url('customer/dashboard'));
    }

    public function checkout(){
        $this->load->view('templates_customer/header');
        $this->load->view('customer/checkout');
        $this->load->view('templates_customer/footer');
    }

    public function proses_checkout(){
        $is_processed = $this->model_invoice->index();
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('templates_customer/header');
            $this->load->view('customer/proses_checkout');
            $this->load->view('templates_customer/footer');
        } else {
            echo "Maaf, pesanan anda gagal diproses";
        }


    }

}
