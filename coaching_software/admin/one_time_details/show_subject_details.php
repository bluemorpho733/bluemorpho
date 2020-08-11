<?php include("../attachment/session.php"); ?>

<table id="example1" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Subject Name</th>
<th>Subject Code</th>
<th>Priority</th>
<th>Action</th>
</tr>
</thead>

<?php
$class_code=$_POST['class_code'];
$class_condition="";
if($class_code!=''){
$class_condition=" and classwise_class_code='$class_code'";
}
$subject_condition="";
$classwise_subject_column_name="classwise_subject_code";
$classwise_subject_query="select $classwise_subject_column_name from classwise_subject_details where classwise_subject_status='Active' and session_value='$session1'$class_condition ORDER BY classwise_subject_priority ASC";
$classwise_subject_run=mysqli_query($conn37,$classwise_subject_query) or die(mysqli_error($conn37));
$serial_no1=0;
while($classwise_subject_row=mysqli_fetch_assoc($classwise_subject_run)){
$classwise_subject_code=$classwise_subject_row['classwise_subject_code'];
// if($serial_no1=='0'){
// $subject_condition="subject_code!='$classwise_subject_code'";
// }else{
$subject_condition=$subject_condition." and subject_code!='$classwise_subject_code'";
// }
$serial_no1++;
}

// if($subject_condition!=''){
// $subject_condition=" and (".$subject_condition.")";
// }

$subject_column_name="s_no,subject_name,subject_code,subject_priority";
$subject_query="select $subject_column_name from subject_details where subject_status='Active' and session_value='$session1' and subject_name!=''$subject_condition ORDER BY subject_priority ASC";
$subject_run=mysqli_query($conn37,$subject_query) or die(mysqli_error($conn37));
$serial_no=0;
while($subject_row=mysqli_fetch_assoc($subject_run)){
$s_no=$subject_row['s_no'];
$subject_name = $subject_row['subject_name'];
$subject_code = $subject_row['subject_code'];
$subject_priority = $subject_row['subject_priority'];

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?></td>
<td><?php echo $subject_name; ?></td>
<td><?php echo $subject_code; ?></td>
<td><?php echo $subject_priority; ?></td>
<td><button class="btn my_background_color" onclick="classwise_subject_add('<?php echo $subject_code; ?>','<?php echo $subject_priority; ?>');" >Add</button></td>
</tr>
<?php } ?>
</table>

<script>
$(function () {
$('#example1').DataTable()
});
</script>