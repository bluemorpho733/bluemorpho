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

?>			    <br>
                <center><h4 style="color:red;"><b>Fee Subhead Common</b></h4></center>
				<?php
				$amount2=0;
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
					<input type="text"  name="subhead_amount_common[]"    value="<?php echo$subhead_amount_common; ?>" class="form-control fee" readonly>
					</div>
				</div>
				
				<input  name="subhead_code_common[]" value="<?php echo $subhead_code_common ; ?>" style="display:none;">
				<?php }?>
			

