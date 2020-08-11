<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$classwise_subject_priority = $_POST['classwise_subject_priority'];
$login_user_id = $_SESSION['login_user_id'];

$res_count=0;
$count=count($s_no);
for($i=0; $i<$count; $i++){
$classwise_subject_query="update classwise_subject_details set classwise_subject_priority='$classwise_subject_priority[$i]', updated_by='$login_user_id' where s_no='$s_no[$i]' and classwise_subject_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$classwise_subject_query)){
$res_count++;
}
}
if($res_count>0){
echo "|?|success|?|";
}else{
echo "Data Not Found";
}

}else{
echo "|?|session_out|?|";
}

?>