<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Jenis Klaim
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('jenis_klaim') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_jenis_klaim">ID Jenis Klaim</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_jenis_klaim', $jenis_klaim['id_jenis_klaim']); ?>"
                            name="id_jenis_klaim" id="id_jenis_klaim" readonly="readonly" type="text"
                            class="form-control" placeholder="ID Jenis Klaim">
                        <?= form_error('id_jenis_klaim', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_jenis_klaim">Nama Jenis Klaim</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_jenis_klaim', $jenis_klaim['nama_jenis_klaim']); ?>"
                            name="nama_jenis_klaim" id="nama_jenis_klaim" type="text" class="form-control"
                            placeholder="Nama Jenis Klaim">
                        <?= form_error('nama_jenis_klaim', '<small class="text-danger">', '</small>'); ?>
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