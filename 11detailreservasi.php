<?php
error_reporting(0);
include("connection.php");
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$pengunjung=$_SESSION['USERNAME_PEL'];
$queryPel="select * from pelanggan where username_pel='$pengunjung'";
$resultPel=mysqli_query($link,$queryPel);
$datapel=mysqli_fetch_assoc($resultPel);
$nama_pelanggan=$datapel['NAMA_PELANGGAN'];
$no_telp_pel=$datapel['NO_TELEPON'];
$alamat_pel=$datapel['ALAMAT_PELANGGAN'];
$institusi=$datapel['NAMA_INSTITUSI'];
$email_pel=$datapel['EMAIL_PELANGGAN'];

// $statusbayar=$_SESSION['STATUSBAYAR'];


// /sessionmyg dipanggil
$nomor_reservasi=$_SESSION["NOMOR_RESERVASI"];
$id_tarif=$_SESSION["ID_TARIF"];
$id_jenis_kamar=$_SESSION['ID_JENIS_KAMAR'];
$jumlah_tidur=$_SESSION['JUMLAH_TIDUR'];
$sub_total=$_SESSION['SUB_TOTAL'];
$jenis_tamu=$_SESSION['JENIS_TAMU'];
$jenis_kamar=$_SESSION['JENIS_KAMAR'];
$tglCheckin=$_SESSION['CHECKIN'];
$tglCheckout=$_SESSION['CHECKOUT'];
$durasi=$_SESSION['DURASI'];



$queryNR="select * from reservasi where NOMOR_RESERVASI='$nomor_reservasi'";
$resultNR=mysqli_query($link,$queryNR);
$dataNR=mysqli_fetch_assoc($resultNR);
$id_res=$dataNR["ID_RESERVASI"];


//input detailreservasi
$queryDR="INSERT INTO `detail_reservasi` (`ID_DETAIL_RES`, `ID_JENIS_KAMAR`, `ID_RESERVASI`, `JUMLAH_TEMPAT_TIDUR`, `SUBTOTAL`, `STATUS_RESERVASI`) 
                                  VALUES (NULL, '$id_jenis_kamar', '$id_res', '$jumlah_tidur', '$sub_total', 'RESERVED')";
$resultDR=mysqli_query($link,$queryDR);
$today=date('Y-m-d');

