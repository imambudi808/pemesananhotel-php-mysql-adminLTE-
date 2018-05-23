<?php
include("connection.php");
$hariini=date('Y-m-d');
echo "$hariini";


$query="SELECT ID_KAMAR,STATUS_KAMAR,MASUK,KELUAR from kamar";

$result=mysqli_query($link,$query);
while($data=mysqli_fetch_assoc($result))
{
    
    
    if($hariini>="$data[MASUK]" AND $hariini<="$data[KELUAR]")
    {
        $query1="UPDATE `kamar` SET `STATUS_KAMAR` = 'Reserved' 
                WHERE ID_KAMAR='$data[ID_KAMAR]'";
        mysqli_query($link,$query1);
        echo"reserved";
    }
    else
    {
        $query1="UPDATE `kamar` SET `STATUS_KAMAR` = 'Available' 
                WHERE ID_KAMAR='$data[ID_KAMAR]'";
        mysqli_query($link,$query1);
        echo"available";
    }
}
?>