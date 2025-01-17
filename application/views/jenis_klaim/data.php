<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Jenis Klaim
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('JenisKlaim/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Jenis Klaim
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Jenis Klaim</th>
                    <th>Nama Jenis Klaim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($jenis_klaim) :
                    foreach ($jenis_klaim as $ls) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ls['id_jenis_klaim']; ?></td>
                    <td><?= $ls['nama_jenis_klaim']; ?></td>
                    <td>
                        <a href="<?= base_url('jenisKlaim/edit/') . $ls['id_jenis_klaim'] ?>"
                            class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')"
                            href="<?= base_url('jenisKlaim/delete/') . $ls['id_jenis_klaim'] ?>"
                            class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">
                        Data Kosong
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>