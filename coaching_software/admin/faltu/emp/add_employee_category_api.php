<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$board_name = $_POST['board_name'];
$login_user_id = $_SESSION['login_user_id'];

$board_query="select s_no from board_details where board_status='Active' and session_value='$session1' and board_name='' ORDER BY board_priority ASC LIMIT 0,1";
$board_run=mysqli_query($conn37,$board_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($board_run)>0){
while($board_row=mysqli_fetch_assoc($board_run)){
$s_no=$board_row['s_no'];
}

$board_update_query="update board_details set board_name='$board_name', updated_by='$login_user_id' where s_no='$s_no' and board_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$board_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>