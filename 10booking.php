<?php
include("connection.php");
session_start();

if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$pengunjung=$_SESSION['USERNAME_PEL'];
$query="select * from pelanggan where username_pel='$pengunjung'";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);
$id_pelanggan=$data["ID_PELANGGAN"];
// $id_kamar= htmlentities(strip_tags(trim($_POST["id_kamar"])));
// echo "$id_kamar";
 if(isset($_POST["submit"]))
 {
  $tglcheckin= htmlentities(strip_tags(trim($_POST["tglcheckin"])));
  $tglcheckout= htmlentities(strip_tags(trim($_POST["tglcheckout"])));
  $durasi= htmlentities(strip_tags(trim($_POST["durasi"])));
  $dewasa= htmlentities(strip_tags(trim($_POST["dewasa"])));
  $anak= htmlentities(strip_tags(trim($_POST["anak"])));
  $jenis_kamar= htmlentities(strip_tags(trim($_POST["jenis_kamar"])));
  $id_jenis_kamar=htmlentities(strip_tags(trim($_POST["id_jenis_kamar"])));
  $id_kamar= htmlentities(strip_tags(trim($_POST["id_kamar"])));
  $lokasi=htmlentities(strip_tags(trim($_POST["lokasi"])));    
  $id_lokasi=htmlentities(strip_tags(trim($_POST["id_lokasi"])));  
  $id_tarif= htmlentities(strip_tags(trim($_POST["id_tarif"])));  
  $tarif= htmlentities(strip_tags(trim($_POST["tarif"])));    
  $jumlah_tersedia= htmlentities(strip_tags(trim($_POST["jumlah_tersedia"])));
  $jumlah_kamar=htmlentities(strip_tags(trim($_POST["jumlah_kamar"])));

  
  $id_kamar= mysqli_real_escape_string($link,$id_kamar);
  $id_jenis_kamar= mysqli_real_escape_string($link,$id_jenis_kamar);
  $tglcheckin= mysqli_real_escape_string($link,$tglcheckin);
  $tglcheckout= mysqli_real_escape_string($link,$tglcheckout);
  $durasi= mysqli_real_escape_string($link,$durasi);
  $dewasa= mysqli_real_escape_string($link,$dewasa);
  $anak= mysqli_real_escape_string($link,$anak);
  $jenis_kamar= mysqli_real_escape_string($link,$jenis_kamar);
  $lokasi=mysqli_real_escape_string($link,$lokasi);
  $id_lokasi=mysqli_real_escape_string($link,$id_lokasi);
  $tarif=mysqli_real_escape_string($link,$tarif);
  $id_tarif=mysqli_real_escape_string($link,$id_tarif);
  $jumlah_tersedia=mysqli_real_escape_string($link,$jumlah_tersedia);
  $jumlah_kamar=mysqli_real_escape_string($link,$jumlah_kamar);
   
    $id_reservasi="";
    $id_pegawai="";        
    $jumlahtamu=$dewasa+$anak;
   if($jumlahtamu<20)
   {
    $id_jenis_tamu="1";
    $jenistamu="Personal";
   }
   else if($jumlahtamu>=20)
   {
    $id_jenis_tamu="2";
    $jenistamu="Group";
   }      
    
    
    $a="ABCDFGH123";
    $nomor_reservasi=str_shuffle($a);
    $tgl_reservasi=date('Y-m-d');
    // $jumlah_kamar=($dewasa+$anak)/2;
    $jaminan=($tarif*$jumlah_kamar)/2;

    $queryR="INSERT INTO `reservasi` (`ID_RESERVASI`, `ID_PEGAWAI`, `ID_CABANG`, `ID_JENIS_TAMU`, `ID_PELANGGAN`, `NOMOR_RESERVASI`, `TGL_RESERVASI`, `TGL_CHECKIN`, `TGL_CHECKOUT`, `TOTAL_DEWASA`, `TOTAL_ANAK`, `TOTAL`, `JAMINAN`, `PIC`, `STATUS`) 
             VALUES (NULL, NULL, '$id_lokasi', '$id_jenis_tamu', '$id_pelanggan', '$nomor_reservasi', '$tgl_reservasi', '$tglcheckin', '$tglcheckout', '$dewasa', '$anak', NULL, '$jaminan', NULL, 'Reserved'); ";    
                                                       
    $resultR=mysqli_query($link,$queryR);
    // $querySetKamar="UPDATE kamar SET MASUK = '$tglcheckin', KELUAR = '$tglcheckout' WHERE ID_JENIS_KAMAR LIMIT 1";
    // $resultSetKamar=mysqli_query($link,$querySetKamar); 
    // if($resultSetKamar)
    // {
    //   echo "$id_jenis_kamar";
    // }
    
      // $_SESSION["ID_KAMAR"]=$id_kamar;
      // $_SESSION["CHECKIN"]=$tglcheckin;
      // $_SESSION["CHECKOUT"]=$tglcheckout;
      // echo "$id_jenis_kamar";
      $_SESSION["NOMOR_RESERVASI"]=$nomor_reservasi;  
      $_SESSION["ID_TARIF"]=$id_tarif; 
      $_SESSION["ID_JENIS_KAMAR"]=$id_jenis_kamar;
      $_SESSION["JUMLAH_TIDUR"]=$jumlah_kamar;
      $_SESSION["SUB_TOTAL"]=$tarif*$jumlah_kamar;  
      $_SESSION["JENIS_TAMU"]=$jenistamu;        
      $_SESSION["JENIS_KAMAR"]=$jenis_kamar;
      $_SESSION["CHECKIN"]=$tglcheckin;
      $_SESSION["CHECKOUT"]=$tglcheckout;
      
      
    
        
 }
 else
 {
    header("Location: 10reservasi.php");
 }

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
      
        <br>
        </section>

