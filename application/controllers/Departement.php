<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departement extends CI_Controller
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
        $data['title'] = "Departement";
        $data['departement'] = $this->admin->getDepartement();
        $this->template->load('templates/dashboard', 'departement/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_departement', 'Nama Departement', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Departement";

            // Mengenerate ID Departement
            $kode_terakhir  = $this->admin->getMax('departement', 'id_departement');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_departement'] = 'DEPT' . $number;

            $this->template->load('templates/dashboard', 'departement/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('departement', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('departement');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('departement/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Departement";
            $data['departement'] = $this->admin->get('Departement', ['id_departement' => $id]);
            $this->template->load('templates/dashboard', 'Departement/edit', $data);
        } else {
            $input  = $this->input->post(null, true);
            $update = $this->admin->update('Departement', 'id_departement', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('Departement');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('Departement/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('Departement', 'id_departement', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('Departement');
    }
}