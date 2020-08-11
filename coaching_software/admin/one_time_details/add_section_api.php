<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$section_name = $_POST['section_name'];
$login_user_id = $_SESSION['login_user_id'];

$section_query="select s_no from section_details where section_status='Active' and session_value='$session1' and section_name='' ORDER BY section_priority ASC LIMIT 0,1";
$section_run=mysqli_query($conn37,$section_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($section_run)>0){
while($section_row=mysqli_fetch_assoc($section_run)){
$s_no=$section_row['s_no'];
}

$section_update_query="update section_details set section_name='$section_name', updated_by='$login_user_id' where s_no='$s_no' and section_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$section_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>