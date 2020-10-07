<?php include("../attachment/session.php"); ?>
<script>
function get_course(value1){
$.ajax({
type: "POST",
url:  access_link+"student/ajax_course_subject.php?course_name="+value1+"",
cache: false,
success: function(detail1){
$("#get_subject").html(detail1);
for_list();
}
});
}


	function for_list(){
		// alert('ads');
	var course_code= document.getElementById('course_code').value;
	var get_subject=document.getElementById('get_subject').value;
	if(course_code!='' && get_subject!=''){
	$('#my_table').html(loader_div); 
	$.ajax({
	type: "POST",
	url: access_link+"student/ajax_student_list.php?id="+course_code+"&get_subject="+get_subject+"",
	cache: false,
	success: function(detail){
	// alert(detail);
	$('#my_table').html(detail);
	}
	});
	}else{
	$('#my_table').html('');
	}
	}
	
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
admission_delete(s_no);       
 }            
else  {      
return false;
 }       
  } 
	function admission_delete(s_no){
	      $("#get_content").html(loader_div);
$.ajax({
type: "POST",
url: access_link+"student/student_admission_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Deleted');
				   get_content('student/student_admission_list');
			   }else{
               alert(detail); 
			   }
}
});
}


</script>


    <section class="content-header">
      <h1>
        <?php echo "Student Management"; ?>
        <small><?php echo "Control Panel"; ?></small>
      </h1>
      <ol class="breadcrumb">
	<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo "Student"; ?></a></li>
	  <li class="active"><?php echo "Student Admission List"; ?></li>
      </ol>
    </section>
	

	<!---******************************************************************************************************-->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
            <h3 class="box-title"><?php echo "Admission List"; ?></h3>
			
            </div>
 <div class="box-body ">
 		    <div class="col-md-3">	
					<div class="form-group">
					    <label>Class</label>
					 	<select name="course_code" class="form-control" id="course_code" onchange="get_course(this.value);" required>
							<option value="All">All</option>
							<?php
							$que="select * from coaching_courses";
							$run=mysqli_query($conn37,$que);
							while($row=mysqli_fetch_assoc($run)){
							$s_no = $row['s_no'];
							$school_info_class_name = $row['school_info_class_name'];
							$school_info_class_code = $row['school_info_class_code'];
							?>
							<option value="<?php echo $school_info_class_code;?>"><?php echo $school_info_class_name;?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="col-md-3">	
				<!-- <div class="form-group">
					<label>Subject</label>
						<select name="subject_code" class="form-control" id="get_subject" onchange='for_list();' required>
						<option value="">Select</option>
						</select>
				</div> -->
			</div>
	<div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                <div class="box-header">
                </div>
			
		<div class="box-body table-responsive" id="my_table">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="my_background_color">
								<tr>
								  <th>#</th>
								  <th>Student Name</th>
								  <th>Father Name</th>
								  <th>Class</th>
								  <th>Father Contact No.</th>
								  <th>Student Roll No</th>
								  <th>Admission No</th>
								  <th>Update By</th>
								  <th>Date</th>
								  <th><?php echo "Edit"; ?></th>
								  <th><?php echo "Delete"; ?></th>
								  <th><?php echo "Print"; ?></th>
								</tr>
						</thead>
					<tbody>
					
						<?php
$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$admission_form_pdf = $row['admission_form_pdf'];
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
$coaching_info_courses_name=$row1['school_info_class_name'];
$coaching_info_courses_code=$row1['school_info_class_code'];
$all_courses_name[$coaching_info_courses_code]=$coaching_info_courses_name;
}
  
  
	 $que="select * from student_admission_details where registration_final='yes' and student_status='Active' and session_value='$session1' ORDER BY s_no DESC";
	$run=mysqli_query($conn37,$que);
	$serial_no=0;
	while($row=mysqli_fetch_assoc($run)){
		$s_no=$row['s_no'];
		$student_name=$row['student_name'];
		$student_father_name=$row['student_father_name'];
		// $course_code1=$row['course_code'];
		$student_date_of_birth=$row['student_date_of_birth'];
		// $student_roll_no=$row['student_roll_no'];
		// $coaching_roll_no=$row['coaching_roll_no'];
		$student_date_of_admission=$row['student_date_of_admission'];
		$student_father_contact_number=$row['student_father_contact_number'];
		// $student_admission_number=$row['student_admission_number'];
		$my_subject_name11=$row['my_subject_name'];
		$my_subject_name22='';
		$comma='';
		
		// $update_change=$row['update_change'];
		// if($row['last_updated_date']!='0000-00-00'){
		// $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
		// }else{
		// $last_updated_date=$row['last_updated_date'];
		// }

	$serial_no++;

$strcount1=substr_count($my_subject_name11,',');
if($strcount1>0){
$subject_count=$strcount1;
$my_subject_name1=explode(',',$my_subject_name11);
}else{
$subject_count=0;
$my_subject_name1[]=$my_subject_name11;
}
// for($a=0;$a<=$subject_count;$a++){
// $my_subject_name22=$my_subject_name22.$comma.$all_subject[$my_subject_name1[$a]];
// $comma=',';
// }	
	
?>

				<tr>
				<td><?php echo $serial_no; ?></td>
				<td><?php echo $student_name; ?></td>
				<td><?php echo $student_father_name; ?></td>
				<td><?php  ?></td>
				<!-- echo $all_courses_name[$course_code1]." (".$my_subject_name22.")"; -->
				<td><?php echo $student_father_contact_number; ?></td>
				<td><?php  ?></td>
				<!-- echo $student_roll_no; -->
				<td><?php  ?></td>
				<!-- echo $student_admission_number; -->

				<td><?php  ?></td>
				<!-- echo $update_change; -->
				<td><?php  ?></td>
				<!-- echo $last_updated_date; -->

				<td><button type="button" onclick="post_content('student/student_admission','<?php echo 'student_roll_no='.$student_roll_no; ?>')" class="btn btn-default my_background_color" >
				<?php echo 'Edit'; ?></button></td>
				<td><button type="button" onclick="return valid('<?php echo $s_no; ?>');" class="btn btn-default my_background_color" >
				<?php echo 'Delete'; ?></button></td>
				<td><a href='<?php echo $pdf_path; ?>admission_form/<?php echo $admission_form_pdf; ?>?id=<?php echo $student_roll_no; ?>' target="_blank"><button type="button" class="btn btn-default my_background_color" >
				<?php echo 'Print'; ?></button></a></td>
				</tr>
				<?php } ?>
					</tbody>
				 </table>
			</div>
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

