<?php include("../attachment/session.php");
	
	$branch_code = $_GET['branch_code'];
	$active_inactive = $_GET['active_inactive'];
	
	 $quer="update coaching_branch set branch_status='$active_inactive' where coaching_info_branch_code='$branch_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}
?>	