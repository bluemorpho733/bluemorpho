<?php include("../attachment/session.php"); ?>

<table id="" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Subject Name</th>
<th>Subject Code</th>
<th>Subject Priority</th>
</tr>
</thead>

<tbody>
<?php
$class_code=$_POST['class_code'];
$class_condition="";
if($class_code!=''){
$class_condition=" and classwise_subject_details.classwise_class_code='$class_code'";
}
$classwise_subject_column_name="classwise_subject_details.s_no,classwise_subject_details.classwise_subject_code,classwise_subject_details.classwise_subject_priority,subject_details.subject_name";
$classwise_subject_query="select $classwise_subject_column_name from classwise_subject_details JOIN subject_details ON classwise_subject_details.classwise_subject_code=subject_details.subject_code where classwise_subject_details.classwise_subject_status='Active' and classwise_subject_details.session_value='$session1'$class_condition and subject_details.subject_status='Active' and subject_details.session_value='$session1' and subject_details.subject_name!='' ORDER BY classwise_subject_details.classwise_subject_priority ASC";
$classwise_subject_run=mysqli_query($conn37,$classwise_subject_query) or die(mysqli_error($conn37));
$serial_no=0;
while($classwise_subject_row=mysqli_fetch_assoc($classwise_subject_run)){
$s_no=$classwise_subject_row['s_no'];
$subject_name = $classwise_subject_row['subject_name'];
$classwise_subject_code = $classwise_subject_row['classwise_subject_code'];
$classwise_subject_priority = $classwise_subject_row['classwise_subject_priority'];

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?><input type="hidden" name="s_no[]" value="<?php echo $s_no; ?>" class="form-control" /></td>
<td><?php echo $subject_name; ?></td>
<td><?php echo $classwise_subject_code; ?></td>
<td><input type="number" name="classwise_subject_priority[]" value="<?php echo $classwise_subject_priority; ?>" class="form-control" /></td>
</tr>
<?php } ?>
</tbody>

<tfoot>
<td colspan="4"><center><input type="submit" name="submit" value="Save" class="btn my_background_color" /></center></td>
</tfoot>
</table>