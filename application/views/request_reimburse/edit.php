<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit SPP
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('spp') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>

                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-2" for="no_surat">No. Surat</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('no_surat', $spp['no_surat']); ?>" name="no_surat" id="no_surat" type="text" class="form-control" placeholder="No. Surat..." readonly>
                        <?= form_error('no_surat', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <label class="col-md-2" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tanggal" type="text" class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- Row 1 -->

                <div class="row form-group">
                    <label class="col-md-2" for="customer_id">ID Customer</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('customer_id', $spp['customer_id']); ?>" name="customer_id" id="customer_id" type="text" class="form-control" placeholder="Pilih ID RO ..." readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pilihro">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <label class="col-md-2" for="ln_id ">ID Leasing</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('ln_id', $spp['ln_id']); ?>" name="ln_id" id="ln_id" type="text" class="form-control" placeholder="Pilih Leasing...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pilihsup">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_error('ln_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 2 -->

                <div class="row form-group">
                    <label class="col-md-2" for="nama_customer">Nama Customer</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('nama_customer', $spp['nama_customer']); ?>" name="nama_customer" id="nama_customer" type="text" class="form-control" placeholder="Nama Customer...">
                        </div>
                        <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="leasing_id">Nama Leasing</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="leasing_id" id="leasing_id" class="custom-select">
                                <option value="" selected disabled>Pilih Supplier</option>
                                <?php foreach ($leasing as $supp) : ?>
                                    <option <?= $spp['leasing_id'] == $supp['id_leasing'] ? 'selected' : ''; ?> <?= set_select('leasing_id', $supp['id_leasing']) ?> value="<?= $supp['id_leasing'] ?>"><?= $supp['nama_leasing'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('leasing_id', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- row 3 -->
                <div class="row form-group">
                    <label class="col-md-2" for="unit_id">Nama Unit</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="unit_id" id="unit_id" class="custom-select">
                                <option value="" selected disabled>Pilih Unit</option>
                                <?php foreach ($unit as $b) : ?>
                                    <option <?= $spp['unit_id'] == $b['id_unit'] ? 'selected' : ''; ?> <?= set_select('unit_id', $b['id_unit']) ?> value="<?= $b['id_unit'] ?>"><?= $b['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('unit_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="harga">Harga</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('harga', $spp['harga']); ?>" name="harga" id="harga" type="text" class="form-control" placeholder="Harga...">
                        </div>
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-2" for="downpayment">Downpayment</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('downpayment', $spp['downpayment']); ?>" name="downpayment" id="downpayment" type="number" class="form-control" placeholder="downpayment...">
                    </div>

                    <label class="col-md-2" for="pelunasan">Sisa Pelunasan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('pelunasan', $spp['pelunasan']); ?>" name="pelunasan" id="pelunasan" type="number" class="form-control" placeholder="Sisa Pelunasan ...">
                        </div>
                        <?= form_error('pelunasan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cust -->
<div class="modal fade" id="pilihro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Cust</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="table">
                    <thead>
                        <tr>
                            <th>ID Cust</th>
                            <th>Nama Cust</th>
                            <th>Nama Unit</th>
                            <th>Downpayment</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $roin = $this->db->query(
                            "SELECT a.`id_customer`, a.unit_id, a.`nama_customer`, a.`downpayment`, b.nama_unit
                            FROM `customer` a
                            INNER JOIN unit b ON a.`unit_id`= b.id_unit
                            WHERE a.status = 0"
                        );

                        foreach ($roin->result() as $r) : ?>
                            <tr>
                                <td><?= $r->id_customer; ?></td>
                                <td><?= $r->nama_customer; ?></td>
                                <td><?= $r->unit_id . ' | ' . $r->nama_unit; ?></td>
                                <td><?= $r->downpayment; ?></td>
                                <td class="text-right">
                                    <button class="btn btn-sm btn-primary" id="select" data-id="<?= $r->id_customer; ?>" data-nama_customer="<?= $r->nama_customer; ?>" data-unit_id="<?= $r->unit_id; ?>" data-downpayment="<?= $r->downpayment; ?>">
                                        <i class="fa fa-check"></i>Select
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal pilih Leasing -->
<div class="modal fade" id="pilihsup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Leasing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">

                <?= $this->session->flashdata('pesan'); ?>
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                    Data Leasing
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Leasing</th>
                                    <th>Nama Unit</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlin = $this->db->query(
                                    "SELECT a.id_ln,a.leasing_id, a.unit_id, a.harga, b.nama_leasing, c.nama_unit
                                    FROM leasing_number a 
                                    INNER JOIN leasing b ON a.`leasing_id` = b.id_leasing
                                    INNER JOIN unit c ON a.`unit_id` = c.id_unit"
                                );
                                $no = 1;
                                if ($ln) :
                                    foreach ($sqlin->result() as $req) :
                                ?>
                                        <tr>
                                            <td><?= $req->id_ln; ?></td>
                                            <td><?= $req->leasing_id . ' | ' . $req->nama_leasing; ?></td>
                                            <td><?= $req->unit_id . ' | ' . $req->nama_unit; ?></td>
                                            <td><?= number_format($req->harga, 0, '.', '.'); ?></td>
                                            <td class="text-right">
                                                <button class="btn btn-sm btn-primary" id="selectsup" data-id="<?= $req->id_ln; ?>" data-leasing_id="<?= $req->leasing_id; ?>" data-unit_id="<?= $req->unit_id; ?>" data-harga="<?= $req->harga; ?>">
                                                    <i class="fa fa-check"></i>Select
                                                </button>
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
            </div>
        </div>
    </div>
</div>