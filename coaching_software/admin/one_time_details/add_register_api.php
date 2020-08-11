<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$register_name = $_POST['register_name'];
$login_user_id = $_SESSION['login_user_id'];

$register_query="select s_no from register_details where register_status='Active' and session_value='$session1' and register_name='' ORDER BY register_priority ASC LIMIT 0,1";
$register_run=mysqli_query($conn37,$register_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($register_run)>0){
while($register_row=mysqli_fetch_assoc($register_run)){
$s_no=$register_row['s_no'];
}

$register_update_query="update register_details set register_name='$register_name', updated_by='$login_user_id' where s_no='$s_no' and register_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$register_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>