<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LeasingNumber extends CI_Controller
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
        $data['title'] = "Leasing Number";
        $data['ln'] = $this->admin->getLn();
        $this->template->load('templates/dashboard', 'LeasingNumber/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('leasing_id', 'Leasing', 'required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Create Leasing Number";
            $data['ln']     = $this->admin->getLn();
            $data['leasing'] = $this->admin->get('leasing');
            $data['unit'] = $this->admin->get('unit');

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('leasing_number', 'id_ln');
            $kode_tambah    = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_ln']  = 'LN' . $number;

            $this->template->load('templates/dashboard', 'LeasingNumber/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('leasing_number', $input);

            if ($insert) {
                set_pesan('Request Order Berhasil dibuat');
                redirect('LeasingNumber');
            } else {
                set_pesan('Gagal membuat Request Order');
                redirect('LeasingNumber/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']      = "Edit Leasing Number";
            $data['leasing']   = $this->admin->get('leasing');
            $data['unit']     = $this->admin->get('unit');
            $data['ln']        = $this->admin->get('leasing_number', ['id_ln' => $id]);
            $this->template->load('templates/dashboard', 'LeasingNumber/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('leasing_number', 'id_ln', $id, $input);

            if ($update) {
                set_pesan('Leasing Number berhasil di Perbaharui');
                redirect('LeasingNumber');
            } else {
                set_pesan('Leasing Number gagal di perbaharui');
                redirect('LeasingNumber/edit/' . $id);
            }
        }
    }
}
