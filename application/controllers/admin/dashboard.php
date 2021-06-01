<?php
class Dashboard extends CI_Controller
{

    public function index()
    {
        $dashboard['user'] = $this->db->query("SELECT COUNT(*) as total_user FROM user WHERE role_id = 2")->result();
        $dashboard['invoice'] = $this->db->query("SELECT COUNT(*) as total_transaksi FROM invoice")->result();
        $dashboard['done_invoice'] = $this->db->query("SELECT COUNT(*) as total_transaksi_selesai FROM invoice WHERE status='Selesai'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $dashboard);
        $this->load->view('templates_admin/footer');
    }

    public function getData()
    {
        $data['chart'] = $this->db->query("SELECT fromDate, SUM(total) as Revenue FROM invoice WHERE fromDate > current_date - INTERVAL 7 day GROUP BY 1")->result();
        echo json_encode($data['chart']);
    }
}