if(isset($_POST["submit"]))
{
   
    if(!empty($_POST["fasilitas1"]))
    {
        $temp1=htmlentities(strip_tags(trim($_POST["fasilitas1"])));
        $query1="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp1'";
        $result1=mysqli_query($link, $query1);
        $data1=mysqli_fetch_assoc($result1);
        $fasilitas1_nama=$data1["NAMA_FASILITAS"];
        $fasilitas1_harga=$data1["HARGA_FASILITAS"];        

    }
    else
    {
        $fasilitas1_nama="";
        $fasilitas1_harga="";
    }
    if(!empty($_POST["fasilitas2"]))
    {
        $temp2=htmlentities(strip_tags(trim($_POST["fasilitas2"])));
        $temp2=htmlentities(strip_tags(trim($_POST["fasilitas2"])));
        $query2="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp2'";
        $result2=mysqli_query($link, $query2);
        $data2=mysqli_fetch_assoc($result2);
        $fasilitas2_nama=$data2["NAMA_FASILITAS"];
        $fasilitas2_harga=$data2["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas2_nama="";
        $fasilitas2_harga="";
    }
    if(!empty($_POST["fasilitas3"]))
    {
        $temp3=htmlentities(strip_tags(trim($_POST["fasilitas3"])));
        $temp3=htmlentities(strip_tags(trim($_POST["fasilitas3"])));
        $query3="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp3'";
        $result3=mysqli_query($link, $query3);
        $data3=mysqli_fetch_assoc($result3);
        $fasilitas3_nama=$data3["NAMA_FASILITAS"];
        $fasilitas3_harga=$data3["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas3_nama="";
        $fasilitas3_harga="";
    }
    if(!empty($_POST["fasilitas4"]))
    {
        $temp4=htmlentities(strip_tags(trim($_POST["fasilitas4"])));
        $temp4=htmlentities(strip_tags(trim($_POST["fasilitas4"])));
        $query4="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp4'";
        $result4=mysqli_query($link, $query4);
        $data4=mysqli_fetch_assoc($result4);
        $fasilitas4_nama=$data4["NAMA_FASILITAS"];
        $fasilitas4_harga=$data4["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas4_nama="";
        $fasilitas4_harga="";
    }
    if(!empty($_POST["fasilitas5"]))
    {
        $temp5=htmlentities(strip_tags(trim($_POST["fasilitas5"])));
        $temp5=htmlentities(strip_tags(trim($_POST["fasilitas5"])));
        $query5="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp5'";
        $result5=mysqli_query($link, $query5);
        $data5=mysqli_fetch_assoc($result5);
        $fasilitas5_nama=$data5["NAMA_FASILITAS"];
        $fasilitas5_harga=$data5["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas5_nama="";
        $fasilitas5_harga="";
    }
    if(!empty($_POST["fasilitas6"]))
    {
        $temp6=htmlentities(strip_tags(trim($_POST["fasilitas6"])));
        $temp6=htmlentities(strip_tags(trim($_POST["fasilitas6"])));
        $query6="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp6'";
        $result6=mysqli_query($link, $query6);
        $data6=mysqli_fetch_assoc($result6);
        $fasilitas6_nama=$data6["NAMA_FASILITAS"];
        $fasilitas6_harga=$data6["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas6_nama="";
        $fasilitas6_harga="";
    }
    if(!empty($_POST["fasilitas7"]))
    {
        $temp7=htmlentities(strip_tags(trim($_POST["fasilitas7"])));
        $temp7=htmlentities(strip_tags(trim($_POST["fasilitas7"])));
        $query7="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp7'";
        $result7=mysqli_query($link, $query7);
        $data7=mysqli_fetch_assoc($result7);
        $fasilitas7_nama=$data7["NAMA_FASILITAS"];
        $fasilitas7_harga=$data7["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas7_nama="";
        $fasilitas7_harga="";
    }
    if(!empty($_POST["fasilitas8"]))
    {
        $temp8=htmlentities(strip_tags(trim($_POST["fasilitas8"])));
        $temp8=htmlentities(strip_tags(trim($_POST["fasilitas8"])));
        $query8="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp8'";
        $result8=mysqli_query($link, $query8);
        $data8=mysqli_fetch_assoc($result8);
        $fasilitas8_nama=$data8["NAMA_FASILITAS"];
        $fasilitas8_harga=$data8["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas8_nama="";
        $fasilitas8_harga="";
    }
    if(!empty($_POST["fasilitas9"]))
    {
        $temp9=htmlentities(strip_tags(trim($_POST["fasilitas9"])));
        $temp9=htmlentities(strip_tags(trim($_POST["fasilitas9"])));
        $query9="SELECT * FROM fasilitas WHERE ID_FASILITAS='$temp9'";
        $result9=mysqli_query($link, $query9);
        $data9=mysqli_fetch_assoc($result9);
        $fasilitas9_nama=$data9["NAMA_FASILITAS"];
        $fasilitas9_harga=$data9["HARGA_FASILITAS"];
    }
    else
    {
        $fasilitas9_nama="";
        $fasilitas9_harga="";
    }
    if(!empty($_POST["permintaan"]))
    {
        $temppermintaan=htmlentities(strip_tags(trim($_POST["permintaan"])));
        $queryPermintaan="INSERT INTO `permintaan_khusus` (`ID_PERMINTAAN`, `ID_RESERVASI`, `PERMINTAAN`) VALUES (NULL, '$id_res', '$temppermintaan')";
        mysqli_query($link,$queryPermintaan);
        // echo "$temppermintaan";
    }
    else
    {
        $temppermintaan="";
    }

    $hargatotal=$fasilitas1_harga+$fasilitas2_harga+$fasilitas3_harga+$fasilitas4_harga+$fasilitas5_harga+$fasilitas6_harga+$fasilitas7_harga+$fasilitas8_harga+$fasilitas9_harga;
    $fasilitasberbayar="$fasilitas1_nama,$fasilitas2_nama,$fasilitas3_nama,$fasilitas4_nama,$fasilitas5_nama,$fasilitas6_nama,$fasilitas7_nama,$fasilitas8_nama,$fasilitas9_nama";
            if($_POST["submit"]=="konfirmasi")
            {
              $statusbayar="Sudah Dibayar";
            }
            else
            {
              $statusbayar="Belum Dibayar";
            }
}

$totalsemua=$hargatotal+$sub_total;
$minimaltransfer=$totalsemua/2;
$pajak=$totalsemua*(10/100);
$totalakhir=$totalsemua+$pajak;
$deposit=$totalakhir/2;
$_SESSION['TRANSFER']=$minimaltransfer;


//session baru yg akan dikirim ke print tanda booking
$_SESSION['TOTAL_SEMUA']=$totalsemua;
$_SESSION['NAMA_PELANGGAN']=$nama_pelanggan;
$_SESSION['NO_TELEPON']=$no_telp_pel;
$_SESSION['ALAMAT_PELANGGAN']=$alamat_pel;
$_SESSION['NAMA_INSTITUSI']=$institusi;
$_SESSION['EMAIL_PELANGGAN']=$email_pel;
$_SESSION['PAJAK']=$pajak;
$_SESSION['TOTALAKHIR']=$totalakhir;
$_SESSION['DEPOSIT']=$deposit;
$_SESSION['ID_RES']=$id_res;
//fasilitas berbayar
$_SESSION['HARGATOTALFASILITASBAYAR']=$hargatotal;
$_SESSION['NAMAFASILITASBAYAR']=$fasilitasberbayar;
$_SESSION['STATUSBAYAR']=$statusbayar;
$_SESSION['PERMINTAANKHUSUS']=$temppermintaan;

//insert ke tbl pembayaran
$querykepembayaran="INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_RESERVASI`, `ID_PEGAWAI`, `NOMOR_NOTA`, `TGL_PEMBAYARAN`, `TOTAL_AWAL`, `PAJAK`, `TOTAL_AKHIR`, `DEPOSIT`, `NAMA_PEMILIKI_KARTU`, `NOMOR_KARTU`) 
                    VALUES (NULL, '$id_res', NULL, '$nomor_reservasi', '$today', '$totalsemua', '$pajak', '$totalakhir', '$deposit', '$nama_pelanggan', 'NULL')";
mysqli_query($link,$querykepembayaran);
///
$qpem="SELECT * FROM pembayaran WHERE ID_RESERVASI LIKE '$id_res'";
$Rpem=mysqli_query($link,$qpem);
$datapem=mysqli_fetch_assoc($Rpem);
$idPembayaran=$datapem['ID_PEMBAYARAN'];
$queryfasiltasbayar1="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp1', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar1);
$queryfasiltasbayar2="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp2', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar2);
$queryfasiltasbayar3="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp3', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar3);
$queryfasiltasbayar4="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp4', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar4);
$queryfasiltasbayar5="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp5', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar5);
$queryfasiltasbayar6="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp6', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar6);
$queryfasiltasbayar7="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp7', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar7);
$queryfasiltasbayar8="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp8', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar8);
$queryfasiltasbayar9="INSERT INTO `pemesanan_fasilitas` (`ID_PEMESANAN_FASILITAS`, `ID_PEMBAYARAN`, `ID_FASILITAS`, `JLH_PEMESANAN`, `TGL_PEMAKAIAN`) VALUES (NULL, '$idPembayaran', '$temp9', NULL, NULL)";
mysqli_query($link,$queryfasiltasbayar9);


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="asset/bower_components/select2/dist/css/select2.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
   img {
     width: 300px;
     height: 200px;
     border: 0px solid #253996;
     padding: 10px;
   }
</style>
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  
  <?php
include("navbar2.php");
?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">  
      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Keterangan Lengkap Pemesanan Kamar Hotel
            <small class="pull-right">Tanggal: <?php echo"$today"; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
            <strong>SIGAH</strong><br>            
            Phone:<br>
            Email: Sigah@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Untuk
          <address>
            <strong><?php echo "$nama_pelanggan"; ?></strong><br>
            <?php
            echo "Phone :$no_telp_pel";
            echo "<br>";
            echo "Alamat:$alamat_pel";
            echo "<br>";
            echo "Institusi:$institusi";
            echo "<br>";
            echo "E-Mail:$email_pel";
            ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">          
          <b>Nomor Reservasi  :</b><?php echo"$nomor_reservasi";?><br>
          <b>Satus Pembayaran  :</b><?php echo"$statusbayar";?><br>
          <b>Durasi Menginap  :</b><?php echo"$durasi Hari";?><br>
                   
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Jenis Kamar</th>
              <th>Jumlah Kamar</th>              
              <th>Permintaan Khusus</th>
              <th>Tgl Check In</th>
              <th>Tgl Check Out</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>            
            <tr>
              <td><?php  echo "$jenis_kamar";?></td>
              <td><?php  echo "$jumlah_tidur";?></td>              
              <td><?php  echo "$temppermintaan";?></td>
              <td><?php  echo "$tglCheckin";?></td>
              <td><?php  echo "$tglCheckout";?></td>
              <td><?php  echo "$sub_total";?></td>
            </tr>            
            </tbody>
          </table>
        </div>
        <!-- fasilitas berbayar -->
        <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>              
              <th>Fasilitas(Berbayar)</th>
              <th>Biaya Total Fasilitas(Berbayar)</th>
              
            </tr>
            </thead>
            <tbody>            
            <tr>              
              <td><?php  echo "$fasilitasberbayar";?></td>
              <td><?php echo "$hargatotal";?></td>
            </tr>            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->
          <b><a href="11transferatm.php">ATM Transfer</a></b><br>
          <b><a href="11transfercc.php">Kartu Credit</a></b>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Bawalah Bukti Booking Berikut Saat Check In
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total Yang Harus Dibayarkan</p>

          <div class="table-responsive">
            <table class="table">
            <!-- '$totalsemua', '$pajak', '$totalakhir', '$deposit', '$nama_pelanggan' -->
              <tbody><tr>
                <th style="width:50%">Total Biaya:</th>
                <td><?php echo "Rp. $totalsemua";?></td>
              </tr>
              <tr>
                <th>Pajak (10%):</th>
                
                <td><?php echo "Rp. $pajak";?></td>
              </tr>
              <tr>
                <th>Total Akhir:</th>
                
                <td><?php echo "Rp. $totalakhir";?></td>
              </tr>
              <tr>
                <th>Minimal Transfer Untuk Booking:</th>
                
                <td><?php echo "Rp. $deposit";?></td>
              </tr>
              
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="11detailreservasiprint.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Pembayaran -->
          <!-- <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="batalreservasi"> -->
          <a href="11batalreservasi.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Batalkan</a>
          </button>
          <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
    </section>
	  </section>
	  <!-- /.content -->
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>



  

  <!-- jQuery 3 -->
<script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="asset/bower_components/moment/min/moment.min.js"></script>
<script src="asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
       
      autoclose: true
    })
       //Date picker2
       $('#datepicker2').datepicker({
       
       autoclose: true
     })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
