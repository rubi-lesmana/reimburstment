<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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
        $data['title']  = "Customer";
        $data['cust']   = $this->admin->getCust();
        $this->template->load('templates/dashboard', 'customer/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_customer', 'Nama Supplier', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('unit_id', 'Nama Unit', 'required|trim');
        $this->form_validation->set_rules('warna_id', 'Warna', 'required|trim');
        $this->form_validation->set_rules('no_rangka', 'No. Rangka', 'required|trim|numeric');
        $this->form_validation->set_rules('no_mesin', 'No. Mesin', 'required|trim|numeric');
        $this->form_validation->set_rules('downpayment', 'DP', 'required|trim|numeric');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']      = "Create Customer";
            $data['customer']   = $this->admin->getCust();
            $data['unit']       = $this->admin->get('unit');
            $data['warna']       = $this->admin->get('warna');

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('customer', 'id_customer');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_customer']  = 'CUST' . $number;

            $this->template->load('templates/dashboard', 'customer/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('customer', $input);

            if ($insert) {
                set_pesan('Customer Berhasil dibuat');
                redirect('customer');
            } else {
                set_pesan('Gagal membuat Request Order');
                redirect('customer/add');
            }
        }
    }


    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Edit Customer";
            $data['unit']   = $this->admin->get('unit');
            $data['warna']  = $this->admin->get('warna');
            $data['cust']   = $this->admin->get('customer', ['id_customer' => $id]);
            $this->template->load('templates/dashboard', 'customer/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('customer', 'id_customer', $id, $input);

            if ($update) {
                set_pesan('Customer berhasil di Perbaharui');
                redirect('customer');
            } else {
                set_pesan('Customer gagal di perbaharui');
                redirect('customer/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('supplier', 'id_supplier', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('supplier');
    }
}
