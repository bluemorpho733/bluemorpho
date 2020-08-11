<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$class_code = $_POST['class_code'];
$subject_code = $_POST['subject_code'];
$subject_priority = $_POST['subject_priority'];
$login_user_id = $_SESSION['login_user_id'];

$classwise_subject_query="select s_no from classwise_subject_details where classwise_subject_status='Active' and session_value='$session1' and classwise_class_code='$class_code' and classwise_subject_code='$subject_code' ORDER BY classwise_subject_priority ASC";
$classwise_subject_run=mysqli_query($conn37,$classwise_subject_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($classwise_subject_run)<1){

$classwise_subject_insert_query="insert into classwise_subject_details(classwise_class_code,classwise_subject_code,classwise_subject_priority,session_value,updated_by) values('$class_code','$subject_code','$subject_priority','$session1','$login_user_id')";
if(mysqli_query($conn37,$classwise_subject_insert_query)){
echo "|?|success|?|";
}

}else{
echo "|?|exist|?|";
}

}else{
echo "|?|session_out|?|";
}

?>