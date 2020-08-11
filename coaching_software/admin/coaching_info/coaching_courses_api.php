<?php include("../attachment/session.php");
	
    $coaching_info_courses_name = $_POST['coaching_info_courses_name'];
	$coaching_info_courses_code = $_POST['coaching_info_courses_code'];
	$coaching_info_courses_code1 = $coaching_info_courses_code+1;
	$coaching_info_courses_category = $_POST['coaching_info_courses_category'];
	$coaching_info_courses_description = $_POST['coaching_info_courses_description'];
	$coaching_info_courses_duration = $_POST['coaching_info_courses_duration'];
	$coaching_info_courses_trainer = $_POST['coaching_info_courses_trainer'];
	
  $quer="INSERT INTO coaching_courses (coaching_info_courses_name, coaching_info_courses_code,coaching_info_courses_category,coaching_info_courses_description,coaching_info_courses_duration, coaching_info_courses_trainer) VALUES ('$coaching_info_courses_name','$coaching_info_courses_code','$coaching_info_courses_category','$coaching_info_courses_description','$coaching_info_courses_duration','$coaching_info_courses_trainer')";
  
  $quer2="update login set course_code='$coaching_info_courses_code1'";	
  mysqli_query($conn37,$quer2);
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	