<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$session = $_POST['session'];
$session_start_date = $_POST['session_start_date'];
$session_end_date = $_POST['session_end_date'];
$session_description = $_POST['session_description'];
$login_user_id = $_SESSION['login_user_id'];

$session_update_query="update session_details set session='$session', session_start_date='$session_start_date', session_end_date='$session_end_date', session_description='$session_description', updated_by='$login_user_id' where s_no='$s_no' and session_status='Active'";
if(mysqli_query($conn37,$session_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>