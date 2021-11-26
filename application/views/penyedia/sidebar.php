
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SELAP </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('index.php/penyedia'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/penyedia/lapangan'); ?>">
                    <i class="fas fa-fw fa-circle"></i>
                    <span>Lapangan Saya</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/penyedia/tambah'); ?>">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Tambah Lapangan</span></a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/penyedia/allsewa'); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Daftar Sewa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/penyedia/pendapatan'); ?>">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Pendapatan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bantuan Layanan
            </div>

             <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Bantuan Admin</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->