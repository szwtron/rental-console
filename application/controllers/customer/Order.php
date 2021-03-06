<?php
class Order extends CI_Controller
{
    public function tambah_rental($id)
    {
        $data['detail'] = $this->rental->get_id_console($id);
        $data['console'] = $this->db->query("SELECT * FROM console WHERE id_console = '$id'")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/tambah_rental', $data);
        $this->load->view('templates_customer/footer');
    }

    public function tambah_rental_aksi()
    {
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

        $duration = abs(strtotime($fromDate) - strtotime($toDate));
        $years = floor($duration / (365 * 60 * 60 * 24));
        $months = floor(($duration - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        $harga_transaksi = $harga * $days;

        date_default_timezone_set('Asia/Jakarta');

        $datestring = '%Y-%m-%d';
        $time = time();
        $better_date = mdate($datestring, $time); //  i.e : 2018-05-23 - 09:52 am | For AM | PM result

        if ($returnDate != 0) {
            $overdue = strtotime($toDate) - strtotime($returnDate);

            $years_overdue = floor($overdue / (365 * 60 * 60 * 24));
            $months_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            if ($days_overdue < 0) {
                $denda = $harga * abs($days_overdue);
            } else {
                $denda = 0;
            }
        } else if ($returnDate == 0) {
            $overdue = strtotime($toDate) - strtotime($better_date);

            $years_overdue = floor($overdue / (365 * 60 * 60 * 24));
            $months_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            if ($days_overdue < 0) {
                $denda = $harga * abs($days_overdue);
            } else {
                $denda = 0;
            }
        }

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
            'returnDate' => 0,

        );

        $this->rental->insert_data($data, 'transaksi');

        $status = array(
            'status_console' => '0',
        );

        $id = array(
            'id_console' => $id_console,
        );

        $this->rental->update_data('console', $status, $id);
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi berhasil!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('customer/dashboard'));
    }
}
