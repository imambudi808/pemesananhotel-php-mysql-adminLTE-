<?php
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$username=$_SESSION['USERNAME_PEL'];
include("connection.php");
$query="SELECT * FROM pelanggan WHERE USERNAME_PEL='$username' ORDER BY ID_PELANGGAN";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGAH</title>
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
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b>SIGAH</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <!-- <li><a href="#">Link</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">        
            
          <li>
            <a href="logout.php"><i>Log Out</i></a>
          </li>      
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1> -->
        
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Blank Box</h3>
          </div>
          <div class="box-body">
            The great content goes here
          </div>
          <!-- /.box-body -->
          <?php
        $result=mysqli_query($link,$query);
        $data=mysqli_fetch_assoc($result);

        // echo "<br>$data[ID_PELANGGAN]";
        // echo "<br>$data[NAMA_PELANGGAN]";
        // echo "<br>$data[NO_IDENTITAS]";
        // echo "<br>$data[NAMA_INSTITUSI]";
        // echo "<br>$data[NO_TELEPON]";
        // echo "<br>$data[ALAMAT_PELANGGAN]";
        // echo "<br>$data[EMAIL_PELANGGAN]";
        // echo "<br>$data[STATUS_PELANGAN]";
        // echo "<br>$data[USERNAME_PEL]";
        // echo "<br>$data[PASSWORD_PEL]";


        ?>
        <div class="box box-primary">
            <div class="box-body box-profile">
                <!-- phpcode -->
                
              <!-- <img class="profile-user-img img-responsive img-circle" src="asset/img/1.jpg" alt="User profile picture"> -->

              <h3 class="profile-username text-center"><?php echo "$data[NAMA_PELANGGAN]"; ?></h3>
              <p class="text-muted text-center">
                    <?php                 
                        // echo "$data[ID_PELANGGAN]";                    
                    ?>
              </p>
              
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>No Identitas</b> <a class="pull-right"><?php echo "$data[NO_IDENTITAS]"; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Nama Institusi</b> <a class="pull-right">
                    <?php                  
                      echo "$data[NAMA_INSTITUSI]";                  
                  ?></a>
                  
                </li>
                <li class="list-group-item">
                  <b>No Telepon</b> <a class="pull-right"><?php  echo "$data[NO_TELEPON]"; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat Pelanggan</b> <a class="pull-right"><?php echo "$data[ALAMAT_PELANGGAN]"; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right" type="password"><?php echo "$data[EMAIL_PELANGGAN]"; ?></a>
                </li>                
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right" type="password"><?php echo "$data[USERNAME_PEL]"; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <a class="pull-right" type="password"><?php echo "$data[PASSWORD_PEL]"; ?></a>
                </li>
              </ul>

              
              <form action="8editdatapribaditamu.php" method="post" >
                    <input type="hidden" name="id_pelanggan" value="<?php echo "$data[ID_PELANGGAN]"; ?>" >
                    <input type="submit" name="submit" value="Edit" class="btn btn-block btn-warning btn-sm">
                    </form>   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> -->
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1
      </div>
      <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
</body>
</html>
