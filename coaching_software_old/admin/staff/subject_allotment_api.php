<?php include("../attachment/session.php");
	$emp_id=$_POST['employee_name'];
	$course_id=$_POST['course_code'];
	$subject_id=$_POST['subject_code'];
	$posted_date2=$_POST['posted_date'];
	if($posted_date==''){
    $posted_date=date("Y-m-d");
	}else{
	$posted_date=$posted_date2;	
	}
	//$posted_date=date("d/m/y");
	$select_query=mysqli_query($conn37,"select * from subject_allotment where subject_id='$subject_id' and employee_id='$emp_id'");
	if(mysqli_num_rows($select_query)>0){
	echo "|?|exist|?|";
}else{
	$query="insert into subject_allotment (employee_id,course_id,subject_id,posted_date,subject_allotment_status,session_value) values('$emp_id','$course_id','$subject_id','$posted_date','Active','$session1')";
	if(mysqli_query($conn37,$query)){
	echo "|?|success|?|";
	}	
}
?>


