

                <!-- Begin Page Content -->
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
                        <?php foreach ($data_lapangan as $key) : ?>
                        <div class="col-md-6">
                            <div class="card mb-3" >
                              <div class="row no-gutters">
                                <div class="col">
                                  <img src="<?= $key['gambar']; ?>" class="card-img" alt="..." class="card-img" style="height: 255px;object-fit: cover;">
                                </div>
                                <div class="col">
                                  <div class="card-body">
                                    <h5 class="card-title"><?= $key['judul_lap_futsal']; ?></h5>
                                    <p class="card-text">Rp<?= $key['harga']; ?> /jam</p>
                                    <p class="card-text">Alamat: <?= $key['alamat']; ?> /jam</p>
                                    <p class="card-text">Pemilik: <?= $key['posted_by']; ?></p>
                                    
                                     <div class="">
                                        <a href="detail_badminton/<?= $key['id_futsal']; ?>" class="btn btn-primary">Lihat Detail!</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      <?php endforeach; ?>

                         

                        
                    </div>

                    

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
