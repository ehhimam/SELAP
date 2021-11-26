<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $judul; ?></h1>
                                </div>

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="POST" action="<?= base_url(); ?>">
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="nohp" id="nohp" placeholder="Masukkan nomor HP untuk login..." value="<?= set_value('nohp');?>">
                                         <?= form_error('nohp', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                         <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>
                                    <div class="text-center mt-3 mb-3">
                                        <a class="small">OR</a>
                                    </div>
                                     <a href="<?= base_url('index.php/auth/login_penyedia'); ?>" class="btn btn-danger btn-user btn-block">
                                        Login Sebagai Penyedia Lapangan!
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>index.php/auth/register">Buat akun baru!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>