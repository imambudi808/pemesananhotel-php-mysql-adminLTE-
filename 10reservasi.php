<?php
error_reporting(0);
include("connection.php");
//set ke tersedian kmar sesuai tgl checin check out
$hariini=date('Y-m-d');
$query="SELECT ID_KAMAR,STATUS_KAMAR,MASUK,KELUAR from kamar";
$result=mysqli_query($link,$query);
while($data=mysqli_fetch_assoc($result))
{
    
    
    if($hariini>="$data[MASUK]" AND $hariini<="$data[KELUAR]")
    {
        $query1="UPDATE `kamar` SET `STATUS_KAMAR` = 'Reserved' 
                WHERE ID_KAMAR='$data[ID_KAMAR]'";
        mysqli_query($link,$query1);        
    }
    else
    {
        $query1="UPDATE `kamar` SET `STATUS_KAMAR` = 'Available' 
                WHERE ID_KAMAR='$data[ID_KAMAR]'";
        mysqli_query($link,$query1);        
    }
}
//end of cek ketersedian kamar
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$pengunjung=$_SESSION['USERNAME_PEL'];



if (isset($_GET["submit"])) {     
    $tglcheckin = htmlentities(strip_tags(trim($_GET["tglcheckin"])));
    $tglcheckout = htmlentities(strip_tags(trim($_GET["tglcheckout"])));   
 

    $dewasa = htmlentities(strip_tags(trim($_GET["dewasa"])));
    $anak = htmlentities(strip_tags(trim($_GET["anak"])));  
    $jumlah_kamar =htmlentities(strip_tags(trim($_GET["jumlah_kamar"])));  

    
    
    $tglcheckin = mysqli_real_escape_string($link,$tglcheckin);
    $tglcheckout = mysqli_real_escape_string($link,$tglcheckout);
    $jumlah_kamar= mysqli_real_escape_string($link,$jumlah_kamar);
    

    $dewasa = mysqli_real_escape_string($link,$dewasa);
    $anak = mysqli_real_escape_string($link,$anak);


    // $tgl_checkin = $thn."-".$bln."-".$tgl;
    // $tgl_checkout = $thn1."-".$bln1."-".$tgl1;
    $nama = htmlentities(strip_tags(trim($_GET["nama"])));  
    
    $nama = mysqli_real_escape_string($link,$nama);   

    $durasi=((abs(strtotime ($tglcheckout) - strtotime ($tglcheckin)))/(60*60*24));
    $dewasa=$dewasa;
    $anak=$anak;
    
    
    
    
    $query="SELECT ID_KAMAR,ID_JENIS_KAMAR,JENIS_KAMAR,ID_CABANG,CABANG,ID_TARIF,TARIF,COUNT(DISTINCT ID_KAMAR) AS JUMLAH from kamar JOIN cabang USING(ID_CABANG)
            JOIN jenis_kamar USING(ID_JENIS_KAMAR) JOIN tarif USING(ID_JENIS_KAMAR) JOIN season USING(ID_SEASON)
            WHERE STATUS_SEASON='Aktif' AND STATUS_KAMAR='Available' AND JENIS_KAMAR LIKE '%$nama%'  GROUP BY CABANG,JENIS_KAMAR";
    $_SESSION['DURASI']=$durasi;


    
  } 
