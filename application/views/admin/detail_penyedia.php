 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card p-3 shadow h-100 py-2">



                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Penyedia</label>
                                  <input type="text" class="form-control" value="<?= $view_penyedia['nama_penyedia']; ?>" readonly>
                                  
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Email Penyedia</label>
                                  <input type="text" class="form-control" value="<?= $view_penyedia['email_penyedia']; ?>" readonly>

                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Nomor HP Penyedia!</label>
                                  <input type="text" class="form-control" value="<?= $view_penyedia['nohp_penyedia']; ?>" readonly>

                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Alamat Penyedia</label>
                                  <input type="text" class="form-control" value="<?= $view_penyedia['alamat_penyedia']; ?>" readonly>

                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                                  <input type="text" class="form-control" value="<?= $view_penyedia['tgl_lahir']; ?>" readonly>

                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1" class="d-flex">KTP</label>
                                  <img src="<?= $view_penyedia['ktp']; ?>" style="width: 277px;height: 182px">
                                </div>
                            </div>
                        </div>
                    </div>