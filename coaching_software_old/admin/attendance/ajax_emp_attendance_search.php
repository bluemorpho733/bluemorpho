<?php include("../attachment/session.php"); ?>
<?php
$type=$_GET['type'];
$que="select * from employee_info where emp_status='Active' and emp_categories='$type'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
$month_wise='';
while($row=mysqli_fetch_assoc($run)){

	$emp_id=$row['emp_id'];
	$emp_name = $row['emp_name'];
	$emp_designation = $row['emp_designation'];
	$emp_categories=$row['emp_categories'];
	$month = date('m');
	$year = date('Y');
	
	$month_wise = date('F', mktime(0, 0, 0, $month, 10));
	
	$serial_no++;
	
	$present=0;
	$absent=0;
	$leave=0;
	$date2=$year.'-'.$month.'-01';
	$count1 = date(' t ', strtotime($date2) );
	$que11="select * from staff_attendance where staff_type='$emp_categories' and month='$month' and year='$year' and staff_id='$emp_id' and session_value='$session1'";
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
	$data123="id=".$emp_id."&current_month=".$month."&year=".$year."&designation=".$emp_designation."&type=".$emp_categories."&name=".$emp_name;
?>
<tr>
  <td><?php echo $serial_no; ?></td>
  <td><?php echo $emp_name; ?></td>
  <td><?php echo $emp_categories; ?></td>
  <td><?php echo $emp_designation; ?></td>
  <td><?php echo $month_wise; ?></td>
  <td><?php echo $present; ?></td>
  <td><?php echo $absent; ?></td>
  <td><?php echo $leave; ?></td>
  
  <td><?php echo $update_change; ?></td>
  <td><?php echo $last_updated_date; ?></td>
  
    <td><button type="button" onclick="post_content('attendance/emp_attendance_view','<?php echo $data123; ?>')"  class="btn btn-default my_background_color">View</button></td>
</tr>
<?php
}
?>