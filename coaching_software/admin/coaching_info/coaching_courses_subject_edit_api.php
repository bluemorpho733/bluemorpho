<?php include("../attachment/session.php");
	
    $coaching_info_courses_subject_code = $_POST['coaching_info_courses_subject_code'];
    $coaching_info_courses_subject_name = $_POST['coaching_info_courses_subject_name'];
    $course_code = $_POST['course_code'];
	$code = $_POST['code'];
	$coaching_info_courses_subject_duration = $_POST['coaching_info_courses_subject_duration'];
	$coaching_info_courses_subject_trainer = $_POST['coaching_info_courses_subject_trainer'];
	
  $quer="update coaching_courses_subject set course_code='$course_code',coaching_info_courses_subject_code='$coaching_info_courses_subject_code',coaching_info_courses_subject_name='$coaching_info_courses_subject_name',coaching_info_courses_subject_duration='$coaching_info_courses_subject_duration',coaching_info_courses_subject_trainer='$coaching_info_courses_subject_trainer' where s_num='$code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	