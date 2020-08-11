<?php include("../attachment/session.php"); 
$data=$_GET['data'];
$data2=explode('|?|', $data);
$student_name=$data2[0];
$course_code=$data2[1];
$student_roll=$data2[2];
$sql=mysqli_query($conn37,"select * from student_admission_info INNER JOIN coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where student_admission_info.student_roll_no='$student_roll'");
$result=mysqli_fetch_assoc($sql);
$student_name=$result['student_name'];
$my_subject_name=$result['my_subject_name'];
$subject_code=explode(',', $my_subject_name);
$student_father_name=$result['student_father_name'];
$student_contact_number=$result['student_contact_number'];
$course_code=$result['course_code'];
$coaching_info_courses_name=$result['coaching_info_courses_name'];
?>

<script type="text/javascript">
function Discount_value(Discount_val){
var total_fees=document.getElementById("hidden_total_fees").value;
var final_fees=total_fees - Discount_val;
document.getElementById("total_fees2").value=final_fees;
}
</script>

<form method="post" enctype="multipart/form-data" id="my_form">
            <div class="box-body">
			    <div class="col-md-3">
					<div class="form-group">
					  <label>Student Name</label>
					   <input type="text" name="student_name" placeholder="Student Name" value="<?php echo $student_name; ?>" class="form-control" readonly="">
					</div>
				</div>
				 <div class="col-md-3">
						<div class="form-group">
						  <label>Father Name</label>
						   <input type="text" name="father_name" placeholder="Father Name" value="<?php echo $student_father_name; ?>" class="form-control" readonly="">
						</div>
				 </div>
				<div class="col-md-3">
						<div class="form-group">
						  <label>Course Name</label>
						  <input type="hidden" name="course_id" value="<?php echo $course_code; ?>">
						   <input type="text" name="course_name" placeholder="Course Name" value="<?php echo $coaching_info_courses_name; ?>" class="form-control" readonly="">
						</div>
				</div>
				<div class="col-md-3">
						<div class="form-group">
						  <label>Student Contact Number</label>
						   <input type="text" name="student_contact_number" placeholder="Student Contact Number" value="<?php echo $student_contact_number;?>" class="form-control" readonly="">
						</div>
				</div>
				
			</div>
	<h3>Fees Details</h3>			
<?php
if(is_array($subject_code)){
	$total_fees=0;
for($h=0; $h<count($subject_code); $h++){
$sql2=mysqli_query($conn37,"Select * from coaching_fee_structure where course_code='$course_code' OR subject_code='$subject_code[$h]'");
while ($res2=mysqli_fetch_assoc($sql2)) {
		$subject_code=$res2['subject_code'];
		$coaching_info_fee_head_name=$res2['coaching_info_fee_head_name'];
		$coaching_info_fee_code=$res2['coaching_info_fee_code'];
		$coaching_info_fee_amount=$res2['coaching_info_fee_amount'];
		$total_fees=$total_fees+$coaching_info_fee_amount;
		$coaching_info_fee_subhead_name=$res2['coaching_info_fee_subhead_name'];
		$coaching_info_fee_subhead_amount=$res2['coaching_info_fee_subhead_amount'];
		$sql3=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'");
		$res3=mysqli_fetch_assoc($sql3);
		$subject_name=$res3['coaching_info_courses_subject_name'];
		?>
		<h4><?php echo $subject_name; ?></h4>
		<div class="col-md-6">
			<div class="form-group">
			  <label><?php echo $coaching_info_fee_subhead_name; ?></label>
			   <input type="number" name="subject_name" placeholder="Student Contact Number" value="<?php echo $coaching_info_fee_amount;?>" class="form-control" readonly="">
			</div>
		</div>
<?php } } ?>
		<div class="col-md-3">
			<div class="form-group">
			  <label>Discount</label>
			   <input type="number" name="Discount" placeholder="Discount" value="" class="form-control" oninput="Discount_value(this.value);">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			  <label>Total Fees</label>
			  <input type="hidden" name="hidden_total_fees" id="hidden_total_fees" value="<?php echo $total_fees; ?>">
			   <input type="number" name="total_fees" placeholder="Final fees" value="<?php echo $total_fees; ?>" class="form-control" id="total_fees2" readonly>
			</div>
		</div>
<?php }
else{

}
?>
		</form>
                  
				










