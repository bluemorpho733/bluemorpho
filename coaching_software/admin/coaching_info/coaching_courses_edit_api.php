<?php include("../attachment/session.php");
	
    $coaching_info_courses_name = $_POST['coaching_info_courses_name'];
	$courses_code = $_POST['coaching_info_courses_code'];
	$coaching_info_courses_category = $_POST['coaching_info_courses_category'];
	$coaching_info_courses_description = $_POST['coaching_info_courses_description'];
	$coaching_info_courses_duration = $_POST['coaching_info_courses_duration'];
	$coaching_info_courses_trainer = $_POST['coaching_info_courses_trainer'];
	
  $quer="update coaching_courses set coaching_info_courses_name='$coaching_info_courses_name',coaching_info_courses_category='$coaching_info_courses_category',coaching_info_courses_description='$coaching_info_courses_description',coaching_info_courses_duration='$coaching_info_courses_duration',coaching_info_courses_trainer='$coaching_info_courses_trainer' where coaching_info_courses_code='$courses_code'";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}else{

    echo "|?|exist|?|";

}
?>	