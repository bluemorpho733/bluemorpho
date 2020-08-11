<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$session_priority = $_POST['session_priority'];
$login_user_id = $_SESSION['login_user_id'];

$res_count=0;
$count=count($s_no);
for($i=0; $i<$count; $i++){
$session_update_query="update session_details set session_priority='$session_priority[$i]', updated_by='$login_user_id' where s_no='$s_no[$i]' and session_status='Active'";
if(mysqli_query($conn37,$session_update_query)){
$res_count++;
}
}
if($res_count>0){
echo "|?|success|?|";
}else{
echo "Data Not Found";
}

}else{
echo "|?|session_out|?|";
}

?>