<?php
include("../attachment/session.php");

$delete_record=$_GET['id'];

$query="delete from student_admission_info where s_no='$delete_record' and session_value='$session1'";

if(mysqli_query($conn37,$query)){

	echo "|?|success|?|";
}
?>