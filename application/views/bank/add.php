<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Bank
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('bank') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_bank">ID bank</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_bank', $id_bank); ?>" name="id_bank" id="id_bank"
                            type="text" class="form-control" placeholder="ID bank ...">
                        <?= form_error('id_bank', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_bank">Nama bank</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_bank'); ?>" name="nama_bank" id="nama_bank" type="text"
                            class="form-control" placeholder="Nama bank">
                        <?= form_error('nama_bank', '<small class="text-danger">', '</small>'); ?>
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