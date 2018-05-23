<header class="main-header">
    <!-- Logo -->
    <a href="8detailpegawai.php" class="logo">
      
      <span class="logo-lg"><b>SIGAH</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="asset/img/logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $pengunjung; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="asset/img/logo.png" class="img-circle" alt="User Image">

                <p>
                <?php echo $pengunjung; ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="8detaildatapegawai.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>           
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">     
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">KELOLA AKUN PEGAWAI</li>     
        <li><a href="8tampildatapegawai.php"><i class="fa fa-book"></i> <span>Tampilkan Data Pegawai</span></a></li>
        <li><a href="8registrasipegawai.php"><i class="fa fa-book"></i> <span>Tambah Akun Pegawai</span></a></li>         
        <li class="header">KELOLA AKUN TAMU</li>  
        <li><a href="8tampiltamu.php"><i class="fa fa-book"></i> <span>Tampil Data Tamu</span></a></li>      
        <li><a href="8registrasitamu.php"><i class="fa fa-book"></i> <span>Tambah Akun Tamu</span></a></li>
        <li class="header">KELOLA KAMAR</li>
        <li><a href="8showkamar.php"><i class="fa fa-book"></i> <span>Tampilkan Kamar</span></a></li>
        <li><a href="8insertkamar.php"><i class="fa fa-book"></i> <span>Tambahkan Kamar</span></a></li>
        <li class="header">KELOLA JENIS KAMAR</li>
        <li><a href="8showjeniskamar.php"><i class="fa fa-book"></i> <span>Tampilkan Jenis Kamar</span></a></li>
        <li><a href="8insertjeniskamar.php"><i class="fa fa-book"></i> <span>Tambahkan Jenis Kamar</span></a></li>
        <li class="header">KELOLA LOKASI CABANG<li>
        <li><a href="8showlokasi.php"><i class="fa fa-book"></i> <span>Tampilkan Cabang Hotel</span></a></li>
        <li><a href="8createlokasi.php"><i class="fa fa-book"></i> <span>Tambahkan Cabang Hotel</span></a></li>
        <li class="header">KELOLA TARIF KAMAR<li>
        <li><a href="9showtarifkamar.php"><i class="fa fa-book"></i> <span>Tampilkan Tarif Kamar</span></a></li>
        <li><a href="9inserttarifkamar.php"><i class="fa fa-book"></i> <span>Tambahkan Tarif Kamar</span></a></li>
        <li class="header">KELOLA SEASON<li>
        <li><a href="9showsession.php"><i class="fa fa-book"></i> <span>Tampilkan Season Aktif</span></a></li>
        <li><a href="9setsession.php"><i class="fa fa-book"></i> <span>Tambahkan Season</span></a></li>        
        <li class="header">KELOLA TARIF FASILITAS BERBAYAR<li>
        <li><a href="9showtariffasilitasberbayar.php"><i class="fa fa-book"></i> <span>Tampilkan Tarif Fasilitas</span></a></li>
        <li><a href="9inserttariffasilitasberbayar.php"><i class="fa fa-book"></i> <span>Tambahkan Fasilitas </span></a></li>
        11laporantahunan.php
        <li class="header">LAPORAN<li>
        <li><a href="11laporantahunan.php"><i class="fa fa-book"></i> <span>Tampilkan Laporan Tahunan</span></a></li>
        <li><a href="11laporanmember.php"><i class="fa fa-book"></i> <span>Tampilkan Laporan Member Baru</span></a></li>
        <li><a href="11laporanbulanan.php"><i class="fa fa-book"></i> <span>Tampilkan Laporan Bulanan</span></a></li>
        <li><a href="11laporan5.php"><i class="fa fa-book"></i> <span>Tampilkan Laporan 5 costumer</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  