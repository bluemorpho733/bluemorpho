<?php include("../attachment/session.php");
$delete_record=$_GET['id'];
$query="update student_admission_info set student_status='Deleted',$update_by_update_sql  where s_no='$delete_record'";
if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>