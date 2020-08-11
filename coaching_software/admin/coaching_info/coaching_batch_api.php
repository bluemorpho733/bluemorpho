<?php include("../attachment/session.php");
	
    $coaching_info_batch_name = $_POST['coaching_info_batch_name'];
	$coaching_info_batch_code = $_POST['coaching_info_batch_code'];
	$coaching_info_batch_code1 = $coaching_info_batch_code+1;
	$course_code = $_POST['course_code'];
	$subject_code = $_POST['subject_code'];
	$coaching_info_batch_time_from = $_POST['coaching_info_batch_time_from'];
	$coaching_info_batch_time_to = $_POST['coaching_info_batch_time_to'];
	$coaching_info_batch_remark = $_POST['coaching_info_batch_remark'];
	
  $quer="INSERT INTO coaching_batch (coaching_info_batch_name, coaching_info_batch_code,subject_code,course_code,coaching_info_batch_time_from,coaching_info_batch_time_to, coaching_info_batch_remark) VALUES ('$coaching_info_batch_name','$coaching_info_batch_code','$subject_code','$course_code','$coaching_info_batch_time_from','$coaching_info_batch_time_to','$coaching_info_batch_remark')";
  
  $quer2="update login set batch_code='$coaching_info_batch_code1'";	
  mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	