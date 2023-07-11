<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data SPP
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
                    <th>No. Surat</th>
                    <th>Nama Cust</th>
                    <th>Nama Unit</th>
                    <th>Leasing</th>
                    <th>Harga</th>
                    <th>DP</th>
                    <th>Pelunasan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query(
                    "SELECT a.no_surat, b.nama_customer, c.nama_unit, e.nama_leasing, d.harga, a.downpayment, a.pelunasan, a.status 
                    FROM `spp` a 
                    INNER JOIN customer b ON a.`customer_id`=b.id_customer
                    INNER JOIN unit c ON a.`unit_id`=c.id_unit
                    INNER JOIN leasing_number d ON a.`ln_id`=d.id_ln
                    INNER JOIN leasing e ON a.`leasing_id`=e.id_leasing 
                    WHERE a.status = 0"
                );
                $no = 1;
                if ($spp) :
                    foreach ($sqlin->result() as $r) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $r->no_surat; ?></td>
                            <td><?= $r->nama_customer; ?></td>
                            <td><?= $r->nama_unit; ?></td>
                            <td><?= $r->nama_leasing; ?></td>
                            <td><?= number_format($r->harga, 0, '.', '.'); ?></td>
                            <td><?= number_format($r->downpayment, 0, '.', '.'); ?></td>
                            <td><?= number_format($r->pelunasan, 0, '.', '.'); ?></td>
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
                                <?php if (is_finance()) : ?>
                                    <a href="<?= base_url('spp/edit/') . $r->no_surat ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('spp/delete/') . $r->no_surat ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('spp/detail/') . $r->no_surat ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-ellipsis-v"></i></a>
                                <?php endif; ?>

                                <a href="<?= base_url('kacab/approve/') . $r->no_surat ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-search"></i></a>
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