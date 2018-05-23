<?php

include("connection.php");
if(isset($_POST["submit"]))
{
        
        $id_pelanggan=htmlentities(strip_tags(trim($_POST["id_pelanggan"])));
        $nama_pelanggan=htmlentities(strip_tags(trim($_POST["nama_pelanggan"])));
        $no_identitas=htmlentities(strip_tags(trim($_POST["no_identitas"])));
        $nama_institusi=htmlentities(strip_tags(trim($_POST["nama_institusi"])));
        $no_telepon=htmlentities(strip_tags(trim($_POST["no_telepon"])));
        $alamat_pelanggan=htmlentities(strip_tags(trim($_POST["alamat_pelanggan"])));
        $email_pelanggan=htmlentities(strip_tags(trim($_POST["email_pelanggan"])));
        $status_pelanggan=htmlentities(strip_tags(trim($_POST["status_pelanggan"])));
        $username_pel=htmlentities(strip_tags(trim($_POST["username_pel"])));
        $password_pel=htmlentities(strip_tags(trim($_POST["password_pel"])));
        
        
           
            $id_pelanggan=mysqli_real_escape_string($link,$id_pelanggan);
            $nama_pelanggan=mysqli_real_escape_string($link,$nama_pelanggan);
            $no_identitas=mysqli_real_escape_string($link,$no_identitas);
            $nama_institusi=mysqli_real_escape_string($link,$nama_institusi);
            $no_telepon=mysqli_real_escape_string($link,$no_telepon);
            $alamat_pelanggan=mysqli_real_escape_string($link,$alamat_pelanggan);
            $email_pelanggan=mysqli_real_escape_string($link,$email_pelanggan);
            $status_pelanggan=mysqli_real_escape_string($link,$status_pelanggan);
            $username_pel=mysqli_real_escape_string($link,$username_pel);
            $password_pel=mysqli_real_escape_string($link,$password_pel);
            $query="INSERT INTO pelanggan VALUES('$id_pelanggan','$nama_pelanggan','$no_identitas','$nama_institusi','$no_telepon','$alamat_pelanggan','$email_pelanggan','$status_pelanggan','$username_pel','$password_pel')";
            $result=mysqli_query($link,$query);
            if($result) {                   
              header("Location: 8logintamu.php");
            
        }
}


else
{
    $id_pelanggan="";
    $nama_pelanggan="";
    $no_identitas="";
    $nama_institusi="";
    $no_telepon="";
    $alamat_pelanggan="";
    $email_pelanggan="";
    $status_pelanggan="";
    $username_pel="";
    $password_pel="";
    $pesan_error="";

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
include("navbar3.php");
?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">  

      <section class="content-header">
      <h1>
        Tambah Akun Pegawai
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="register-box">

      <div class="register-box-body">
        <!-- <p class="login-box-msg">Register a new membership</p> -->
       
        <form action="registrasi.php" method="post">                
        <div class="form-group has-feedback">
            <input type="hidden" class="form-control" placeholder="id_pelanggan" name="id_pelanggan" value="<?php echo $id_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="no_identitas" name="no_identitas" value="<?php echo $no_identitas?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama_institusi" name="nama_institusi" value="<?php echo $nama_institusi?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="no_telepon" name="no_telepon" value="<?php echo $no_telepon?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="alamat_pelanggan" name="alamat_pelanggan" value="<?php echo $alamat_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="email_pelanggan" name="email_pelanggan" value="<?php echo $email_pelanggan?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="status_pelanggan" name="status_pelanggan" value="<?php echo $status_pelanggan?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username_pel" name="username_pel" value="<?php echo $username_pel?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="password_pel" name="password_pel" value="<?php echo $password_pel?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>    
          <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" >Tambah</button>
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
