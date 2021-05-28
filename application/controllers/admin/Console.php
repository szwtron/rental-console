<?php

class Console extends CI_Controller
{
    public function index()
    {
        $data['console'] = $this->rental->get_data('console')->result();
        $data['category'] = $this->rental->get_data('category')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_console()
    {
        $data['category'] = $this->rental->get_data('category')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_console_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah_console();
        } else {
            $id_category = $this->input->post('id_category');
            $nama_console = $this->input->post('nama_console');
            $description = $this->input->post('description');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status_console');
            $multiplayer = $this->input->post('multiplayer');
            $ad_hoc = $this->input->post('ad_hoc');
            $online = $this->input->post('online');
            $subscription = $this->input->post('subscription');
            $small_storage = $this->input->post('small_storage');
            $medium_storage = $this->input->post('medium_storage');
            $large_storage = $this->input->post('large_storage');
            $game_list = $this->input->post('game_list');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') {

            } else {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal Diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_category' => $id_category,
                'nama_console' => $nama_console,
                'description' => $description,
                'harga' => $harga,
                'status_console' => $status,
                'multiplayer' => $multiplayer,
                'ad_hoc' => $ad_hoc,
                'online' => $online,
                'subscription' => $subscription,
                'small_storage' => $small_storage,
                'medium_storage' => $medium_storage,
                'large_storage' => $large_storage,
                'game_list' => $game_list,
                'gambar' => $gambar,
            );
            $this->rental->insert_data($data, 'console');
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/console');
        }
    }

    public function update_console($id)
    {
        $where = array('id_console' => $id);
        $data['console'] = $this->db->select('*')
            ->join('category', 'console.id_category = category.id_category')
            ->where(['console.id_console' => $id])
            ->get('console')->result();
        $data['category'] = $this->rental->get_data('category')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_console_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update_console($this->input->post('id_console'));
        } else {
            $id_console = $this->input->post('id_console');
            $id_category = $this->input->post('id_category');
            $nama_console = $this->input->post('nama_console');
            $description = $this->input->post('description');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status_console');
            $multiplayer = $this->input->post('multiplayer');
            $ad_hoc = $this->input->post('ad_hoc');
            $online = $this->input->post('online');
            $subscription = $this->input->post('subscription');
            $small_storage = $this->input->post('small_storage');
            $medium_storage = $this->input->post('medium_storage');
            $large_storage = $this->input->post('large_storage');
            $game_list = $this->input->post('game_list');
            $gambar = $_FILES['gambar']['name'];
            $current_image = $this->input->post('current_image');

            if ($gambar) {

                if ($current_image != "") {
                    $remove_path = "./assets/upload/" . $current_image;
                    $remove = unlink($remove_path);
                }

                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Data gagal diupdate!. Pastikan file dipilih berupa jpg, jpeg, png, atau tiff!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/console');
                }
            }

            $data = array(
                'id_category' => $id_category,
                'nama_console' => $nama_console,
                'description' => $description,
                'harga' => $harga,
                'status_console' => $status,
                'multiplayer' => $multiplayer,
                'ad_hoc' => $ad_hoc,
                'online' => $online,
                'subscription' => $subscription,
                'small_storage' => $small_storage,
                'medium_storage' => $medium_storage,
                'large_storage' => $large_storage,
                'game_list' => $game_list,
            );

            $where = array(
                'id_console' => $id_console,
            );

            $this->rental->update_data('console', $data, $where);
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/console');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_category', 'Category Console', 'required');
        $this->form_validation->set_rules('nama_console', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('status_console', 'Status', 'required');
        $this->form_validation->set_rules('game_list', 'Gaame List', 'required');
    }

    public function detail_console($id)
    {
        $data['detail'] = $this->rental->get_id_console($id);
        $data['console'] = $this->db->select('*')
            ->join('category', 'console.id_category = category.id_category')
            ->where(['console.id_console' => $id])
            ->get('console')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_console($id)
    {
        $where = array('id_console' => $id);

        $this->rental->delete_data($where, 'console');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data berhasil dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/console');
    }
}
