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
        $id_pelanggan = htmlentities(strip_tags(trim($_POST["id_pelanggan"])));
        $id_pelanggan = mysqli_real_escape_string($link,$id_pelanggan);
    
        
        $query = "SELECT * FROM pelanggan WHERE ID_PELANGGAN='$id_pelanggan'";
        $result = mysqli_query($link, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($link).
                 " - ".mysqli_error($link));
          }
        $data=mysqli_fetch_assoc($result);
        
        $id_pelanggan=$data["ID_PELANGGAN"];
        $nama_pelanggan=$data["NAMA_PELANGGAN"];
        $no_identitas=$data["NO_IDENTITAS"];
        $nama_institusi=$data["NAMA_INSTITUSI"];
        $no_telepon=$data["NO_TELEPON"];
        $alamat_pelanggan=$data["ALAMAT_PELANGGAN"];
        $email_pelanggan=$data["EMAIL_PELANGGAN"];
        $status_pelangan=$data["STATUS_PELANGGAN"];
        $username_pel=$data["USERNAME_PEL"];
        $password_pel=$data["PASSWORD_PEL"];
        mysqli_free_result($result);
       
     }
     else if ($_POST["submit"]=="update") {
        
        $id_pelanggan=htmlentities(strip_tags(trim($_POST["id_pelanggan"])));
        $nama_pelanggan=htmlentities(strip_tags(trim($_POST["nama_pelanggan"])));
        $no_identitas=htmlentities(strip_tags(trim($_POST["no_identitas"])));
        $nama_institusi=htmlentities(strip_tags(trim($_POST["nama_institusi"])));
        $no_telepon=htmlentities(strip_tags(trim($_POST["no_telepon"])));
        $alamat_pelanggan=htmlentities(strip_tags(trim($_POST["alamat_pelanggan"])));
        $email_pelanggan=htmlentities(strip_tags(trim($_POST["email_pelanggan"])));
        $status_pelangan=htmlentities(strip_tags(trim($_POST["status_pelangan"])));
        $username_pel=htmlentities(strip_tags(trim($_POST["username_pel"])));
        $password_pel=htmlentities(strip_tags(trim($_POST["password_pel"])));
       
      
      }
  
      
      $pesan_error="";     
      
      if(($pesan_error === "") AND ($_POST["submit"]=="update"))
      {    
        include("connection.php");       
        $id_pelanggan=mysqli_real_escape_string($link,$id_pelanggan);
            $nama_pelanggan=mysqli_real_escape_string($link,$nama_pelanggan);
            $no_identitas=mysqli_real_escape_string($link,$no_identitas);
            $nama_institusi=mysqli_real_escape_string($link,$nama_institusi);
            $no_telepon=mysqli_real_escape_string($link,$no_telepon);
            $alamat_pelanggan=mysqli_real_escape_string($link,$alamat_pelanggan);
            $email_pelanggan=mysqli_real_escape_string($link,$email_pelanggan);
            $status_pelangan=mysqli_real_escape_string($link,$status_pelangan);
            $username_pel=mysqli_real_escape_string($link,$username_pel);
            $password_pel=mysqli_real_escape_string($link,$password_pel);   
        $query="UPDATE pelanggan SET ID_PELANGGAN='$id_pelanggan',NAMA_PELANGGAN='$nama_pelanggan',NO_IDENTITAS='$no_identitas',NAMA_INSTITUSI='$nama_institusi',NO_TELEPON='$no_telepon',ALAMAT_PELANGGAN='$alamat_pelanggan',EMAIL_PELANGGAN='$email_pelanggan',STATUS_PELANGGAN='$status_pelangan',USERNAME_PEL='$username_pel',PASSWORD_PEL='$password_pel' WHERE ID_PELANGGAN='$id_pelanggan'";
        $result=mysqli_query($link,$query);       
       
        
        
  
      
        if($result) {          
            header("Location:8tampiltamu.php");
          } 
     
      }
      
 }
 else
 {
    header("Location:8tampiltamu.php");
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
        Edit Data Tamu
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="register-box">  

  <div class="register-box-body">
    <!-- <p class="login-box-msg">Register a new membership</p> -->

    <form action="8editdatatamu.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="id_pelanggan" name="id_pelanggan" value="<?php echo $id_pelanggan?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="nama_pelanggan" name="nama_pelanggan" id="" value="<?php echo $nama_pelanggan?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="no_identitas" name="no_identitas" id="" value="<?php echo $no_identitas?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="nama_institusi" name="nama_institusi" id="" value="<?php echo $nama_institusi?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="no_telepon" name="no_telepon" id="" value="<?php echo $no_telepon?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="alamat_pelanggan" name="alamat_pelanggan" id="" value="<?php echo $alamat_pelanggan?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="email_pelanggan" name="email_pelanggan" id="" value="<?php echo $email_pelanggan?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="status_pelangan" name="status_pelangan" id="" value="<?php echo $status_pelangan?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username_pel" name="username_pel" id="" value="<?php echo $username_pel?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password_pel" id="" value="<?php echo $password_pel?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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


