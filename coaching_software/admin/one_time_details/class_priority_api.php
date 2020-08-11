<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$s_no = $_POST['s_no'];
$class_priority = $_POST['class_priority'];
$login_user_id = $_SESSION['login_user_id'];

$res_count=0;
$count=count($s_no);
for($i=0; $i<$count; $i++){
$class_update_query="update class_details set class_priority='$class_priority[$i]', updated_by='$login_user_id' where s_no='$s_no[$i]' and class_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$class_update_query)){
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