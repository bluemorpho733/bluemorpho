<?php include("../attachment/session.php");
	
	$batch_code = $_GET['batch_code'];
	$active_inactive = $_GET['active_inactive'];
	
	 $quer="update coaching_batch set batch_status='$active_inactive' where coaching_info_batch_code='$batch_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}
?>	