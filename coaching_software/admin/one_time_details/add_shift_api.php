<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$shift_name = $_POST['shift_name'];
$login_user_id = $_SESSION['login_user_id'];

$shift_query="select s_no from shift_details where shift_status='Active' and session_value='$session1' and shift_name='' ORDER BY shift_priority ASC LIMIT 0,1";
$shift_run=mysqli_query($conn37,$shift_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($shift_run)>0){
while($shift_row=mysqli_fetch_assoc($shift_run)){
$s_no=$shift_row['s_no'];
}

$shift_update_query="update shift_details set shift_name='$shift_name', updated_by='$login_user_id' where s_no='$s_no' and shift_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$shift_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>