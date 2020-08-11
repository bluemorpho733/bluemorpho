<?php include("../attachment/session.php");					
$Courses_id=$_GET['Courses_id'];
$que="select * from course_time_table as ctb INNER JOIN coaching_batch as cb on ctb.batch_code=cb.coaching_info_batch_code INNER JOIN coaching_courses as cc on cc.coaching_info_courses_code=ctb.course_code INNER JOIN coaching_courses_subject ccs on ccs.coaching_info_courses_subject_code=ctb.subject_code where ctb.course_code='$Courses_id'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
while($row=mysqli_fetch_assoc($run)){
	$s_no=$row['s_no'];
	$coaching_info_batch_name = $row['coaching_info_batch_name'];
	$coaching_info_courses_name = $row['coaching_info_courses_name'];
	$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
	$batch_time_from = $row['batch_time_from'];
	$batch_time_to = $row['batch_time_to'];
	$batch_coloum_teacher_monday = $row['batch_coloum_teacher_monday'];
	$batch_coloum_teacher_tuesday = $row['batch_coloum_teacher_tuesday'];
	$batch_coloum_teacher_wednesday = $row['batch_coloum_teacher_wednesday'];
	$batch_coloum_teacher_thursday = $row['batch_coloum_teacher_thursday'];
	$batch_coloum_teacher_friday = $row['batch_coloum_teacher_friday'];
	$batch_coloum_teacher_saturday = $row['batch_coloum_teacher_saturday'];
	$batch_coloum_teacher_sunday = $row['batch_coloum_teacher_sunday'];
	$update_change=$row['update_change'];
	$last_updated_date=$row['last_updated_date'];
	$serial_no++;
?>

<tr align='center'>
	<th><?php echo $serial_no; ?></th>
	<th><?php echo $coaching_info_batch_name; ?></th>
	<th><?php echo $coaching_info_courses_subject_name; ?></th>
	<th><?php echo date('h:i A',strtotime($batch_time_from)); ?></th>
	<th><?php echo date('h:i A',strtotime($batch_time_to)); ?></th>
	<th><?php echo $batch_coloum_teacher_monday; ?></th>
	<th><?php echo $batch_coloum_teacher_tuesday; ?></th>
	<th><?php echo $batch_coloum_teacher_wednesday; ?></th>
	<th><?php echo $batch_coloum_teacher_thursday; ?></th>
	<th><?php echo $batch_coloum_teacher_friday; ?></th>
	<th><?php echo $batch_coloum_teacher_saturday; ?></th>
	<th><?php echo $batch_coloum_teacher_sunday; ?></th>
	<th><?php echo $update_change; ?></th>
    <th><?php echo $last_updated_date; ?></th>

</tr>
<?php } ?>