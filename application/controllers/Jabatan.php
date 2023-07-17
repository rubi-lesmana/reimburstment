<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Jabatan";
        $data['jabatan'] = $this->admin->getJabatan();
        $this->template->load('templates/dashboard', 'jabatan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Jabatan";

            // Mengenerate ID Jabatan
            $kode_terakhir  = $this->admin->getMax('jabatan', 'id_jabatan');
            $kode_tambah    = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_jabatan'] = 'J' . $number;

            $this->template->load('templates/dashboard', 'jabatan/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('jabatan', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('jabatan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('jabatan/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "jabatan";
            $data['jabatan'] = $this->admin->get('jabatan', ['id_jabatan' => $id]);
            $this->template->load('templates/dashboard', 'jabatan/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('jabatan', 'id_jabatan', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('jabatan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('jabatan/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('jabatan', 'id_jabatan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('jabatan');
    }
}