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
        $id_pegawai = "";
        $id_role = htmlentities(strip_tags(trim($_POST["id_role"])));
        $id_cabang = htmlentities(strip_tags(trim($_POST["id_cabang"])));
        $nama_pegawai = htmlentities(strip_tags(trim($_POST["nama_pegawai"])));
        $email_pegawai = htmlentities(strip_tags(trim($_POST["email_pegawai"])));
        $username_peg = htmlentities(strip_tags(trim($_POST["username_peg"])));
        // $password_peg = "htmlentities(strip_tags(trim($_POST["password_peg"])))";
        $password_peg ="1234";
        $pesan_error="";
        if(empty($username_peg))
        {
            $pesan_error="username_peg belum terisi";
        }
        elseif(empty($nama_pegawai))
        {
            $pesan_error="nama_pegawai belum terisi";
        }
     
        if($pesan_error==="")
        {
            $id_pegawai=mysqli_real_escape_string($link,$id_pegawai);
            $id_role=mysqli_real_escape_string($link,$id_role);
            $id_cabang=mysqli_real_escape_string($link,$id_cabang);
            $nama_pegawai=mysqli_real_escape_string($link,$nama_pegawai);
            $email_pegawai=mysqli_real_escape_string($link,$email_pegawai);
            $username_peg=mysqli_real_escape_string($link,$username_peg);
            $password_peg=mysqli_real_escape_string($link,$password_peg);
            $query="INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_ROLE`, `ID_CABANG`, `NAMA_PEGAWAI`, `EMAIL_PEGAWAI`, `USERNAME_PEG`, `PASSWORD_PEG`) VALUES('$id_pegawai','$id_role','$id_cabang','$nama_pegawai','$email_pegawai','$username_peg','$password_peg')";
            $result=mysqli_query($link,$query);
            if($result) {                   
                header("Location: 8tampildatapegawai.php");
              } 
        }
}


else
{
    $id_pegawai="";
    $id_role="";
    $id_cabang="";
    $nama_pegawai="";
    $email_pegawai="";
    $username_peg="";
    $password_peg="";
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
        Tambah Akun Pegawai
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
        <?php
          // tampilkan error jika ada
          if ($pesan_error !== "") {
              echo "<div class=\"error\">$pesan_error</div>";
          }
        ?>
        <form action="8registrasipegawai.php" method="post">
          <div class="form-group has-feedback">
            
            <!-- dropdown role -->
            <?php
              $query="SELECT * FROM role";
              $result=mysqli_query($link,$query);
              if(!$result){
                  die ("Query Error: ".mysqli_errno($link).
                      " - ".mysqli_error($link));
              }     
            ?>
            <select name="id_role" id="id_role" class="form-control">
            <option value="">Pilih Peran</option>
            <?php
                while($data = mysqli_fetch_assoc($result))
                {
            ?>
                <option value="<?php echo "$data[ID_ROLE]" ?>"><?php echo "$data[ROLE]" ?></option>
            <?php
                }
            ?>    
              
            </select>
          </div>
          <div class="form-group has-feedback" >
          <?php
              $query="SELECT * FROM cabang";
              $result=mysqli_query($link,$query);
              if(!$result){
                  die ("Query Error: ".mysqli_errno($link).
                      " - ".mysqli_error($link));
              }     
            ?>
            <select name="id_cabang" id="id_cabang" class="form-control">
            <option value="">Pilih Cabang</option>
            <?php
                while($data = mysqli_fetch_assoc($result))
                {
            ?>
                <option value="<?php echo "$data[ID_CABANG]" ?>"><?php echo "$data[CABANG]" ?></option>
            <?php
                }
            ?>      
            </select>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama Pegawai" name="nama_pegawai" value="<?php echo $nama_pegawai?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email_pegawai" value="<?php echo $email_pegawai?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username_peg" value="<?php echo $username_peg?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="hidden" class="form-control" placeholder="Password" name="password_peg" value="<?php echo $password_peg?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>    
          <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" >Tambah</button>
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


