<?php include("../attachment/session.php");
	
	$coaching_info_courses_subject_code = $_POST['coaching_info_courses_subject_code'];
	$coaching_info_courses_subject_name = $_POST['coaching_info_courses_subject_name'];
	$course_code = $_POST['course_code'];
	$coaching_info_courses_subject_duration = $_POST['coaching_info_courses_subject_duration'];
	$coaching_info_courses_subject_trainer = $_POST['coaching_info_courses_subject_trainer'];
	
	        $que="select * from coaching_courses_subject where coaching_info_courses_subject_code='$coaching_info_courses_subject_code' and course_code='$course_code'";
            $run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;
            while($row=mysqli_fetch_assoc($run)){
            $coaching_info_courses_subject_name1 = $row['coaching_info_courses_subject_name'];
			}
			
			
  if($coaching_info_courses_subject_name1==''){	
  $quer="INSERT INTO coaching_courses_subject (coaching_info_courses_subject_code,coaching_info_courses_subject_name,course_code,coaching_info_courses_subject_duration, coaching_info_courses_subject_trainer) VALUES ('$coaching_info_courses_subject_code','$coaching_info_courses_subject_name','$course_code','$coaching_info_courses_subject_duration','$coaching_info_courses_subject_trainer')";
  
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}}else{

    echo "|?|exist|?|";

}
?>	