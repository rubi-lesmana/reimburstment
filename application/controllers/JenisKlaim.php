<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisKlaim extends CI_Controller
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
        $data['title'] = "Jenis Klaim";
        $data['jenis_klaim'] = $this->admin->getJenisKlaim();
        $this->template->load('templates/dashboard', 'jenis_klaim/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_jenis_klaim', 'Nama Jenis Klaim', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Jenis Klaim";

            // Mengenerate ID Departement
            $kode_terakhir  = $this->admin->getMax('jenis_klaim', 'id_jenis_klaim');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_jenis_klaim'] = 'JKL' . $number;

            $this->template->load('templates/dashboard', 'jenis_klaim/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('jenis_klaim', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('JenisKlaim');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('JenisKlaim/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Jenis Klaim";
            $data['jenis_klaim'] = $this->admin->get('jenis_klaim', ['id_jenis_klaim' => $id]);
            $this->template->load('templates/dashboard', 'jenis_klaim/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('jenis_klaim', 'id_jenis_klaim', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('JenisKlaim');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('JenisKlaim/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('jenis_klaim', 'id_jenis_klaim', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('JenisKlaim');
    }
}