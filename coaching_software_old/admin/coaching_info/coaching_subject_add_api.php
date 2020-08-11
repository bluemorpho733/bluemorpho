<?php include("../attachment/session.php");
	
$s_no = $_POST['s_no'];
$subject_name = $_POST['subject_name'];
$subject_code = $_POST['subject_code'];
$updated_date = date('Y-m-d');

$quer2="update coaching_subject set subject_name='$subject_name',updated_date='$updated_date' where subject_code='$subject_code' and s_no='$s_no'";	
mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer2)){
echo "|?|success|?|".$updated_date."|?|";
}else{
echo "|?|Error|?|";
}
?>	
