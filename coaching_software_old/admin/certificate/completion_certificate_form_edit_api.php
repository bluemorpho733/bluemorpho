<?php include("../attachment/session.php");
$s_no=$_POST['s_no'];
$completion_coaching_name=$_POST['completion_coaching_name'];
$completion_current_year_from=$_POST['completion_current_year_from'];
$completion_current_year_to=$_POST['completion_current_year_to'];
$completion_type=$_POST['completion_type'];
$completion_student_roll_no=$_POST['completion_student_roll_no'];
$completion_issue_date1=$_POST['completion_issue_date'];
$completion_issue_date2=explode("-",$completion_issue_date1);
$completion_issue_date=$completion_issue_date2[2]."-".$completion_issue_date2[1]."-".$completion_issue_date2[0];
echo $query="update completion_certificate set completion_student_roll_no='$completion_student_roll_no',completion_coaching_name='$completion_coaching_name', completion_current_year_from='$completion_current_year_from', completion_current_year_to='$completion_current_year_to', completion_type='$completion_type', completion_issue_date='$completion_issue_date',$update_by_update_sql  where s_no='$s_no'";
if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>

	