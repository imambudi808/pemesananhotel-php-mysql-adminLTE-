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
        $id_season = htmlentities(strip_tags(trim($_POST["id_season"])));
        $id_season = mysqli_real_escape_string($link,$id_season);
    
        
        $query = "SELECT * FROM season WHERE ID_SEASON='$id_season'";
        $result = mysqli_query($link, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($link).
                 " - ".mysqli_error($link));
          }
        $data=mysqli_fetch_assoc($result);

        $id_season=$data["ID_SEASON"];
        $season=$data["SEASON"];
        $tgl_mulai=$data["TGL_MULAI"];
        $tgl_selesai=$data["TGL_SELESAI"];
        $deskripsi_season=$data["DESKRIPSI_SEASON"];
        $status_season=$data["STATUS_SEASON"];
       
        mysqli_free_result($result);
       
     }
     else if ($_POST["submit"]=="update") {
        
        $id_season=htmlentities(strip_tags(trim($_POST["id_season"])));
        $season=htmlentities(strip_tags(trim($_POST["season"])));
        $tgl_mulai=htmlentities(strip_tags(trim($_POST["tgl_mulai"])));
        $tgl_selesai=htmlentities(strip_tags(trim($_POST["tgl_selesai"])));
        $deskripsi_season=htmlentities(strip_tags(trim($_POST["deskripsi_season"])));
        $status_season=htmlentities(strip_tags(trim($_POST["status_season"])));    
       
      
      }
  
      
      $pesan_error="";     
      
      if(($pesan_error === "") AND ($_POST["submit"]=="update"))
      {    
        include("connection.php");       
        $id_season=mysqli_real_escape_string($link,$id_season);
        $season=mysqli_real_escape_string($link,$season);
        $tgl_mulai=mysqli_real_escape_string($link,$tgl_mulai);
        $tgl_selesai=mysqli_real_escape_string($link,$tgl_selesai);
        $deskripsi_season=mysqli_real_escape_string($link,$deskripsi_season);
        $status_season=mysqli_real_escape_string($link,$status_season);
                  
                  
        $query="UPDATE season SET ID_SEASON='$id_season',SEASON='$season',TGL_MULAI='$tgl_mulai',TGL_SELESAI='$tgl_selesai',DESKRIPSI_SEASON='$deskripsi_season',STATUS_SEASON='$status_season' WHERE ID_SEASON='$id_season'";
        $result=mysqli_query($link,$query);
        if($result) {                   
            header("Location: 9showsession.php");
          } 
     
      }
      
 }
 else
 {
    header("Location: 9showsession.php");
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

    <form action="9updatesession.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="id_season" name="id_season" value="<?php echo $id_season?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="season" name="season" value="<?php echo $season?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">  
          <label for="">Tgl Mulai</label>         
            <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_mulai" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
            </div>
          </div>          
          <div class="form-group has-feedback">
           <label for="">Tgl Selesai</label>
            <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_selesai" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
            </div>
          </div>     
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="deskripsi_season" name="deskripsi_season" value="<?php echo $deskripsi_season?>">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="status_season" name="status_season" value="<?php echo $status_season?>">
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


