<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Departement
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('departement') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="id_departement">ID Departement</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_departement', $departement['id_departement']); ?>"
                            name="id_departement" id="id_departement" readonly="readonly" type="text"
                            class="form-control" placeholder="ID RO...">
                        <?= form_error('id_departement', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_departement">Nama Departement</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_departement', $departement['nama_departement']); ?>"
                            name="nama_departement" id="nama_departement" type="text" class="form-control"
                            placeholder="Nama Departement...">
                        <?= form_error('nama_departement', '<small class="text-danger">', '</small>'); ?>
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