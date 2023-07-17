<!-- Outer Row -->
<div class="row justify-content-center mt-4 pt-lg-5">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <!-- <div class="card"> -->

        <div class="card-body p-lg-2 p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-6 m-auto">
                        <img src="<?= base_url(); ?>assets/img/logo_surteckariya.png" width="100%" alt="">
                        <p></p>
                    </div> -->
                <div class="col-lg-3">

                </div>
                <div class="col-lg-6 m-auto">
                    <!-- <img src="<?= base_url(); ?>assets/img/logo_surteckariya.png" width="50%" alt=""> -->
                    <div class="p-5">
                        <div class="text-center">
                            <img class="m-auto" src="<?= base_url(); ?>assets/img/logo_surteckariya1.png" width="70%"
                                alt="">
                            <h1 class="h4 text-gray-900 font-weight-bold mt-4">Login</h1>
                            <span class="text-muted">Aplikasi Reimburstment</span>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= form_open('', ['class' => 'user']); ?>
                        <div class="form-group mt-3">
                            <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>"
                                type="text" name="username" class="form-control form-control-user"
                                placeholder="Username">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                placeholder="Password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        <!-- <div class="text-center mt-4">
                            <a class="small" href="<?= base_url('register') ?>">Buat Akun!</a>
                        </div> -->
                        <div class="text-center mt-4">
                            <span class="small">Copyright &copy; PT. Surteckariya Indonesia</span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>