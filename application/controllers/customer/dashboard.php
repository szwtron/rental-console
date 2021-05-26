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

}
