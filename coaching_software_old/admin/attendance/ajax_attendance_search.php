<?php
include("../attachment/session.php");
$student_courses=$_GET['student_courses'];
$student_subject=$_GET['student_subject'];

if($student_courses!='All'){
$condition1=" and course_code='$student_courses'";
}else{
$condition1="";
}

if($student_subject!='All'){
$condition2=" and my_subject_name LIKE '%$student_subject%'";
}else{
$condition2="";
}

echo $que="select * from student_admission_info where student_status='Active' and session_value='$session1'$condition1$condition2 order by student_name ASC";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
$month_wise='';
while($row=mysqli_fetch_assoc($run)){
	$s_no=$row['s_no'];
	$unique_id = $row['student_roll_no'];
	$coaching_roll_no = $row['coaching_roll_no'];
	$student_name = $row['student_name'];
	$course_code=$row['course_code'];
	$subject_code=$row['subject_code'];
	$month = date('m');
	$year = date('Y');
	$month_wise = date('F', mktime(0, 0, 0, $month, 10));
	$serial_no++;
	
	$present=0;
	$absent=0;
	$leave=0;
	$date2=$year.'-'.$month.'-01';
	$count1 = date(' t ', strtotime($date2) );
	$que11="select * from student_attendance where month='$month' and year='$year' and attendance_roll_no='$unique_id' and session_value='$session1'";
	$run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
	while($row11=mysqli_fetch_assoc($run11)){
	
	$update_change=$row11['update_change'];
	if($row11['last_updated_date']!='0000-00-00'){
	$last_updated_date=date('d-m-Y',strtotime($row11['last_updated_date']));
	}else{
	$last_updated_date=$row11['last_updated_date'];
	}
	
	for($i=1;$i<=$count1;$i++){
	if($i<10){
	$a=$row11['0'.$i];
	if($a=='P'){
	$present=$present+1;
	}
	if($a=='P/2'){
	$present=$present+0.5;
	}
	if($a=='A'){
	$absent=$absent+1;
	}
	if($a=='L'){
	$leave=$leave+1;
	}
	}else{
	$a=$row11[$i];
	if($a=='P'){
	$present=$present+1;
	}
	if($a=='P/2'){
	$present=$present+0.5;
	}
	if($a=='A'){
	$absent=$absent+1;
	}
	if($a=='L'){
	$leave=$leave+1;
	}
	}
	}
	}
	$data123="id=".$unique_id."&current_month=".$month."&year=".$year."&student_courses=".$student_courses."&student_subject=".$student_subject."&name=".$student_name;

  $sql2=mysqli_query($conn37,"select * from coaching_courses INNER JOIN coaching_courses_subject ON coaching_courses.coaching_info_courses_code=coaching_courses_subject.course_code");
  while ($result=mysqli_fetch_assoc($sql2)) {
  	$coaching_info_courses_name=$result['coaching_info_courses_name'];
  	$coaching_info_courses_subject_name=$result['coaching_info_courses_subject_name'];
  }

 ?>

 <tr>
   <td><?php echo $serial_no; ?></td>
   <td><?php echo $coaching_roll_no; ?></td>
   <td><?php echo $student_name; ?></td>
   <td><?php echo $coaching_info_courses_name; ?></td>
   <td><?php echo $coaching_info_courses_subject_name; ?></td>
   <td><?php echo $month_wise; ?></td>
   <td><?php echo $present; ?></td>
   <td><?php echo $absent; ?></td>
   <td><?php echo $leave; ?></td>
   <td><?php echo $update_change; ?></td>
   <td><?php echo $last_updated_date; ?></td>
   <td><button type="button" onclick="post_content('attendance/student_attendance_view','<?php echo $data123; ?>')"  class="btn btn-default my_background_color">View</button></td>
</tr>
<?php
 }
?>