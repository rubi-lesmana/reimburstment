<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
        $data['title'] = "Bank";
        $data['bank'] = $this->admin->getbank();
        $this->template->load('templates/dashboard', 'bank/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_bank', 'Nama bank', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "bank";

            // Mengenerate ID bank
            $kode_terakhir  = $this->admin->getMax('bank', 'id_bank');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_bank'] = 'BANK' . $number;

            $this->template->load('templates/dashboard', 'bank/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('bank', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('bank');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('bank/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "bank";
            $data['bank'] = $this->admin->get('bank', ['id_bank' => $id]);
            $this->template->load('templates/dashboard', 'bank/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('bank', 'id_bank', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('bank');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('bank/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('bank', 'id_bank', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('bank');
    }
}