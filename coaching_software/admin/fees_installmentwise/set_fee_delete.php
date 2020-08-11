<?php include("../attachment/session.php"); 

$student_roll_no1=$_GET['student_roll_no'];

$date_local=date('Y-m-d');

$update="UPDATE student_fee_structure SET fee_status='Deleted',last_updated_date='$date_local' WHERE student_roll_no='$student_roll_no1'";

if(mysqli_query($conn37,$update)){
echo "|?|success|?|";
post_content('fees_installmentwise/set_fee_delete','student_roll_no='+student_roll_no);
}else{
echo "|?|error|?|";
}

?>