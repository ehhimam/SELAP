
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    <div class="row">
                    	<div class="col-lg-8">
                    		<?= form_open_multipart('index.php/user/edit_profile'); ?>
	                    		<div class="form-group row">
								    <label for="email" class="col-sm-2 col-form-label">Email</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="email" name="email" value="<?= $user['email_user']; ?>" readonly>
								    </div>
								 </div>

								 <div class="form-group row">
								    <label for="name" class="col-sm-2 col-form-label">Name</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama_user']; ?>">
								    	 <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								 </div>

								 <div class="form-group row">
								    <label for="nohp" class="col-sm-2 col-form-label">No HP</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['nohp_user']; ?>" readonly>
								    	 <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								 </div>

								 <div class="form-group row">
								    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
								    <div class="col-sm-10">
								    	 <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat_user']; ?>">
								    	 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								 </div>

								 <div class="form-group row">
								   <div class="col-sm-2">Image</div>
									   	<div class="col-sm-10">
										   	<div class="row">
										   		<div class="col-sm-3">
										   			<img src="<?= base_url('assets/img/profile/') . $user['gambar_user']; ?>" class="img-thumnail" width="150" height="150">
										   		</div>
										   		<div class="col-sm-9">
										   			<div class="custom-file">
													  <input type="file"  id="profile" name="profile">
													  
													</div>
										   		</div>
										   	</div>
									   </div>
								 </div>
								 <div class="form-group row">
								 	<div class="col-sm-10">
								 		<button type="submit" class="btn btn-primary">Save</button>
								 	</div>
								 </div>
                    			
                    		</form>
                    	</div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