<!-- Main content -->
<section class="content">
<div class="register-box">  

<div class="register-box-body">
<!-- <p class="login-box-msg">Register a new membership</p> -->

       

<form action="11detailreservasi.php" method="post">
      <div class="form-group has-feedback">
      

      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tambahan Fasilitas Berbayar</h3>
            </div>          <br><br>


              <!-- checkbox -->
              <div class="form-group">                
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas1" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Extra Bed
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas2" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>               
                	
                Laundry Regular
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas3" value="3" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Laundry Fast Service
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas4" value="4" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Massage
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas5" value="5" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Minibar
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas6" value="6" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Tambahan Breakfast
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas7" value="7" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Lunch Package
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas8" value="8" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Dinner Package
                </label>
                <br>
                <label>
                  <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" name="fasilitas9" value="9" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </label>
                <label>                  
                Meeting Room FullDay
                </label>
                <br>
                
              </div>

      
          </div> <br>
          <div class="form-group">
              <div class="box-header">
                  <h3 class="box-title">Permintaan Khusus Jika Ada</h3>
              </div> 
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="permintaan"></textarea>
                </div>        
          </div>    
      
      
      
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
        <!--  -->
        
        <!--  -->
        <!-- <input type="hidden" class="form-control" placeholder="tglcheckin" name="tglcheckin" value="$tglcheckin">
        <input type="hidden" class="form-control" placeholder="tglcheckout" name="tglcheckout" value="">
        <input type="hidden" class="form-control" placeholder="durasi" name="durasi" >
        <input type="hidden"  class="form-control" placeholder="dewasa" name="dewasa">
        <input type="hidden"  class="form-control" placeholder="anak" name="anak">
        <input type="hidden"  class="form-control" placeholder="jenis_kamar" name="jenis_kamar">
        <input type="hidden"  class="form-control" placeholder="id_jenis_kamar" name="id_jenis_kamar">
        <input type="hidden"  class="form-control" placeholder="id_kamar" name="id_kamar">
        <input type="hidden"  class="form-control" placeholder="lokasi" name="lokasi">
        <input type="hidden"  class="form-control" placeholder="id_lokasi" name="id_lokasi">
        <input type="hidden"  class="form-control" placeholder="tarif" name="tarif">
        <input type="hidden"  class="form-control" placeholder="jumlah_tersedia" name="jumlah_tersedia">
        <input type="hidden"  class="form-control" placeholder="id_reservasi" name="id_reservasi">
        <input type="hidden"  class="form-control" placeholder="id_pegawai" name="id_pegawai">
        <input type="hidden"  class="form-control" placeholder="jumlahtamu" name="jumlahtamu">
        <input type="hidden"  class="form-control" placeholder="id_jenis_tamu" name="id_jenis_tamu">
        <input type="hidden"  class="form-control" placeholder="jenistamu" name="jenistamu">
        <input type="hidden"  class="form-control" placeholder="nomor_reservasi" name="nomor_reservasi">
        <input type="hidden"  class="form-control" placeholder="tgl_reservasi" name="tgl_reservasi">
        <input type="hidden"  class="form-control" placeholder="jaminan" name="jaminan"> -->

        <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="pesan">    
          
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
