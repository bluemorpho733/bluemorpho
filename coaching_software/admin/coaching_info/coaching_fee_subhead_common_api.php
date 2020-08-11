<?php include("../attachment/session.php");
	
$s_no = $_POST['s_no'];
$subhead_name_common = $_POST['name_common'];
$subhead_code_common = $_POST['code_common'];

$quer2="update fee_subhead_common set subhead_name_common='$subhead_name_common' where subhead_code_common='$subhead_code_common' and s_no='$s_no'";	
mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer2)){
echo "|?|success|?|";
}else{
echo "|?|Error|?|";
}
?>	
