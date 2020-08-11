<?php
$roll=$_GET['id'];
$book_id=$_GET['book_id'];
// include("../../con73/con37.php");
include("../attachment/session.php");
include("function.php");
$chk_qry="select * from issue_book where book_id_no='$book_id' and student_roll_no='$roll' and status='Active'";
$chk_res=mysqli_query($conn37,$chk_qry)or die(mysqli_error($conn37));
if(mysqli_num_rows($chk_res)<1){
$que15="select * from student_admission_info where student_roll_no='$roll'";
$run15=mysqli_query($conn37,$que15) or die(mysqli_error($conn37));
$num=0;
	while($row15=mysqli_fetch_assoc($run15)){
	$student_name=$row15['student_name'];
	$course_code=$row15['course_code'];
	$course_name=get_course_name($course_code);
	$subject_cd=$row15['my_subject_name'];
	$subject_code=explode(",", $subject_cd);
	$subject_name=get_subject_name($subject_code[0]);
	$subject_name1=get_subject_name($subject_code[1]);
	$subject_name2=get_subject_name($subject_code[2]);
	$subject_name3=get_subject_name($subject_code[3]);
	$student_course_and_subject=$course_name."(".$subject_name." ".$subject_name1." ".$subject_name2." ".$subject_name3.")";
	$student_father_name=$row15['student_father_name'];
	$student_father_contact_number=$row15['student_father_contact_number'];
	}
if(mysqli_num_rows($run15)>0){
$num=1;
echo $student_name."|?|".$student_course_and_subject."|?|".$subject_code."|?|".$student_father_name."|?|".$student_father_contact_number."|?|".$num."|?|".$course_code;
}
}else{
echo 0;
}
?>