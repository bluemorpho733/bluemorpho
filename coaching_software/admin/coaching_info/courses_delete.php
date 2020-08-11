<?php include("../attachment/session.php");
	
	$courses_code = $_GET['courses_code'];
	$active_inactive = $_GET['active_inactive'];
	
	 $quer="update coaching_courses set courses_status='$active_inactive' where coaching_info_courses_code='$courses_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}
?>	