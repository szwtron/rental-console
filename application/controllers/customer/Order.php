<?php
    class Order extends CI_Controller{
        public function tambah_rental($id){
            $data['detail'] = $this->rental->get_id_console($id);
            $data['console'] = $this->db->query("SELECT * FROM console WHERE id_console = '$id'")->result();
            $this->load->view('templates_customer/header');
            $this->load->view('customer/tambah_rental', $data);
            $this->load->view('templates_customer/footer');
        }

        public function tambah_rental_aksi(){
            $id = $this->session->userdata('id');
            $id_console = $this->input->post('id_console');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
            $storage = $this->input->post('storage');
            $multiplayer = $this->input->post('multiplayer');
            $ad_hoc = $this->input->post('ad_hoc');
            $online = $this->input->post('online');
            $subscription = $this->input->post('subscription');
            $harga = $this->input->post('harga');

            $data = array(
                'id_user'           => $id,
                'id_console'        => $id_console,
                'fromDate'          => $fromDate,
                'toDate'            => $toDate,
                'multiplayer'       => $multiplayer,
                'ad_hoc'            => $ad_hoc,
                'online'            => $online,
                'subscription'      => $subscription,
                'storage'           => $storage,
                'status'            => 'Sedang Dikirim',
                'harga'             => $harga,
                
            );

            $this->rental->insert_data($data, 'transaksi');

            $status = array(
                'status_console' => '0'
            );

            $id = array(
                'id_console' => $id_console
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
?>