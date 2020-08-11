<?php include("../attachment/session.php")?> 
<?php
$roll=$_GET['id'];
$checkup=$_GET['checkup'];

$que15="select * from student_medical_info where student_roll_no='$roll' and session_value='$session1'";
$run15=mysqli_query($conn37,$que15) or die(mysqli_error($conn37));
if(mysqli_num_rows($run15)<1){
$que123="insert into student_medical_info (student_roll_no,session_value,$update_by_insert_sql_column) values('$roll','$session1',$update_by_insert_sql_value)";
mysqli_query($conn37,$que123);
$que15="select * from student_medical_info where student_roll_no='$roll' and session_value='$session1'";
$run15=mysqli_query($conn37,$que15) or die(mysqli_error($conn37)); 
}
$num=0;
while($row=mysqli_fetch_assoc($run15)){

		                         $student_medical_history=$row['student_medical_history'];
								 $student_major_illness=$row['student_major_illness'];
								 $student_height=$row['student_height'];
								 $student_weight=$row['student_weight'];
								 
								 $checkup_date=$row[$checkup.'_date'];
								 $checkup_hospital_name=$row[$checkup.'_hospital_name'];
								 $checkup_doctor_name=$row[$checkup.'_doctor_name'];
								 $checkup_bp=$row[$checkup.'_bp'];
								 $checkup_hb=$row[$checkup.'_hb'];
								 $checkup_suger=$row[$checkup.'_suger'];
								 $checkup_hiv=$row[$checkup.'_hiv'];
								 $checkup_tb=$row[$checkup.'_tb'];
								 $checkup_eye_problem=$row[$checkup.'_eye_problem'];
								 $checkup_specs=$row[$checkup.'_specs'];
								 $checkup_left_specs_no=$row[$checkup.'_left_specs_no'];
								 $checkup_right_specs_no=$row[$checkup.'_right_specs_no'];
								 $checkup_remark=$row[$checkup.'_remark'];
								 $checkup_discription=$row[$checkup.'_discription'];
								 $checkup_marks=$row[$checkup.'_marks'];

								 }
	

	
	$database_name1=$_SESSION['database_name'];
$database_blob1=$database_name1."_blob";
$que151="select * from $database_blob1.student_health where student_roll_no='$roll' and session_value='$session1'";
$run151=mysqli_query($conn37,$que151) or die(mysqli_error($conn37));
if(mysqli_num_rows($run151)<1){
$que1231="insert into $database_blob1.student_health (student_roll_no,session_value) values('$roll','$session1')";
mysqli_query($conn37,$que1231);
$que151="select * from $database_blob1.student_health where student_roll_no='$roll' and session_value='$session1'";
$run151=mysqli_query($conn37,$que151) or die(mysqli_error($conn37)); 
}
while($row1=mysqli_fetch_assoc($run151)){

		                         $checkup_report1=$row1[$checkup.'_report'];
	
	}
    $num=1;	
	echo $student_medical_history."|?|".$student_major_illness."|?|".$student_height."|?|".$student_weight."|?|".$checkup_date."|?|".$checkup_hospital_name."|?|".$checkup_doctor_name."|?|".$checkup_bp."|?|".$checkup_hb."|?|".$checkup_suger."|?|".$checkup_hiv."|?|".$checkup_tb."|?|".$checkup_eye_problem."|?|".$checkup_specs."|?|".$checkup_left_specs_no."|?|".$checkup_right_specs_no."|?|".$checkup_remark."|?|".$checkup_discription."|?|".$checkup_marks."|?|".$checkup_report1."|?|".$student_medical_history."|?|".$num;
	
?>