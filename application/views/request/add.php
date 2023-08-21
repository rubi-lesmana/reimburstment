<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('Request') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="no_acc">No ACC</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="no_acc">
                                    <i class="fas fa-envelope-open-text"></i>
                                </span>
                            </div>
                            <input readonly value="<?= set_value('no_acc', $no_acc); ?>" name="no_acc" id="no_acc"
                                type="text" class="form-control" placeholder="No. Acc">
                            <?= form_error('no_acc', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <?= form_error('no_acc', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl">Tanggal</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tgl"
                                type="text" class="form-control date" placeholder="Tanggal...">
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="klaim_id">ID Klaim</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input value="<?= set_value('klaim_id'); ?>" name="klaim_id" id="klaim_id" type="text"
                                class="form-control" placeholder="Pilih ID Klaim ...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#klaim">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama">Nama Karyawan</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="nama">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input value="<?= set_value('nama'); ?>" name="nama" id="nama" type="text"
                                class="form-control" placeholder="Nama Karyawan...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="description">Description </label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-info"></i>
                                </span>
                            </div>
                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Description ..."><?= set_value('description'); ?></textarea>
                        </div>
                        <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                <!-- <label class="col-md-2 text-md-right" for="no_acc">No. Acc</label>
                    <div class="col-md-4">
                        <input readonly value="<?= set_value('no_acc', $no_acc); ?>" name="no_acc" id="no_acc"
                            type="text" class="form-control" placeholder="No. Acc">
                        <?= form_error('no_acc', '<small class="text-danger">', '</small>'); ?>
                    </div> -->
                <!-- <label class="col-md-2 text-md-right" for="klaim_id">ID Klaim</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input value="<?= set_value('klaim_id'); ?>" name="klaim_id" id="klaim_id" type="text"
                            class="form-control" placeholder="Pilih ID Klaim ...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#klaim">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
                <!-- Row 1 -->

                <!-- <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="tgl">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tgl" type="text"
                            class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="departement_id">Nama Departement</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group">
                                <select name="departement_id" id="departement_id" class="custom-select">
                                    <option value="" selected disabled>Pilih Dept</option>
                                    <?php foreach ($departement as $d) : ?>
                                    <option <?= $this->uri->segment(3) == $d['id_departement'] ? 'selected' : '';  ?>
                                        <?= set_select('departement_id', $d['id_departement']) ?>
                                        value="<?= $d['id_departement'] ?>">
                                        <?= $d['id_departement'] . ' | ' . $d['nama_departement'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('departement_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div> -->
                <!-- row 2 -->

                <!-- <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="nama">Nama Karyawan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('nama'); ?>" name="nama" id="nama" type="text"
                                class="form-control" placeholder="Nama Karyawan...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="jabatan_id">Jabatan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="jabatan_id" id="jabatan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Jabatan</option>
                                <?php foreach ($jabatan as $d) : ?>
                                <option <?= $this->uri->segment(3) == $d['id_jabatan'] ? 'selected' : '';  ?>
                                    <?= set_select('jabatan_id', $d['id_jabatan']) ?> value="<?= $d['id_jabatan'] ?>">
                                    <?= $d['id_jabatan'] . ' | ' . $d['nama_jabatan'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('jabatan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <!-- row 3 -->

                <!-- <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="amount">Amount</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('amount'); ?>" name="amount" id="amount" type="number"
                                class="form-control" placeholder="Amount ...">
                        </div>
                        <?= form_error('amount', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="jenis_klaim_id">Jenis Klaim</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="jenis_klaim_id" id="jenis_klaim_id" class="custom-select">
                                <option value="" selected disabled>Pilih Jenis Klaim</option>
                                <?php foreach ($jenis_klaim as $jk) : ?>
                                <option <?= $this->uri->segment(3) == $jk['id_jenis_klaim'] ? 'selected' : '';  ?>
                                    <?= set_select('jenis_klaim_id', $jk['id_jenis_klaim']) ?>
                                    value="<?= $jk['id_jenis_klaim'] ?>">
                                    <?= $jk['id_jenis_klaim'] . ' | ' . $jk['nama_jenis_klaim'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('jenis_klaim_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <!-- row 4 -->

                <!-- <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="description">Deskripsi</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <textarea value="<?= set_value('description'); ?>" name="description" id="description"
                                class="form-control" rows="3"
                                placeholder="description..."><?= set_value('description'); ?></textarea>
                        </div>
                        <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div> -->
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
<div class="modal fade" id="klaim">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Klaim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID Klaim</th>
                            <th>Nama</th>
                            <th>Deptartement</th>
                            <th>Jabatan</th>
                            <th>Jenis Klaim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $klaim = $this->db->query(
                            "SELECT a.id_klaim, a.nama, a.departement_id, a.jabatan_id, a.jenis_klaim_id,
                            b.nama_departement, c.nama_jabatan, d.nama_jenis_klaim
                            FROM klaim a
                            INNER JOIN departement b
                            INNER JOIN jabatan c
                            INNER JOIN jenis_klaim d
                            ON a.departement_id  =  b.id_departement 
                            AND a.jabatan_id = c.id_jabatan
                            AND a.jenis_klaim_id = d.id_jenis_klaim
                            WHERE a.status = 0"
                        );

                        foreach ($klaim ->result() as $r) : ?>
                        <tr>
                            <td><?= $r->id_klaim; ?></td>
                            <td><?= $r->nama; ?></td>
                            <td><?= $r->departement_id . ' | ' . $r->nama_departement; ?></td>
                            <td><?= $r->jabatan_id . ' | ' . $r->nama_jabatan; ?></td>
                            <td><?= $r->jenis_klaim_id . ' | ' . $r->nama_jenis_klaim; ?></td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-primary" id="select_klaim" data-id="<?= $r->id_klaim; ?>"
                                    data-nama="<?= $r->nama; ?>" data-departement_id="<?= $r->departement_id; ?>"
                                    data-jabatan_id="<?= $r->jabatan_id; ?>"
                                    data-jenis_klaim_id="<?= $r->jenis_klaim_id; ?>">
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
                                if ($klaim) :
                                    foreach ($sqlin->result() as $req) :
                                ?>
                                <tr>
                                    <td><?= $req->id_ln; ?></td>
                                    <td><?= $req->leasing_id . ' | ' . $req->nama_leasing; ?></td>
                                    <td><?= $req->unit_id . ' | ' . $req->nama_unit; ?></td>
                                    <td><?= number_format($req->harga, 0, '.', '.'); ?></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-primary" id="pilih_klaim"
                                            data-id="<?= $req->id_ln; ?>" data-leasing_id="<?= $req->leasing_id; ?>"
                                            data-unit_id="<?= $req->unit_id; ?>" data-harga="<?= $req->harga; ?>">
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