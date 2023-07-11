<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Customer
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('customer/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Create Customer
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
                    <th>ID Cust</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Type</th>
                    <th>Warna</th>
                    <th>No. Rangka</th>
                    <th>No. Mesin</th>
                    <th>DP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query(
                    "SELECT a.id_customer, a.nama_customer, a.alamat, a.no_rangka, a.no_mesin, a.downpayment, a.status, u.nama_unit, w.nama_warna               
                    FROM `customer` a 
                    INNER JOIN unit u ON a.unit_id = u.id_unit
                    INNER JOIN warna w ON a.warna_id = w.id_warna"
                );
                $no = 1;
                if ($cust) :
                    foreach ($sqlin->result() as $r) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $r->id_customer; ?></td>
                            <td><?= $r->nama_customer; ?></td>
                            <td><?= $r->alamat; ?></td>
                            <td><?= $r->nama_unit; ?></td>
                            <td><?= $r->nama_warna; ?></td>
                            <td><?= $r->no_rangka; ?></td>
                            <td><?= $r->no_mesin; ?></td>
                            <td>Rp. <?= number_format($r->downpayment, 0, '.', '.',); ?></td>
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
                                <a href="<?= base_url('customer/edit/') . $r->id_customer ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('customer/delete/') . $r->id_customer ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url('customer/cetak_ro/') . $r->id_customer ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-print"></i></a>
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