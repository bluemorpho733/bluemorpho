<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$medium_name = $_POST['medium_name'];
$login_user_id = $_SESSION['login_user_id'];

$medium_query="select s_no from medium_details where medium_status='Active' and session_value='$session1' and medium_name='' ORDER BY medium_priority ASC LIMIT 0,1";
$medium_run=mysqli_query($conn37,$medium_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($medium_run)>0){
while($medium_row=mysqli_fetch_assoc($medium_run)){
$s_no=$medium_row['s_no'];
}

$medium_update_query="update medium_details set medium_name='$medium_name', updated_by='$login_user_id' where s_no='$s_no' and medium_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$medium_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>