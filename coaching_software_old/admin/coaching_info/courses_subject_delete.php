<?php include("../attachment/session.php");
	
	$code = $_GET['courses_subject_code'];
	$active_inactive = $_GET['active_inactive'];
	
	 $quer="update coaching_courses_subject set courses_subject_status='$active_inactive' where s_num='$code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}
?>	