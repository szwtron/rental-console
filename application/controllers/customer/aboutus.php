<?php
class Aboutus extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_customer/header');
        $this->load->view('customer/aboutus');
        $this->load->view('templates_customer/footer');
    }
}