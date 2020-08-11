<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$register_name = $_POST['register_name'];
$login_user_id = $_SESSION['login_user_id'];

$register_update_query="update register_details set register_name='$register_name', updated_by='$login_user_id' where s_no='$s_no' and register_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$register_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>