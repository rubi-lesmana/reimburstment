<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Leasing
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('leasing') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_leasing">ID Leasing</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_leasing', $id_leasing); ?>" name="id_leasing" id="id_leasing" type="text" class="form-control" placeholder="ID Leasing ...">
                        <?= form_error('id_leasing', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_leasing">Nama Leasing</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_leasing'); ?>" name="nama_leasing" id="nama_leasing" type="text" class="form-control" placeholder="Nama Leasing...">
                        <?= form_error('nama_leasing', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="alamat">Alamat</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <textarea value="<?= set_value('alamat'); ?>" name="alamat" id="alamat" class="form-control" rows="3" placeholder="alamat..."><?= set_value('alamat'); ?></textarea>
                        </div>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
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