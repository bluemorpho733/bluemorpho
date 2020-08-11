<?php include("../attachment/session.php");
    $course_code = $_GET['course_code'];
	
	
?>			<center><h4 style="color:red;"><b>Fee Subhead Common</b></h4></center>
				<?php
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
				?>
				
				<div class="col-md-6 ">
					<div class="form-group">
					  <label>Subhead Name</label>
					   <input type="text"  name="subhead_name_common[]" value="<?php echo $subhead_name_common ; ?>" class="form-control" readonly>
					</div>
				</div>
				
				<div class="col-md-6 ">
					<div class="form-group">
					<label>Subhead Amount<font style="color:red"><b>*</b></font></label>
					<input type="text"  name="subhead_amount_common[]"   placeholder="&#8377; 500"  value="<?php echo$subhead_amount_common; ?>" class="form-control fee" oninput="for_total();" required>
					</div>
				</div>
				
				<input  name="subhead_code_common[]" value="<?php echo $subhead_code_common ; ?>" style="display:none;">
				<?php }?>
			
			

