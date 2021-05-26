<?php

class Customer extends CI_Controller
{
    public function index()
    {
        $data['customer'] = $this->rental->get_data('user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_customer()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_customer');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_customer_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah_customer();
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $no_telepon = $this->input->post('no_telepon');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
            );

            $this->rental->insert_data($data, 'user');
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/customer');
        }

    }

    public function update_customer($id)
    {
        $where = array('id' => $id);

        $data['customer'] = $this->db->query("SELECT * FROM user WHERE id = '$id'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_customer_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update_customer($this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $gender = $this->input->post('gender');
            $no_telepon = $this->input->post('no_telepon');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
            );

            $where = array(
                'id' => $id,
            );

            $this->rental->update_data('user', $data, $where);
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/customer');
        }
    }

    public function hapus_customer($id)
    {
        $where = array('id' => $id);

        $this->rental->delete_data($where, 'user');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/customer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');
    }
}
