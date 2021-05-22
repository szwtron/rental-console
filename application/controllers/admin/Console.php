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
            $this->tambah_console();
        } else {
            $id_category = $this->input->post('id_category');
            $nama = $this->input->post('nama');
            $description = $this->input->post('description');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status_console');
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
                'status_console' => $status,
                'gambar' => $gambar
            );
            $this->rental->insert_data($data,'console');
            $this->session->set_flashdata('pesan', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mobil berhasil ditambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/console');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_category', 'Category Console', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('status_console', 'Status', 'required');
    }

    public function update_console($id){
        $where = array('id_console' => $id);
        $data['console'] = $this->db->query("SELECT * FROM console cs, category cat WHERE cs.id_category = cat.id_category AND cs.id_console='$id'")->result();
        $data['category'] = $this->rental->get_data('category')->result();
        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_console', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_console_action()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update_console();
        }else{
            $id             = $this->input->post('id_console');
            $category       = $this->input->post('category');
            $nama           = $this->input->post('nama');
            $description    = $this->input->post('description');
            $harga          = $this->input->post('harga');
            $status         = $this->input->post('status');
            $gambar         = $_FILES['gambar']['name'];
            if($gambar){
                $config ['upload_path'] = './assets/upload';
                $config ['allowes_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar')){
                    $gambar=$this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                }else{
                    echo $this->upload->display_errors;
                }
            }

            $data = array(
                'category'          => $category,
                'nama'              => $nama,
                'description'       => $description,
                'harga'             => $harga,
                'status'            => $status,
            );

            $where = array(
                'id_console' => $id
            );

            $this->rental->update_data('console', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert")
                Data Mobil Berhasil Diupdate!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/console');
        }
    }

}


?>