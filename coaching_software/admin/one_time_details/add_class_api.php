<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$class_name = $_POST['class_name'];
$stream_name = $_POST['stream_name'];
$login_user_id = $_SESSION['login_user_id'];

$class_query="select s_no from class_details where class_status='Active' and session_value='$session1' and class_name='' and class_stream_name='' ORDER BY class_priority ASC LIMIT 0,1";
$class_run=mysqli_query($conn37,$class_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($class_run)>0){
while($class_row=mysqli_fetch_assoc($class_run)){
$s_no=$class_row['s_no'];
}

$class_update_query="update class_details set class_name='$class_name', class_stream_name='$stream_name', updated_by='$login_user_id' where s_no='$s_no' and class_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$class_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>