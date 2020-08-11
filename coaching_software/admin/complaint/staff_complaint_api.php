<?php include("../attachment/session.php");
	
	echo "<script>document.getElementById('submit').disabled = true</script>"; 
    $staff_complaint_reply = $_POST['staff_complaint_reply'];
	

	
	$quer="update complaint_staff set staff_complaint_reply='$staff_complaint_reply',staff_complaint_seen_or_unseen='Seen'";
  
 
if(mysqli_query($conn37,$quer)){

		echo "|?|success|?|";
}


	?>
