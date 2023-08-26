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
                    <th>No. Acc</th>
                    <th>Date</th>
                    <th>ID Klaim</th>
                    <th>Name</th>
                    <th>Dept</th>
                    <th>Jabatan</th>
                    <th>Jenis Klaim</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query(
                    "SELECT a.no_acc, a.tanggal, a.klaim_id, a.nama, c.nama_departement, d.nama_jabatan, e.nama_jenis_klaim, a.amount, a.status
                    FROM request_reimburse a
                    INNER JOIN klaim b
                    INNER JOIN departement c
                    INNER JOIN jabatan d
                    INNER JOIN jenis_klaim e
                    ON a.klaim_id = b.id_klaim 
                    AND b.departement_id = c.id_departement 
                    AND b.jabatan_id = d.id_jabatan 
                    AND b.jenis_klaim_id = e.id_jenis_klaim
                    WHERE a.status = 1"
                );
                $no = 1;
                if ($request) :
                    foreach ($sqlin->result() as $r) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r->no_acc; ?></td>
                    <td><?= $r->tanggal; ?></td>
                    <td><?= $r->klaim_id; ?></td>
                    <td><?= $r->nama; ?></td>
                    <td><?= $r->nama_departement; ?></td>
                    <td><?= $r->nama_jabatan; ?></td>
                    <td><?= $r->nama_jenis_klaim; ?></td>
                    <td><?= number_format($r->amount, 0, '.', '.'); ?></td>
                    <td>
                        <?php
                                if ($r->status == 0) {
                                    echo "<span  class='badge bg-warning text-white'>Processing</span>";
                                } else {
                                    echo "Approval";
                                }
                                ?>
                    </td>
                    <td>
                        <a href="<?= base_url('request/edit/') . $r->no_acc ?>"
                            class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')"
                            href="<?= base_url('request/delete/') . $r->no_acc ?>"
                            class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="<?= base_url('request/detail/') . $r->no_acc ?>"
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