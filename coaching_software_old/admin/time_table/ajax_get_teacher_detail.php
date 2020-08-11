<?php include("../attachment/session.php");
$day=$_GET['day'];
$courses_id=$_GET['courses_id'];
if($courses_id!=''){
	$condition=" and course_code='$courses_id'";
	$condition1=" where course_code='$courses_id'";
}else{
	$condition="";
	$condition1="";
} ?>
                <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                <thead class="my_background_color">
				  <tr>
				  <th>#</th>
				  <th><?php echo $language['Teacher Name']; ?></th>
				<?php 
				$que="select * from coaching_batch$condition1";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				while($row=mysqli_fetch_assoc($run)){
				$coaching_info_batch_name = $row['coaching_info_batch_name'];
				?>
                  <th><?php echo strtoupper($coaching_info_batch_name) ?></th>
				  <?php } ?>
				  <th>Update By</th>
                  <th>Date</th>
                  </tr>
					<tr>
						<th>#</th>
						<th></th>
						<?php 
						$que="select * from coaching_batch$condition1";
						$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
						while($row=mysqli_fetch_assoc($run)){
						$coaching_info_batch_time_from = $row['coaching_info_batch_time_from'];
						$coaching_info_batch_time_from=date('H:i A',strtotime($coaching_info_batch_time_from));
						$coaching_info_batch_time_to = $row['coaching_info_batch_time_to'];
						$coaching_info_batch_time_to=date('H:i A',strtotime($coaching_info_batch_time_to));
						?>
						<th><?php echo $coaching_info_batch_time_from.' to '. $coaching_info_batch_time_to; ?></th>
						<?php } ?>
						<th>Update By</th>
						<th>Date</th>
					</tr> 
					 </thead>
					<?php

        $que="select * from coaching_batch$condition1";
		$run=mysqli_query($conn37,$que);
		$total_period=0;
		$coaching_info_batch_name=array();
		while($row=mysqli_fetch_assoc($run)){
		$period_name1=$row['coaching_info_batch_time_from'];
		$coaching_info_batch_name[]=$row['coaching_info_batch_name'];
		$coaching_info_batch_code[]=$row['coaching_info_batch_code'];
		$period_coloum_teacher[]=$period_name1."_teacher_".$day;
		$batch_coloum_teacher_name='batch_coloum_teacher_'.$day;
		$total_period++;
		}
		
		$que1="select * from employee_info where emp_categories='Teaching' and emp_status='Active'";
		$serial_no=0;
		$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
		while($row1=mysqli_fetch_assoc($run1)){
		$teacher_name=$row1['emp_name'];
		$serial_no++;
		?>
		<tbody>
		<tr>
		<td><?php echo $serial_no ?></td>
		<td><?php echo $teacher_name ?></td>
		<?php
		for($i=0;$i<$total_period;$i++){
		$que="select * from course_time_table where batch_code='$coaching_info_batch_code[$i]' and $batch_coloum_teacher_name='$teacher_name'$condition";
		$run=mysqli_query($conn37,$que);
		$total=0;
		$course_code[]='';
		$subject_code[]='';
		while($row=mysqli_fetch_assoc($run)){
		$course_code[$total]=$row['course_code'];
		$subject_code[$total]=$row['subject_code'];
        $update_change=$row['update_change'];
        if($row['last_updated_date']!='0000-00-00'){
        $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
        }else{
        $last_updated_date=$row['last_updated_date'];
        }
		
		$total++;
		} 
		if($total==0)
		{?>
		
		<td>
		<font color="green">Available</font>
        </td>
		<?php
		}
		else{
		?>
		
		<td>
           <?php 
		     for($j=0;$j<$total;$j++){
                 $sql4=mysqli_query($conn37,"select coaching_info_courses_subject_name from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code[$j]'");
                 $res4=mysqli_fetch_assoc($sql4);
                 $subject_name=$res4['coaching_info_courses_subject_name'];
                 $sql5=mysqli_query($conn37,"select coaching_info_courses_name from coaching_courses where coaching_info_courses_code='$course_code[$j]'");
          		$res5=mysqli_fetch_assoc($sql5);
             	$course_name=$res5['coaching_info_courses_name'];
		   echo $course_name."(".$subject_name.")";
		   } 
		   ?>
        </td>
<?php		}  }

?>
<td><?php echo $update_change; ?></td>
<td><?php echo $last_updated_date; ?></td>
</tr>
<?php
 }
?>
</tbody> 
</table>
</div>

