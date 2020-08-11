<?php include("../attachment/session.php");
 $delete_record=$_GET['id'];
 $student_admission_date=$_GET['date'];
$query2="update student_admission_info set student_status='Deleted',$update_by_update_sql  where student_roll_no='$delete_record' and session_value='$session1'";
if(mysqli_query($conn37,$query2)){
echo "|?|success|?|";
}
?>