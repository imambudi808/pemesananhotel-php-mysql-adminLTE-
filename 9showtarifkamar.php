<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];

 include("connection.php");
 if (isset($_POST["submit"])) {
    
    $id_tarif = htmlentities(strip_tags(trim($_POST["id_tarif"])));
    
    $id_tarif = mysqli_real_escape_string($link,$id_tarif);
    
    
    $query = "DELETE FROM tarif WHERE ID_TARIF='$id_tarif' ";
    $hasil_query = mysqli_query($link, $query);
  
   
   
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tampil Data Tarif Kamar</title>
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
        Tampil Data Tarif Kamar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Tampil Data Tarif Kamar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th>ID_TARIF</th>
                <th>JENIS_KAMAR</th>
                <th>SEASON</th>
                <th>TARIF</th>
                
                </tr>
                <?php

                $query="select ID_TARIF,JENIS_KAMAR,SEASON,TARIF from tarif join season using(ID_SEASON) join jenis_kamar using(ID_JENIS_KAMAR)";
                $result = mysqli_query($link, $query);
                
                if(!$result){
                    die ("Query Error: ".mysqli_errno($link).
                        " - ".mysqli_error($link));
                }
                

                while($data = mysqli_fetch_assoc($result))
                {
                  echo "<tr>";
                  echo "<td>$data[ID_TARIF]</td>";
                  echo "<td>$data[JENIS_KAMAR]</td>";
                  echo "<td>$data[SEASON]</td>";
                  echo "<td>$data[TARIF]</td>";
                
                  echo "<td>";
                ?>
                    <td>
                    <form action="9showtarifkamar.php" method="post" >
                    <input type="hidden" name="id_tarif" value="<?php echo "$data[ID_TARIF]"; ?>" >
                    <input type="submit" name="submit" value="Hapus" class="btn btn-block btn-danger btn-xs">
                    </form>
                    </td>
                    <td>
                    <form action="9updatetarifkamar.php" method="post" >
                    <input type="hidden" name="id_tarif" value="<?php echo "$data[ID_TARIF]"; ?>" >
                    <input type="submit" name="submit" value="Edit" class="btn btn-block btn-warning btn-xs">
                    </form>  
                    </td>    
                  <?php
                  echo "</td>";
                  echo "</tr>";
                }
                mysqli_free_result($result);
                
                // tutup koneksi dengan database mysql
                mysqli_close($link);


                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
     

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



