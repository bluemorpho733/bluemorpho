<table width="100%" cellpadding="20px;" cellspacing="20px;">
<?php
include("../attachment/session.php");
$current_date=$_GET['current_date'];
$student_class=$_GET['student_class'];
$mark=$_GET['mark'];

if($current_date!=''){
$current_date1=explode('-',$current_date);
$current_year=$current_date1[0];
$current_month=$current_date1[1];
$current_date1=$current_date1[2];
}else{
$current_date=date('Y-m-d');
$current_year=date('Y');
$current_month=date('m');
$current_date1=date('d');
}
?>
<input type="hidden" name="attendance_date" value="<?php echo $current_date; ?>" />
<?php
if($mark!=''){
$query1="select student_roll_no,student_name,student_class,student_class_section,student_rf_id_number from student_admission_info where student_class='$student_class' and registration_final='yes' and student_status='Active' and session_value='$session1'$filter37";
$result1=mysqli_query($conn37,$query1)or die(mysqli_error($conn37));
$all_student_roll_no='';
$student_ser=0;
while($row1=mysqli_fetch_assoc($result1)){
$student_roll_no=$row1['student_roll_no'];
$student_name=$row1['student_name'];
$student_class=$row1['student_class'];
$student_class_section=$row1['student_class_section'];
$student_rf_id_number=$row1['student_rf_id_number'];

if($mark=='P'){
$condition1=" or month='$current_month' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='P/2'";
}else{
$condition1="";
}

$query2="select attendance_roll_no,`$current_date1` from student_attendance where month='$current_month' and year='$current_year' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='$mark'$condition1";
$result2=mysqli_query($conn37,$query2)or die(mysqli_error($conn37));
if(mysqli_num_rows($result2)>0){
while($row2=mysqli_fetch_assoc($result2)){
$attendance=$row2[$current_date1];
$student_ser++;
?>
<tr>
<td><?php echo $student_ser.'.'; ?></td>
<td><?php echo $student_name; ?></td>
<td><?php echo $student_class.' ('.$student_class_section.')'; ?></td>
<td>
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='P'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|P'; ?>" id="<?php echo 'present_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','present_');">P&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='P/2'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|P/2'; ?>" id="<?php echo 'present2_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','present2_');">P/2&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='A'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|A'; ?>" id="<?php echo 'absent_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','absent_');">A&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='L'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|L'; ?>" id="<?php echo 'leave_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','leave_');">L
</td>
</tr>
<?php
}
}
}
}else{

$query1="select student_roll_no,student_name,student_class,student_class_section,student_rf_id_number from student_admission_info where student_class='$student_class' and registration_final='yes' and student_status='Active' and session_value='$session1'$filter37";
$result1=mysqli_query($conn37,$query1)or die(mysqli_error($conn37));
$all_student_roll_no='';
$student_ser=0;
while($row1=mysqli_fetch_assoc($result1)){
$student_roll_no=$row1['student_roll_no'];
$student_name=$row1['student_name'];
$student_class=$row1['student_class'];
$student_class_section=$row1['student_class_section'];
$student_rf_id_number=$row1['student_rf_id_number'];

$query2="select attendance_roll_no,`$current_date1` from student_attendance where month='$current_month' and year='$current_year' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='P' or month='$current_month' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='P/2' or month='$current_month' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='A' or month='$current_month' and session_value='$session1' and attendance_roll_no='$student_roll_no' and `$current_date1`='L'";
$result2=mysqli_query($conn37,$query2)or die(mysqli_error($conn37));
if(mysqli_num_rows($result2)<1){
$attendance='';
$student_ser++;
?>
<tr>
<td><?php echo $student_ser.'.'; ?></td>
<td><?php echo $student_name; ?></td>
<td><?php echo $student_class.' ('.$student_class_section.')'; ?></td>
<td>
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='P'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|P'; ?>" id="<?php echo 'present_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','present_');">P&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='P/2'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|P/2'; ?>" id="<?php echo 'present2_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','present2_');">P/2&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='A'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|A'; ?>" id="<?php echo 'absent_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','absent_');">A&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' name='student_attendance[]' <?php if($attendance=='L'){ echo 'checked'; } ?> value="<?php echo $student_roll_no.'|?|L'; ?>" id="<?php echo 'leave_'.$student_roll_no; ?>" class="<?php echo $student_roll_no; ?>" onclick="validity_checked('<?php echo $student_roll_no; ?>','leave_');">L
</td>
</tr>
<?php
}
}
}
?>
</table>