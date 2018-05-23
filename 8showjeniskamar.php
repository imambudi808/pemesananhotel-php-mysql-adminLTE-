<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];

 include("connection.php");
 if (isset($_POST["submit"])) {
    
    $id_jenis_kamar = htmlentities(strip_tags(trim($_POST["id_jenis_kamar"])));
    
    $id_jenis_kamar = mysqli_real_escape_string($link,$id_jenis_kamar);
    
    
    $query = "DELETE FROM jenis_kamar WHERE ID_JENIS_KAMAR='$id_jenis_kamar' ";
    $hasil_query = mysqli_query($link, $query);
  
   
   
  }
  if (isset($_GET["submit"])) {     
    
    $nama = htmlentities(strip_tags(trim($_GET["nama"])));  
    
    $nama = mysqli_real_escape_string($link,$nama);   
    
    
    $query = "SELECT * FROM jenis_kamar WHERE JENIS_KAMAR LIKE '%$nama%'";
    
    
    
  } 
  else {  
    $query = "SELECT * FROM jenis_kamar ORDER BY KODE_JENIS_KAMAR ASC";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tampil Data Kamar</title>
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
        Tampil Data Jenis Kamar
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Tampil Data Jenis Kamar</li>
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
                <form id="search" action="8showjeniskamar.php" method="get" class="input-group input-group-sm" style="width: 150px;">           
                  
                  <input type="text" name="nama" id="nama" class="form-control pull-right" placeholder="jenis kamar..." >
                  <div class="input-group-btn">
                  <input type="submit" name="submit" value="Cari" class="btn btn-default">
                  </div>    
                </form>      
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th>ID JENIS KAMAR</th>
                <th>JENIS KAMAR</th>
                <th>KODE JENIS KAMAR</th>  
                <th>KAPASITAS</th>
                <th>DESKRIPSI KAMAR</th>
                
                </tr>
                <?php

                
                $result = mysqli_query($link, $query);
                
                if(!$result){
                    die ("Query Error: ".mysqli_errno($link).
                        " - ".mysqli_error($link));
                }
                

                while($data = mysqli_fetch_assoc($result))
                {
                  echo "<tr>";
                  echo "<td>$data[ID_JENIS_KAMAR]</td>";
                  echo "<td>$data[JENIS_KAMAR]</td>";
                  echo "<td>$data[KODE_JENIS_KAMAR]</td>";
                  echo "<td>$data[KAPASITAS]</td>";
                  echo "<td>$data[DESKRIPSI_JKAMAR]</td>";    
                  echo "<td>";
                ?>
                    <td>
                    <form action="8showjeniskamar.php" method="post" >
                    <input type="hidden" name="id_jenis_kamar" value="<?php echo "$data[ID_JENIS_KAMAR]"; ?>" >
                    <input type="submit" name="submit" value="Hapus" class="btn btn-block btn-danger btn-xs" >
                    </form>
                    </td>
                    <td>
                    <form action="8editjeniskamar.php" method="post" >
                    <input type="hidden" name="id_jenis_kamar" value="<?php echo "$data[ID_JENIS_KAMAR]"; ?>" >
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


