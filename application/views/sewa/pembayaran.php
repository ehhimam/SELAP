<link rel="stylesheet" type="text/css" href="https://tokofredi.com/assets/css/style.css">
<div class="container-fluid">
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <?= form_open_multipart('index.php/sewa/pembayaran'); ?>
                <div class="row">                           
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <div class="text-center position-absolute circle-primary">1</div><h5 style="margin-left: 40px;">Data Pesanan!</h5>
                                        <hr>
                                      
                                        <div class="form-row mt-4">
                                            <div class="col">
                                            <label>Judul Lapangan</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $bayar['nama_lapangan']; ?>" readonly>
                                                <label class="mt-3">Alamat Lapangan</label>
                                                <input type="text" class="form-control" name="alanat" id="alanat" value="<?= $bayar['alamat_lapangan']; ?>" readonly>
                                                
                                                <label class="mt-3">Lama Main</label>
                                                <input type="text" class="form-control" name="lama" id="lama"value="<?= $bayar['lama_sewa']; ?>" readonly>
                                                
                                                <label class="mt-3">Total yang harus dibayar!</label>
                                                <input type="text" class="form-control" name="total" id="total" value="<?= $bayar['bayar_sewa']; ?>" readonly>

                                                <input type="hidden" class="form-control" name="id_p" id="id_p" value="<?= $bayar['id_penyedia']; ?>">
                                                
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                               
                    </div>
                    <div id="note"></div>
                        
                        
                        <div class="col-12 mb-3">
                            <div class="card">
                            <div class="card-body">
                                <div class=" text-center position-absolute circle-primary">2</div>
                                <h5 style="margin-left: 40px;">Pilih metode pembayaran</h5>
                                <hr>
                                <div class="mt-4">
                                    <div class="methods">
                                        <input class="mtdbtn" type="radio" id="metode1" name="metode" value="BANK BNI">

                                        <label class="mtdlabel" for="metode1" onclick="metode1()" >
                                            <img src="assets/img/bca.png" class="img-fluid">
                                            <p class="float-right">
                                                <span class="badge badge-success" id="BCA">Rp <?= $bayar['bayar_sewa']; ?></span>
                                            </p>
                                        </label>

                                        <input class="mtdbtn" type="radio" id="metode2" name="metode" value="OVO/GOPAY/DANA/SHOPEEPAY/LINK-AJA" >

                                        <label class="mtdlabel" for="metode2" onclick="metode2()" >
                                            <img src="https://i.ibb.co/CQdrC97/003-AC0-A6-2-F9-E-45-E3-96-C1-7-FE3-FFD4-ECEE.png" class="img-fluid">
                                            <p class="float-right">
                                            <span class="badge badge-success" id="QRIS">Rp <?= $bayar['bayar_sewa']; ?></span>
                                            </p>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                <div class="text-center position-absolute circle-primary">4</div>
                                <h5 style="margin-left: 40px;">Silahkan tranfer ke data berikut sesuai dengan jumlah nominal yang tertera!</h5>
                                    <hr><div class="mt-4">
                                       <input type="text" class="form-control" name="payment" id="payment" value="" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-white">
                                <input type="hidden" name="id_sewa" value="<?= $bayar['id_sewa']; ?>">
                                <input type="hidden" name="penyewa" value="<?= $user['nama_user']; ?>">
                                

                            </div>
                           
                        </div>
                        
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                <div class=" text-center position-absolute circle-primary">5</div>
                                <h5 style="margin-left: 40px;">Upload Bukti pembayaran!</h5>
                                    <hr><div class="mt-4">
                                        <input type="file" class="form-control" name="bukti" id="bukti">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="alert alert-danger" role="alert">
                              <i class="fa fa-exclamation-circle"> Pastikan untuk mengupload bukti pembayaran sebagai bukti, jika tidak diupload maka tidak bisa diperoses untuk penyewaam!</i>
                            </div>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary mb-2">Kirim data pembayaran!</button>
                        </div>
                        <div id="ordermodal" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div id="orderdetail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
</div>
<script type="text/javascript">
    function metode1()
      {
        var bni = 'NO REK BNI: 1234567 | a/n : IMAM FATURRAHMAN';
        var metode1 = document.getElementById("payment").value=bni;
      }

      function metode2()
      {
        var emoney = 'NO E-MONEY: 089691307158 | a/n : IMAM FATURRAHMAN';
        var metode1 = document.getElementById("payment").value=emoney;
      }
</script>
</body>
</html>

</div>
