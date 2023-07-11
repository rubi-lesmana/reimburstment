<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Customer
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('customer') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_customer">ID Customer</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_customer', $id_customer); ?>" name="id_customer" id="id_customer" type="text" class="form-control" placeholder="ID Customer ...">
                        <?= form_error('id_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_customer">Nama Customer</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_customer'); ?>" name="nama_customer" id="nama_customer" type="text" class="form-control" placeholder="Nama Cust ...">
                        <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="alamat">Alamat</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('alamat'); ?>" name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat ...">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_telp">No. Telp</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_telp'); ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="downpayment ...">
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_unit">Nama Customer</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="leasing_id" id="leasing_id" class="custom-select">
                                <option value="" selected disabled>Pilih Leasing</option>
                                <?php foreach ($leasing as $l) : ?>
                                    <option <?= $this->uri->segment(3) == $l['id_leasing'] ? 'selected' : '';  ?> <?= set_select('leasing_id', $l['id_leasing']) ?> value="<?= $l['id_leasing'] ?>"><?= $l['id_leasing'] . ' | ' . $l['nama_leasing'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('leasing_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="unit_id">Nama Unit</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="unit_id" id="unit_id" class="custom-select">
                                <option value="" selected disabled>Pilih Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option <?= $this->uri->segment(3) == $u['id_unit'] ? 'selected' : '';  ?> <?= set_select('unit_id', $u['id_unit']) ?> value="<?= $u['id_unit'] ?>"><?= $u['id_unit'] . ' | ' . $u['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('unit_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="unit_id">Warna</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="unit_id" id="unit_id" class="custom-select">
                                <option value="" selected disabled>Pilih Warma</option>
                                <?php foreach ($warna as $w) : ?>
                                    <option <?= $this->uri->segment(3) == $w['id_warna'] ? 'selected' : '';  ?> <?= set_select('warna_id', $w['id_warna']) ?> value="<?= $w['id_warna'] ?>"><?= $w['id_warna'] . ' | ' . $w['nama_warna'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('unit_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_rangka">No. Rangka</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_rangka'); ?>" name="no_rangka" id="no_rangka" type="text" class="form-control" placeholder="No Rangka ...">
                        <?= form_error('no_rangka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_mesin">No. Mesin</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_mesin'); ?>" name="no_mesin" id="no_mesin" type="text" class="form-control" placeholder="No. Mesin ...">
                        <?= form_error('no_mesin', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="downpayment">Downpayment</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('downpayment'); ?>" name="downpayment" id="downpayment" type="text" class="form-control" placeholder="Downpayment ...">
                        <?= form_error('downpayment', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>