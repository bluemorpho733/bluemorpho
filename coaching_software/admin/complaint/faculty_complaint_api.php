<?php
include("../attachment/session.php");

    $staff_complaint_reply = $_POST['staff_complaint_reply'];
	

	
	$quer="update complaint_staff set staff_complaint_reply='$staff_complaint_reply',staff_complaint_seen_or_unseen='Seen'";
 
//$run1=mysqli_query($conn37,$query1);
 
 
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}

?>