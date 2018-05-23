<?php
  // buat koneksi dengan database mysql
  // $dbhost = "192.168.19.140";
  // $dbuser = "pp8377";
  // $dbpass = "8377";
  // $dbname = "8377";
  // $dbhost = "localhost";
  // $dbuser = "root";
  // $dbpass = "";
  // $dbname = "sigah2";

  // $dbhost = "localhost";
  // $dbuser = "root";
  // $dbpass = "";
  // $dbname = "8471";

  $dbhost = "localhost";
  $dbuser = "pp8471";
  $dbpass = "8471";
  $dbname = "8471";
  $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  
  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }
 
?>