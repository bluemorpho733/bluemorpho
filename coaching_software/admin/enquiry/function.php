<?php
function get_course_name($course_code)
{
	$quer="select coaching_info_courses_name from coaching_courses where coaching_info_courses_code='$course_code'";
	$result=mysqli_query($conn37,$quer) or die(mysqli_error($conn37));
	$row=mysql_fetch_assoc($result);
	$course_name=$row['coaching_info_courses_name'];
	return $course_name;
}
function get_subject_name($subject_code)
{
	$quer="select coaching_info_courses_subject_name from  coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'";
	$result=mysqli_query($conn37,$quer) or die(mysqli_error($conn37));
	$row=mysql_fetch_assoc($result);
	$subject_name=$row['coaching_info_courses_subject_name'];
	return $subject_name;
}
?>