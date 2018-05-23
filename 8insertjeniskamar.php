<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];
include("connection.php");
if(isset($_POST["submit"]))
{
        $id_jenis_kamar=htmlentities(strip_tags(trim($_POST["id_jenis_kamar"])));
        $jenis_kamar=htmlentities(strip_tags(trim($_POST["jenis_kamar"])));
        $kode_jenis_kamar=htmlentities(strip_tags(trim($_POST["kode_jenis_kamar"])));
        $kapasitas=htmlentities(strip_tags(trim($_POST["kapasitas"])));
        $deskripsi_kamar=htmlentities(strip_tags(trim($_POST["deskripsi_kamar"])));
       
        
        $pesan_error="";
        if(empty($id_jenis_kamar))
        {
            $pesan_error="id_pegawai belum terisi";
        }
        if($pesan_error==="")
        {
            $id_jenis_kamar=mysqli_real_escape_string($link,$id_jenis_kamar);
            $jenis_kamar=mysqli_real_escape_string($link,$jenis_kamar);
            $kode_jenis_kamar=mysqli_real_escape_string($link,$kode_jenis_kamar);
            $kapasitas=mysqli_real_escape_string($link,$kapasitas);
            $deskripsi_kamar=mysqli_real_escape_string($link,$deskripsi_kamar);            
           
            $query="INSERT INTO jenis_kamar VALUES('$id_jenis_kamar','$jenis_kamar','$kode_jenis_kamar','$kapasitas','$deskripsi_kamar')";
            $result=mysqli_query($link,$query);
            if($result) {                   
                header("Location: 8showjeniskamar.php");
              } 
        }
}


else
{
    $id_jenis_kamar="";
    $jenis_kamar="";
    $kode_jenis_kamar="";
    $kapasitas="";
    $deskripsi_kamar="";
    $pesan_error="";

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Kamar</title>
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php
include("navbar1.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Insert Jenis Kamar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Insert Jenis Kamar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="register-box">

      <div class="register-box-body">
        <!-- <p class="login-box-msg">Register a new membership</p> -->

        <form action="8insertjeniskamar.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="id_jenis_kamar" name="id_jenis_kamar" value="<?php echo $id_jenis_kamar?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="jenis_kamar" name="jenis_kamar" value="<?php echo $jenis_kamar?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="kode_jenis_kamar" name="kode_jenis_kamar" value="<?php echo $kode_jenis_kamar?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="kapasitas" name="kapasitas" value="<?php echo $kapasitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>     
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="deskripsi_kamar" name="deskripsi_kamar" value="<?php echo $deskripsi_kamar?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>        
          <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-4">
                <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="insert">
              
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


