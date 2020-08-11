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
	
	
	$que1="select * from staff_attendance where emp_rf_id_no='$rfid_no' and month='$current_month' and year='$current_year' and session_value='$session1' order by s_no DESC";
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
		$query="update staff_attendance set `$column_name`='$in_time', `$current_date`='P',$update_by_update_sql where emp_rf_id_no='$rfid_no' and month='$current_month' and year='$current_year' and session_value='$session1'";
		if(mysqli_query($conn37,$query)){

                if($send_sms=="Yes"){
				$query1="select emp_mobile from employee_info where emp_rf_id_no='$rfid_no' and emp_status='Active' and session_value='$session1'";
				$result1=mysqli_query($conn37,$query1) or die(mysqli_error($conn37));
				$row1=mysqli_fetch_assoc($result1);
				$emp_mobile=$row1['emp_mobile'];
		        sendDNDSMS($emp_mobile,$sms1);
				}

		}
}
}else{


$que1="select emp_id,emp_name,emp_categories,emp_designation,emp_rf_id_no,emp_mobile from employee_info where emp_rf_id_no='$rfid_no' and emp_status='Active' and session_value='$session1'";
$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
if(mysqli_num_rows($run1)>0){
while($row1=mysqli_fetch_assoc($run1)){

$emp_id = $row1['emp_id'];
$emp_name = $row1['emp_name'];
$emp_categories = $row1['emp_categories'];
$emp_designation = $row1['emp_designation'];
$emp_rf_id_no = $row1['emp_rf_id_no'];
$emp_mobile=$row1['emp_mobile'];

	$que11="select * from staff_attendance where staff_id='$emp_id' and month='$current_month' and year='$current_year' and session_value='$session1' order by s_no DESC";
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
		$query="update staff_attendance set `$column_name`='$in_time', `$current_date`='P',emp_rf_id_no='$rfid_no',$update_by_update_sql where  staff_id='$emp_id' and month='$current_month' and year='$current_year' and session_value='$session1'";
		if(mysqli_query($conn37,$query)){

                if($send_sms=="Yes"){
		        sendDNDSMS($emp_mobile,$sms1);
				}

		}
}
}else{



$que7="insert into staff_attendance (staff_id,staff_name,staff_type,staff_designation,emp_rf_id_no,month,year,`$current_date`,`$intime_col`,session_value,$update_by_insert_sql_column) values('$emp_id','$emp_name','$emp_categories','$emp_designation','$emp_rf_id_no','$current_month','$current_year','P','$in_time','$session1'$update_by_insert_sql_value);";

		if(mysqli_query($conn37,$que7)){

            if($send_sms=="Yes"){
		    sendDNDSMS($emp_mobile,$sms1);
			}
			
		}

}
}
	}
	

}
?>