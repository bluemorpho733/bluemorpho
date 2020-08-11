 <?php include("../attachment/session.php");
 
$data=$_GET['data'];
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$batch_code = $row['batch_code'];
}

if($data=='A'){
?>               
				
				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control" onchange="for_subject(this.value);"  required>
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label >Subject Name<font style="color:red"><b>*</b></font></label><br>
						<select name="subject_code" class="form-control" id="student_course_subject" required>
					    <option value="">Select</option>
					  </select>
					  </div>
				</div>
                <div class="col-md-3 ">
						<div class="form-group">
						  <label>Batch Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_batch_name"   placeholder="Batch Name"  value="" class="form-control" maxlength="40" required>
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Batch Code<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_batch_code"   placeholder="Batch Code"   value="<?php echo $batch_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Time From<font style="color:red"><b>*</b></font></label>
						   <input type="time"  name="coaching_info_batch_time_from" value="" class="form-control" required >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Time To<font style="color:red"><b>*</b></font></label>
						   <input type="time"  name="coaching_info_batch_time_to" value="" class="form-control" required >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Remark</label>
						   <input type="text"  name="coaching_info_batch_remark"   placeholder="Remark"  value="" class="form-control" maxlength="100" >
						</div>
				</div>
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
<?php }else{ }?>	
			