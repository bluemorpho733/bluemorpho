<?php include("../attachment/session.php");	

$delete_record=$_GET['id'];

$query="delete from holiday_manage where s_no='$delete_record'";

if(mysqli_query($conn37,$query)){

echo "|?|success|?|";
}
?>