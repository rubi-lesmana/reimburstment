<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-info">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                    Data Leasing Number
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('LeasingNumber/add') ?>" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Create Leasing Number
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
                    <th>ID LN</th>
                    <th>Nama Leasing</th>
                    <th>Nama Unit</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query("SELECT ln.id_ln, l.nama_leasing, u.nama_unit, ln.harga
                FROM `leasing_number` ln 
                INNER JOIN leasing l ON ln.`leasing_id`= l.id_leasing
                INNER JOIN unit u ON ln.`unit_id`= u.id_unit");
                $no = 1;
                if ($ln) :
                    foreach ($sqlin->result() as $ln) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ln->id_ln; ?></td>
                            <td><?= $ln->nama_leasing; ?></td>
                            <td><?= $ln->nama_unit; ?></td>
                            <td>Rp. <?= number_format($ln->harga, 0, '.', '.',); ?></td>
                            <td>
                                <a href="<?= base_url('LeasingNumber/edit/') . $ln->id_ln ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('LeasingNumber/delete/') . $ln->id_ln ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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