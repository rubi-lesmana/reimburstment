<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
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
        $data['spp']     = $this->admin->getSpp();
        $this->template->load('templates/dashboard', 'spp/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('customer_id', 'ID Cust', 'required|trim');
        $this->form_validation->set_rules('ln_id', 'ID Requistion', 'required|trim');
        $this->form_validation->set_rules('pelunasan', 'pelunasan', 'required|trim|numeric|greater_than[0]');

        //$this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']     = "Create Surat Perintah Pembayaran";
            $data['cust']      = $this->admin->get('customer');
            $data['ln']        = $this->admin->get('leasing_number');
            $data['leasing']   = $this->admin->get('leasing');
            $data['unit']      = $this->admin->get('unit');
            $data['spp']       = $this->admin->getSpp();


            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('spp', 'no_surat');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['no_surat'] = 'SPP' . $number;

            $this->template->load('templates/dashboard', 'spp/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('spp', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('spp');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('spp/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']      = "Edit SPP";
            $data['cust']       = $this->admin->get('customer');
            $data['ln']         = $this->admin->get('leasing_number');
            $data['leasing']    = $this->admin->get('leasing');
            $data['unit']       = $this->admin->get('unit');
            $data['spp']        = $this->admin->get('spp', ['no_surat' => $id]);
            $this->template->load('templates/dashboard', 'spp/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('spp', 'no_surat', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('spp');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('spp/edit/' . $id);
            }
        }
    }

    public function histori()
    {
        $data['title'] = "Histori SPP";
        $data['spp'] = $this->admin->getSpp();
        $this->template->load('templates/dashboard', 'spp/histori', $data);
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('spp', 'no_surat', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('spp');
    }
}
