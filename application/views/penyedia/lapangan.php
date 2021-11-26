

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
                    <p class="mb-4">Data dibawah berisikan semua lapangan yang bernah anda buat sebelumnya!.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar lapangan anda!</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Lapangan</th>
                                            <th>Harga Per Jam</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($data_lapangan as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><img src="<?= $aa['gambar']; ?>" width="50" height="50"></td>
                                            <td><?= $aa['judul_lap_futsal']; ?></td>
                                            <td><?= $aa['harga']; ?></td>
                                            <td>
                                                <?= $aa['kategori'];?>   
                                            </td>
                                            <td>
                                                <a href="lihat_lapangan/<?= $aa['id_futsal'];?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="edit_lapangan/<?= $aa['id_futsal'];?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                                <a href="delete/<?= $aa['id_futsal'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                          
                                        <?php $i++; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
