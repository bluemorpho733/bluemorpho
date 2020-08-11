<?php include("../attachment/session.php"); 
$data=$_GET['data'];
$data2=explode('|?|', $data);
$student_name=$data2[0];
$course_code=$data2[1];
$student_roll=$data2[2];
$sql=mysqli_query($conn37,"select * from student_admission_info INNER JOIN coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where student_admission_info.student_roll_no='$student_roll'");
$result=mysqli_fetch_assoc($sql);
$student_name=$result['student_name'];
$my_subject_code=$result['my_subject_name'];
$subject_code_array=explode(',', $my_subject_code);
$student_father_name=$result['student_father_name'];
$student_contact_number=$result['student_contact_number'];
$course_code=$result['course_code'];
$coaching_info_courses_name=$result['coaching_info_courses_name'];
	for($i=0; $i<count($subject_code_array); $i++){ 
     $sql2=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code_array[$i]'");
     while ($res2=mysqli_fetch_assoc($sql2)) {
     	$subject_code=$res2['coaching_info_courses_subject_code'];
     	$subject_name=$res2['coaching_info_courses_subject_name'];
     	?>
			<div class="col-md-2">
				<input type="checkbox" name="subject_code[]" id="<?php echo $subject_code; ?>" class="subject" value="<?php echo $subject_code; ?>" style="display:none;" checked> <b style="color:green;"><?php echo $i+'1'.'. '.$subject_name; ?></b>
			</div>
     <?php } } ?>




                  
				










