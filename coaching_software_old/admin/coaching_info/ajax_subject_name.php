<?php include("../attachment/session.php");
    $code = $_GET['coaching_info_courses_subject_code'];
?>			
<?php
$que="select * from coaching_subject where subject_code='$code'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$subject_name = $row['subject_name'];
}
?>
<div class="form-group">
<label>Subject Name</label>
<input type="text" name="coaching_info_courses_subject_name" value="<?php echo $subject_name; ?>"  class="form-control" readonly >
</div>
		

			
			

