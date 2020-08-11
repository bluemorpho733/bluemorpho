<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$role_name = $_POST['role_name'];
$login_user_id = $_SESSION['login_user_id'];

$role_query="select s_no from role_details where role_status='Active' and session_value='$session1' and role_name='' ORDER BY role_priority ASC LIMIT 0,1";
$role_run=mysqli_query($conn37,$role_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($role_run)>0){
while($role_row=mysqli_fetch_assoc($role_run)){
$s_no=$role_row['s_no'];
}

$role_update_query="update role_details set role_name='$role_name', updated_by='$login_user_id' where s_no='$s_no' and role_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$role_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>