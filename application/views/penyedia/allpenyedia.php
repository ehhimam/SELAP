

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
                                            <th>KTP</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($daftar_penyedia as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><img src="<?= base_url(); ?>assets/img/undraw_profile.svg" width="50" height="50"></td>
                                            <td><?= $aa['nama_penyedia']; ?></td>
                                            <td><?= $aa['email_penyedia']; ?></td>
                                            <td>
                                                <?= $aa['nohp_penyedia'];?>   
                                            </td>
                                            <td><?= $aa['alamat_penyedia']; ?></td>
                                            <td>
                                                <a href="<?= $aa['ktp']; ?>" target="_blank" class="btn btn-primary">Lihat KTP</a></td>
                                            <td>
                                                <a href="view_penyedia/<?= $aa['id_penyedia']; ?>" class="btn btn-primary"><i class="fa fa-eye" ></i></a>


                                                <a href="hapus_penyedia/<?= $aa['id_penyedia']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></a>
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
           <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapus">Yakin ingin hapus?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="hapus_penyedia/<?= $aa['id_penyedia']; ?>">Hapus</a>
                      </div>

                </div>
              </div>
            </div>

           

             
