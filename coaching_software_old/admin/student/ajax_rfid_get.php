<?php include("../attachment/session.php")?>  
            <table id="example3" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th><?php echo $language['S No']; ?></th>
				  <th>Admission No.</th>
                  <th><?php echo $language['Student Name']; ?></th>
                  <th><?php echo $language['Father Name']; ?></th>
                  <th><?php echo $language['Roll No']; ?></th>
				  <th>Course/Subject</th>
				  <th><?php echo $language['Rfid No']; ?></th>
				  
				  <th>Update By</th>
                  <th>Date</th>
				  
                  <th><?php echo $language['Action']; ?></th>
                </tr>
                </thead>
				
				<tbody>
<?php
 $course_code=$_GET['id'];
 $get_subject=$_GET['get_subject'];

if($get_subject!='All'){
$condition=" and my_subject_name like '%$get_subject%'";
}else{
$condition="";
}

$qry11="select * from coaching_courses_subject where courses_subject_status='Active'";
$res11=mysqli_query($conn37,$qry11);
$all_subject='';
while($row11=mysqli_fetch_assoc($res11)){
$coaching_info_courses_subject_name=$row11['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code=$row11['coaching_info_courses_subject_code'];
$all_subject[$coaching_info_courses_subject_code]=$coaching_info_courses_subject_name;
}


$query="select * from coaching_courses where courses_status='Active'";
$run1=mysqli_query($conn37,$query);
$all_courses_name='';
while($row1=mysqli_fetch_assoc($run1)){
$coaching_info_courses_name=$row1['coaching_info_courses_name'];
$coaching_info_courses_code=$row1['coaching_info_courses_code'];
$all_courses_name[$coaching_info_courses_code]=$coaching_info_courses_name;
}

$query1="select * from student_admission_info where student_status='Active' and course_code='$course_code' and session_value='$session1'$condition ORDER BY student_name ASC";
$res=mysqli_query($conn37,$query1) or die(mysqli_error($conn37));;
$serial_no=0;
while($row=mysqli_fetch_assoc($res)){
$s_no=$row['s_no'];
		$student_name=$row['student_name'];
		$student_father_name=$row['student_father_name'];
		$student_roll_no=$row['student_roll_no'];
		$coaching_roll_no=$row['coaching_roll_no'];
		$course_code1=$row['course_code'];
		$subject_code=$row['subject_code'];
		$student_rf_id_number=$row['student_rf_id_number'];
		$student_admission_number=$row['student_admission_number'];
		$my_subject_name11=$row['my_subject_name'];
		$my_subject_name22='';
		$comma='';
		
        $update_change=$row['update_change'];
        if($row['last_updated_date']!='0000-00-00'){
        $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
        }else{
        $last_updated_date=$row['last_updated_date'];
        }
		
		$serial_no++;
		


$strcount1=substr_count($my_subject_name11,',');
if($strcount1>0){
$subject_count=$strcount1;
$my_subject_name1=explode(',',$my_subject_name11);
}else{
$subject_count=0;
$my_subject_name1[]=$my_subject_name11;
}
for($a=0;$a<=$subject_count;$a++){
$my_subject_name22=$my_subject_name22.$comma.$all_subject[$my_subject_name1[$a]];
$comma=',';
}

?>

<tr>
<td><?php echo $serial_no; ?></td>
<th><?php echo $student_admission_number; ?></th>
<td><?php echo $student_name; ?></td>
<td><?php echo $student_father_name; ?></td>
<td><?php echo $coaching_roll_no; ?></td>
<td><?php echo $all_courses_name[$course_code1]." (".$my_subject_name22.")"; ?></td>
<td><?php echo $student_rf_id_number; ?></td>

<td><?php echo $update_change; ?></td>
<td><?php echo $last_updated_date; ?></td>

<td><input type="hidden" value="<?php echo $student_name; ?>" id="<?php echo "student_name_".$student_roll_no; ?>">
<button type="button"  name="finish" class="btn btn-default my_background_color" value="<?php echo $student_roll_no; ?>" onclick="open_model(this.value)" data-toggle="modal" data-target="#modal-default" id="student_roll_no">
Allot RFID No</button></td>

</tr>

<?php } ?>
 		        </tbody>
				
                </table>
				<script>
  $(function () {
    $('#example3').DataTable()
  })
</script>