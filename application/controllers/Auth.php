<?php
    class Auth extends CI_Controller{

        public function login(){

            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->load->view('templates_admin/header');
                $this->load->view('form_login');
                $this->load->view('templates_admin/footer');
            }else {
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $cek = $this->rental->cek_login($email, $password);

                if($cek == FALSE){
                        $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('auth/login');
                }else {
                    $this->session->set_userdata('email', $cek->email);
                    $this->session->set_userdata('role_id', $cek->role_id);
                    $this->session->set_userdata('nama', $cek->nama);

                    switch ($cek->role_id) {
                        case '1':
                            redirect('admin/dashboard');
                            break;
                        case '2':
                            redirect('customer/dashboard');
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('customer/dashboard');
        }
    }
?>