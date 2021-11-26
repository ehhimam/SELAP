

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?= $this->session->userdata('pesan'); ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID PENARIKAN</th>
                                            <th>NAMA PENARIK</th>
                                            <th>JUMLAH</th>
                                            <th>METODE</th>
                                            <th>REKENING</th>
                                            <th>TGL TARIK</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php $i=1; ?>
                                       <?php foreach($penarikan as $aa): ?>
                                       <tr>
                                            <td><?= $i; ?></td>
                                            <td>#00<?= $aa['id_penarikan']; ?></td>
                                            <td><?= $aa['nama_lengkap']; ?></td>
                                            <td>
                                                <?= $aa['jumlah_penarikan'];?>   
                                            </td>
                                            <td><?= $aa['metode_penarikan']; ?></td>
                                            <td><?= $aa['rekening_penarikan']; ?></td>
                                            <td><?= date("d F Y", $aa['rekening_penarikan'] );?></td>
                                            <td>

                                            	<a href="terima/<?= $aa['id_penarikan']; ?>" class="btn btn-primary">Terima! </a>
                                            	
                                                <a href="batal/<?= $aa['id_penarikan']; ?>" class="btn btn-danger">Batal! </a>
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

             
