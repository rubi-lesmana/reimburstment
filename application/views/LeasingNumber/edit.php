<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Form Edit Leasing Number
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('LeasingNumber') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_unit">ID Leasing Number</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_unit', $ln['id_ln']); ?>" name="id_ln" id="id_ln" readonly="readonly" type="text" class="form-control" placeholder="ID Leasing Number...">
                        <?= form_error('id_leasing', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_id">Nama Leasing</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="custom-select">
                                <option value="" selected disabled>Pilih Leasing</option>
                                <?php foreach ($leasing as $l) : ?>
                                    <option <?= $leasing['leasing_id'] == $l['id_leasing'] ? 'selected' : ''; ?> <?= set_select('leasing_id', $l['id_leasing']) ?> value="<?= $l['id_leasing'] ?>"><?= $l['nama_leasing'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('leasing_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="satuan_id">Nama Unit</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="satuan_id" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option <?= $unit['unit_id'] == $u['id_unit'] ? 'selected' : ''; ?> <?= set_select('unit_id', $u['id_unit']) ?> value="<?= $u['id_unit'] ?>"><?= $u['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="harga">Harga</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('harga', $ln['harga']); ?>" name="harga" id="harga" type="text" class="form-control" placeholder="Harga ...">
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>