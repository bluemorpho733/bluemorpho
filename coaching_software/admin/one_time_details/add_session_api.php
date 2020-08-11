<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$session = $_POST['session'];
$session_start_date = $_POST['session_start_date'];
$session_end_date = $_POST['session_end_date'];
$session_description = $_POST['session_description'];
$login_user_id = $_SESSION['login_user_id'];

$session_query="select s_no from session_details where session_status='Active' and session='' ORDER BY session_priority ASC LIMIT 0,1";
$session_run=mysqli_query($conn37,$session_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($session_run)>0){
while($session_row=mysqli_fetch_assoc($session_run)){
$s_no=$session_row['s_no'];
}

$session_update_query="update session_details set session='$session', session_start_date='$session_start_date', session_end_date='$session_end_date', session_description='$session_description', updated_by='$login_user_id' where s_no='$s_no' and session_status='Active'";
if(mysqli_query($conn37,$session_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>