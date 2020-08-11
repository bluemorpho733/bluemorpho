<?php include("../attachment/session.php"); ?> <?php
$roll=$_GET['id'];

$que15="select * from student_admission_info where student_roll_no='$roll' and session_value='$session1' ";
$run15=mysqli_query($conn37,$que15) or die(mysqli_error($conn37));
$num=0;
while($row15=mysqli_fetch_assoc($run15)){
	  $student_name=$row15['student_name'];
	   $student_father_name=$row15['student_father_name'];
	   $student_contact_number=$row15['student_contact_number'];
	}
    if(mysqli_num_rows($run15)>0){
    $num=1;	
	echo $student_name."|?|".$student_father_name."|?|".$student_contact_number."|?|".$num;
	}
?>