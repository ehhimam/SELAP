<style>

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow p-4">
                        <div class="container mt">
                          <img src="https://otakudesune.com/wp-content/uploads/2021/08/Kiss-x-Sis-1.jpg" alt="Avatar" style="width:100%;">
                          <p>Hello. How are you today?</p>
                          <span class="time-right">11:00</span>
                        </div>

                        <div class="container darker">
                          <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
                          <p>Hey! I'm fine. Thanks for asking!</p>
                          <span class="time-left">11:01</span>
                        </div>

                        <div class="container">
                          <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                          <p>Sweet! So, what do you wanna do today?</p>
                          <span class="time-right">11:02</span>
                        </div>

                        <div class="container darker">
                          <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
                          <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                          <span class="time-left">11:05</span>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


