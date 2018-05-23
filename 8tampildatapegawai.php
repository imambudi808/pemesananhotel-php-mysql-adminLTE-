<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];
 include("connection.php");
 if (isset($_POST["submit"])) {
    
    $username_peg = htmlentities(strip_tags(trim($_POST["username_peg"])));
    
    $username_peg = mysqli_real_escape_string($link,$username_peg);
    
    
    $query = "DELETE FROM pegawai WHERE USERNAME_PEG='$username_peg' ";
    $hasil_query = mysqli_query($link, $query);
  
   
    // if($hasil_query) {
      
    //     $pesan = "Mahasiswa dengan username_peg = \"<b>$username_peg</b>\" sudah berhasil di hapus";
    //     $pesan = urlencode($pesan);
    //     header("Location: 8tampildatapegawai.php?pesan={$pesan}");
    // } 
    // else { 
    //   die ("Query gagal dijalankan: ".mysqli_errno($link).
    //        " - ".mysqli_error($link));
    // }
  }
  if (isset($_GET["submit"])) {     
    
    $nama = htmlentities(strip_tags(trim($_GET["nama"])));  
    
    $nama = mysqli_real_escape_string($link,$nama);   
    
    
    $query = "SELECT ROLE,CABANG,NAMA_PEGAWAI,EMAIL_PEGAWAI,USERNAME_PEG,PASSWORD_PEG FROM pegawai JOIN cabang USING(ID_CABANG) JOIN role USING(ID_ROLE) WHERE NAMA_PEGAWAI LIKE '%$nama%'";
    
    
    
  } 
  else {  
    $query = "SELECT ROLE,CABANG,NAMA_PEGAWAI,EMAIL_PEGAWAI,USERNAME_PEG,PASSWORD_PEG FROM pegawai JOIN cabang USING(ID_CABANG) JOIN role USING(ID_ROLE)";
  }
  
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tampil Data Pegawai</title>
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
        Tampil Data Pegawai
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">User profile</li>
      </ol>      
    <!-- Main content -->       
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
                <form id="search" action="8tampildatapegawai.php" method="get" class="input-group input-group-sm" style="width: 150px;">           
                  
                  <input type="text" name="nama" id="nama" class="form-control pull-right" placeholder="nama..." >
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
                  <th>NAMA</th>
                  <th>PERAN</th>
                  <th>CABANG</th>                  
                  <th>E-MAIL </th>
                  <th>USERNAME </th>
                  <!-- <th>Password Pegawai</th> -->
                  
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
                  //echo "<td>$data[ID_PEGAWAI]</td>";                  
                  // echo "<td>$data[ID_ROLE]</td>";
                  // if("$data[ID_ROLE]"==1)
                  // {
                  //   echo "<td>Owner</td>";
                  // }
                  // elseif("$data[ID_ROLE]"==2)
                  // {
                  //   echo "<td>General Manager</td>";
                  // }
                  // elseif("$data[ID_ROLE]"==3)
                  // {
                  //   echo "<td>Admin</td>";
                  // }
                  // elseif("$data[ID_ROLE]"==4)
                  // {
                  //   echo "<td>Sales Marketing</td>";
                  // }
                  // elseif("$data[ID_ROLE]"==5)
                  // {
                  //   echo "<td>Front Office</td>";
                  // }
                  // // echo "<td>$data[ID_CABANG]</td>";
                  // if("$data[ID_CABANG]"==1)
                  // {
                  //   echo "<td>Yogyakarta</td>";
                  // }
                  // elseif("$data[ID_CABANG]"==2)
                  // {
                  //   echo "<td>Bandung</td>";
                  // }    
                  echo "<td>$data[NAMA_PEGAWAI]</td>";              
                  echo "<td>$data[ROLE]</td>";
                  echo "<td>$data[CABANG]</td>";                  
                  echo "<td>$data[EMAIL_PEGAWAI]</td>";
                  echo "<td>$data[USERNAME_PEG]</td>";
                  // echo "<td>$data[PASSWORD_PEG]</td>";
                  
                ?>  
                    <td>
                    <form action="8tampildatapegawai.php" method="post" >
                    <input type="hidden" name="username_peg" value="<?php echo "$data[USERNAME_PEG]"; ?>" >
                    <input type="submit" name="submit" value="Hapus" class="btn btn-block btn-danger btn-xs">
                    </form>
                    </td>                 
                    
                    <td>
                    <form action="8editdatapegawai.php" method="post" >
                    <input type="hidden" name="username_peg" value="<?php echo "$data[USERNAME_PEG]"; ?>" >
                    <input type="submit" name="submit" value="Edit" class="btn btn-block btn-warning btn-xs">
                    </form>   
                    </td>                      
                <?php
                 //echo "<tr>";
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


