<?php include("../attachment/session.php"); 

$student_roll_no1=$_GET['data'];


$sub_que="select * from student_fee_structure where student_roll_no='$student_roll_no1' and fee_status='Active'";
$run_sub=mysqli_query($conn37,$sub_que);
while($row_sub=mysqli_fetch_assoc($run_sub)){
$subject_code_array[]=$row_sub['subject_code'];
$discount_method=$row_sub['discount_method'];

if($discount_method=='percent'){
$discount_method1='%';
}else{
$discount_method1='&#8377;';
}

$fee_head_discount=$row_sub['fee_head_discount'];
$fee_head_amount=$row_sub['fee_head_amount'];
$fee_after_discount=$row_sub['fee_after_discount'];
}

$qry="select * from student_admission_info LEFT JOIN coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where coaching_courses.courses_status='Active' and student_admission_info.student_status='Active' and student_admission_info.session_value='$session1' and student_roll_no='$student_roll_no1'";
$rest=mysqli_query($conn37,$qry);
while($row22=mysqli_fetch_assoc($rest)){
$student_roll_no=$row22['student_roll_no'];
$coaching_roll_no=$row22['coaching_roll_no'];
$student_name=$row22['student_name'];
$course_code=$row22['course_code'];
$coaching_info_courses_name=$row22['coaching_info_courses_name'];
$subject_code=$row22['subject_code'];
$my_subject_name=$row22['my_subject_name'];
}
?>
		
			
			<div class="col-md-12 box-body table-responsive" >
			
			<br>
                <center><h4 style="color:red;"><b>Fee Subhead Common</b></h4></center>
				<?php
				$amount2=0;
				$que="select * from fee_subhead_common where subhead_name_common!=''";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subhead_name_common = $row['subhead_name_common'];
				$subhead_code_common = $row['subhead_code_common'];
				

				$que1="select * from student_fee_structure where student_roll_no='$student_roll_no1'";
				$run1=mysqli_query($conn37,$que1);
				if(mysqli_num_rows($run1)>0){
				while($row1=mysqli_fetch_assoc($run1)){
				$amount1="fee_subhead_amount_common_".$subhead_code_common;
				$subhead_amount_common = $row1[$amount1];
				}}else{
				$subhead_amount_common = '';
				}
				$amount2=$subhead_amount_common+$amount2;
				?>
				<div class="col-md-6 ">
					<div class="form-group">
					  <label>Subhead Name</label>
					   <input type="text"  name="subhead_name_common[]" value="<?php echo $subhead_name_common ; ?>" class="form-control" readonly>
					</div>
				</div>
				
				<div class="col-md-6 ">
					<div class="form-group">
					<label>Subhead Amount</label>
					<input type="text"  name="subhead_amount_common[]"    value="<?php echo$subhead_amount_common; ?>" class="form-control fee" oninput="for_total();" readonly>
					</div>
				</div>
				<?php }?>
			
			<br>
				<center><h4 style="color:red;"><b>Fee Subhead Subjectwise</b></h4></center>
				<?php
				$amount1=0;
				for($i=0; $i<count($subject_code_array); $i++){ 
				$que1="select * from coaching_courses_subject where course_code='$course_code' and coaching_info_courses_subject_code='$subject_code_array[$i]'";
				$run1=mysqli_query($conn37,$que1);
				while($row1=mysqli_fetch_assoc($run1)){
				$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
				$coaching_info_courses_subject_code = $row1['coaching_info_courses_subject_code'];
				?>
				<center><h3 style="color:green;"><b><?php echo $coaching_info_courses_subject_name ; ?></b></h3></center>
				<input type="text" style="display:none;"  name="subject_code[]" value="<?php echo $coaching_info_courses_subject_code ; ?>"  class="form-control">
				<center><div class="col-md-6 "><label>Subhead Name</label></div></center>
				<center><div class="col-md-6 "><label>Subhead Amount</label></div></center>
				<?php
				$que="select * from fee_subhead_separate where subhead_name_separate!=''";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subhead_name_separate = $row['subhead_name_separate'];
				$subhead_code_separate = $row['subhead_code_separate'];

				$que01="select * from student_fee_structure where student_roll_no='$student_roll_no1' and subject_code='$subject_code_array[$i]'";
				$run01=mysqli_query($conn37,$que01);
				if(mysqli_num_rows($run01)>0){
				while($row01=mysqli_fetch_assoc($run01)){
				$amount="fee_subhead_amount_separate_".$subhead_code_separate;
				$subhead_amount_separate = $row01[$amount];
                }
				}else{
				$subhead_amount_separate = '';
				}
				
				$amount1=$subhead_amount_separate+$amount1;
				?>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_name_separate[]'; ?>" value="<?php echo $subhead_name_separate ; ?>" class="form-control" style="border-color: coral;"  readonly>
						</div>
				</div>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_amount_separate[]'; ?>" id="coaching_info_fee_amount"   value="<?php echo $subhead_amount_separate; ?>" oninput="for_total();" class="form-control fee" style="border-color: coral;" readonly>
						</div>
				</div>
				<?php } } } ?>
			   
			   <div class="col-md-4 ">
					<div class="form-group">
						<label>Fee Amount</label>
						   <input type="text"  value="<?php echo $fee_head_amount; ?>" class="form-control"  readonly>
					</div>
				</div>

				<div class="col-md-4 ">
					<div class="form-group">
						<label>Discount</label>
						   <input type="text"  value="<?php echo $fee_head_discount.' '.$discount_method1 ; ?>" class="form-control"  readonly>
					</div>
				</div>
				
				<div class="col-md-4 ">
					<div class="form-group">
						<label>Fee After Discount</label>
						   <input style="border-color:Black;" type="text"  value="<?php echo $fee_after_discount; ?>" class="form-control"  readonly>
					</div>
				</div>
       </div>
