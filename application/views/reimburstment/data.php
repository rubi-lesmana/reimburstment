<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Request Reimburse
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('reimburstment/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Create Reimburstment
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>no ID</th>
                    <th>Date</th>
                    <th>No. Acc</th>
                    <th>ID Klaim</th>
                    <th>Name</th>
                    <th>Dept</th>
                    <th>Jabatan</th>
                    <th>Jenis Klaim</th>
                    <th>Bank</th>
                    <th>No. Rek</th>
                    <th>Amount</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query(
                    "SELECT a.id_reimburstment, a.tanggal, a.acc_no, a.klaim_id, a.nama, d.nama_departement, e.nama_jabatan, f.nama_jenis_klaim,  g.nama_bank, a.no_rek, a.amount
                    FROM reimburstment a
                    INNER JOIN request_reimburse b ON a.acc_no =  b.no_acc
                    INNER JOIN bank g ON a.bank_id = g.id_bank
                    INNER JOIN klaim c ON b.klaim_id = c.id_klaim
                    INNER JOIN departement d ON c.departement_id = d.id_departement
                    INNER JOIN jabatan e ON c.jabatan_id = e.id_jabatan
                    INNER JOIN jenis_klaim f ON c.jenis_klaim_id = f.id_jenis_klaim
                    "
                );
                $no = 1;
                if ($reimburstment) :
                    foreach ($sqlin->result() as $r) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r->id_reimburstment; ?></td>
                    <td><?= $r->tanggal; ?></td>
                    <td><?= $r->acc_no; ?></td>
                    <td><?= $r->klaim_id; ?></td>
                    <td><?= $r->nama; ?></td>
                    <td><?= $r->nama_departement; ?></td>
                    <td><?= $r->nama_jabatan; ?></td>
                    <td><?= $r->nama_jenis_klaim; ?></td>
                    <td><?= $r->nama_bank; ?></td>
                    <td><?= $r->no_rek; ?></td>
                    <td><?= number_format($r->amount, 0, '.', '.'); ?></td>
                    <td>
                        <a href="<?= base_url('reimburstment/edit/') . $r->id_reimburstment ?>"
                            class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')"
                            href="<?= base_url('reimburstment/delete/') . $r->id_reimburstment ?>"
                            class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="<?= base_url('reimburstment/detail/') . $r->id_reimburstment ?>"
                            class="btn btn-success btn-circle btn-sm"><i class="fas fa-ellipsis-v"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">
                        Data Kosong
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>