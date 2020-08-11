<?php include("../attachment/session.php"); ?>
<?php
$course_code11=$_GET['course_code'];
$subject_code11=$_GET['course_subject'];
if($subject_code11!='All'){
	$condition2=" and subject_code='$subject_code11'";
}else{
	$condition2="";
}
$que="select * from coaching_fee_structure where course_code='$course_code11'$condition2";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$result=0;
if(mysqli_num_rows($run)>0){
$result++;
}
echo $result;
?>