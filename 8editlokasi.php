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
        $id_cabang = htmlentities(strip_tags(trim($_POST["id_cabang"])));
        $id_cabang = mysqli_real_escape_string($link,$id_cabang);
    
        
        $query = "SELECT * FROM cabang WHERE ID_CABANG='$id_cabang'";
        $result = mysqli_query($link, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($link).
                 " - ".mysqli_error($link));
          }
        $data=mysqli_fetch_assoc($result);
        $id_cabang=$data["ID_CABANG"];
        $cabang=$data["CABANG"];
        $alamat_cabang=$data["ALAMAT_CABANG"];
        $telepon_cabang=$data["TELEPON_CABANG"];
       
        mysqli_free_result($result);
       
     }
     else if ($_POST["submit"]=="update") {
        
        $id_cabang=htmlentities(strip_tags(trim($_POST["id_cabang"])));
        $cabang=htmlentities(strip_tags(trim($_POST["cabang"])));
        $alamat_cabang=htmlentities(strip_tags(trim($_POST["alamat_cabang"])));
        $telepon_cabang=htmlentities(strip_tags(trim($_POST["telepon_cabang"])));      
       
      
      }
  
      
      $pesan_error="";
     
      if (empty($id_cabang)) {
        $pesan_error .= "id_jenis_kamar belum diisi <br>";
      }
      if(($pesan_error === "") AND ($_POST["submit"]=="update"))
      {    
        include("connection.php");       
        $id_cabang=mysqli_real_escape_string($link,$id_cabang);
        $cabang=mysqli_real_escape_string($link,$cabang);
        $alamat_cabang=mysqli_real_escape_string($link,$alamat_cabang);
        $telepon_cabang=mysqli_real_escape_string($link,$telepon_cabang);
        $query="UPDATE cabang SET ID_CABANG='$id_cabang',CABANG='$cabang',ALAMAT_CABANG='$alamat_cabang',TELEPON_CABANG='$telepon_cabang' WHERE ID_CABANG='$id_cabang'";
        $result=mysqli_query($link,$query);       
       
        
        
  
      
        if($result) {
      
          $pesan = "jenis kamar dengan dengan nama = \"<b>$id_cabang</b>\" sudah berhasil di update";
          $pesan = urlencode($pesan);
          header("Location: 8showlokasi.php?pesan={$pesan}");
        } 
     
      }
      
 }
 else
 {
    header("Location: 8showlokasi.php");
 }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Data Pegawai</title>
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
      Edit Lokasi
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Edit Data Lokasi Cabang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="register-box">  

  <div class="register-box-body">
    <!-- <p class="login-box-msg">Register a new membership</p> -->

    <form action="8editlokasi.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="id_cabang" name="id_cabang" value="<?php echo $id_cabang?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="cabang" name="cabang" value="<?php echo $cabang?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="alamat_cabang" name="alamat_cabang" value="<?php echo $alamat_cabang?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="telepon_cabang" name="telepon_cabang" value="<?php echo $telepon_cabang?>">
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


