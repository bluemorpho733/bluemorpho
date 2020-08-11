<?php include("../attachment/session.php"); ?>
<?php 
 $student_name=$_POST['student_name'];
 $course_code=$_POST['course_code'];
 $get_subject=$_POST['get_subject'];
 $student_roll_no=$_POST['student_roll_no'];
 $student_rf_id_number=$_POST['student_rf_id_number'];
 
 $query="select * from coaching_info_rfid_card where rfid_no='$student_rf_id_number'";
 $result= mysqli_query($conn37,$query);
  $num_rows = mysqli_num_rows($result);
if($num_rows>0){

 $query1="select * from student_admission_info where student_rf_id_number='$student_rf_id_number' and session_value='$session1'";
 $result1= mysqli_query($conn37,$query1);
  $num_rows1 = mysqli_num_rows($result1);
  $row=mysqli_fetch_assoc($result1);
  		$student_name1=$row['student_name'];

  if($num_rows1>0){
 echo "|?|This RFID Has Already alloted To ".$student_name1  ."Course ".$course_code."|?|";
     }
else{
$quer="update student_admission_info set student_rf_id_number='$student_rf_id_number',$update_by_update_sql  where student_roll_no='$student_roll_no'";
$quer2="update coaching_info_rfid_card set student_name='$student_name',student_roll_no='$student_roll_no',edited='0',$update_by_update_sql  where rfid_no='$student_rf_id_number' and session_value='$session1'";
mysqli_query($conn37,$quer2);
$quer3="update student_attendance set attendance_rf_id_no='$student_rf_id_number',$update_by_update_sql  where attendance_roll_no='$student_roll_no' and session_value='$session1'";
mysqli_query($conn37,$quer3);
 if(mysqli_query($conn37,$quer)){
		
		echo "|?|Suceess Fully Card Assigned|?|";
	}
 }
}else{
	 echo "|?|Invalid Card Number|?|";
 }
 
  
?>