<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leasing extends CI_Controller
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
        $data['title'] = "Leasing";
        $data['leasing'] = $this->admin->getLeasing();
        $this->template->load('templates/dashboard', 'leasing/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_leasing', 'Nama Leasing', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Leasing";

            // Mengenerate ID leasing
            $kode_terakhir  = $this->admin->getMax('leasing', 'id_leasing');
            $kode_tambah    = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_leasing'] = 'L' . $number;

            $this->template->load('templates/dashboard', 'leasing/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('leasing', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('leasing');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('leasing/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "leasing";
            $data['leasing'] = $this->admin->get('leasing', ['id_leasing' => $id]);
            $this->template->load('templates/dashboard', 'leasing/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('leasing', 'id_leasing', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('leasing');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('leasing/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('leasing', 'id_leasing', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('leasing');
    }
}
