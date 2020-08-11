<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$board_name = $_POST['board_name'];
$login_user_id = $_SESSION['login_user_id'];

$board_update_query="update board_details set board_name='$board_name', updated_by='$login_user_id' where s_no='$s_no' and board_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$board_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>