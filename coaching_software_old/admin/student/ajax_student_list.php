  <?php include("../attachment/session.php")?>  

 		  <table id="example1" class="table table-bordered table-striped">
						<thead class="my_background_color">
								<tr>
								  <th>#</th>
								  <th>Student Name</th>
								  <th>Father Name</th>
								  <th>Course</th>
								  <th>Father Contact No.</th>
								  <th>Student Roll No</th>
								  <th>Admission No</th>
								  <th>Update By</th>
								  <th>Date</th>
								  <th><?php echo $language['Edit']; ?></th>
								  <th><?php echo $language['Delete']; ?></th>
								  <th><?php echo $language['Print']; ?></th>
								</tr>
						</thead>
					<tbody>
<?php 
$course_code=$_GET['id'];
$get_subject=$_GET['get_subject'];
if($course_code=='All'){
$condition="";
}else{
$condition="and course_code='$course_code'";
}

if($get_subject!='All'){
$condition1=" and my_subject_name like '%$get_subject%'";
}else{
$condition1="";
}
?>					
						<?php
$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$admission_form_pdf = $row['admission_form_pdf'];
}

$qry11="select * from coaching_courses_subject where courses_subject_status='Active'";
$res11=mysqli_query($conn37,$qry11);
$all_subject='';
while($row11=mysqli_fetch_assoc($res11)){
$coaching_info_courses_subject_name=$row11['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code=$row11['coaching_info_courses_subject_code'];
$all_subject[$coaching_info_courses_subject_code]=$coaching_info_courses_subject_name;
}


$query="select * from coaching_courses where courses_status='Active'";
$run1=mysqli_query($conn37,$query);
$all_courses_name='';
while($row1=mysqli_fetch_assoc($run1)){
$coaching_info_courses_name=$row1['coaching_info_courses_name'];
$coaching_info_courses_code=$row1['coaching_info_courses_code'];
$all_courses_name[$coaching_info_courses_code]=$coaching_info_courses_name;
}

	$que="select * from student_admission_info where student_status='Active' and session_value='$session1'$condition$condition1 ORDER BY s_no DESC";
	$run=mysqli_query($conn37,$que);
	$serial_no=0;
	while($row=mysqli_fetch_assoc($run)){
		$s_no=$row['s_no'];
		$student_name=$row['student_name'];
		$student_father_name=$row['student_father_name'];
		$course_code1=$row['course_code'];
		$student_date_of_birth=$row['student_date_of_birth'];
		$student_roll_no=$row['student_roll_no'];
		$coaching_roll_no=$row['coaching_roll_no'];
		$student_date_of_admission=$row['student_date_of_admission'];
		$student_father_contact_number=$row['student_father_contact_number'];
		$student_admission_number=$row['student_admission_number'];
		$my_subject_name11=$row['my_subject_name'];
		$my_subject_name22='';
		$comma='';
		
		$update_change=$row['update_change'];
		if($row['last_updated_date']!='0000-00-00'){
		$last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
		}else{
		$last_updated_date=$row['last_updated_date'];
		}
$serial_no++;

$strcount1=substr_count($my_subject_name11,',');
if($strcount1>0){
$subject_count=$strcount1;
$my_subject_name1=explode(',',$my_subject_name11);
}else{
$subject_count=0;
$my_subject_name1[]=$my_subject_name11;
}
for($a=0;$a<=$subject_count;$a++){
$my_subject_name22=$my_subject_name22.$comma.$all_subject[$my_subject_name1[$a]];
$comma=',';
}
?>

						<tr>
						  <td><?php echo $serial_no; ?></td>
						  <td><?php echo $student_name; ?></td>
						  <td><?php echo $student_father_name; ?></td>
<td><?php echo $all_courses_name[$course_code1]." (".$my_subject_name22.")"; ?></td>
						  <td><?php echo $student_father_contact_number; ?></td>
						  <td><?php echo $student_roll_no; ?></td>
						  <td><?php echo $student_admission_number; ?></td>
						  <td><?php echo $update_change; ?></td>
                          <td><?php echo $last_updated_date; ?></td>
						  
						 <td><button type="button" onclick="post_content('student/student_admission','<?php echo 'student_roll_no='.$student_roll_no; ?>')" class="btn btn-default my_background_color" >
						 <?php echo $language['Edit']; ?></button></td>
						 <td><button type="button" onclick="return valid('<?php echo $s_no; ?>');" class="btn btn-default my_background_color" >
						 <?php echo $language['Delete']; ?></button></td>
						 <td><a href='<?php echo $pdf_path; ?>admission_form/<?php echo $admission_form_pdf; ?>?id=<?php echo $student_roll_no; ?>' target="_blank"><button type="button" class="btn btn-default my_background_color" >
						 <?php echo $language['Print']; ?></button></a></td>
						</tr>
						<?php } ?>
					</tbody>
				 </table>
<script>
$(function () {
$('#example3').DataTable()
})
</script>