else { 
    $query="SELECT ID_KAMAR,ID_JENIS_KAMAR,JENIS_KAMAR,ID_CABANG,CABANG,ID_TARIF,TARIF,COUNT(DISTINCT ID_KAMAR) AS JUMLAH from kamar JOIN cabang USING(ID_CABANG)
    JOIN jenis_kamar USING(ID_JENIS_KAMAR) JOIN tarif USING(ID_JENIS_KAMAR) JOIN season USING(ID_SEASON)
    WHERE STATUS_SEASON='Aktif' AND STATUS_KAMAR='Available' GROUP BY CABANG,JENIS_KAMAR";
    $nama="Pilih Jenis Kamar";    
    $durasi="";
    $dewasa="";
    $anak=""; 
    $tglcheckin=date('Y-m-d');
    $tglcheckout=date('Y-m-d');
    $jumlah_kamar="";
    
   
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
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pemesanan Kamar Hotel</h3>     
              <br><br>       
              
              
            <div class="box-body">
            <form id="search" action="10reservasi.php" method="get" > 
              <div class="row">         
              <!-- time picker check in    -->             

              <div class="col-xs-2">
                <label for="">Check In</label>
              <div class="input-group date">                  
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tglcheckin" value="<?php echo "$tglcheckin"; ?>">
              </div>
              </div>

              <!-- check out -->
              <div class="col-xs-2">
                <label for="">Check Out</label>
              <div class="input-group date">                  
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker2" name="tglcheckout" value="<?php echo "$tglcheckout"; ?>">
              </div>
              </div>




                
                <div class="col-xs-2">
                    <?php
                        $query1="SELECT * FROM jenis_kamar";
                        $result1=mysqli_query($link,$query1); 
                        if(!$result1){
                            die ("Query Error: ".mysqli_errno($link).
                                " - ".mysqli_error($link));
                        }                          
                    ?>
                <label for="">Tipe</label>
                    <select name="nama" id="nama" class="form-control" >
                        <option value=""><?php echo "$nama";?></option>
                        <?php
                            while($data1 = mysqli_fetch_assoc($result1))
                            {
                        ?>
                            <option value="<?php echo "$data1[JENIS_KAMAR]" ?>"><?php echo "$data1[JENIS_KAMAR]" ?></option>
                        <?php
                            }
                        ?>    
                    </select>
                </div>
                <div class="col-xs-1">
                <label for="">Durasi</label>
                <input type="text" name="durasi" value="<?php echo "$durasi hari";?>" class="form-control">
                </div>

                <div class="col-xs-1">
                <label for="">Dewasa</label>
                <select name="dewasa" class="form-control">
                <option value=""><?php echo "$dewasa";?></option>
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                    if ($i==$dewasa){
                        echo "<option value = $i selected>";
                        }
                        else {
                        echo "<option value = $i >";
                        }
                        echo "$i </option>";
                    }
                    ?>
                </select>
                </div>

                <div class="col-xs-1">
                <label for="">Anak</label>
                <select name="anak" class="form-control">
                <option value=""><?php echo "$anak";?></option>
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                    if ($i==$anak){
                        echo "<option value = $i selected>";
                        }
                        else {
                        echo "<option value = $i >";
                        }
                        echo "$i </option>";
                    }
                    ?>
                </select>
                </div>                               
                <div class="col-xs-1">
                <label for="">Jml</label>
                <select name="jumlah_kamar" class="form-control">
                <option value=""><?php echo "$jumlah_kamar";?></option>
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                    if ($i==$jumlah_kamar){
                        echo "<option value = $i selected>";
                        }
                        else {
                        echo "<option value = $i >";
                        }
                        echo "$i </option>";
                    }
                    ?>
                </select>
                </div>    
                
                            
                <div class="col-xs-2"> 
                               <label for="">.</label><br>
                    <input type="submit" name="submit" value="Cari Kamar" class="btn btn-primary" >
                </div>
              </div> 
            </form>              
            </div> 
            <br><br>           
            <!-- /.box-body -->
          </div>

      <!-- Main content -->
      <section class="content">
      <?php
      $result = mysqli_query($link, $query);
      ?>
      <?php while($data=mysqli_fetch_assoc($result))
      { ?>
	  <div class="row nav-tabs-custom">       
        <div class="col-sm-4">
          <img class="img-responsive" src="asset/img/photo1.jpg" alt="Photo">         
        </div>
        <div class="col-md-6">             
              
          <h2>Jenis Kamar   :  <?php echo "$data[JENIS_KAMAR]";?></h2>  
             	  
          
          <p>Lokasi Hotel   :  <?php echo "$data[CABANG]";?></p>	
          <p>Harga          :  <b>Rp. <?php echo "$data[TARIF]";?></b></p>
          <p>Jumlah Tersedia:  <b> <?php echo "$data[JUMLAH]";?> Kamar</b></p>
                           
        </div>    
        <div class="col-md-2">               
          <br><br><br>          
          <form action="10booking.php" method="post" >
                    <input type="hidden" name="id_kamar" value="<?php "$data[ID_KAMAR]"; ?>" >
                    <input type="hidden" name="id_jenis_kamar" value="<?php echo "$data[ID_JENIS_KAMAR]"; ?>" >
                    <input type="hidden" name="lokasi" value="<?php echo "$data[CABANG]";?>" >
                    <input type="hidden" name="id_lokasi" value="<?php echo "$data[ID_CABANG]";?>" >
                    <input type="hidden" name="tglcheckin" value="<?php echo "$tglcheckin"; ?>" >
                    <input type="hidden" name="tglcheckout" value="<?php echo "$tglcheckout"; ?>" >
                    <input type="hidden" name="durasi" value="<?php echo "$durasi"; ?>" >
                    <input type="hidden" name="dewasa" value="<?php echo "$dewasa"; ?>" >
                    <input type="hidden" name="anak" value="<?php echo "$anak"; ?>" >
                    <input type="hidden" name="jumlah_kamar" value="<?php echo "$jumlah_kamar"; ?>" >
                    <input type="hidden" name="jenis_kamar" value="<?php echo "$data[JENIS_KAMAR]"; ?>" >
                    <input type="hidden" name="id_tarif" value="<?php echo "$data[ID_TARIF]"; ?>" >
                    <input type="hidden" name="tarif" value="<?php echo "$data[TARIF]"; ?>" >
                    <input type="hidden" name="jumlah_tersedia" value="<?php echo "$data[JUMLAH]"; ?>" >
                    <input type="submit" name="submit" value="Booking" class="btn btn-warning col-md-6">
          </form>
          <br><br><br>
          <form action="10detailkamar.php" method="post" >
                    <input type="hidden" name="id_kamar" value="<?php echo "$data[ID_KAMAR]"; ?>" >
                    <input type="hidden" name="jenis_kamar" value="<?php echo "$data[JENIS_KAMAR]"; ?>" >
                    <input type="submit" name="submit" value="Detail" class="btn btn-primary col-md-6">
          </form> 
          
                   
        </div>            
      
      </div>
      <br>
      <?php } 
      ?>
			
        <!-- /.box -->
      </section>
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
      format: "yyyy-mm-dd",
      autoclose: true
    })
       //Date picker2
       $('#datepicker2').datepicker({
        format: "yyyy-mm-dd",
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


