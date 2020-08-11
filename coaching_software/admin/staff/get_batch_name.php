<?php 
include("../attachment/session.php");
$subject_id=$_GET['subject_id'];
if($_GET['batch_id']!=''){
$batch_id=$_GET['batch_id'];
}else{
$batch_id="";	
}
echo "<option value=''>Select Batches</option>";
$query=mysqli_query($conn37,"select * from coaching_batch where subject_code='$subject_id'");
$num=mysqli_num_rows($query);
if($num>0){
	while ($result=mysqli_fetch_assoc($query)) {
		$coaching_info_batch_code=$result['coaching_info_batch_code'];
		$coaching_info_batch_name=$result['coaching_info_batch_name'];
		?>
		<option value="<?php echo $coaching_info_batch_code; ?>" <?php if($batch_id==$coaching_info_batch_code){ echo 'selected'; }?>><?php echo $coaching_info_batch_name; ?></option>
<?php	}
}else{
	echo "<option>No batch</option>";
}
?>