<?php
include("../attachment/session.php");

$delete_record=$_GET['id'];

$query="update stock_buy_table_1 set purchase_status='Deleted' where s_no='$delete_record'";

if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}

?>