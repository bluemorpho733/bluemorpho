<?php include("../attachment/session.php");

if($_SESSION['login_user_id']!=''){

$fee_category_name = $_POST['fee_category_name'];
$login_user_id = $_SESSION['login_user_id'];

$fee_category_query="select s_no from fee_category_details where fee_category_status='Active' and session_value='$session1' and fee_category_name='' ORDER BY fee_category_priority ASC LIMIT 0,1";
$fee_category_run=mysqli_query($conn37,$fee_category_query) or die(mysqli_error($conn37));
if(mysqli_num_rows($fee_category_run)>0){
while($fee_category_row=mysqli_fetch_assoc($fee_category_run)){
$s_no=$fee_category_row['s_no'];
}

$fee_category_update_query="update fee_category_details set fee_category_name='$fee_category_name', updated_by='$login_user_id' where s_no='$s_no' and fee_category_status='Active' and session_value='$session1'";
if(mysqli_query($conn37,$fee_category_update_query)){
echo "|?|success|?|";
}

}else{
echo "|?|not_add|?|";
}

}else{
echo "|?|session_out|?|";
}

?>