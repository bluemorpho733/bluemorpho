<?php include("../attachment/session.php");
	
    $coaching_info_batch_name = $_POST['coaching_info_batch_name'];
	$batch_code = $_POST['coaching_info_batch_code'];
	$coaching_info_batch_time_from = $_POST['coaching_info_batch_time_from'];
	$coaching_info_batch_time_to = $_POST['coaching_info_batch_time_to'];
	$coaching_info_batch_remark = $_POST['coaching_info_batch_remark'];
	
  $quer="update coaching_batch set coaching_info_batch_name='$coaching_info_batch_name',coaching_info_batch_time_from='$coaching_info_batch_time_from',coaching_info_batch_time_to='$coaching_info_batch_time_to',coaching_info_batch_remark='$coaching_info_batch_remark' where coaching_info_batch_code='$batch_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	