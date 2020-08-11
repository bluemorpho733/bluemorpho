<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$exam_name = $_POST['exam_name'];
$login_user_id = $_SESSION['login_user_id'];

$exam_update_query="update exam_details set exam_name='$exam_name', updated_by='$login_user_id' where s_no='$s_no' and exam_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$exam_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>