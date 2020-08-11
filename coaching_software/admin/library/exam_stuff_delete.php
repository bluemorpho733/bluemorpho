<?php include("../attachment/session.php"); ?>
<?php

$delete_record=$_GET['id'];

$query="delete from library_exam_stuff where id='$delete_record'";

if(mysqli_query($conn37,$query)){

// $database_name1=$_SESSION['database_name'];
// $database_blob1=$database_name1."_blob";
// $database_blob1.
$query1="Delete from library_exam_stuff_document where stuff_s_no='$delete_record'";
if(mysqli_query($conn37,$query1)){
echo "|?|success|?|";
}
}
?>