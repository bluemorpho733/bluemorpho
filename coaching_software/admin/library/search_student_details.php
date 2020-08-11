<?php
$roll=$_GET['student_roll_no'];
include("../../con73/con37.php");
include("function.php");
$que15="select * from student_admission_info where student_roll_no='$roll'";
$run15=mysqli_query($conn37,$que15) or die(mysqli_error($conn37));
$num=0;
while($row15=mysqli_fetch_assoc($run15)){

		$student_name=$row15['student_name'];
	    $subject_cd=$row15['my_subject_name'];
	    $subject_code=explode(",", $subject_cd);
	    $subject_name=get_subject_name($subject_code[0]);
	    $subject_name1=get_subject_name($subject_code[1]);
	    $subject_name2=get_subject_name($subject_code[2]);
	    $subject_name3=get_subject_name($subject_code[3]);

	    $course_code=$row15['course_code'];
	    $course_name=get_course_name($course_code);
	    $student_course_and_subject=$course_name."(".$subject_name." ".$subject_name1." ".$subject_name2." ".$subject_name3.")";
	   $student_father_name=$row15['student_father_name'];
	   $student_father_contact_number=$row15['student_father_contact_number'];
	   $student_roll_no=$row15['student_roll_no'];
	}
    if(mysqli_num_rows($run15)>0){
    $num=1;
	echo $student_name."|?|".$student_course_and_subject."|?|".$student_roll_no."|?|".$subject_code."|?|".$student_father_name."|?|".$student_father_contact_number."|?|".$num."|?|".$subject_code."|?|".$course_code;
	}
?>