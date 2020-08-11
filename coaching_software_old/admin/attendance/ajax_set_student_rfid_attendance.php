<?php
include("../attachment/session.php");
include("../sms/sms.php");
$rfid_no=$_GET['rfid'];
	$current_date=date("d");
	$current_month=date("m");
	$current_year=date("Y");
	$full_date=date('Y-m-d');
	$intime_col='intime_'.$current_date;
	$outtime_col='outtime_'.$current_date;
    $send_sms = $_GET['send_sms'];
	$sms1=$_GET['sms'];

	date_default_timezone_set('Asia/Calcutta');
	$in_time=date('Y-m-d H:i:s'); 
	
	
	$que1="select * from student_attendance where attendance_rf_id_no='$rfid_no' and month='$current_month' and year='$current_year' and session_value='$session1' order by s_no DESC";
$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
if(mysqli_num_rows($run1)>0){
while($row1=mysqli_fetch_assoc($run1)){
$intime_col='intime_'.$current_date;
$in_time1=$row1[$intime_col];
if($in_time1=="0000-00-00 00:00:00"){
	$column_name='intime_'.$current_date;
	}else{
	$column_name='outtime_'.$current_date;
	}
		$query="update student_attendance set `$column_name`='$in_time', `$current_date`='P',$update_by_update_sql where attendance_rf_id_no='$rfid_no' and month='$current_month' and year='$current_year' and session_value='$session1'";
		if(mysqli_query($conn37,$query)){

                if($send_sms=="Yes"){
				$query1="select student_sms_contact_number from student_admission_info where student_rf_id_number='$rfid_no' and student_status='Active' and session_value='$session1'";
				$result1=mysqli_query($conn37,$query1) or die(mysqli_error($conn37));
				$row1=mysqli_fetch_assoc($result1);
				$student_sms_contact_number=$row1['student_sms_contact_number'];
		        sendDNDSMS($student_sms_contact_number,$sms1);
				}

		}
}
}else{


$que1="select student_roll_no,student_name,student_class,student_class_section,student_rf_id_number,student_sms_contact_number,student_medium,medium,school,board,shift from student_admission_info where student_rf_id_number='$rfid_no' and student_status='Active' and session_value='$session1'";
$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
if(mysqli_num_rows($run1)>0){
while($row1=mysqli_fetch_assoc($run1)){
$unique_id = $row1['student_roll_no'];
$student_name = $row1['student_name'];
$student_class = $row1['student_class'];
$student_class_section = $row1['student_class_section'];
$student_rf_id_number = $row1['student_rf_id_number'];
$student_sms_contact_number=$row1['student_sms_contact_number'];
$student_medium=$row1['student_medium'];
$medium=$row1['medium'];
$school=$row1['school'];
$board=$row1['board'];
$shift=$row1['shift'];



$que11="select * from student_attendance where attendance_roll_no='$unique_id' and month='$current_month' and year='$current_year' and session_value='$session1' order by s_no DESC";
$run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
if(mysqli_num_rows($run11)>0){
while($row11=mysqli_fetch_assoc($run11)){
$intime_col='intime_'.$current_date;
$in_time1=$row11[$intime_col];
if($in_time1=="0000-00-00 00:00:00"){
	$column_name='intime_'.$current_date;
	}else{
	$column_name='outtime_'.$current_date;
	}
		$query="update student_attendance set `$column_name`='$in_time', `$current_date`='P',attendance_rf_id_no='$rfid_no',$update_by_update_sql where attendance_roll_no='$unique_id' and month='$current_month' and year='$current_year' and session_value='$session1'";
			if(mysqli_query($conn37,$query)){

            if($send_sms=="Yes"){
		    sendDNDSMS($student_sms_contact_number,$sms1);
			}
			
		}
		
	}
	}else{	

$que7="insert into student_attendance (attendance_roll_no,attendance_name,attendance_class,attendance_section,attendance_rf_id_no,month,year,`$current_date`,`$intime_col`,session_value,student_medium,medium,school,board,shift,$update_by_insert_sql_column) values('$unique_id','$student_name','$student_class','$student_class_section','$student_rf_id_number','$current_month','$current_year','P','$in_time','$session1','$medium','$medium','$school','$board','$shift',$update_by_insert_sql_value);";

		if(mysqli_query($conn37,$que7)){

            if($send_sms=="Yes"){
		    sendDNDSMS($student_sms_contact_number,$sms1);
			}
			
		}

}
}
	}
	

}
?>