<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$class_name = $_POST['class_name'];
$stream_name = $_POST['stream_name'];
$login_user_id = $_SESSION['login_user_id'];

$class_update_query="update class_details set class_name='$class_name', class_stream_name='$stream_name', updated_by='$login_user_id' where s_no='$s_no' and class_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$class_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|session_out|?|";
}

?>