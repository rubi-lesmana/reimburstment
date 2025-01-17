<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getBarang()
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->order_by('id_barang');
        return $this->db->get('barang b')->result_array();
    }

    public function getUnit()
    {
        $this->db->order_by('id_unit');
        return $this->db->get('unit')->result_array();
    }

    public function getJabatan()
    {
        $this->db->order_by('id_jabatan');
        return $this->db->get('jabatan')->result_array();
    }

    public function getDepartement()
    {
        $this->db->order_by('id_departement');
        return $this->db->get('departement')->result_array();
    }

    public function getBank()
    {
        $this->db->order_by('id_bank');
        return $this->db->get('bank')->result_array();
    }

    public function getJenisKlaim()
    {
        $this->db->order_by('id_jenis_klaim');
        return $this->db->get('jenis_klaim')->result_array();
    }

    public function getKlaim()
    {
        $this->db->join('jabatan j', 'k.jabatan_id = j.id_jabatan');
        $this->db->join('departement d', 'k.departement_id = d.id_departement');
        $this->db->join('jenis_klaim jk', 'k.jenis_klaim_id = jk.id_jenis_klaim');
        $this->db->order_by('id_klaim');
        return $this->db->get('klaim k')->result_array();
    }

    public function getRequest()
    {
        $this->db->join('klaim k', 'r.klaim_id = k.id_klaim');
        $this->db->order_by('no_acc');
        return $this->db->get('request_reimburse r')->result_array();
    }

    public function getReimburstment()
    {
        $this->db->join('request_reimburse req', 'r.acc_no = req.no_acc');
        $this->db->join('bank b', 'r.bank_id = b.id_bank');
        $this->db->order_by('id_reimburstment');
        return $this->db->get('reimburstment r')->result_array();
    }

    public function getRequistion($limit = null, $id_req = null)
    {
        $this->db->select('*');
        $this->db->join('supplier s', 'r.supplier_id = s.id_supplier');
        $this->db->join('barang b', 'r.barang_id = b.id_barang');
        // $this->db->join('jenis j', 'r.jenis_id = j.id_jenis');
        // $this->db->join('satuan s', 'r.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_req != null) {
            $this->db->where('id_requistion', $id_req);
        }

        $this->db->order_by('id_requistion', 'DESC');
        return $this->db->get('tb_requistion r')->result_array();
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('request_order');
        $this->db->join('request_order', 'request_order.barang_id = barang.id_barang');
        $this->db->order_by('id_ro', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bm.user_id = u.id_user');
        $this->db->join('supplier sp', 'bm.supplier_id = sp.id_supplier');
        $this->db->join('barang b', 'bm.barang_id = b.id_barang');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get('barang_masuk bm')->result_array();
    }

    public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bk.user_id = u.id_user');
        $this->db->join('barang b', 'bk.barang_id = b.id_barang');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get('barang_keluar bk')->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function chartBarangMasuk($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('id_barang_masuk', $like, 'after');
        return count($this->db->get('barang_masuk')->result_array());
    }

    public function chartBarangKeluar($bulan)
    {
        $like = 'T-BK-' . date('y') . $bulan;
        $this->db->like('id_barang_keluar', $like, 'after');
        return count($this->db->get('barang_keluar')->result_array());
    }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function cekStok($id)
    {
        $this->db->join('satuan s', 'b.satuan_id=s.id_satuan');
        return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
    }
}