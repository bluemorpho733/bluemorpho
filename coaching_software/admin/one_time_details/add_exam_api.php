<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$exam_name = $_POST['exam_name'];
$login_user_id = $_SESSION['login_user_id'];

$exam_query="select s_no from exam_details where exam_status='Active' and session_value='$session1' and exam_name='' ORDER BY exam_priority ASC LIMIT 0,1";
$exam_run=mysqli_query($conn37,$exam_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($exam_run)>0){
while($exam_row=mysqli_fetch_assoc($exam_run)){
$s_no=$exam_row['s_no'];
}

$exam_update_query="update exam_details set exam_name='$exam_name', updated_by='$login_user_id' where s_no='$s_no' and exam_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$exam_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>