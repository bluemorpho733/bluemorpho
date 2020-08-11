<?php include("../attachment/session.php");
	
	$coaching_info_branch_name = $_POST['coaching_info_branch_name'];
	$branch_code = $_POST['coaching_info_branch_code'];
	$coaching_info_branch_city = $_POST['coaching_info_branch_city'];
	$coaching_info_branch_address = $_POST['coaching_info_branch_address'];
	$coaching_info_branch_contact_number = $_POST['coaching_info_branch_contact_number'];
	$coaching_info_branch_head = $_POST['coaching_info_branch_head'];
	
  $quer="update coaching_branch set coaching_info_branch_name='$coaching_info_branch_name',coaching_info_branch_city='$coaching_info_branch_city',coaching_info_branch_address='$coaching_info_branch_address',coaching_info_branch_contact_number='$coaching_info_branch_contact_number',coaching_info_branch_head='$coaching_info_branch_head' where coaching_info_branch_code='$branch_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	