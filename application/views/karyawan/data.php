<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Karyawan
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('karyawan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Karyawan
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
                    <th>ID Karyawan</th>
                    <th>Nama karyawan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($leasing) :
                    foreach ($leasing as $ls) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ls['id_leasing']; ?></td>
                    <td><?= $ls['nama_leasing']; ?></td>
                    <td><?= $ls['alamat']; ?></td>
                    <td>
                        <a href="<?= base_url('leasing/edit/') . $ls['id_leasing'] ?>"
                            class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')"
                            href="<?= base_url('leasing/delete/') . $ls['id_leasing'] ?>"
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