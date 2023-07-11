<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Create Customer
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
                    <label class="col-md-6">Data Pribadi</label>
                    <label class="col-md-6">Data Unit</label>
                </div>
                <div class="row form-group">
                    <label class="col-md-2" for="id_customer">ID Customer</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('id_customer', $id_customer); ?>" type="text" readonly="readonly" class="form-control" name="id_customer">
                        <?= form_error('id_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="unit_id">Nama Unit</label>
                    <div class="col-md-4">
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
                <!-- Row 1 -->

                <div class="row form-group">
                    <label class="col-md-2" for="nama_customer">Nama Customer</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('nama_customer'); ?>" name="nama_customer" id="nama_customer" type="text" class="form-control" placeholder="Nama Customer...">
                        </div>
                        <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="warna_id">Warna</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="warna_id" id="warna_id" class="custom-select">
                                <option value="" selected disabled>Pilih Warna</option>
                                <?php foreach ($warna as $w) : ?>
                                    <option <?= $this->uri->segment(3) == $w['id_warna'] ? 'selected' : '';  ?> <?= set_select('warna_id', $w['id_warna']) ?> value="<?= $w['id_warna'] ?>"><?= $w['id_warna'] . ' | ' . $w['nama_warna'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('warna_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 2 -->

                <div class="row form-group">
                    <label class="col-md-2" for="alamat">Alamat</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <textarea value="<?= set_value('alamat'); ?>" name="alamat" id="alamat" class="form-control" rows="2" placeholder="Alamat ..."><?= set_value('alamat'); ?></textarea>
                        </div>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="no_rangka">No. Rangka</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('no_rangka'); ?>" name="no_rangka" id="no_rangka" type="number" class="form-control" placeholder="No. Rangka ...">
                        </div>
                        <?= form_error('no_rangka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 3 -->

                <div class="row form-group">
                    <label class="col-md-2" for="no_telp">No. Telp</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('no_telp'); ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="No. Telp ...">
                        </div>
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="no_mesin">No. Mesin</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('no_mesin'); ?>" name="no_mesin" id="no_mesin" type="number" class="form-control" placeholder="No. Mesin ...">
                        </div>
                        <?= form_error('no_mesin', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- row 4 -->

                <div class="row form-group">
                    <label class="col-md-2" for="downpayment">Downpayment</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('downpayment'); ?>" name="downpayment" id="downpayment" type="number" class="form-control" placeholder="Downpayment ...">
                        </div>
                        <?= form_error('downpayment', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" name="status" value="0">
                    </div>
                    <div class="col-md-2 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- row 5 -->
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>