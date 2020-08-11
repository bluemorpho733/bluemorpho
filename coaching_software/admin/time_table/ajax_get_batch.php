<?php include("../attachment/session.php");
$course_code=$_GET['course'];
$subject_code=$_GET['subject'];

if($subject_code!='All'){
$que="select * from coaching_batch where course_code='$course_code' and subject_code='$subject_code' order by coaching_info_batch_time_from";
}else{
$que="select * from coaching_batch where course_code='$course_code' order by coaching_info_batch_time_from";
}
$serial_no=0;
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$course_code1=$row['course_code'];
$subject_code1=$row['subject_code'];
$coaching_info_batch_name=$row['coaching_info_batch_name'];
$coaching_info_batch_code=$row['coaching_info_batch_code'];
$coaching_info_batch_time_from=$row['coaching_info_batch_time_from'];
$coaching_info_batch_time_to=$row['coaching_info_batch_time_to'];

					
$que2="select * from coaching_courses_subject where course_code='$course_code1' and coaching_info_courses_subject_code='$subject_code1'";
$run2=mysqli_query($conn37,$que2);
while($row2=mysqli_fetch_assoc($run2)){
$coaching_info_courses_subject_name=$row2['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code=$row2['coaching_info_courses_subject_code'];
}	

$que1="select * from course_time_table where course_code='$course_code1' and subject_code=$subject_code1";
$run1=mysqli_query($conn37,$que1);
while($row1=mysqli_fetch_assoc($run1)){

$batch_coloum_teacher_monday1=$row1['batch_coloum_teacher_monday'];
$batch_coloum_teacher_tuesday1=$row1['batch_coloum_teacher_tuesday'];
$batch_coloum_teacher_wednesday1=$row1['batch_coloum_teacher_wednesday'];
$batch_coloum_teacher_thursday1=$row1['batch_coloum_teacher_thursday'];
$batch_coloum_teacher_friday1=$row1['batch_coloum_teacher_friday'];
$batch_coloum_teacher_saturday1=$row1['batch_coloum_teacher_saturday'];
$batch_coloum_teacher_sunday1=$row1['batch_coloum_teacher_sunday'];
$update_change=$row1['update_change'];
$last_updated_date=$row1['last_updated_date'];
}
	
$serial_no++;
?>

<tr>
	<td><?php echo $serial_no; ?></td>
<td><b><input type="text" name="batch_name1[]" value="<?php echo strtoupper($coaching_info_batch_name); ?>" style="border:none" readonly /></b></td>
<td style="display:none;"><b><input type="text" name="batch_code1[]" value="<?php echo strtoupper($coaching_info_batch_code); ?>" style="border:none" readonly /></b></td>
<td><b><input type="text" name="subject_name1[]" value="<?php echo strtoupper($coaching_info_courses_subject_name); ?>" style="border:none" readonly /></b></td>
<td style="display:none;"><b><input type="text" name="subject_code1[]" value="<?php echo $coaching_info_courses_subject_code; ?>" style="border:none" readonly /></b></td>
<td><b><input type="time" name="batch_start_time1[]" value="<?php echo $coaching_info_batch_time_from; ?>" style="border:none" readonly /></b></td>
<td><b><input type="time" name="batch_end_time1[]" value="<?php echo $coaching_info_batch_time_to; ?>"  style="border:none" readonly /></b></td>
<td>
	<select name="teacher_name_monday[]" style="width:100%" class="select2" onchange="fill_teacher_name(<?php echo $serial_no; ?>);" id="<?php echo "teacher_name_monday_".$serial_no ?>"  required >
	    <?php if($batch_coloum_teacher_monday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_monday1; ?>"><?php echo $batch_coloum_teacher_monday1; ?>
		 <?php }
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_tuesday[]" style="width:100%" class="select2" id="<?php echo "teacher_name_tuesday_".$serial_no ?>"  required >
	    <?php if($batch_coloum_teacher_tuesday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_tuesday1; ?>"><?php echo $batch_coloum_teacher_tuesday1; ?>
		 <?php }

			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_wednesday[]" style="width:100%" class="select2" id="<?php echo "teacher_name_wednesday_".$serial_no ?>"  required >
	    <?php if($batch_coloum_teacher_wednesday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_wednesday1; ?>"><?php echo $batch_coloum_teacher_wednesday1; ?>
		 <?php }
		 
		 
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_thursday[]" style="width:100%" class="select2" id=<?php echo "teacher_name_thursday_".$serial_no ?> required >
	    <?php if($batch_coloum_teacher_thursday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_thursday1; ?>"><?php echo $batch_coloum_teacher_thursday1; ?>
		 <?php }
		 
		 
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_friday[]" style="width:100%" class="select2" id=<?php echo "teacher_name_friday_".$serial_no ?>  required >
	    <?php if($batch_coloum_teacher_friday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_friday1; ?>"><?php echo $batch_coloum_teacher_friday1; ?>
		 <?php }
		 
		 
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_saturday[]" style="width:100%" class="select2" id=<?php echo "teacher_name_saturday_".$serial_no ?>   required >
	    <?php if($batch_coloum_teacher_saturday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_saturday1; ?>"><?php echo $batch_coloum_teacher_saturday1; ?>
		 <?php }
		 
		 
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td>
	<select name="teacher_name_sunday[]" style="width:100%" class="select2" id=<?php echo "teacher_name_sunday_".$serial_no ?>  required >
	    <?php if($batch_coloum_teacher_sunday1==''){ ?>
		<option value="">Select Teacher</option></option>
		 <?php }else{ ?>
		<option value="<?php echo $batch_coloum_teacher_sunday1; ?>"><?php echo $batch_coloum_teacher_sunday1; ?>
		 <?php }
			$que3="select * from subject_allotment where course_id='$course_code1'  Group by employee_id";
			$run3=mysqli_query($conn37,$que3);
			while($row3=mysqli_fetch_assoc($run3)){
			$employee_id=$row3['employee_id'];
			
			$qry="select * from employee_info where emp_categories='Teaching' and emp_status='Active' and emp_id='$employee_id'";
			$rest=mysqli_query($conn37,$qry);
			while($row22=mysqli_fetch_assoc($rest)){
			$emp_id=$row22['emp_id'];
			$emp_name=$row22['emp_name'];
			?>
			<option value="<?php echo $emp_name; ?>"><?php echo $emp_name; ?></option>
		<?php
		}
		}
		?>
		</option>
	</select>
</td>
<td><b><input type="text" name="update_change" value="<?php echo $update_change; ?>" style="border:none" readonly /></b></td>
<td><b><input type="datetime" name="last_updated_date" value="<?php if($last_updated_date!=''){ echo $last_updated_date; } else{
	echo date('Y-m-d');
}
  ?>" style="border:none"/></b></td>
</tr>                
<?php } ?>


<script>
$(function () {
$('.select2').select2()
});
</script>