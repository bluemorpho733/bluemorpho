<?php 
include("../attachment/session.php");

$delete_record=$_GET['id'];
$emp_id=$_GET['emp_id'];
$salary_date=$_GET['date'];
$total_pay=$_GET['amount'];

$query="update employee_salary_generate set employee_salary_status='Deleted',$update_by_update_sql  where s_no='$delete_record'";

$query1="update ledger_info set ledger_status='Deleted',$update_by_update_sql  where emp_id_or_student_roll_no='$emp_id' and date='$salary_date' and total_amount='$total_pay'";
mysqli_query($conn37,$query1);

if(mysqli_query($conn37,$query)){

    	echo "|?|success|?|emp_id=".$emp_id."|?|";
}
?>