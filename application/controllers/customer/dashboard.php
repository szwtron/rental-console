<?php
    class Dashboard extends CI_Controller {

        public function index()
        {
            $data['console'] = $this->rental->get_data('console')->result();
            $this->load->view('templates_customer/header');
            $this->load->view('customer/dashboard', $data);
            $this->load->view('templates_customer/footer');
        }
    }
?>