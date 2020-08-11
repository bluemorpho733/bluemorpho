<?php
include("../attachment/session.php");
$courses = $_GET['courses'];
$query="select * from coaching_batch where course_code='$courses'";
$result=mysqli_query($conn37,$query);
while($row=mysqli_fetch_assoc($result)){
	$batch_code = $row['coaching_info_batch_code'];
	$coaching_info_batch_name = $row['coaching_info_batch_name'];
	?>
	<option value="<?php echo $batch_code;?>"><?php echo $coaching_info_batch_name;?></option>
<?php } ?>