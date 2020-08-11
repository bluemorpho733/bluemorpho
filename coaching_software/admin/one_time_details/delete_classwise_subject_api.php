<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['classwise_subject_sno'];
$login_user_id = $_SESSION['login_user_id'];

$classwise_subject_query="delete from classwise_subject_details where s_no='$s_no' and session_value='$session1'";
if(mysqli_query($conn37,$classwise_subject_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>