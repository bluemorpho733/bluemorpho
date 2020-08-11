<?php 
include("../attachment/session.php");
$allotment_id=$_GET['allotment_id'];
$delete=mysqli_query($conn37,"delete from subject_allotment where subject_allotment_id='$allotment_id'");
if($delete){
	echo "|?|success|?|";
}
?>