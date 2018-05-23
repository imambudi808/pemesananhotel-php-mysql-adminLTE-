<?php
$today=date('Y-m-d');
include("connection.php");
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$pengunjung=$_SESSION['USERNAME_PEL'];
//ambil nilai session dari detail reservasi
$nomor_reservasi=$_SESSION["NOMOR_RESERVASI"];
$id_tarif=$_SESSION["ID_TARIF"];
$id_jenis_kamar=$_SESSION['ID_JENIS_KAMAR'];
$jumlah_tidur=$_SESSION['JUMLAH_TIDUR'];
$sub_total=$_SESSION['SUB_TOTAL'];
$jenis_tamu=$_SESSION['JENIS_TAMU'];
$jenis_kamar=$_SESSION['JENIS_KAMAR'];
$tglCheckin=$_SESSION['CHECKIN'];
$tglCheckout=$_SESSION['CHECKOUT'];
$totalsemua=$_SESSION['TOTAL_SEMUA'];
$minimaltransfer=$_SESSION['TRANSFER'];
$nama_pelanggan=$_SESSION['NAMA_PELANGGAN'];
$no_telp_pel=$_SESSION['NO_TELEPON'];
$alamat_pel=$_SESSION['ALAMAT_PELANGGAN'];
$institusi=$_SESSION['NAMA_INSTITUSI'];
$email_pel=$_SESSION['EMAIL_PELANGGAN'];
$hargatotal=$_SESSION['HARGATOTALFASILITASBAYAR'];
$fasilitasberbayar=$_SESSION['NAMAFASILITASBAYAR'];
$statusbayar=$_SESSION['STATUSBAYAR'];
$temppermintaan=$_SESSION['PERMINTAANKHUSUS'];
$pajak=$_SESSION['PAJAK'];
$totalakhir=$_SESSION['TOTALAKHIR'];
$deposit=$_SESSION['DEPOSIT'];

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGAH | Bukti Booking</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
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
              <th>.Fasilitas(Berbayar)</th>
              <th>Biaya Total Fasilitas(Berbayar)</th>
              
            </tr>
            </thead>
            <tbody>            
            <tr>              
              <td><?php  echo "..$fasilitasberbayar";?></td>
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
          <p class="lead">....Payment Methods:</p>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->
          <b>....ATM Transfer</b><br>
          <b>....Kartu Credit</b>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Bawalah Bukti Booking Berikut Saat Check In
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total Yang Harus Dibayarkan</p>

          <div class="table-responsive">
            <table class="table">
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

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
