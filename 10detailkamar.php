<?php
include("connection.php");     
include("connection.php");
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$pengunjung=$_SESSION['USERNAME_PEL'];          
if(isset($_POST["submit"]))
{
    
        $jenis_kamar = htmlentities(strip_tags(trim($_POST["jenis_kamar"])));
        $jenis_kamar = mysqli_real_escape_string($link,$jenis_kamar);
        // $query="SELECT ID_KAMAR,jenis_kamar,LANTAI,BEBAS_ROKOK,STATUS_KAMAR,CABANG,ALAMAT_CABANG,TELEPON_CABANG,JENIS_KAMAR,DESKRIPSI_JKAMAR,KAPASITAS,
        //     NAMA_FASILITAS,TARIF from kamar JOIN cabang USING(ID_CABANG) JOIN jenis_kamar USING(ID_JENIS_KAMAR) JOIN detail_fasilitas USING(ID_JENIS_KAMAR)
        //     JOIN fasilitas USING(ID_FASILITAS) JOIN tarif USING(ID_JENIS_KAMAR) JOIN season USING(ID_SEASON) WHERE STATUS_SEASON='Aktif' AND STATUS_KAMAR='Available' AND ID_KAMAR='$id_kamar'";
        $query="SELECT BEBAS_ROKOK,STATUS_KAMAR,JENIS_TEMPAT_TIDUR,HARGA_TEMPAT_TIDUR,JENIS_KAMAR,KAPASITAS,DESKRIPSI_JKAMAR,NAMA_FASILITAS,CABANG,ALAMAT_CABANG,TELEPON_CABANG,jenis_kamar,TARIF from kamar 
        JOIN tempat_tidur USING(ID_TEMPAT_TIDUR)
        JOIN cabang USING(ID_CABANG)JOIN jenis_kamar USING(ID_JENIS_KAMAR) JOIN detail_fasilitas USING(ID_JENIS_KAMAR) JOIN fasilitas USING(ID_FASILITAS)
        JOIN tarif USING(ID_JENIS_KAMAR) JOIN season USING(ID_SEASON)
                        WHERE STATUS_SEASON='Aktif' AND STATUS_KAMAR='Available' AND jenis_kamar='$jenis_kamar'";
        $result = mysqli_query($link, $query);
        $data=mysqli_fetch_assoc($result);
        // $jenis_kamar=$data["jenis_kamar"];
        // $lantai=$data["LANTAI"];
        // $bebas_rokok=$data["BEBAS_ROKOK"];
        // $status_kamar=$data["STATUS_KAMAR"];
        // $cabang=$data["CABANG"];
        // $alamat_cabang=$data["ALAMAT_CABANG"];
        // $telepon_cabang=$data["TELEPON_CABANG"];
        // $jenis_kamar=$data["JENIS_KAMAR"];
        // $deskripsi_jkamar=$data["DESKRIPSI_JKAMAR"];
        // $kapasitas=$data["KAPASITAS"];
        // // $nama_fasilitas=$data["NAMA_FASILITAS"];
        // $tarif=$data["TARIF"];
        

    
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
      <?php
      $result = mysqli_query($link, $query);
      $data=mysqli_fetch_assoc($result);
      ?>      
        <br>
      </section>     
      <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title"><?php echo "$data[JENIS_KAMAR]";?></h2>
            </div>
            <div class="box-body">          
              

              <div class="post">                  
                  <!-- /.user-block -->
                  <div class="row margin-bottom">                    
                    <!-- /.col -->
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="asset/img/photo1.jpg" alt="Photo">                         
                          <img class="img-responsive" src="asset/img/photo1.jpg" alt="Photo">
                          <img class="img-responsive" src="asset/img/photo1.jpg" alt="Photo">                          
                          <img class="img-responsive" src="asset/img/photo1.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                        <!-- /box -->
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title"></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>
                            </div>
                         
                            <div class="box-body">
                            No Kamar :<?php echo "$data[jenis_kamar]"; ?>
                            </div>
                            <div class="box-body">
                            Kapasitas:<?php echo "$data[KAPASITAS]"; ?>
                            </div>
                            <div class="box-body">
                            Status Kamar:<?php echo "$data[STATUS_KAMAR]"; ?>
                            </div>
                            <div class="box-body">
                            Bebas Rokok:<?php echo "$data[BEBAS_ROKOK]"; ?>
                            </div>
                            <div class="box-body">
                            Deskripsi:<?php echo "$data[DESKRIPSI_JKAMAR]"; ?>
                            </div>       
                            <div class="box-body">
                            Cabang:<?php echo "$data[CABANG]"; ?>
                            </div>
                            <div class="box-body">
                            Alamat:<?php echo "$data[ALAMAT_CABANG]"; ?>
                            </div>
                            <div class="box-body">
                            Telepon:<?php echo "$data[TELEPON_CABANG]"; ?>
                            </div>     
                            <div class="box-body">
                            Harga:Rp.<?php echo "$data[TARIF]"; ?>
                            </div>                                
                        </div>
                        <!-- box -->                       
                        <!-- /box -->
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Tempat Tidur</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>
                            </div>
                            <div class="box-body">
                            Jenis:<?php echo "$data[JENIS_TEMPAT_TIDUR]"; ?>
                            </div>
                            <div class="box-body">
                            Harga:Rp.<?php echo "$data[HARGA_TEMPAT_TIDUR]"; ?>
                            </div>                                                     
                        </div>           
                        <!-- //box             -->
                        <!-- /box -->
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Fasilitas</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>
                            </div>
                            <div class="box-body">
                            Nama Fasilitas:<?php echo "$data[NAMA_FASILITAS]"; ?>
                            </div>
                                                                                
                        </div>          
                        </div> 
                        <div class="col-md-2">  
                                
                        <br><br><br>          
                        <input type="submit" name="submit" value="Booking" class="btn btn-warning col-md-6">
                        <br><br><br>                        
                                
                        </div>                       
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>                  
                </div>

              <!-- // -->
                                       
            </div>            
            <!-- /.box-body -->
          </div> 
    </div>
    <!-- /.container -->
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


