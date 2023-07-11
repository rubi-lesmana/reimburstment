<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kacab extends CI_Controller
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
        $data['title']  = "Data SPP";
        $data['spp']     = $this->admin->getSpp();
        $this->template->load('templates/dashboard', 'kacab/data', $data);
    }

    public function list_spp()
    {
        $data['title']  = "List SPP";
        $data['spp']     = $this->admin->getSpp();
        $this->template->load('templates/dashboard', 'kacab/list_spp', $data);
    }

    public function history()
    {
        $data['title']  = "History SPP";
        $data['spp']     = $this->admin->getSpp();
        $this->template->load('templates/dashboard', 'kacab/history', $data);
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

    public function approve($getId)
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
            $this->template->load('templates/dashboard', 'kacab/approve', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('spp', 'no_surat', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('kacab');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('kacab/approve/' . $id);
            }
        }
    }
}
