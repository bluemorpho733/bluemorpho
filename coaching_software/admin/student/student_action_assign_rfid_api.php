<?php include("../attachment/session.php");  
  $student_name1=$_POST['student_name1'];
 $student_roll_no1=$_POST['student_roll_no1'];
 $student_rf_id_number=$_POST['student_rf_id_number'];
 
 $query="select * from school_info_rfid_card where rfid_no='$student_rf_id_number'";
 $result= mysqli_query($conn37,$query);
  $num_rows = mysqli_num_rows($result);
if($num_rows>0){

 $query1="select * from student_admission_info where student_rf_id_number='$student_rf_id_number' and session_value='$session1' ";
 $result1= mysqli_query($conn37,$query1);
  $num_rows1 = mysqli_num_rows($result1);
  $row=mysqli_fetch_assoc($result1);
  		$student_name2=$row['student_name'];
		$student_class2=$row['student_class'];
  if($num_rows1>0){
 echo "<script>alert('This RFID Has Already alloted To $student_name2  class $student_class2  ');</script>";
     }
else{
$quer="update student_admission_info set student_rf_id_number='$student_rf_id_number',$update_by_update_sql  where student_roll_no='$student_roll_no1' and session_value='$session1' ";
 if(mysqli_query($conn37,$quer)){
		
echo "|?|success|?|view|?|";
	}
 }
}
 else{
echo "|?|success|?|error|?|";
 }
 ?>