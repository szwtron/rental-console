<?php 

class Console extends CI_Controller {
    public function index() 
    {
        $data['console'] = $this->rental->get_data('console')->result();
        $data['category'] = $this->rental->get_data('category')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/console', $data);
        $this->load->view('templates_admin/footer');
    }
}


?>