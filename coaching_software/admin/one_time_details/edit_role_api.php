<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$role_name = $_POST['role_name'];
$login_user_id = $_SESSION['login_user_id'];

$role_update_query="update role_details set role_name='$role_name', updated_by='$login_user_id' where s_no='$s_no' and role_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$role_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>