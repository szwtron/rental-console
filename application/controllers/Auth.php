<?php
class Auth extends CI_Controller
{

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->helper('captcha');
            $vals = array(
                    'img_path'      => './captcha-images/',
                    'img_url'       => base_url().'captcha-images/',
                    'font_path'     => './path/to/fonts/texb.ttf',
                    'img_width'     => '150',
                    'img_height'    => 30,
                    'expiration'    => 1,
                    'word_length'   => 8,
                    'font_size'     => 16,
                    'img_id'        => 'Imageid',
                    'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                    'colors'        => array(
                            'background' => array(255, 255, 255),
                            'border' => array(255, 255, 255),
                            'text' => array(0, 0, 0),
                            'grid' => array(255, 40, 40)
                    )
            );

            $cap = create_captcha($vals);
            $image = $cap['image'];
            $captchaword = $cap['word'];
            $this->session->set_userdata('captchaword', $captchaword);

            $this->load->view('templates_admin/header');
            $this->load->view('form_login',['captcha_image'=>$image]);
            $this->load->view('templates_admin/footer');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $captcha = $this->input->post('captcha');
            $captcha_answer = $this->session->userdata('captchaword');
            if ($captcha != $captcha_answer) {
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Captcha Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect(base_url('auth/login'));
            }

            $cek = $this->rental->cek_login($email, $password);

            if ($cek == false) {
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect(base_url('auth/login'));
            } else {
                $this->load->model('transaction');
                $jumlah_transaksi = $this->transaction->jumlah_transaksi($cek->id);

                $this->session->set_userdata('jumlah_transaksi', $jumlah_transaksi);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('id', $cek->id);

                switch ($cek->role_id) {
                    case '1':
                        redirect(base_url('admin/dashboard'));
                        break;
                    case '2':
                        redirect(base_url('customer/dashboard'));
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('customer/dashboard'));
    }

    public function ganti_password()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('ganti_password');
        $this->load->view('templates_admin/footer');
    }

    public function ganti_password_action()
    {
        $password_baru = $this->input->post('password_baru');
        $confirm_password = $this->input->post('confirm_password');

        $this->form_validation->set_rules('password_baru', 'New Password', 'required|matches[confirm_password]|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('ganti_password');
            $this->load->view('templates_admin/footer');
        } else {
            $data = array('password' => md5($password_baru));
            $id = array('id' => $this->session->userdata('id'));

            $this->rental->update_password($id, $data, 'user');
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password Berhasil diUpdate!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
            redirect(base_url('auth/login'));
        }
    }

}
