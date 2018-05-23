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
    $id_tarif=htmlentities(strip_tags(trim($_POST["id_tarif"])));
    $id_jenis_kamar=htmlentities(strip_tags(trim($_POST["id_jenis_kamar"])));
    $id_season=htmlentities(strip_tags(trim($_POST["id_season"])));
    $tarif=htmlentities(strip_tags(trim($_POST["tarif"])));

    $pesan_error="";
    // if(empty($id_tarif))
    // {
    //     $pesan_error="Id tarif belum diisi";
    // }
    // if(empty($tarif))
    // {
    //     $pesan_error="tarif belum diisi";
    // }
    if (!is_numeric($tarif) OR ($tarif <=0)) {
        $pesan_error .= "tarif harus diisi dengan angka";
      }   
    // else if(empty($tarif))
    // {
    //     $pesan_error .="tarif belum diisi";
    // }
    if($pesan_error=="")
    {
        $id_tarif=mysqli_real_escape_string($link,$id_tarif);
        $id_jenis_kamar=mysqli_real_escape_string($link,$id_jenis_kamar);
        $id_season=mysqli_real_escape_string($link,$id_season);
        $tarif=mysqli_real_escape_string($link,$tarif);
        
        $query="INSERT INTO tarif VALUES('$id_tarif','$id_jenis_kamar','$id_season','$tarif')";
        $result=mysqli_query($link,$query);
        if($result) {                   
            header("Location: 9showtarifkamar.php");
          } 
    }

}
else
{
    $id_tarif="";
    $id_jenis_kamar="";
    $id_season="";
    $tarif="";
    $pesan_error="";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Tarif Kamar</title>
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
      Tambah Tarif Kamar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Tambah Tarif Kamar</li>
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
            echo "<div class=\"btn btn-block btn-danger btn-sm\">$pesan_error</div>";
            
        }
        ?>
        <br>
        <form action="9inserttarifkamar.php" method="post">
          <div class="form-group has-feedback">
            <input type="hidden" class="form-control" placeholder="id_tarif" name="id_tarif" value="<?php echo $id_tarif?>">
            
          </div>
                <!-- dropdown jenis kamar -->
                <?php
                    $query="SELECT * FROM jenis_kamar";
                    $result=mysqli_query($link,$query);
                    if(!$result){
                        die ("Query Error: ".mysqli_errno($link).
                            " - ".mysqli_error($link));
                    }        
                    ?>
                <select type="text" name="id_jenis_kamar" id="id_jenis_kamar" class="form-control"> 
                <option value="">Pilih Jenis Kamar</option>
                    <?php
                    while($data = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <option value="<?php echo "$data[ID_JENIS_KAMAR]" ?>"><?php echo "$data[JENIS_KAMAR]" ?></option>
                    <?php
                    }
                    ?>    
                </select><br>
                <!-- drop down season -->
                    <?php
                        $query="SELECT * FROM season";
                        $result=mysqli_query($link,$query);
                        if(!$result){
                            die ("Query Error: ".mysqli_errno($link).
                                " - ".mysqli_error($link));
                        }        
                    ?>
                <select type="text" name="id_season" id="id_season" class="form-control">
                <option value="">Pilih Season</option>
                    <?php
                    while($data = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <option value="<?php echo "$data[ID_SEASON]" ?>"><?php echo "$data[SEASON]" ?></option>
                    <?php
                    }
                    ?>        
                </select><br>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="tarif" name="tarif" value="<?php echo $tarif?>">
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>input jenis kamar</title>
</head>
<body>
    <form action="9inserttarifkamar.php" method="post">    
    <input type="text" name="id_tarif" id="" value="<?php echo $id_tarif?>"><br>
    <!-- dropdown jenis kamar -->
        <?php
            $query="SELECT * FROM jenis_kamar";
            $result=mysqli_query($link,$query);
            if(!$result){
                die ("Query Error: ".mysqli_errno($link).
                    " - ".mysqli_error($link));
            }        
        ?>
    <select type="text" name="id_jenis_kamar" id="id_jenis_kamar">
        <?php
        while($data = mysqli_fetch_assoc($result))
        {
        ?>
            <option value="<?php echo "$data[ID_JENIS_KAMAR]" ?>"><?php echo "$data[JENIS_KAMAR]" ?></option>
        <?php
        }
        ?>    
    </select><br>
    <!-- drop down season -->
        <?php
            $query="SELECT * FROM season";
            $result=mysqli_query($link,$query);
            if(!$result){
                die ("Query Error: ".mysqli_errno($link).
                    " - ".mysqli_error($link));
            }        
        ?>
    <select type="text" name="id_season" id="id_season">
        <?php
        while($data = mysqli_fetch_assoc($result))
        {
        ?>
            <option value="<?php echo "$data[ID_SEASON]" ?>"><?php echo "$data[SEASON]" ?></option>
        <?php
        }
        ?>        
    </select><br>
    <input type="text" name="tarif" id="" value="<?php echo $tarif?>"><br>
    <input type="submit" name="submit" value="insert">
    </form>
</body>
</html>