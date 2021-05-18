<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Halaman Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputproduk()
    {
        $data['title'] = "Input Produk | Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('katagori')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/input', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $data = [
            'kategori' => $this->input->post('id_kategori'),
            'nama_menu' => $this->input->post('namaproduk'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'aktif' => $this->input->post('aktif'),
            'date_created' => time(),
            'date_updated' => time(),
        ];

        $upload_gambar = $_FILES['foto']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '500000';
            $config['upload_path'] = './assets/menu/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $new_gambar = $this->upload->data('file_name');
                $this->db->set('gambar_menu', $new_gambar);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maksimal Berkas 200Mb </div>');
            }
        }

        $this->db->insert('menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk Berhasil Ditambahkan</div>');
        redirect('admin/daftarprodukl');
    }

    public function hapus($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus </div>');
        redirect('admin/daftarprodukl');
    }
    public function daftarprodukl()
    {
        $data['title'] = "Daftar Produk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->db->get_where('menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/produk', $data);
        $this->load->view('templates/footer');
    }

    public function kelola()
    {
        $data['title'] = "Daftar Produk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_role'] = $this->db->from('user')->join('user_role', 'user_role.id_role=user.role_id')->get()->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/kelola', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_role()
    {
        $id_user = $this->input->post('id');
        $role_id = $this->input->post('role_id');

        $this->db->set(['role_id' => $role_id]);
        $this->db->where('id', $id_user);
        $this->db->update('user');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Hak akses berhasil diubah! </div>');
        redirect('admin/kelola');
    }
}
