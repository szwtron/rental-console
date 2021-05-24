<?php 
    class Category extends CI_Controller{
        
        public function index(){

            $data['category'] = $this->rental->get_data('category')->result();

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/category', $data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_category(){

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/form_tambah_category');
            $this->load->view('templates_admin/footer');
        }

        public function tambah_category_action(){
            $this->_rules();

            if($this->form_validation->run() == FALSE) {
                $this->tambah_category();
            }else{
                $nama_cat       = $this->input->post('nama_cat');
                $description_cat = $this->input->post('description_cat');

                $data = array(
                    'nama_cat'      => $nama_cat,
                    'description_cat' => $description_cat
                );
                $this->rental->insert_data($data,'category');
                $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Category berhasil ditambahkan!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/category');
            }
        }

        public function _rules(){
            
            $this->form_validation->set_rules('nama_cat', 'Nama Category', 'required');
            $this->form_validation->set_rules('description_cat', 'Description', 'required');
        }

    }
?>