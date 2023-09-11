<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Request Reimburse
                </h4>
            </div>
            <?php if (is_finance()) : ?>
            <div class="col-auto">
                <a href="<?= base_url('spp/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Create SPP
                    </span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. ID</th>
                    <th>Date</th>
                    <th>No. ACC</th>
                    <th>ID Klaim</th>
                    <th>Name</th>
                    <th>Dept</th>
                    <th>Jabatan</th>
                    <th>Jenis Klaim</th>
                    <th>Bank</th>
                    <th>No. Rek</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query(
                    "SELECT a.id_reimburstment, a.tanggal, a.acc_no, a.klaim_id, a.nama, d.nama_departement, e.nama_jabatan, f.nama_jenis_klaim, g.nama_bank, a.no_rek, a.amount, a.status
                    FROM reimburstment a
                    INNER JOIN bank g ON a.bank_id = g.id_bank
                    INNER JOIN request_reimburse b ON a.acc_no = b.no_acc
                    INNER JOIN klaim c ON b.klaim_id = c.id_klaim
                    INNER JOIN departement d ON c.departement_id = d.id_departement
                    INNER JOIN jabatan e ON c.jabatan_id = e.id_jabatan
                    INNER JOIN jenis_klaim f ON c.jenis_klaim_id = f.id_jenis_klaim"
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
                        <?php
                                if ($r->status == 0) {
                                    echo "<span  class='badge bg-danger text-white'>Approval</span>";
                                } else {
                                    echo "Approval";
                                }
                                ?>
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