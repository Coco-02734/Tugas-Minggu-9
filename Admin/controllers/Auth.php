<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Halaman Login | Admin";

        $this->load->view('auth/header', $data);
        $this->load->view('auth/index', $data);
        $this->load->view('auth/footer');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //usernya Ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Kamu Salah !!! </div>');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Di Aktivasi. Emailmu !!! </div>');
                redirect('admin/auth');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar </div>');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('token');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout / keluar.
			Silahkan login !!!</div>');
        redirect('admin/auth');
    }
}
