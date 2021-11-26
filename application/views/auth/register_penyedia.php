<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Penyedia Lapangan!</h1>
                        </div>
                        
                        <?= $this->session->flashdata('pesan'); ?>

                        <?= form_open_multipart('index.php/auth/register_penyedia'); ?>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Masukkan nama lengkap..." value="<?= set_value('name');?>">
                               <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email.." value="<?= set_value('email');?>">
                                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Masukkan Nomor HP.." value="<?= set_value('nohp');?>">
                                <?= form_error('nohp', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat.." value="<?= set_value('alamat');?>">
                                <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>

                            <small class="text-primary pl-3">Masukkan Tanggal Lahir</small>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="lahir" name="lahir" value="<?= set_value('lahir');?>">
                                <?= form_error('lahir', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                             <small class="text-primary pl-3">Upload Foto KTP!</small>
                            <div class="form-group">
                                <input type="file" class="form-control" id="ktp" name="ktp" required>
                                <?= form_error('ktp', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Buat Sekarang!
                            </button>
                        <?= form_close(); ?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>">Sudah memiliki akun? Login Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>