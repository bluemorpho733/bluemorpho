<option value="All">All</option>
<?php 
include("../attachment/session.php");
$Courses_id=$_GET['Courses_id'];
$sql=mysqli_query($conn37,"select * from coaching_courses_subject where course_code='$Courses_id'");
while ($result=mysqli_fetch_assoc($sql)) { 
	$coaching_info_courses_subject_code=$result['coaching_info_courses_subject_code'];
	$coaching_info_courses_subject_name=$result['coaching_info_courses_subject_name'];
	?>
	<option value="<?php echo $coaching_info_courses_subject_code; ?>"><?php echo $coaching_info_courses_subject_name; ?> </option>
<?php } ?>