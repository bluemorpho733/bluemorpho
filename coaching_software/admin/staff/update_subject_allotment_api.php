<?php 
include("../attachment/session.php");
$subject_allotment_id=$_POST['subject_allotment_id'];
// $employee_name=$_POST['employee_name'];
$course_code=$_POST['course_code'];
$subject_id=$_POST['subject_id'];
$posted_date2=$_POST['posted_date'];
if($posted_date2!=''){
$posted_date=$posted_date2;	
}else{
$posted_date=date("d-m-Y");	
}
$status=$_POST['status'];
$update=mysqli_query($conn37,"update subject_allotment set course_id='$course_code',subject_id='$subject_id',posted_date='$posted_date', subject_allotment_status='$status' where subject_allotment_id='$subject_allotment_id'");
if($update){
	echo "|?|success|?|";
}
?>