<?php include("../attachment/session.php");
 $delete_record=$_GET['id'];
//  $student_admission_date=$_GET['date'];
$query2="update registration_details set student_status='Deleted' where s_no='$delete_record' and session_value='$session1'";
if(mysqli_query($conn37,$query2)){
echo "|?|success|?|";
}
?>