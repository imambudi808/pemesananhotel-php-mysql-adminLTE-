<?php
include("connection.php");
session_start();
if(!isset($_SESSION["USERNAME_PEL"]))
{    
    header("Location:8logintamu.php");    
}
$id_res=$_SESSION["ID_RES"];
$nomor_reservasi=$_SESSION["NOMOR_RESERVASI"];





$query="DELETE FROM `detail_reservasi` WHERE `detail_reservasi`.`ID_RESERVASI` = '$id_res'";
$result=mysqli_query($link,$query);


$query1="DELETE FROM `pembayaran` WHERE `pembayaran`.`NOMOR_NOTA` = '$nomor_reservasi'";
$result1=mysqli_query($link,$query1);

$query2="DELETE FROM `reservasi` WHERE `reservasi`.`NOMOR_RESERVASI` = '$nomor_reservasi'";
$result2=mysqli_query($link,$query2);
if($result)
{
    header("Location:10reservasi.php");
}
?>