<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaim extends CI_Controller
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
        $data['title'] = "Klaim";
        $data['klaim'] = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'klaim/data', $data);
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
            $data['title']      = "Create Klaim Reimburstment";
            $data['klaim']      = $this->admin->getKlaim();
            

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('klaim', 'id_klaim');
            $kode_tambah    = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_klaim']  = 'Klaim' . $number;

            $this->template->load('templates/dashboard', 'customer/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('klaim', $input);

            if ($insert) {
                set_pesan('Klaim Reimburstment Berhasil dibuat');
                redirect('klaim');
            } else {
                set_pesan('Gagal membuat Klaim Reimburstment');
                redirect('klaim/add');
            }
        }
    }

    // public function edit($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $this->_validasi();

    //     if ($this->form_validation->run() == false) {
    //         $data['title']  = "Barang";
    //         $data['jenis']  = $this->admin->get('jenis');
    //         $data['satuan'] = $this->admin->get('satuan');
    //         $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
    //         $this->template->load('templates/dashboard', 'barang/edit', $data);
    //     } else {
    //         $input  = $this->input->post(null, true);
    //         $update = $this->admin->update('barang', 'id_barang', $id, $input);

    //         if ($update) {
    //             set_pesan('data berhasil disimpan');
    //             redirect('barang');
    //         } else {
    //             set_pesan('gagal menyimpan data');
    //             redirect('barang/edit/' . $id);
    //         }
    //     }
    // }

    // public function delete($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     if ($this->admin->delete('barang', 'id_barang', $id)) {
    //         set_pesan('data berhasil dihapus.');
    //     } else {
    //         set_pesan('data gagal dihapus.', false);
    //     }
    //     redirect('barang');
    // }

    // public function getstok($getId)
    // {
    //     $id     = encode_php_tags($getId);
    //     $query  = $this->admin->cekStok($id);
    //     output_json($query);
    // }
}
