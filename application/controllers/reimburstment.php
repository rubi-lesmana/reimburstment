<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reimburstment extends CI_Controller
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
        $data['title']          = "reimburstment Reimburse";
        $data['reimburstment']  = $this->admin->getReimburstment();
        $this->template->load('templates/dashboard', 'reimburstment/data', $data);
    }
    
    public function histori()
    {
        $data['title'] = "Histori reimburstment Reimburse";
        $data['reimburstment'] = $this->admin->getReimburstment();
        $this->template->load('templates/dashboard', 'reimburstment/histori', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('no_acc', 'No Surat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('klaim_id', 'ID Klaim', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim|numeric|greater_than[0]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "reimburstment Reimburse";
            $data['klaim']  = $this->admin->get('klaim');
            $data['req']    = $this->admin->getReimburstment();

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('reimburstment_reimburse', 'no_acc');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['no_acc'] = 'ACC' . $number;

            $this->template->load('templates/dashboard', 'reimburstment/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('reimburstment_reimburse', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('reimburstment');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('reimburstment/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']      = "Edit reimburstment Reimburse";
            $data['klaim']      = $this->admin->get('klaim');
            $data['reimburstment']    = $this->admin->get('reimburstment_reimburse', ['no_acc' => $id]);
            $this->template->load('templates/dashboard', 'reimburstment/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('reimburstment_reimburse', 'no_acc', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('reimburstment');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('reimburstment/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('reimburstment_reimburse', 'no_acc', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('reimburstment');
    }
}