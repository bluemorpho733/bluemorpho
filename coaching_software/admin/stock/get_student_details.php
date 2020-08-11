<?php
include("../attachment/session.php");
$id=$_GET['id'];


// $qry="select * from student_admission_info where s_no='$id' and session_value='$session1' ";
$qry="select * from student_admission_info where s_no='$id'";

$result=mysqli_query($conn37,$qry) or die(mysqli_error($conn37));

while($row=mysqli_fetch_assoc($result)){

	$s_no=$row['s_no'];
	$student_name=$row['student_name'];
	$student_father_name=$row['student_father_name'];
	$course_code=$row['course_code'];
	$student_roll_no=$row['student_roll_no'];

echo $student_father_name."|?|".$course_code."|?|".$student_roll_no;

}

?>