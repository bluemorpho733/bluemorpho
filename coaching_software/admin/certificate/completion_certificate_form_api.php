<?php include("../attachment/session.php");
 $completion_student_name=$_POST['completion_student_name'];
 $completion_student_father_name=$_POST['completion_student_father_name'];
 $completion_coaching_name=$_POST['completion_coaching_name'];
 $completion_current_year_from=$_POST['completion_current_year_from'];
 $completion_current_year_to=$_POST['completion_current_year_to'];
 $completion_type=$_POST['completion_type'];
 $completion_issue_date1=$_POST['completion_issue_date'];
 $completion_issue_date2=explode("-",$completion_issue_date1);
 $completion_issue_date=$completion_issue_date2[2]."-".$completion_issue_date2[1]."-".$completion_issue_date2[0];
 $completion_student_roll_no=$_POST['completion_student_roll_no'];
 
echo $query="insert into completion_certificate(completion_student_name,completion_student_father_name,completion_coaching_name,completion_current_year_from,completion_current_year_to,completion_type,completion_issue_date,completion_student_roll_no,session_value,$update_by_insert_sql_column) values('$completion_student_name','$completion_student_father_name','$completion_coaching_name','$completion_current_year_from','$completion_current_year_to','$completion_type','$completion_issue_date','$completion_student_roll_no','$session1',$update_by_insert_sql_value)";
 
  if(mysqli_query($conn37,$query)){
	echo "|?|success|?|";
	}
 