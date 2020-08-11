<?php include("../attachment/session.php");
    $course_code = $_GET['course_code'];
	
	
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
				
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Fee Head Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="fee_head_name"   placeholder="Fee Head Name"  value="<?php echo $fee_head_name; ?>" class="form-control" maxlength="40" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Fee Amount<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="fee_head_amount" id="coaching_info_fee_amount"  placeholder="&#8377; 5000"  value="<?php echo $fee_head_amount; ?>" class="form-control"  readonly>
						</div>
				</div>
				
			    <div class="col-md-4 ">
						<div class="form-group">
						  <label>Fee Code</label>
						   <input type="text"  name="fee_head_code"   placeholder="Fee Code"  value="<?php echo $fee_head_code; ?>" class="form-control" readonly>
						</div>
				</div>
			

