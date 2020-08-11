<?php include("../attachment/session.php");
    
$staff_attendance_date=$_POST['staff_attendance_date'];
$staff_attendance_date2=explode('-',$staff_attendance_date);
			$staff_attendance_date4=$staff_attendance_date2[2];
			//$year=$staff_attendance_date2[0];
			$month=$staff_attendance_date2[1];
			$session_exp=explode('_',$session1);
			if($month=='01' || $month=='02' || $month=='03'){
			    $year=$session_exp[0]+1;
			}else{
			    $year=$session_exp[0];
			}
$staff_type=$_POST['staff_type'];
$staff_id=$_POST['staff_id'];
$staff_attendance=$_POST['staff_attendance'];
$col_name=$_POST['col_name'];
$col_name11='intime_'.$staff_attendance_date4;

$count=count($staff_id);
for($i=0;$i<$count;$i++){

if($col_name[$i]!='0000-00-00 00:00:00'){
$in_time[$i]=$col_name[$i];
}else{
if($staff_attendance[$i]!=''){
date_default_timezone_set('Asia/Calcutta');
$in_time[$i]=date('Y-m-d H:i:s');
}else{
$in_time[$i]='0000-00-00 00:00:00';
}
}

$query="update staff_attendance set `$col_name11`='$in_time[$i]', `$staff_attendance_date4`='$staff_attendance[$i]',$update_by_update_sql where staff_type='$staff_type' and month='$month' and year='$year' and staff_id='$staff_id[$i]' and session_value='$session1'";
mysqli_query($conn37,$query);
}

	echo "|?|success|?|staff_type=".$staff_type."&date=".$staff_attendance_date."&";
?>

