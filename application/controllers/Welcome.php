<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        $this->transaction->cek_stock();
        $data['console'] = $this->rental->get_data('console')->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/dashboard', $data);
        $this->load->view('templates_customer/footer');
    }
}
