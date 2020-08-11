<?php include("../attachment/session.php"); 
$data=$_GET['data'];
$data2=explode('|?|', $data);
$student_name=$data2[0];
$course_code=$data2[1];
$student_roll=$data2[2];
$sql=mysqli_query($conn37,"select * from student_admission_info where student_roll_no='$student_roll'");
$result=mysqli_fetch_assoc($sql);
$student_name=$result['student_name'];
$my_subject_code=$result['my_subject_name'];
$subject_code_array=explode(',', $my_subject_code);
?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title" style="color:teal;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;<b>Fee Details</b></h3>
	</div>
<div class="box-body">
<?php 
for($i=0; $i<count($subject_code_array); $i++){ 
	$sql2=mysqli_query($conn37,"select * from coaching_fee_structure where subject_code='$subject_code_array[$i]' and course_code='$course_code'");
	while ($res2=mysqli_fetch_assoc($sql2)) {
		$subject_code=$res2['subject_code'];
		$coaching_info_fee_head_name=$res2['coaching_info_fee_head_name'];
		$coaching_info_fee_amount=$res2['coaching_info_fee_amount'];
		$coaching_info_fee_subhead_name=$res2['coaching_info_fee_subhead_name'];
		$coaching_info_fee_subhead_amount=$res2['coaching_info_fee_subhead_amount']; 
		$sql3=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'");
		$res3=mysqli_fetch_assoc($sql3);
		$subject_name=$res3['coaching_info_courses_subject_name'];
		?>
		
		<h4><?php echo $subject_name;?></h4>
		<div class="col-md-4">
			<div class="form-group">
			  <label><?php echo $coaching_info_fee_subhead_name; ?></label>
			   <input type="number" name="coaching_info_coaching_name" value="<?php echo $coaching_info_fee_amount; ?>" class="form-control" required="">
			</div>
		</div>
	<?php } } ?>

</div>
</div>