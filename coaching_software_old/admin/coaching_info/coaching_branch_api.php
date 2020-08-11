<?php include("../attachment/session.php");
	
	$coaching_info_branch_name = $_POST['coaching_info_branch_name'];
	$coaching_info_branch_code = $_POST['coaching_info_branch_code'];
	$coaching_info_branch_code1 = $coaching_info_branch_code+1;
	$coaching_info_branch_city = $_POST['coaching_info_branch_city'];
	$coaching_info_branch_address = $_POST['coaching_info_branch_address'];
	$coaching_info_branch_contact_number = $_POST['coaching_info_branch_contact_number'];
	$coaching_info_branch_head = $_POST['coaching_info_branch_head'];
	
  $quer="INSERT INTO coaching_branch (coaching_info_branch_name, coaching_info_branch_code, coaching_info_branch_city,coaching_info_branch_address,coaching_info_branch_contact_number, coaching_info_branch_head) VALUES ('$coaching_info_branch_name','$coaching_info_branch_code','$coaching_info_branch_city','$coaching_info_branch_address','$coaching_info_branch_contact_number','$coaching_info_branch_head')";
  
  $quer2="update login set branch_code='$coaching_info_branch_code1'";	
  mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	