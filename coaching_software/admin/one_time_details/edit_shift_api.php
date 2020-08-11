<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$shift_name = $_POST['shift_name'];
$login_user_id = $_SESSION['login_user_id'];

$shift_update_query="update shift_details set shift_name='$shift_name', updated_by='$login_user_id' where s_no='$s_no' and shift_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$shift_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>