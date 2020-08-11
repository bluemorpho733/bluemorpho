<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$subject_name = $_POST['subject_name'];
$login_user_id = $_SESSION['login_user_id'];

$subject_update_query="update subject_details set subject_name='$subject_name', updated_by='$login_user_id' where s_no='$s_no' and subject_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$subject_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>