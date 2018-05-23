<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];
$username=$_SESSION['USERNAME_PEG'];
include("connection.php");
$query="SELECT role,cabang,nama_pegawai,email_pegawai,username_peg from pegawai join role using(id_role) join cabang using(id_cabang) where username_peg='$username'";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Profile</title>
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
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);  
include("navbar1.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
        <?php
                             
                ?><!-- endphpcode -->
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <!-- phpcode -->
                
              <img class="profile-user-img img-responsive img-circle" src="asset/img/logo.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo "$data[nama_pegawai]";?></h3>
              <p class="text-muted text-center">
                    <?php
                    // $role="$data[ID_ROLE]";
                    // if($role=1)
                    // {
                    //     echo "OWNER";
                    // }
                    // elseif($role=2)
                    // {
                    //     echo "GENERAL MANAGER";
                    // }
                    // elseif($role=3)
                    // {
                    //     echo "ADMIN";
                    // }
                    // elseif($role=4)
                    // {
                    //     echo "SALES MARKETING";
                    // }
                    // elseif($role=5)
                    // {
                    //     echo "FRONT END";
                    // }
                    // else
                    // {
                    //     echo "$data[ID_ROLE]";
                    // }
                    echo "$data[role]";
                    
                    
                    ?>
              </p>
              
              <ul class="list-group list-group-unbordered">               
                <li class="list-group-item">
                  <b>Id Cabang</b> <a class="pull-right"><?php echo "$data[cabang]";?></a>                  
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php  echo "$data[email_pegawai]"; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo "$data[username_peg]"; ?></a>
                </li>                
              </ul>

              <!-- <a href="8editdetaildatapegawai.php" class="btn btn-primary btn-block"><b>EDIT</b></a> -->
              <form action="8editdetaildatapegawai.php" method="post" >
                    <input type="hidden" name="id_pegawai" value="<?php echo "$data[ID_PEGAWAI]"; ?>" >
                    <input type="submit" name="submit" value="Edit" class="btn btn-block btn-warning btn-sm">
                    </form>    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        

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


