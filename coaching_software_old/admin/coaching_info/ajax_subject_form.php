 <?php include("../attachment/session.php");
 
$data=$_GET['data'];

if($data=='A'){
?>               
				
				 <div class="col-md-3">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control select2" required>
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
					  <label>Subject Name<font style="color:red"><b>*</b></font></label>
						<select name="coaching_info_courses_subject_code" onchange="for_subject_name(this.value)" class="form-control " required>
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_subject where subject_name!=''";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$subject_name = $row['subject_name'];
						$subject_code = $row['subject_code'];
						?>
					  <option value="<?php echo $subject_code;?>"><?php echo $subject_name;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-3 " style="display:none;">
						<div class="form-group" id="subject_name">
						  <label>Subject Name</label>
						   <input type="text"  name="coaching_info_courses_subject_name"   class="form-control" readonly >
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Subject Duration</label>
						   <input type="text"  name="coaching_info_courses_subject_duration"   placeholder="Subject Duration"  value="" class="form-control" >
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>No. Of Trainer</label>
						   <input type="number"  name="coaching_info_courses_subject_trainer"   placeholder="No. Of Trainer"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
<?php }else{ }?>	
			