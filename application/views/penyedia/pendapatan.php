

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="mb-4">
                       <?= $this->session->userdata('pesan'); ?>
                       <?= $this->session->userdata('kurang'); ?>
                        <div class="row px-2 mb-2 text-center">
                          <?php $k = $allsewa - $jumlah_tarik; ?>
                            <div class="col-6 px-2">
                                <div class="card card-body text-white" style="background-color: #334155!important">
                                    <div class="h4 text-main font-weight-semibold">Rp <?= $k; ?></div>
                                    <div>Total Pendapatan!</div>
                                </div>
                            </div>
                            <div class="col-6 px-2">
                                <div class="card card-body text-white" style="background-color: #334155!important">
                                    <div class="h4 text-main font-weight-semibold">Rp <?= $jumlah_tarik; ?></div>
                                    <div>Total penarikan!</div>
                                </div>
                            </div>
                            <div class="col-12 px-2 mt-3">
                                <div class="card card-body text-white" style="background-color: #334155!important">
                                    <div class="h4 text-main font-weight-semibold btn btn-primary" data-toggle="modal" data-target="#tarik">Tarik dana!</div>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <p><b>Riwayat penarikan!</b></p>
                    <?php foreach ($penarikan as $www): ?>
                    <div class="card card-body mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div style="line-height:20px">
                                <div class="font-weight-semibold">#00<?= $www['id_penarikan']; ?></div>
                                <small class="text-muted"><?= date('d F Y', $www['tgl_penarikan']); ?></small>
                            </div>
                            <h5>
                              
                              <?php 
                              $jika = $www['status_penarikan'];

                              if ($jika == 'Diproses') {
                                echo "<span class='badge badge-primary'>Diproses!</span>";
                              }  elseif ($jika == 'Selesai') {
                                echo "<span class='badge badge-success'>Sukses!</span>";
                              } else {
                                echo "<span class='badge badge-danger'>Ditolak!</span>";
                              }

                               ?>
                                
                              </h5>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h3 mb-0">
                                <b data-toggle="tooltip" data-html="true" title="">Rp <?= $www['jumlah_penarikan']; ?></b>
                            </div>

                            <div class="d-flex">
                                <button class="btn btn-sm btn-default" data-toggle="collapse" data-target="#withdraw-note-3377">

                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>

                                </button>
                            </div>
                        </div>

                        <div><?= $www['metode_penarikan']; ?> - <?= $www['rekening_penarikan']; ?></div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <!-- /.container-fluid -->

           
            <!-- End of Main Content -->


                <div class="modal fade" id="tarik" tabindex="-1" role="dialog" aria-labelledby="tarik" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tarik">Permintaan penarikan dana!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= base_url('index.php/penyedia/tarik_dana'); ?>" method="POST">
                          <div class="modal-body">

                            <div class="form-group">
                                <label for="jumlah">Masukkan Nama Lengkap!</label>
                                <input type="text" class="form-control" id="lengkap" name="lengkap" placeholder="Masukkan nama lengkap" required="">
                                
                             </div>
                           
                            <div class="form-group">
                                <label for="jumlah">Masukkan jumlah penarikan!</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Minimal penarikan Rp 500.000.-">
                             </div>

                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Metode Penarikan!</label>
                                <select class="form-control" id="metode" name="metode">
                                  <option disabled="">Pilih metode penarikan!</option>
                                  <option value="BANK BNI">BANK BNI</option>
                                  <option value="BANK BRI">BANK BRI</option>
                                  <option value="OVO">OVO</option>
                                  <option value="GOPAY">GOPAY</option>
                                  <option value="DANA">DANA</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="jumlah">Masukkan Nomor rekening/e-wallet!</label>
                                <input type="text" class="form-control" id="rek" name="rek" placeholder="Masukkan nomor rekening bank/nomor e-wallet " required>


                             </div>

                             <p class="alert alert-danger">Pastikan semua data telah diisi dengan benar! Jika ada kesalahan saat menginput maka bukan tanggung jawab kami!</p>
                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tarik dana sekarang!</button>
                          </div>
                       </form>
                    </div>
                  </div>
                </div>