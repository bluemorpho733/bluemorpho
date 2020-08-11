<?php include("../attachment/session.php"); ?>     
<table id="example3" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th><?php echo $language['S No']; ?></th>
<th>Admission No.</th>
<th><?php echo $language['Student Roll No']; ?></th>
<th><?php echo $language['Student Name']; ?></th>
<th><?php echo $language['Class']; ?></th>
<th><?php echo $language['Select Student']; ?>
<input type="checkbox" id="student_all_checked" checked >
</th>
<th>Update By</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$get_subject=$_GET['get_subject'];
$course_code=$_GET['id'];
$student_identity_category=$_GET['student_identity_category'];
if($course_code=="All"){
$condition="";
}elseif($get_subject=="All"){
$condition="course_code='$course_code' &&";
}else{
$condition="course_code='$course_code' and my_subject_name like '%$get_subject%' &&";
}
if($student_identity_category=="all"){
$condition1="";
}else{
$condition1=" and student_identity_category='$student_identity_category'";
}

$query1="select * from student_admission_info where $condition student_status='Active' and session_value='$session1'$condition1 ORDER BY student_name";
$serial_no=0;
$res1=mysqli_query($conn37,$query1);
while($row1=mysqli_fetch_assoc($res1)){
$s_no=$row1['s_no'];
$student_name=$row1['student_name'];
$student_roll_no=$row1['student_roll_no'];
$course_code=$row1['course_code'];
$coaching_roll_no=$row1['coaching_roll_no'];
$student_admission_number=$row1['student_admission_number'];

$update_change=$row1['update_change'];
if($row1['last_updated_date']!='0000-00-00'){
$last_updated_date=date('d-m-Y',strtotime($row1['last_updated_date']));
}else{
$last_updated_date=$row1['last_updated_date'];
}

$serial_no++;
?>

<tr>
<td><?php echo $serial_no; ?></td>
<td><?php echo $student_admission_number; ?></td>
<td><?php echo $coaching_roll_no; ?></td>
<td><?php echo $student_name; ?></td>
<td><?php echo $course_code; ?></td>
<td><input type="checkbox"  name="school_id_card_info[]" value="<?php echo $student_roll_no; ?>" checked class="checkbox1" ></td>
<td><?php echo $update_change; ?></td>
<td><?php echo $last_updated_date; ?></td>
</tr>
<?php  } ?>
</tbody>
</table>
<script>
  $(function () {
    $('#example3').DataTable()
  })
</script>
<script>
//select all checkboxes
$("#student_all_checked").change(function(){  //"select all" change 
    $(".checkbox1").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change 
$('.checkbox1').change(function(){ 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox1:checked').length == $('.checkbox1').length ){
        $("#student_all_checked").prop('checked', true);
    }
});

</script>