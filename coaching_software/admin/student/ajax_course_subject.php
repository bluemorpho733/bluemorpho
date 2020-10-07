<?php include("../attachment/session.php"); ?>  
<option value="All">All</option>
<?php 
$school_info_class_name = $_GET['school_info_class_name'];
$query="select * from coaching_courses_subject where course_code='$school_info_class_name'";
$result=mysqli_query($conn37,$query);
while($row=mysqli_fetch_assoc($result)){
$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
?>
<option value="<?php echo $coaching_info_courses_subject_code; ?>"><?php echo $coaching_info_courses_subject_name; ?></option>	
<?php } ?>
