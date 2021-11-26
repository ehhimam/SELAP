

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Penyedia!</h6>
                            <?= $this->session->userdata('pesan'); ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Penyedia</th>
                                            <th>Email</th>
                                            <th>Nohp</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($daftar_user as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><img src="<?= base_url(); ?>assets/img/undraw_profile.svg" width="50" height="50"></td>
                                            <td><?= $aa['nama_user']; ?></td>
                                            <td><?= $aa['email_user']; ?></td>
                                            <td>
                                                <?= $aa['nohp_user'];?>   
                                            </td>
                                            <td><?= $aa['alamat_user']; ?></td>
                                            <td>
                                                <a href="hapus_user/<?= $aa['id_user']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#wkwk"><i class="fa fa-trash"></i> Hapus</a>
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
             <div class="modal fade" id="wkwk" tabindex="-1" role="dialog" aria-labelledby="wkwk"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">Yakin ingin menghapus user ini!</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal!</button>
                                <a class="btn btn-primary" href="hapus_user/<?= $aa['id_user']; ?>">yakin!</a>
                            </div>
                        </div>
                    </div>
                </div>

             
