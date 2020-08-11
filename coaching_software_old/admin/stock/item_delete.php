<?php
include("../attachment/session.php");

$delete_record=$_GET['id'];

echo $query="update stock_item_table set item_status='Deleted' where s_no='$delete_record'";

if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>