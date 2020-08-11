<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$subject_name = $_POST['subject_name'];
$login_user_id = $_SESSION['login_user_id'];

$subject_query="select s_no from subject_details where subject_status='Active' and session_value='$session1' and subject_name='' ORDER BY subject_priority ASC LIMIT 0,1";
$subject_run=mysqli_query($conn37,$subject_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($subject_run)>0){
while($subject_row=mysqli_fetch_assoc($subject_run)){
$s_no=$subject_row['s_no'];
}

$subject_update_query="update subject_details set subject_name='$subject_name', updated_by='$login_user_id' where s_no='$s_no' and subject_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$subject_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>