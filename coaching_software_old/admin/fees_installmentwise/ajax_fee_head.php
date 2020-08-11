<?php include("../attachment/session.php"); 
$data=$_GET['data'];
$data2=explode('|?|', $data);
$student_name=$data2[0];
$course_code=$data2[1];
$student_roll=$data2[2];
$sql=mysqli_query($conn37,"select * from student_admission_info where student_roll_no='$student_roll'");
$result=mysqli_fetch_assoc($sql);
$student_name=$result['student_name'];
$coaching_roll_no=$result['coaching_roll_no'];
$my_subject_code=$result['my_subject_name'];
$subject_code_array=explode(',', $my_subject_code);
?>

<?php
//////Separate///////
$amount_1=0;
for($i=0; $i<count($subject_code_array); $i++){ 
$que1="select * from coaching_courses_subject where course_code='$course_code' and coaching_info_courses_subject_code='$subject_code_array[$i]'";
$run1=mysqli_query($conn37,$que1);
while($row1=mysqli_fetch_assoc($run1)){
$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row1['coaching_info_courses_subject_code'];


$que="select * from fee_subhead_separate where subhead_name_separate!=''";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
$subhead_name_separate = $row['subhead_name_separate'];
$subhead_code_separate = $row['subhead_code_separate'];

$que01="select * from coaching_fee_structure where course_code='$course_code' and subject_code='$coaching_info_courses_subject_code'";
$run01=mysqli_query($conn37,$que01);
if(mysqli_num_rows($run01)>0){
while($row01=mysqli_fetch_assoc($run01)){
$amount="fee_subhead_amount_separate_".$subhead_code_separate;
$subhead_amount_separate = $row01[$amount];
}
}else{
$subhead_amount_separate = '';
}

$amount_1=$subhead_amount_separate+$amount_1;

}
}
}
//////Separate///////
?>


<?php
//////Common///////
$amount_2=0;
$que="select * from fee_subhead_common where subhead_name_common!=''";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
$subhead_name_common = $row['subhead_name_common'];
$subhead_code_common = $row['subhead_code_common'];


$que1="select * from coaching_fee_structure where course_code='$course_code'";
$run1=mysqli_query($conn37,$que1);
if(mysqli_num_rows($run1)>0){
while($row1=mysqli_fetch_assoc($run1)){
$amount1="fee_subhead_amount_common_".$subhead_code_common;
$subhead_amount_common = $row1[$amount1];
}}else{
$subhead_amount_common = '';
}
$amount_2=$subhead_amount_common+$amount_2;
}
//////Common///////

$total_amount=$amount_1+$amount_2;
?>


			
				<?php
				$que1="select * from coaching_fee_structure where course_code='$course_code'";
				$run1=mysqli_query($conn37,$que1);
				if(mysqli_num_rows($run1)>0){
				while($row1=mysqli_fetch_assoc($run1)){
				$fee_head_name = $row1['fee_head_name'];
				$fee_head_amount = $row1['fee_head_amount'];
				$fee_head_code = $row1['fee_head_code'];
				}}else{
				$fee_head_name = '';
				$fee_head_amount = '';
				$que="select * from login";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				while($row=mysqli_fetch_assoc($run)){
				$fee_head_code = $row['fee_structure_code'];
				}
				}
				?>

				<br>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Student Name</label>
						   <input type="text"  name="student_name"  value="<?php echo $student_name; ?>" class="form-control" readonly>
						</div>
				</div>
				
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Student Roll No</label>
						   <input type="text"  name="coaching_roll_no"  value="<?php echo $coaching_roll_no; ?>" class="form-control" readonly>
						</div>
				</div>
				
				<input type="text"  name="student_roll_no"  value="<?php echo $student_roll; ?>" class="form-control"  style="display:none">
				<input type="text"  name="course_code"  value="<?php echo $course_code; ?>" class="form-control"  style="display:none">
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Fee Head Name</label>
						   <input type="text"  name="fee_head_name"   value="<?php echo $fee_head_name; ?>" class="form-control"  readonly>
						</div>
				</div>
				
				<div class="col-md-3">
						<div class="form-group">
						  <label>Fee Code</label>
						   <input type="text"  name="fee_head_code"   placeholder="Fee Code"  value="<?php echo $fee_head_code; ?>" class="form-control" readonly>
						</div>
				</div>
				
				<div class="col-md-3" >
						<div class="form-group">
						  <label>Fee Amount</label>
						   <input type="text"  name="fee_head_amount" id="coaching_info_fee_amount11" value="<?php echo $total_amount;?>" class="form-control"  readonly>
						</div>
				</div>
				
				<div class="col-md-3">
				 <label>Discount</label>
				  <div class="form-group">
				   <div class="input-group">
				
                    <input type="number" oninput="for_total(this.value);" id="discount_amount"  name="fee_head_discount" min="0" max="<?php echo $total_amount;?>" class="form-control" style="display:none;">
					
					<input type="number" oninput="for_total1(this.value);" id="discount_amount1"  name="fee_head_discount1" min="0" max="100" class="form-control" >
					
					    <span class="input-group-addon" style="padding:0px;">
							<select name="discount_method" style="color:blue; border:none;" id="discount_type" onchange="for_discount_type();">
								<option value="percent">%</option>
								<option value="Rs">Rs</option>
							</select>
				        </span>
						
				    </div>
				   </div>
				  </div>

				<div class="col-md-3">
						<div class="form-group">
						  <label>Fee After Discount</label>
						   <input type="text"  name="fee_after_discount" id="coaching_info_fee_amount" value="<?php echo $total_amount;?>" class="form-control"  readonly>
						</div>
				</div>
				
				<div class="col-md-3">
						<div class="form-group">
						  <label>Last Submission Date</label>
						   <input type="date"  name="fee_last_submission_date" value="" class="form-control" required>
						</div>
				</div>
				