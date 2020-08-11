<?php include("../attachment/session.php"); ?>
<?php
$course_code11=$_GET['course_name'];
$query="select * from coaching_courses_subject where course_code='$course_code11'";
$result=mysqli_query($conn37,$query);
while($row=mysqli_fetch_assoc($result)){
$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
?>
<div class="col-md-3">
<input type="checkbox" name="" id="<?php echo $coaching_info_courses_subject_code; ?>" onclick="for_check1();" class="subject" value="<?php echo $coaching_info_courses_subject_code; ?>" /> <?php echo $coaching_info_courses_subject_name; ?>
</div>
<?php } ?>