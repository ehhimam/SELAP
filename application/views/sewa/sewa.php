
<div class="container">
  <!--Section: Block Content-->
<?= form_open_multipart('index.php/sewa/order'); ?>
  <section>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-8 mb-4">
        
        <!-- Card -->
        <div class="card wish-list pb-1">
          <div class="card-body">

            <h5 class="mb-3"><?= $judul; ?></h5>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-12">

                <!-- First name -->
                <div class="md-form md-outline mb-0 mb-lg-4">
                  <label for="firstName">Judul Lapangan</label>
                  <input type="text" class="form-control mb-0 mb-lg-2" id="judul" name="judul" value="<?= $sewa['judul_lap_futsal']; ?>" readonly>
                  <input type="hidden" id="id_penyedia" name="id_penyedia" value="<?= $sewa['id_penyedia']; ?>" class="form-control">

                  <input type="hidden" id="kategori" name="kategori" value="<?= $sewa['kategori']; ?>" class="form-control">

                  <input type="hidden" id="id_lapangan" name="id_lapangan" value="<?= $sewa['id_futsal']; ?>" class="form-control">
                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Company name -->
            <div class="md-form md-outline my-0 mb-lg-4">
              <label for="companyName">Harga per jam</label>
              <input type="text" id="harga" name="harga" class="form-control mb-0" value="<?= $sewa['harga']; ?>" readonly>
              
            </div>

            <!-- Address Part 1 -->
            <div class="md-form md-outline mt-0 mb-lg-4">
              <label for="form14">Alamat Lapangan</label>
              <input type="text" id="alamat" name="alamat" value="<?= $sewa['alamat']; ?>" class="form-control" readonly>
              
            </div>

            <!-- Address Part 2 -->
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pilih lama bermain!</label>
              <select class="form-control" name="waktu" id="waktu" onclick="jam()">
                <option value=''>Silahkan pilih lamanya bermain</option>
                <?php for ($i=1; $i < 4 ; $i++) { 
                  echo "<option value='$i'>$i Jam</option>";
                } ?>
                
                
              </select>
            </div>
            <!-- Postcode / ZIP -->
            <div class="md-form md-outline mb-lg-4">
              <label for="form16">Tanggal Main</label>
              <input type="date" id="tgl_main" name="tgl_main" class="form-control">
              
            </div>

            <!-- Town / City -->
            <div class="md-form md-outline mb-lg-4">
              <label for="form17">Jam Main</label>
              <input type="time" id="jam_main" name="jam_main" class="form-control">
              
            </div>

          </div>
        </div>
        <!-- Card -->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4">

        <!-- Card -->
        <div class="card mb-4">
          <div class="card-body">

            <h5 class="mb-3">Total yang harus dibayar!</h5>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Harga Lapangan per jam
                <span>Rp<?= $sewa['harga']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Lama bermain  (jam)
                <span id="wkwk"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total yang harus dibayar</strong>
                </div>
                <span><strong ><input type="text" name="total" id="total" value="" class="form-control input-sm text-right" readonly></strong></span>
              </li>
            </ul>

            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Bayar Sekarang!</button>

          </div>
        </div>
        <!-- Card -->

        <!-- Card -->
        <div class="card mb-4">
          <div class="card-body">

            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
              aria-expanded="false" aria-controls="collapseExample">
              Masukkan kodo promo (jika ada)
              <span><i class="fas fa-chevron-down pt-1"></i></span>
            </a>

            <div class="collapse" id="collapseExample">
              <div class="mt-3">
                <div class="md-form md-outline mb-0">
                  <input type="text" id="discount-code" class="form-control font-weight-light"
                    placeholder="Masukkan kode promo disini (jika ada)">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
    
  </section>
</form>
<!--Section: Block Content-->
</div>

<script>
  function jam()
  {
    var lama = document.getElementById("waktu").value;
    var jumlah = document.getElementById("harga").value;

    var xxx = lama * jumlah;

    document.getElementById("total").value=xxx;
    document.getElementById("wkwk").innerHTML=lama;
  }


</script>
