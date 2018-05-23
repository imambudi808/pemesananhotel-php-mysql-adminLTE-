<?php
include("connection.php");
if(isset($_POST["submit"]))
{
        
        $id_pelanggan=htmlentities(strip_tags(trim($_POST["id_pelanggan"])));
        $nama_pelanggan=htmlentities(strip_tags(trim($_POST["nama_pelanggan"])));
        $no_identitas=htmlentities(strip_tags(trim($_POST["no_identitas"])));
        $nama_institusi=htmlentities(strip_tags(trim($_POST["nama_institusi"])));
        $no_telepon=htmlentities(strip_tags(trim($_POST["no_telepon"])));
        $alamat_pelanggan=htmlentities(strip_tags(trim($_POST["alamat_pelanggan"])));
        $email_pelanggan=htmlentities(strip_tags(trim($_POST["email_pelanggan"])));
        $status_pelanggan=htmlentities(strip_tags(trim($_POST["status_pelanggan"])));
        $username_pel=htmlentities(strip_tags(trim($_POST["username_pel"])));
        $password_pel=htmlentities(strip_tags(trim($_POST["password_pel"])));
        
        $pesan_error="";
        if(empty($username_pel))
        {
            $pesan_error="username_pel belum terisi";
        }
        if($pesan_error==="")
        {
           
            $id_pelanggan=mysqli_real_escape_string($link,$id_pelanggan);
            $nama_pelanggan=mysqli_real_escape_string($link,$nama_pelanggan);
            $no_identitas=mysqli_real_escape_string($link,$no_identitas);
            $nama_institusi=mysqli_real_escape_string($link,$nama_institusi);
            $no_telepon=mysqli_real_escape_string($link,$no_telepon);
            $alamat_pelanggan=mysqli_real_escape_string($link,$alamat_pelanggan);
            $email_pelanggan=mysqli_real_escape_string($link,$email_pelanggan);
            $status_pelanggan=mysqli_real_escape_string($link,$status_pelanggan);
            $username_pel=mysqli_real_escape_string($link,$username_pel);
            $password_pel=mysqli_real_escape_string($link,$password_pel);
            $query="INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `NO_IDENTITAS`, `NAMA_INSTITUSI`, `NO_TELEPON`, `ALAMAT_PELANGGAN`, `EMAIL_PELANGGAN`, `STATUS_PELANGGAN`, `USERNAME_PEL`, `PASSWORD_PEL`) VALUES('$id_pelanggan','$nama_pelanggan','$no_identitas','$nama_institusi','$no_telepon','$alamat_pelanggan','$email_pelanggan','$status_pelanggan','$username_pel','$password_pel')";
            $result=mysqli_query($link,$query);
            if($result) {                   
              header("Location: 10reservasi.php");
            } 
        }
}


else
{
    $id_pelanggan="";
    $nama_pelanggan="";
    $no_identitas="";
    $nama_institusi="";
    $no_telepon="";
    $alamat_pelanggan="";
    $email_pelanggan="";
    $status_pelanggan="";
    $username_pel="";
    $password_pel="";
    $pesan_error="";

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Akun Pegawai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php
include("navbar3.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Registrasi Tamu
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="register-box">

      <div class="register-box-body">
        <!-- <p class="login-box-msg">Register a new membership</p> -->
        <?php
          // tampilkan error jika ada
          if ($pesan_error !== "") {
              echo "<div class=\"error\">$pesan_error</div>";
          }
        ?>
        <form action="8register.php" method="post">                
 
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="no_identitas" name="no_identitas" value="<?php echo $no_identitas?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama_institusi" name="nama_institusi" value="<?php echo $nama_institusi?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="no_telepon" name="no_telepon" value="<?php echo $no_telepon?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="alamat_pelanggan" name="alamat_pelanggan" value="<?php echo $alamat_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="email_pelanggan" name="email_pelanggan" value="<?php echo $email_pelanggan?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="status_pelanggan" name="status_pelanggan" value="<?php echo $status_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username_pel" name="username_pel" value="<?php echo $username_pel?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="password_pel" name="password_pel" value="<?php echo $password_pel?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>    
          <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" >Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>       

        
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    SIGAH 2018
  </footer>

  

<!-- jQuery 3 -->
<script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
</body>
</html>


