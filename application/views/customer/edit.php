<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Customer
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
                    <label class="col-md-2" for="id_customer">ID Cust</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('id_customer', $cust['id_customer']); ?>" name="id_customer" id="id_customer" readonly="readonly" type="text" class="form-control" placeholder="ID Cust...">
                        <?= form_error('id_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="unit_id">Nama Unit</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="unit_id" id="unit_id" class="custom-select">
                                <option value="" selected disabled>Pilih Unit</option>
                                <?php foreach ($unit as $d) : ?>
                                    <option <?= $cust['unit_id'] == $d['id_unit'] ? 'selected' : ''; ?> <?= set_select('unit_id', $d['id_unit']) ?> value="<?= $d['id_unit'] ?>"><?= $d['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('unit_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutu row 1 -->

                <div class="row form-group">
                    <label class="col-md-2" for="nama_customer">Nama</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('nama_customer', $cust['nama_customer']); ?>" name="nama_customer" id="nama_customer" type="text" class="form-control" placeholder="Nama Customer...">
                        <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="warna_id">Warna</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="warna_id" id="warna_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($warna as $b) : ?>
                                    <option <?= $cust['warna_id'] == $b['id_warna'] ? 'selected' : ''; ?> <?= set_select('warna_id', $b['id_warna']) ?> value="<?= $b['id_warna'] ?>"><?= $b['nama_warna'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('no_rangka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 2 -->

                <div class="row form-group">
                    <label class="col-md-2" for="nama_leasing">Alamat</label>
                    <div class="col-md-4">
                        <textarea value="<?= set_value('alamat', $cust['alamat']); ?>" name="alamat" id="alamat" type="text" rows="2" class="form-control" placeholder="Nama Barang..."><?= set_value('alamat', $cust['alamat']); ?></textarea>
                        <?= form_error('nama_leasing', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="no_rangka">No. Rangka</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('no_rangka', $cust['no_rangka']); ?>" name="no_rangka" id="no_rangka" type="number" class="form-control" placeholder="No Rangka ...">
                        <?= form_error('no_rangka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 3 -->

                <div class="row form-group">
                    <label class="col-md-2" for="no_telp">No. Telp</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('no_telp', $cust['no_telp']); ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="No. Telp...">
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="no_mesin">No. Mesin</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('no_mesin', $cust['no_mesin']); ?>" name="no_mesin" id="no_mesin" type="number" class="form-control" placeholder="No Mesin ...">
                        <?= form_error('no_mesin', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- rows 4 -->
                <div class="row form-group">
                    <label class="col-md-2" for="downpayment">Downpayment</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('downpayment', $cust['downpayment']); ?>" name="downpayment" id="downpayment" type="number" class="form-control" placeholder="Downpayment ...">
                        <?= form_error('downpayment', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>