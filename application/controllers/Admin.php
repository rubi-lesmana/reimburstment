<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function klaim()
    {
        $data['title']  = "Klaim Reimburstment";
        $data['klaim']  = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'admin/klaim', $data);
    }

    public function request()
    {
        $data['title']      = "Request Reimburstment";
        $data['request']    = $this->admin->getRequest();
        $this->template->load('templates/dashboard', 'admin/request', $data);
    }

    public function reimburstment()
    {
        $data['title']          = "Reimburstment";
        $data['reimburstment']  = $this->admin->getReimburstment();
        $this->template->load('templates/dashboard', 'admin/reimburstment', $data);
    }
}