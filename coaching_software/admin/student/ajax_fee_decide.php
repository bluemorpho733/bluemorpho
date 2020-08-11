<?php include("../attachment/session.php"); ?>  
<h3 style="color:#d9534f;"><b>Fee Details:</b></h3>
<?php
$course_code11=$_GET['course_code'];
if($course_code11!=''){
	$condition1=" and course_code='$course_code11'";
}else{
	$condition1="";
}
$subject_code11=$_GET['course_subject'];
if($subject_code11!='All'){
	$condition2=" and subject_code='$subject_code11'";
}else{
	$condition2="";
}
$result='';

$que="select * from coaching_fee_structure where course_code!=''$condition1$condition2";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$coaching_info_fee_code = '';
if(mysqli_num_rows($run)>0){

while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
$course_code = $row['course_code'];
$subject_code = $row['subject_code'];
$coaching_info_fee_type = $row['coaching_info_fee_type'];
$coaching_info_fee_head_name = $row['coaching_info_fee_head_name'];
$coaching_info_fee_code = $row['coaching_info_fee_code'];
$coaching_info_fee_amount = $row['coaching_info_fee_amount'];
$coaching_info_fee_subhead_name = $row['coaching_info_fee_subhead_name'];
$coaching_info_fee_subhead_amount = $row['coaching_info_fee_subhead_amount'];
}
?>
<div class="col-md-4">
	<div class="form-group">
		<label>Fee Type</label>
		<input type="text" name="" id="fee_type" value="<?php echo $coaching_info_fee_type; ?>" class="form-control" readonly>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Fee Head Name</label>
		<input type="text" name="" id="fee_head" value="<?php echo $coaching_info_fee_head_name; ?>" class="form-control" readonly>
	</div>
</div>			
<div class="col-md-4">				
	<div class="form-group">
		<label>Fee Amount</label>
		<input type="text" name="" id="fee_amount" value="<?php echo $coaching_info_fee_amount; ?>" class="form-control" readonly>
	</div>
</div>


<?php
if($coaching_info_fee_code!=''){
	$condition3=" and coaching_fee_structure.coaching_info_fee_code='$coaching_info_fee_code'";
}else{
	$condition3="";
}
$que="select * from coaching_fee_structure left join coaching_courses on coaching_fee_structure.course_code = coaching_courses.coaching_info_courses_code where coaching_courses.courses_status='Active'$condition3";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
// if(mysqli_num_rows($run)<=0){
	// $result='No';
// }
while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
$course_code = $row['course_code'];
$subject_code = $row['subject_code'];
$coaching_info_courses_name = $row['coaching_info_courses_name'];
$coaching_info_fee_type = $row['coaching_info_fee_type'];
$coaching_info_fee_head_name = $row['coaching_info_fee_head_name'];
$coaching_info_fee_code = $row['coaching_info_fee_code'];
$coaching_info_fee_amount = $row['coaching_info_fee_amount'];
$coaching_info_fee_subhead_name = $row['coaching_info_fee_subhead_name'];
$coaching_info_fee_subhead_amount = $row['coaching_info_fee_subhead_amount'];
$fee_status = $row['fee_status'];

if($fee_status=='Active'){
$button_var='Inactive';
}else{
$button_var='Active';
}

if($subject_code=='All'){
$coaching_info_courses_subject_name='All Subject';
}else{
$que2="select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'";
$run2=mysqli_query($conn37,$que2) or die(mysqli_error($conn37));
while($row2=mysqli_fetch_assoc($run2)){
$coaching_info_courses_subject_name = $row2['coaching_info_courses_subject_name'];
}
}


$serial_no++;
?>		

<div class="col-md-12">	
<div class="col-md-1">	
</div>
<div class="col-md-1">	
<label><?php echo $serial_no; ?>.</label>
</div>
<div class="col-md-2">	
	<div class="form-group" >
	  <label>Fee Subhead Name:</label>
	</div>	
</div>	
<div class="col-md-2">	
	<div class="form-group" >
	  <input type="text" id="" name="" value="<?php echo $coaching_info_fee_subhead_name; ?>" class="form-control" readonly>
	</div>	
</div>	
<div class="col-md-2">	
	<div class="form-group" >
	  <label>Subhead Fee:</label>
	</div>
</div>	
<div class="col-md-3">	
	<div class="form-group" >
	  <input type="text" id="" name="" value="<?php echo $coaching_info_fee_subhead_amount; ?>" class="form-control" readonly>
	</div>
</div>
<div class="col-md-1">
</div>
</div>

<?php } } ?>