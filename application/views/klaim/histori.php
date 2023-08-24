<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    History Klaim Reimburstment
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Klaim</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Departement</th>
                    <th>Jabatan</th>
                    <th>Jenis Klaim</th>
                    <th>Dokumen</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query("
                    SELECT a.`id_klaim`, a.`tanggal`, a.nama, b.nama_departement, c.nama_jabatan, d.nama_jenis_klaim, a.dokumen, a.status 
                    FROM `klaim` a 
                    INNER JOIN departement b ON a.`departement_id` = b.id_departement
                    INNER JOIN jabatan c ON a.`jabatan_id`= c.id_jabatan 
                    INNER JOIN jenis_klaim d ON a.jenis_klaim_id = d.id_jenis_klaim
                    WHERE a.status = 1
                    ORDER BY a.id_klaim DESC
                ");
                $no = 1;
                if ($klaim) :
                    foreach ($sqlin->result() as $kl) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kl->id_klaim; ?></td>
                    <td><?= $kl->tanggal; ?></td>
                    <td><?= $kl->nama; ?></td>
                    <td><?= $kl->nama_departement; ?></td>
                    <td><?= $kl->nama_jabatan; ?></td>
                    <td><?= $kl->nama_jenis_klaim; ?></td>
                    <td><?= $kl->dokumen; ?></td>
                    <td>
                        <!-- <a href="<?= base_url('klaim/edit/') . $kl->id_klaim ?>"
                            class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')"
                            href="<?= base_url('klaim/delete/') . $kl->id_klaim ?>"
                            class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="<?= base_url('klaim/cetak_klaim/') . $kl->id_klaim ?>"
                            class="btn btn-success btn-circle btn-sm"><i class="fas fa-print"></i></a> -->
                        <?php
                            if ($kl->status == 0) {
                                echo "<span  class='badge bg-warning text-white'>Waiting</span>";
                            } else {
                                echo "<span  class='badge bg-danger text-white'>Approval</span>";
                            }
                        ?>
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