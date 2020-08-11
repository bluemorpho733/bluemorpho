<?php
 include("../attachment/session.php");
$delete_record=$_GET['id'];
$query="Delete from gallery where gallery_name='$delete_record'";
if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>