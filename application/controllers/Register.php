<?php

class Register extends CI_Controller
{
    public function index()
    {

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('register_form');
            $this->load->view('templates_admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $no_telepon = $this->input->post('no_telepon');
            $role_id = '2';

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
                'role_id' => $role_id,
            );

            $this->rental->insert_data($data, 'user');
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Register Berhasil, Silahkan Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('auth/login');
        }

    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', array('is_unique' => 'This email is already registered!'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|numeric');
    }

}
