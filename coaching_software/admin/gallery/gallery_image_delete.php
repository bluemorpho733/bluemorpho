<?php
include("../attachment/session.php");
$delete_record=$_GET['id'];
$que="delete from gallery where s_no='$delete_record'";
if(mysqli_query($conn37,$que)){
echo "|?|success|?|";
}
?>