<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Unit
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('unit') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_unit' => $unit['id_unit']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_unit">ID Unit</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_unit', $unit['id_unit']); ?>" name="id_unit" id="id_unit" readonly="readonly" type="text" class="form-control" placeholder="ID RO...">
                        <?= form_error('id_unit', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_unit">Nama Unit</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_unit', $unit['nama_unit']); ?>" name="nama_unit" id="nama_unit" type="text" class="form-control" placeholder="Nama Unit ...">
                        <?= form_error('nama_unit', '<small class="text-danger">', '</small>'); ?>
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