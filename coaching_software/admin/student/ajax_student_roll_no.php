<?php include("../attachment/session.php"); ?>  
<table id="example3" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
  <th><?php echo $language['S No']; ?></th>
  <th><?php echo $language['Student Name']; ?></th>
  <th><?php echo $language['Father Name']; ?></th>
  <th><?php echo $language['Student Old Roll No']; ?></th>
  <th><?php echo $language['Generate New Roll No']; ?></th>
  <th>Update By</th>
  <th>Date</th>
</tr>
</thead>
<tbody>
<?php
$get_subject=$_GET['get_subject'];
if($get_subject!='All'){
$condition=" and my_subject_name like '%$get_subject%'";
}else{
$condition="";
}
$course_code=$_GET['id'];
$roll_no_generate_by=$_GET['roll_no_generate_by'];
$start_number=$_GET['start_number'];
if($start_number!=''){
  $start_number=$start_number;  
}else{
    $start_number=0;
}

$roll_no_array[]=0;
$query2="select * from student_admission_info where course_code='$course_code' and student_status='Active' and session_value='$session1'$condition ORDER BY student_name";
$serial_no1=0;
$res2=mysqli_query($conn37,$query2);
while($row2=mysqli_fetch_assoc($res2)){
$roll_no_array[$serial_no1]=$serial_no1+1;
$serial_no1++;
}

$query1="select * from student_admission_info where course_code='$course_code' and student_status='Active' and session_value='$session1'$condition ORDER BY student_name";
$serial_no=0;
$res1=mysqli_query($conn37,$query1);
while($row1=mysqli_fetch_assoc($res1)){
$s_no=$row1['s_no'];
$student_name=$row1['student_name'];
$student_father_name=$row1['student_father_name'];
$student_roll_no=$row1['student_roll_no'];
$coaching_roll_no=$row1['coaching_roll_no'];

$update_change=$row1['update_change'];
if($row1['last_updated_date']!='0000-00-00'){
$last_updated_date=date('d-m-Y',strtotime($row1['last_updated_date']));
}else{
$last_updated_date=$row1['last_updated_date'];
}

$serial_no++;
?>

<?php if($roll_no_generate_by=='Automatic'){ ?>    
<tr>
<td><?php echo $serial_no; ?></td>
<td><?php echo $student_name; ?></td>
<td><?php echo $student_father_name; ?></td>
<td><input type="hidden" placeholder="" name="student_roll_no[]" style="border:none;" value="<?php echo $student_roll_no; ?>" readonly ><input type="text" placeholder="" name="student_school_roll_no[]" style="border:none;" value="<?php echo $coaching_roll_no; ?>" readonly ></td>
<td><input type="text" placeholder="" name="coaching_roll_no[]" value="<?php echo $serial_no+$start_number; ?>" readonly ></td>

<td><?php echo $update_change; ?></td>
<td><?php echo $last_updated_date; ?></td>
</tr>
<?php }elseif($roll_no_generate_by=='Mannual'){ ?>
<tr>
<td><?php echo $serial_no; ?></td>
<td><?php echo $student_name; ?></td>
<td><?php echo $student_father_name; ?></td>
<td><input type="hidden" placeholder="" name="student_roll_no[]" style="border:none;" value="<?php echo $student_roll_no; ?>" readonly ><input type="text" placeholder="" name="student_school_roll_no[]" style="border:none;" value="<?php echo $coaching_roll_no; ?>" readonly ></td>
<td><input type="text" placeholder="" name="coaching_roll_no[]" value="<?php echo $coaching_roll_no; ?>" ></td>

<td><?php echo $update_change; ?></td>
<td><?php echo $last_updated_date; ?></td>
</tr>
<?php } } ?>
</tbody>

</table>
<script>
//   $(function () {
//     $('#example3').DataTable()
//   })
</script>