<?php
include("../attachment/session.php");
$current_date1=$_GET['current_date'];
$student_roll_no=$_GET['student_roll_no'];
$attendance=$_GET['attendance'];
$student_rf_id_number=$_GET['student_rf_id_number'];

$current_date2=explode('-',$current_date1);
$current_dt=$current_date2[2];
$current_mth=$current_date2[1];
$current_yr=$current_date2[0];

date_default_timezone_set('Asia/Calcutta');
$in_time=date($current_date1.' H:i:s');
$col_name11='intime_'.$current_dt;

$query="select attendance_roll_no from student_attendance where attendance_roll_no='$student_roll_no' and month='$current_mth' and year='$current_yr' and attendance_rf_id_no='$student_rf_id_number' and session_value='$session1'";
$result=mysqli_query($conn37,$query)or die(mysqli_error($conn37));
if(mysqli_num_rows($result)>0){

$query1="update student_attendance set `$col_name11`='$in_time',`$current_dt`='$attendance',$update_by_update_sql where month='$current_mth' and year='$current_yr' and attendance_roll_no='$student_roll_no' and attendance_rf_id_no='$student_rf_id_number' and session_value='$session1'";
$result1=mysqli_query($conn37,$query1);

}else{

$query2="select student_name,student_class,student_class_section,student_rf_id_number from student_admission_info where student_roll_no='$student_roll_no' and student_rf_id_number='$student_rf_id_number' and session_value='$session1'";
$result2=mysqli_query($conn37,$query2)or die(mysqli_error($conn37));
while($row2=mysqli_fetch_assoc($result2)){
$student_name=$row2['student_name'];
$student_class=$row2['student_class'];
$student_class_section=$row2['student_class_section'];
$student_rf_id_number=$row2['student_rf_id_number'];

$query3="insert into student_attendance(attendance_roll_no,attendance_name,attendance_class,attendance_section,attendance_rf_id_no,month,year,`$col_name11`,`$current_dt`,session_value,student_medium,medium,board,school,shift,$update_by_insert_sql_column) values('$student_roll_no','$student_name','$student_class','$student_class_section','$student_rf_id_number','$current_mth','$current_yr','$in_time','$attendance','$session1','$medium_change','$medium_change','$board_change','$school_code','$shift_change',$update_by_insert_sql_value)";
mysqli_query($conn37,$query3);
}
}
?>