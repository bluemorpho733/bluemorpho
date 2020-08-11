<?php include("../attachment/session.php");
	
$s_no = $_POST['s_no1'];
$subhead_name_separate = $_POST['name_separate'];
$subhead_code_separate = $_POST['code_separate'];

$quer2="update fee_subhead_separate set subhead_name_separate='$subhead_name_separate' where subhead_code_separate='$subhead_code_separate' and s_no='$s_no'";	
mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer2)){
echo "|?|success|?|";
}else{
echo "|?|Error|?|";
}
?>	
