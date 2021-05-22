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

    public function tambah_console()
    {
        $data['category'] = $this->rental->get_data('category')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_console_aksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
            $this->tambah_mobil();
        } else {
            $id_category = $this->input->post('id_category');
            $nama = $this->input->post('nama');
            $description = $this->input->post('description');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status');
            $gambar = $_FILES['gambar']['name'];
            if($gambar = ''){

            } else {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Gagal Diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_category' => $id_category,
                'nama' => $nama,
                'description' => $description,
                'harga' => $harga,
                'status' => $status,
                'gambar' => $gambar
            );
            $this->rental->insert_data($data,'console');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
            redirect('admin/console');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_category', 'ID Category', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }
}


?>