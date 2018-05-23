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
        $id_fasilitas=htmlentities(strip_tags(trim($_POST["id_fasilitas"])));
        $nama_fasilitas=htmlentities(strip_tags(trim($_POST["nama_fasilitas"])));
        $jlh_tersedia_fas=htmlentities(strip_tags(trim($_POST["jlh_tersedia_fas"])));
        $harga_fasilitas=htmlentities(strip_tags(trim($_POST["harga_fasilitas"])));
       
        
        $pesan_error="";
        if(!is_numeric($harga_fasilitas) OR ($harga_fasilitas <=0))
        {
            $pesan_error="Harga harus diisi dengan angka!";
        }
        
        if($pesan_error==="")
        {
            $id_fasilitas=mysqli_real_escape_string($link,$id_fasilitas);
            $nama_fasilitas=mysqli_real_escape_string($link,$nama_fasilitas);
            $jlh_tersedia_fas=mysqli_real_escape_string($link,$jlh_tersedia_fas);
            $harga_fasilitas=mysqli_real_escape_string($link,$harga_fasilitas);            
           
            $query="INSERT INTO fasilitas VALUES('$id_fasilitas','$nama_fasilitas','$jlh_tersedia_fas','$harga_fasilitas')";
            $result=mysqli_query($link,$query);
            if($result) {                   
                header("Location: 9inserttariffasilitasberbayar.php");
              } 
        }

}


else
{
    $id_fasilitas="";
    $nama_fasilitas="";
    $jlh_tersedia_fas="";
    $harga_fasilitas="";
    $pesan_error="";

    

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Tarif Fasilitas Berbayar</title>
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
        Insert Tarif Fasilitas Berbayar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Tambah Tarif Fasilitas Berbayar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="register-box">

      <div class="register-box-body">

      <?php
      //tampil error numeric
      if ($pesan_error !== "") {
        echo "<div class=\"btn btn-block btn-danger btn-sm\">$pesan_error</div>";
        
    }

      ?>
      
        <!-- <p class="login-box-msg">Register a new membership</p> -->

        <form action="9inserttariffasilitasberbayar.php" method="post">
        <label for="">ID Fasilitas</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="" name="id_fasilitas" value="<?php echo $id_fasilitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
        <label for="">Nama Fasilitas</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="" name="nama_fasilitas" value="<?php echo $nama_fasilitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <label for="">Jumlah Fasilitas Tersedia</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="" name="jlh_tersedia_fas" value="<?php echo $jlh_tersedia_fas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <label for="">Harga Fasilitas</label>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="" name="harga_fasilitas" value="<?php echo $harga_fasilitas?>">
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


