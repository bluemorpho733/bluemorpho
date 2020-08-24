  <?php include("../attachment/session.php")?>  

   <table id="example3" class="table table-bordered table-striped">
                <thead class="my_background_color">
				<tr>
				  <th>#</th>
				  <th><?php echo "Student Name"; ?></th>
				  <th><?php echo "Father Name"; ?></th>
				  <th>Course</th>
				  <th><?php echo "Registration Date"; ?></th>
                  <th>Update By</th>
                  <th>Date</th>
                  
                 <th><?php echo "Make Admission"; ?></th>
                 <th><?php echo "Print"; ?></th>
				 <th><?php echo "Delete"; ?></th>
                </tr>
                </thead>
                <tbody>
                
				<?php		
$course_code=$_GET['id'];
if($course_code=='All'){
$condition="";
}else{
$condition="and student_admission_info.course_code='$course_code'";
}			
            
	$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$registration_form_pdf = $row['registration_form_pdf'];
}	
        $que="select * from student_admission_info left join coaching_courses on student_admission_info.course_code=coaching_courses.school_info_class_code where student_admission_info.registration_final='no' and student_admission_info.student_status='Deactive' and student_admission_info.session_value='$session1' and coaching_courses.courses_status='Active'$condition ORDER BY student_admission_info.s_no DESC";
		$run=mysqli_query($conn37,$que);
                $serial_no=0;
                while($row=mysqli_fetch_assoc($run)){

				$s_no=$row['s_no'];
				$student_name=$row['student_name'];
				$student_father_name=$row['student_father_name'];
				$course_code=$row['course_code'];
				$coaching_info_courses_name=$row['coaching_info_courses_name'];
				$student_date_of_birth=$row['student_date_of_birth'];
				$student_roll_no=$row['student_roll_no'];
				$student_father_contact_no=$row['student_father_contact_number'];
				$student_date_of_admission=$row['student_date_of_admission'];
		     	$student_registration_fee=$row['student_registration_fee'];
		     	
                $update_change=$row['update_change'];
                if($row['last_updated_date']!='0000-00-00'){
                $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
                }else{
                $last_updated_date=$row['last_updated_date'];
                }
			
				$serial_no++;

                ?>

            <tr>
				<td><?php echo $serial_no; ?></td>
				<td><?php echo $student_name; ?></td>
				<td><?php echo $student_father_name; ?></td>
				<td><?php echo $coaching_info_courses_name; ?></td>
				<td><?php echo $student_date_of_admission; ?></td>
				<td><?php echo $update_change; ?></td>
                <td><?php echo $last_updated_date; ?></td>

                <td><button type="button" onclick="post_content('student/student_admission','<?php echo 'student_roll_no='.$student_roll_no; ?>')" class="btn btn-default my_background_color">
                <?php echo $language['Make Admission']; ?></button></td>
				<td><a href='<?php echo $pdf_path; ?>registration_form/<?php echo $registration_form_pdf; ?>?id=<?php echo $student_roll_no; ?>' target="_blank"><button type="button" class="btn btn-default my_background_color"><?php echo $language['Print']; ?></button></a></td>
				<td><button type="button" onclick="return valid('<?php echo $student_roll_no; ?>','<?php echo $student_date_of_admission; ?>','<?php echo $student_registration_fee; ?>')" class="btn btn-default my_background_color">
                <?php echo $language['Delete']; ?></button></td>
            </tr>
                <?php } ?>
                </tbody>
             </table>
				<script>
  $(function () {
    $('#example3').DataTable()
  })
</script>