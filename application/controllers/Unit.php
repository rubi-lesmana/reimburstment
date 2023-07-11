<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
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
        $data['title'] = "Unit";
        $data['unit'] = $this->admin->getUnit();
        $this->template->load('templates/dashboard', 'unit/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Unit";
            // $data['jenis']  = $this->admin->get('jenis');
            // $data['satuan'] = $this->admin->get('satuan');

            // Mengenerate ID Unit
            $kode_terakhir  = $this->admin->getMax('unit', 'id_unit');
            $kode_tambah    = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_unit'] = 'U' . $number;

            $this->template->load('templates/dashboard', 'unit/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('unit', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('unit');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('unit/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Unit";
            $data['unit'] = $this->admin->get('unit', ['id_unit' => $id]);
            $this->template->load('templates/dashboard', 'unit/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('unit', 'id_unit', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('unit');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('unit/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('unit', 'id_unit', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('unit');
    }
}
