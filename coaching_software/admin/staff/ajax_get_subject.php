<?php 

include("../attachment/session.php");
$subject_id=$_GET['subject_id'];
$course_code=$_GET['course_code'];
$sql=mysqli_query($conn37,"select * from coaching_courses_subject where course_code='$course_code'");
while ($result=mysqli_fetch_assoc($sql)) {
	$subject_id=$result['coaching_info_courses_subject_code']; 
	$coaching_info_courses_subject_name=$result['coaching_info_courses_subject_name']; 
	?>
	<option value="<?php echo $subject_id; ?>"><?php echo $coaching_info_courses_subject_name; ?></option>
<?php } ?>