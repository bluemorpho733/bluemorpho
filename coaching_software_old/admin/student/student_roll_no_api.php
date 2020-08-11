<?php include("../attachment/session.php");
$student_roll_no=$_POST['student_roll_no'];
$coaching_roll_no=$_POST['coaching_roll_no'];

$count=count($coaching_roll_no);
for($i=0; $i<$count; $i++){
$quer="update student_admission_info set coaching_roll_no='$coaching_roll_no[$i]',$update_by_update_sql  where student_roll_no='$student_roll_no[$i]' and session_value='$session1'";
mysqli_query($conn37,$quer) or die(mysqli_error($conn37));
}
echo "|?|success|?|";

?>
