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
     if($_POST["submit"]=="Edit")
     {
        $id_fasilitas = htmlentities(strip_tags(trim($_POST["id_fasilitas"])));
        $id_fasilitas = mysqli_real_escape_string($link,$id_fasilitas);
    
        
        $query = "SELECT * FROM fasilitas WHERE ID_FASILITAS = '$id_fasilitas'";
        $result = mysqli_query($link, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($link).
                 " - ".mysqli_error($link));
          }
        $data=mysqli_fetch_assoc($result);
        $id_fasilitas=$data["ID_FASILITAS"];
        $nama_fasilitas=$data["NAMA_FASILITAS"];
        $jlh_tersedia_fas=$data["JLH_TERSEDIA_FAS"];
        $harga_fasilitas=$data["HARGA_FASILITAS"];
       
        mysqli_free_result($result);
       
     }
     else if ($_POST["submit"]=="update") {
        
        $id_fasilitas = htmlentities(strip_tags(trim($_POST["id_fasilitas"])));
        $nama_fasilitas = htmlentities(strip_tags(trim($_POST["nama_fasilitas"])));
        $jlh_tersedia_fas = htmlentities(strip_tags(trim($_POST["jlh_tersedia_fas"])));
        $harga_fasilitas = htmlentities(strip_tags(trim($_POST["harga_fasilitas"])));
      
      }
  
      
      $pesan_error="";
     
      if (empty($id_fasilitas)) {
        $pesan_error .= "id_fasilitas belum diisi <br>";
      }
      if(($pesan_error === "") AND ($_POST["submit"]=="update"))
      {    
        include("connection.php");       
        $id_fasilitas=mysqli_real_escape_string($link,$id_fasilitas);
        $nama_fasilitas=mysqli_real_escape_string($link,$nama_fasilitas);
        $jlh_tersedia_fas=mysqli_real_escape_string($link,$jlh_tersedia_fas);
        $harga_fasilitas=mysqli_real_escape_string($link,$harga_fasilitas);  
        $query="UPDATE fasilitas SET ID_FASILITAS='$id_fasilitas',NAMA_FASILITAS='$nama_fasilitas',JLH_TERSEDIA_FAS='$jlh_tersedia_fas',HARGA_FASILITAS='$harga_fasilitas' WHERE ID_FASILITAS='$id_fasilitas'";
        $result=mysqli_query($link,$query);       
       
        
        
  
      
        if($result) {
      
          
          header("Location: 9showtariffasilitasberbayar.php");
        } 
     
      }
      
 }
 else
 {
    header("Location: 9showtariffasilitasberbayar.php");
 }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Tarif Fasilitas Berbayar</title>
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
      Edit Tarif Fasilitas Berbayar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Edit Tarif Fasilitas Berbayar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="register-box">  

  <div class="register-box-body">
    <!-- <p class="login-box-msg">Register a new membership</p> -->

    <form action="9edittariffasilitasberbayar.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="id_fasilitas" name="id_fasilitas" value="<?php echo $id_fasilitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama_fasilitas" name="nama_fasilitas" value="<?php echo $nama_fasilitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="jlh_tersedia_fas" name="jlh_tersedia_fas" value="<?php echo $jlh_tersedia_fas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="harga_fasilitas" name="harga_fasilitas" value="<?php echo $harga_fasilitas?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>     
               
          
      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-4">    
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="update">      
          
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


