<div class="row justify-content-center">
    <div class="col-md-10">
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
                    <label class="col-md-2 text-md-right" for="id_reimburstment">ID Reimburstment</label>
                    <div class="col-md-4">
                        <input readonly value="<?= set_value('id_reimburstment', $id_reimburstment); ?>"
                            name="id_reimburstment" id="id_reimburstment" type="text" class="form-control"
                            placeholder="No. Acc">
                        <?= form_error('id_reimburstment', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="tgl">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tgl" type="text"
                            class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- Row 1 -->

                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="acc_no">ID Request</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input readonly value="<?= set_value('acc_no'); ?>" name="acc_no" id="acc_no" type="text"
                                class="form-control" placeholder="Pilih ID Request ...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#reimburstment">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <label class="col-md-2 text-md-right" for="bank_id">Bank</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="bank_id" id="bank_id" class="custom-select">
                                <option value="" selected disabled>Pilih Bank</option>
                                <?php foreach ($bank as $j) : ?>
                                <option <?= $this->uri->segment(3) == $j['id_bank'] ? 'selected' : '';  ?>
                                    <?= set_select('bank_id', $j['id_bank']) ?> value="<?= $j['id_bank'] ?>">
                                    <?= $j['nama_bank'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('bank_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 2 -->

                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="klaim_id">ID Klaim</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input readonly value="<?= set_value('klaim_id'); ?>" name="klaim_id" id="klaim_id"
                                type="text" class="form-control" placeholder="ID Klaim...">
                        </div>
                        <?= form_error('klaim_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="no_rek">No. Rekening</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('no_rek'); ?>" name="no_rek" id="no_rek" type="text"
                                class="form-control" placeholder="No. Rekening...">
                        </div>
                        <?= form_error('no_rek', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 3 -->

                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="nama">Nama Karyawan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input readonly value="<?= set_value('nama'); ?>" name="nama" id="nama" type="text"
                                class="form-control" placeholder="Nama Karyawan...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="amount">Amount</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input readonly value="<?= set_value('amount'); ?>" name="amount" id="amount" type="text"
                                class="form-control" placeholder="Nama Karyawan...">
                        </div>
                        <?= form_error('amount', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <!-- <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <input value="0" name="status" id="status" type="hidden" class="form-control">
                    </div> -->
                </div>

                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="description">Description </label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-info"></i>
                                </span>
                            </div>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="Description ..."><?= set_value('description'); ?></textarea>
                        </div>
                        <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
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

<!-- Modal Klaim -->
<div class="modal fade" id="reimburstment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Request Reimburse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th>No. Acc</th>
                            <th>ID Klaim</th>
                            <th>Nama</th>
                            <th>Deptartement</th>
                            <th>Jabatan</th>
                            <th>Jenis Klaim</th>
                            <th>Amount</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $request = $this->db->query(
                            "SELECT a.no_acc, a.klaim_id, a.nama, c.nama_departement, d.nama_jabatan, e.nama_jenis_klaim, a.amount, a.status
                            FROM request_reimburse a
                            INNER JOIN klaim b ON a.klaim_id = b.id_klaim
                            INNER JOIN departement c ON b.departement_id = c.id_departement
                            INNER JOIN jabatan d ON  b.jabatan_id = d.id_jabatan
                            INNER JOIN jenis_klaim e ON b.jenis_klaim_id =  e.id_jenis_klaim
                            WHERE a.status = 0"
                        );

                        foreach ($request ->result() as $r) : ?>
                        <tr>
                            <td><?= $r->no_acc; ?></td>
                            <td><?= $r->klaim_id; ?></td>
                            <td><?= $r->nama; ?></td>
                            <td><?= $r->nama_departement; ?></td>
                            <td><?= $r->nama_jabatan; ?></td>
                            <td><?= $r->nama_jenis_klaim; ?></td>
                            <td><?= $r->amount; ?></td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-primary" id="select_reimburse"
                                    data-id="<?= $r->no_acc; ?>" data-klaim_id="<?= $r->klaim_id; ?>"
                                    data-nama="<?= $r->nama; ?>" data-amount="<?= $r->amount; ?>">
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