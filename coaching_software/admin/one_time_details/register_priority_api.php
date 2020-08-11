<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$register_priority = $_POST['register_priority'];
$login_user_id = $_SESSION['login_user_id'];

$res_count=0;
$count=count($s_no);
for($i=0; $i<$count; $i++){
$register_update_query="update register_details set register_priority='$register_priority[$i]', updated_by='$login_user_id' where s_no='$s_no[$i]' and register_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$register_update_query)){
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