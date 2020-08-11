<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$medium_name = $_POST['medium_name'];
$login_user_id = $_SESSION['login_user_id'];

$medium_update_query="update medium_details set medium_name='$medium_name', updated_by='$login_user_id' where s_no='$s_no' and medium_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$medium_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>