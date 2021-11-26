<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?= $detail_futsal['judul_lap_futsal']; ?></h3>

            <h6 class="card-subtitle mb-3">
              <i class="fa fa-user mr-2"> </i>Pemilik: <?= $detail_futsal['posted_by']; ?> | <i class="fa fa-clock mr-2"> </i>Jam Buka: <?= $detail_futsal['jam_buka_tutup']; ?> WIB
            </h6>

            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-6">
                    <div class="white-box text-center">
                      <img src="<?= $detail_futsal['gambar']; ?>" class="img-responsive" width="100%">
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-6">
                    <h4 class="box-title">Keterangan Lapangan:</h4>
                    <p><?= $detail_futsal['keterangan']; ?></p>
                    <h2 class="mt-5">
                        Harga:
                        <small class="text-success">Rp <?= $detail_futsal['harga']; ?> /jam</small>
                    </h2>
                    
                    
                    <h3 class="box-title mt-5">Alamat Lapangan</h3>
                    <ul class="list-unstyled">
                        <li></i><?= $detail_futsal['alamat']; ?></li>
                    </ul>

                    <a href="../booking/<?= $detail_futsal['id_futsal']; ?>" class="btn btn-primary">Sewa sekarang!</a>
                </div>
                
            </div>
        </div>
    </div>
</div>