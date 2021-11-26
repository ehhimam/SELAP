

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Silahkan cetak bukti pembayaran sebagai bukti telah melakukan pembayaran!</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Jumlah</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($riwayat as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $aa['nama_lapangan']; ?></td>
                                            <td><?= $aa['jumlah_pembayaran']; ?></td>
                                            <td>
                                                <?= $aa['metode_pembayaran'];?>   
                                            </td>
                                            <td> 

                                                <?php if($aa['status_pembayaran'] == 'Lunas!') {
                                                    echo "<a class='badge badge-success'>Lunas!</a>";
                                                } else {
                                                    echo "<a class='badge badge-danger'>Belum Lunas!</a>";
                                                }

                                                 ?>

                                            </td>
                                            <td>

                                                <?php if ($aa['status_pembayaran'] == 'Lunas!'): ?>
                                                    <a href="cetak/pdf/<?= $aa['id_sewa']; ?>" class='btn btn-success'>Cetak!</a>
                                                <?php endif ?>

                                                 <?php if ($aa['status_pembayaran'] == 'Belum Bayar!'): ?>
                                                    <a href="sewa/bayar_coy/<?= $aa['id_sewa']; ?>" class='btn btn-danger'>Bayar!</a>
                                                    <a href="sewa/batal_sewa/<?= $aa['id_sewa']; ?>" class='btn btn-secondary' onclick="return confirm('Yakin ingin batal sewa lapangan!?');">Batal!</a>
                                                <?php endif ?>
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


