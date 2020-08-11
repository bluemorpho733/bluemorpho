 <?php include("../attachment/session.php");
 
$data=$_GET['data'];
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$course_code = $row['course_code'];
}

if($data=='A'){
?>               
				
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_courses_name"   placeholder="Courses Name"  value="" class="form-control" maxlength="40" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Code<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_courses_code"   placeholder="Courses Code"   value="<?php echo $course_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Category</label>
						   <input type="text"  name="coaching_info_courses_category"   placeholder="Courses Category"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Description</label>
						   <textarea type="textarea"  name="coaching_info_courses_description"   placeholder="Courses Description"  value="" class="form-control" maxlength="70" ></textarea>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Duration</label>
						   <input type="text"  name="coaching_info_courses_duration"   placeholder="Courses Duration"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>No. Of Trainer</label>
						   <input type="number"  name="coaching_info_courses_trainer"   placeholder="No. Of Trainer"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
<?php }else{ }?>	
			