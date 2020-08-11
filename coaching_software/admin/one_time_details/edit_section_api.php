<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$section_name = $_POST['section_name'];
$login_user_id = $_SESSION['login_user_id'];

$section_update_query="update section_details set section_name='$section_name', updated_by='$login_user_id' where s_no='$s_no' and section_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$section_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>