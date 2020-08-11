<?php include("../attachment/session.php");
    $course_code = $_GET['course_code'];
?>			
<option value="All">All</option>				
<?php
$que="select * from coaching_courses_subject where course_code='$course_code' and courses_subject_status='Active'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
?>
<option value="<?php echo $coaching_info_courses_subject_code;?>"><?php echo $coaching_info_courses_subject_name;?></option>
<?php } ?>
			
			

