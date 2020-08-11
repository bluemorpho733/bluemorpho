<?php include("../attachment/session.php");

	$reminder_teacher_name = $_POST['reminder_teacher_name'];
	$reminder_allocated_date_1 = $_POST['reminder_allocated_date'];
	$reminder_allocated_date_2 = explode("-",$reminder_allocated_date_1);
	$reminder_allocated_date=$reminder_allocated_date_2[2]."-".$reminder_allocated_date_2[1]."-".$reminder_allocated_date_2[0];
	$reminder_finish_date_1 = $_POST['reminder_finish_date'];
	$reminder_finish_date_2 = explode("-",$reminder_finish_date_1);
	$reminder_finish_date=$reminder_finish_date_2[2]."-".$reminder_finish_date_2[1]."-".$reminder_finish_date_2[0];
	$reminder_teacher_task_1 = $_POST['reminder_teacher_task_1'];
	$reminder_teacher_task_2 = $_POST['reminder_teacher_task_2'];
	$reminder_teacher_task_3 = $_POST['reminder_teacher_task_3'];
	$reminder_teacher_task_4 = $_POST['reminder_teacher_task_4'];
	$reminder_teacher_task_5 = $_POST['reminder_teacher_task_5'];
	$reminder_teacher_remark = $_POST['reminder_teacher_remark'];
	
$quer="insert into teacher_reminder(reminder_teacher_name,reminder_allocated_date,reminder_finish_date,reminder_teacher_task_1,reminder_teacher_task_2,reminder_teacher_task_3,reminder_teacher_task_4,reminder_teacher_task_5,reminder_teacher_remark,session_value,$update_by_insert_sql_column)
      values('$reminder_teacher_name','$reminder_allocated_date','$reminder_finish_date','$reminder_teacher_task_1','$reminder_teacher_task_2','$reminder_teacher_task_3','$reminder_teacher_task_4','$reminder_teacher_task_5','$reminder_teacher_remark','$session1',$update_by_insert_sql_value)";

if(mysqli_query($conn37,$quer)){
echo "|?|success|?|";
}
?>