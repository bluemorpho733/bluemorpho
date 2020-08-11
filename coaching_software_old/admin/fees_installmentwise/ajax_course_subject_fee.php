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
?>		         <br>
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
				
				$amount1=$subhead_amount_separate+$amount1;
				?>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_name_separate[]'; ?>" value="<?php echo $subhead_name_separate ; ?>" class="form-control" style="border-color: coral;"  readonly>
						</div>
				</div>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_amount_separate[]'; ?>" id="coaching_info_fee_amount"   value="<?php echo $subhead_amount_separate; ?>" class="form-control fee" style="border-color: coral;" readonly>
						</div>
				</div>
				
                <input  name="<?php echo $coaching_info_courses_subject_code.'_subhead_code_separate[]'; ?>" value="<?php echo $subhead_code_separate ; ?>" style="display:none;">
				<?php } } } ?>