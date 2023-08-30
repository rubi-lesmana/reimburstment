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
        $data['title']  = "Klaim Reimburstment";
        $data['klaim']     = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'klaim/data', $data);
    }

    public function histori()
    {
        $data['title']  = "Klaim Reimburstment";
        $data['klaim']  = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'klaim/histori', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('departement_id', 'Departement', 'required|trim');
        $this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('jenis_klaim_id', 'Jenis Klaim', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']          = "Klaim Reimburstment";
            $data['klaim']          = $this->admin->getKlaim();
            $data['departement']    = $this->admin->get('departement');
            $data['jabatan']        = $this->admin->get('jabatan');
            $data['jenis_klaim']    = $this->admin->get('jenis_klaim');

            // Mengenerate ID Klaim
            $kode_terakhir      = $this->admin->getMax('klaim', 'id_klaim');
            $kode_tambah        = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number             = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_klaim']   = 'KLM' . $number;
            
            $this->template->load('templates/dashboard', 'klaim/add', $data);
        } else {           
            $input              = $this->input->post(null, true);
            //konfigurasi upload
            // $file_dokumen       = $_FILES['dokumen']['name'];
            // $config = [
            //     'upload_path'   => './assets/img/',
            //     'allowed_types' => 'gif|jpg|png',
            //     'max_size'      => '2048',
            //     'file_name'     => $file_dokumen, 
            // ];
            // $this->load->library('upload', $config);
            // $dokumen = $this->upload->data('file_name');
            // $input_data = [
            //     'id_klaim'          => $input['id_klaim'],
            //     'tanggal'           => $input['tanggal'],
            //     'nama'              => $input['nama'],
            //     'departement_id'    => $input['departement_id'],
            //     'jabatan_id'        => $input['jabatan_id'],
            //     'jenis_klaim_id'    => $input['jenis_klaim_id'],
            //     'dokumen'           => $dokumen,
            // ];
            $insert = $this->admin->insert('klaim', $input);            
            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('klaim');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('klaim/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']          = "Edit Klaim";
            $data['departement']    = $this->admin->get('departement');
            $data['jabatan']        = $this->admin->get('jabatan');
            $data['jenis_klaim']    = $this->admin->get('jenis_klaim');
            $data['klaim']          = $this->admin->get('klaim', ['id_klaim' => $id]);
            $this->template->load('templates/dashboard', 'klaim/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('klaim', 'id_klaim', $id, $input);

            if ($update) {
                set_pesan('Klaim Reimburse berhasil di Perbaharui');
                redirect('klaim');
            } else {
                set_pesan('Klaim Reimburse gagal di perbaharui');
                redirect('klaim/edit/' . $id);
            }
        }
    }

    public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $data['title']          = "Detail Request Order";
        $data['departement']    = $this->admin->get('departement');
        $data['jabatan']        = $this->admin->get('jabatan');
        $data['jenis_klaim']    = $this->admin->get('jenis_klaim');
        $data['klaim']          = $this->admin->get('klaim', ['id_klaim' => $id]);
        $this->template->load('templates/dashboard', 'klaim/detail', $data);
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('klaim', 'id_klaim', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('klaim');
    }

    public function report_ro()
    {
        $data['title']  = "Report Request Order";
        $data['klaim']     = $this->admin->getKlaim();
        $this->template->load('templates/dashboard', 'klaim/report', $data);
    }

    public function cetak_ro($getId)
    {
        $id = encode_php_tags($getId);
        $data['divisi'] = $this->admin->get('divisi');
        $data['barang'] = $this->admin->get('barang');
        $data['ro']     = $this->admin->get('klaim', ['id_klaim' => $id]);
        $sql = $this->db->query("
        SELECT a.`id_klaim`, a.`tanggal`,a.`divisi_id`,a.`barang_id`,a.`keterangan`,a.`quantity`,a.`status`, b.nama_divisi, c.nama_barang 
        FROM `klaim` a 
        INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
        INNER JOIN barang c ON a.`barang_id`=c.id_barang WHERE id_klaim ='$id' ");
        $no = $sql->row();
        $data = '
        <style type="text/css">
		
		.table1 {
			font-family: sans-serif;
			color: black;
			border-collapse: collapse;
			margin-top:20px;
		}

		.table1, th,td {
			border: 1px solid #999;
			padding: 8px 20px;

		}
		.label{
			border-style: solid;
			line-height: 20px;

		}

		div.ttd{
			float:right;
			
		}
		

		</style>

		
		<div>
		
		<h1 style="text-align:center">REQUEST ORDER</h1>
        <h2 style="text-align:center">No : ' . $no->id_klaim . ' / ' . $no->nama_divisi . '  </h2>
        <h3 style="text-align:center">Tanggal : ' . $no->tanggal . '  </h3>
		
		</div>
		<table class="table1" width="100%">
		<tr>
            <th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Quantity</th>
			<th>Keterangan</th>
		</tr> 
		';

        // $sql = $this->db->query("SELECT a.`id_klaim`, a.`tanggal`,a.`divisi_id`,a.`barang_id`,a.`keterangan`,a.`quantity`,a.`status`, b.nama_divisi, c.nama_barang 
        // FROM `klaim` a 
        // INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
        // INNER JOIN barang c ON a.`barang_id`=c.id_barang WHERE id_klaim ='$id' ");
        foreach ($sql->result() as $view) {
            $data .= '<tr>
			<td style="text-align:center">' . $view->barang_id . '</td>
            <td style="text-align:center">' . $view->nama_barang . '</td>
			<td style="text-align:center">' . $view->quantity . '</td>
			<td style="text-align:center">' . $view->keterangan . '</td>
			</tr>';
        }
        $data .= '</table>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');
        // $data = $this->load->view('klaim/hasil_cetak', [], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}