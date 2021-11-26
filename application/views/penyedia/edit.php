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

                              <?= $this->session->userdata('pesan'); ?>

                               <?= form_open_multipart('index.php/penyedia/update'); ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Judul Lapangan</label>
                                  <input type="text" class="form-control" id="judul" name="judul" value="<?= $data_lapangan['judul_lap_futsal']; ?>">
                                  <?= form_error('judul', ' <small class="text-danger pl-1">', '</small>'); ?>
                                  
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Harga Per Jam</label>
                                  <input type="number" class="form-control" id="harga" name="harga" value="<?= $data_lapangan['harga']; ?>">
                                  <?= form_error('harga', ' <small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Pilih Jenis Lapangan</label>
                                  <select class="custom-select" name="kategori">
                                    <option selected value="<?= $data_lapangan['kategori']; ?>"><?= $data_lapangan['kategori']; ?></option>
                                    <option>Pilih Lapangan</option>
                                    <option value="Futsal">Futsal</option>
                                    <option value="Badminton">Badminton</option>
                                  </select>
                                  <?= form_error('kategori', ' <small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Alamat Lapangan</label>
                                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data_lapangan['alamat']; ?>">
                                  <?= form_error('alamat', ' <small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                  <input type="hidden" name="gambarlama" value="<?= $data_lapangan['gambar']; ?>">
                                </div>

                                <div class="form-group">
                                  <img src="<?= $data_lapangan['gambar']; ?>" width="150" height="150">
                                  <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>

                                <div class="form-group">
                                  <label>Keterangan Mengenai Lapangan!</label>
                                  <textarea id="editor" name="keterangan" ><?= $data_lapangan['keterangan']; ?></textarea>
                                  <?= form_error('keterangan', ' <small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $data_lapangan['id_futsal']; ?>">

                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                        </div>
                    </div>