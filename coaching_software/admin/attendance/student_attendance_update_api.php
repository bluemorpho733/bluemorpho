<?php include("../attachment/session.php"); ?>
 <?php include("../sms/sms.php"); ?>
<?php

$student_courses=$_POST['student_courses'];
$student_subject=$_POST['student_subject'];
$unique_id=$_POST['unique_id'];
$student_attendance=$_POST['student_attendance'];
$attendance_rf_id_no=$_POST['attendance_rf_id_no'];
$attendance_student_date=$_POST['attendance_student_date'];
$attendance_student_date2=explode('-',$attendance_student_date);
			$attendance_student_date3=$attendance_student_date2[2]."-".$attendance_student_date2[1]."-".$attendance_student_date2[0];
			$attendance_student_date4=$attendance_student_date2[2];
			//$year=$attendance_student_date2[0];
			$month=$attendance_student_date2[1];
			$session_exp=explode('_',$session1);
			if($month=='01' || $month=='02' || $month=='03'){
			    $year=$session_exp[0]+1;
			}else{
			    $year=$session_exp[0];
			}
$col_name=$_POST['col_name'];
$col_name11='intime_'.$attendance_student_date4;

$result1=0;
$count=count($unique_id);
for($i=0;$i<$count;$i++){

if($col_name[$i]!='0000-00-00 00:00:00'){
$in_time[$i]=$col_name[$i];
}else{
if($student_attendance[$i]!=''){
date_default_timezone_set('Asia/Calcutta');
$in_time[$i]=date('Y-m-d H:i:s');
}else{
$in_time[$i]='0000-00-00 00:00:00';
}
}

$query="update student_attendance set `$col_name11`='$in_time[$i]', `$attendance_student_date4`='$student_attendance[$i]',$update_by_update_sql where month='$month' and year='$year' and attendance_roll_no='$unique_id[$i]' and attendance_rf_id_no='$attendance_rf_id_no[$i]' and session_value='$session1'";


if(mysqli_query($conn37,$query)){
$result1=$result1+1;
}

}

$persent_message=$_POST['persent_message'];
$persent_message1=explode('?',$persent_message);
$absent_message=$_POST['absent_message'];
$absent_message1=explode('?',$absent_message);
$leave_message=$_POST['leave_message'];
$leave_message1=explode('?',$leave_message);
if(isset($_POST['parents_message'])){
$parents_message=$_POST['parents_message'];
$count1=count($parents_message);
for($j=0;$j<$count1;$j++){
$parents_message1=explode('|?|',$parents_message[$j]);
if($parents_message1[2]=='P' || $parents_message1[2]=='P/2'){
$message=$persent_message1[0].$parents_message1[0].$persent_message1[1];
if(isset($_POST['all_present_student'])){
$parents_message2=$parents_message1[1];
sendDNDSMS($parents_message2, $message);
}
}elseif($parents_message1[2]=='A'){
$message=$absent_message1[0].$parents_message1[0].$absent_message1[1];
if(isset($_POST['all_absent_student'])){
$parents_message2=$parents_message1[1];
sendDNDSMS($parents_message2, $message);
}
}elseif($parents_message1[2]=='L'){
$message=$leave_message1[0].$parents_message1[0].$leave_message1[1];
if(isset($_POST['all_leave_student'])){
$parents_message2=$parents_message1[1];
sendDNDSMS($parents_message2, $message);
}
}else{
$message='';
}


$que12="select * from login";
$run12=mysqli_query($conn37,$que12) or die(mysqli_error($conn37));
while($row12=mysqli_fetch_assoc($run12)){
$server_key=$row12['blank_field_4'];
}
$path_to_fcm = "https://fcm.googleapis.com/fcm/send";
   $que11 = "select fcm_token from fcm_info where roll_number='$unique_id[$i]";
        $run11 = mysqli_query($conn37,$que11);
        $row = mysqli_fetch_assoc($run11);
        $fcm_token= $row['fcm_token'];
     	$headers = array
			(
				'Authorization: key='. $server_key,
				'Content-Type: application/json'
			);
			$fields = array
			(
				'to'=> $fcm_token,
				'notification'=> array('title'=>"Attendance",'body'=>"Attendance")
			);
			$payload  = json_encode($fields);
			$curl_session = curl_init();
			curl_setopt( $curl_session,CURLOPT_URL,$path_to_fcm );
		        curl_setopt( $curl_session,CURLOPT_POST, true );
			curl_setopt( $curl_session,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $curl_session,CURLOPT_RETURNTRANSFER, true );
			curl_setopt ($curl_session, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt( $curl_session,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl_session,CURLOPT_POSTFIELDS, $payload);
			
			$result = curl_exec($curl_session);
 
			curl_close($curl_session);

}
}

if($result1>0){
	echo "|?|success|?|student_courses=".$student_courses."&current_month=".$month."&year=".$year."&attendance_student_date=".$attendance_student_date."&student_subject=".$student_subject;
}
?>