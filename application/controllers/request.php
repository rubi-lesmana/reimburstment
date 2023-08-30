<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
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
        $data['title']       = "Request Reimburse";
        $data['request']     = $this->admin->getRequest();
        $this->template->load('templates/dashboard', 'request/data', $data);
    }

    public function klaim()
    {
        $data['title']       = "Request Reimburse";
        $data['klaim']     = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'request/klaim', $data);
    }

    private function _validasiKlaim()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('departement_id', 'Departement', 'required|trim');
        $this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('jenis_klaim_id', 'Jenis Klaim', 'required|trim');
    }

    public function approve($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasiKlaim();

        if ($this->form_validation->run() == false) {
            $data['title']          = "Approve Klaim";
            $data['departement']    = $this->admin->get('departement');
            $data['jabatan']        = $this->admin->get('jabatan');
            $data['jenis_klaim']    = $this->admin->get('jenis_klaim');
            $data['klaim']          = $this->admin->get('klaim', ['id_klaim' => $id]);
            $this->template->load('templates/dashboard', 'request/approve', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('klaim', 'id_klaim', $id, $input);

            if ($update) {
                set_pesan('Klaim berhasil di Approve');
                redirect('request');
            } else {
                set_pesan('Klaim gagal di Approve');
                redirect('request/approve/' . $id);
            }
        }
    }
    
    public function histori()
    {
        $data['title'] = "Histori Request Reimburse";
        $data['request'] = $this->admin->getRequest();
        $this->template->load('templates/dashboard', 'request/histori', $data);
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
            $data['title']  = "Request Reimburse";
            $data['klaim']  = $this->admin->get('klaim');
            $data['req']    = $this->admin->getRequest();

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('request_reimburse', 'no_acc');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['no_acc'] = 'ACC' . $number;

            $this->template->load('templates/dashboard', 'request/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('request_reimburse', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('request');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('request/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']      = "Edit Request Reimburse";
            $data['klaim']      = $this->admin->get('klaim');
            $data['request']    = $this->admin->get('request_reimburse', ['no_acc' => $id]);
            $this->template->load('templates/dashboard', 'request/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('request_reimburse', 'no_acc', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('request');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('request/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('request_reimburse', 'no_acc', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('request');
    }
}