

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?= $this->session->userdata('pesan'); ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-6">
                            <div class="card mb-3" >
                              <div class="row no-gutters">
                                <div class="col">
                                  <img src="<?= base_url('assets/img/futsal.jpg'); ?>" class="card-img" alt="...">
                                </div>
                                <div class="col">
                                  <div class="card-body">
                                    <h5 class="card-title">Sewa Lapangan Futsal</h5>
                                    <p class="card-text">Tersedia 80 Lapangan</p>
                                    
                                     <div class="">
                                        <a href="sewa/futsal" class="btn btn-primary">Sewa Sekarang!</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                         <div class="col-xl-6">
                            <div class="card mb-3">
                              <div class="row no-gutters">
                                <div class="col">
                                  <img src="<?= base_url('assets/img/bd.jpg'); ?>" class="card-img" style="height: 255px;object-fit: cover;">
                                </div>
                                <div class="col">
                                  <div class="card-body">
                                    <h5 class="card-title">Sewa Lapangan Badminton</h5>
                                    <p class="card-text">Tersedia 80 Lapangan</p>
                                    <div class="">
                                        <a href="sewa/badminton" class="btn btn-primary">Sewa Sekarang!</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        

                        
                    </div>

                    

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
