<?php include("../attachment/session.php")?>
<script>
   function for_list(value){ 
        window.scrollTo(0, 0);
     $("#my_table").html(loader_div);
       $.ajax({
			  type: "POST",
              url: access_link+"student/ajax_registration_list.php?id="+value+"",
              cache: false,
              success: function(detail){
			// alert(detail);
            $('#my_table').html(detail);
              }
           });
	}
	
function valid(student_roll_no,student_date_of_admission,student_registration_fee){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
registration_delete(student_roll_no,student_date_of_admission,student_registration_fee);      
}else{      
return false;
}       
} 
	function registration_delete(s_no){

     $("#get_content").html(loader_div);
$.ajax({
type: "POST",
url: access_link+"student/student_registration_delete.php?id="+s_no,
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				  // alert('Successfully Deleted');
				   get_content('student/student_registration_list');
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
        <small><?php echo 'Control Panel'; ?></small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo 'Student'; ?></a></li>
	  <li class="active"><?php echo 'Student Registration List'; ?></li>
      </ol>
    </section>
	
	<!---*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************    <section class="content">
      <!-- Small boxes (Stat box) -->
	   <section class="content">
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
            <h3 class="box-title"><?php echo 'Registration List'; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			    <div class="col-md-3">	
					<div class="form-group">
					    <label>Class</label>
					 	<select name="course_code" class="form-control" onchange="for_list(this.value);" required>
							<option value="All">All</option>


							<?php
							$que="select * from school_info_class_info";
							$run=mysqli_query($conn37,$que);
							while($row=mysqli_fetch_assoc($run)){
							$s_no = $row['s_no'];
							$coaching_info_courses_name = $row['school_info_class_name'];
							$coaching_info_courses_code = $row['school_info_class_code'];
							?>



                      




							
							<option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
							<?php } ?>
						</select>
					</div>
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
				  <th><?php echo 'Student Name'; ?></th>
				  <th><?php echo 'Father Name'; ?></th>
				  <th>Class</th>
				  <th><?php echo 'Registration Date'; ?></th>
				  <th>Update By</th>
                  <th>Date</th>
                  <th><?php echo 'Make Admission'; ?></th>
                  <th><?php echo 'Print'; ?></th>
				  <th><?php echo 'Delete'; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php	
$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$registration_form_pdf = $row['registration_form_pdf'];
}	

   $que="select registration_details.*,school_info_class_info.school_info_class_name from registration_details left join school_info_class_info on registration_details.class_code=school_info_class_info.school_info_class_code where student_status='' and registration_final='' and session_value='$session1' ORDER BY registration_details.s_no DESC";
	//  $que="select * from student_admission_info left join coaching_courses on student_admission_info.course_code=coaching_courses.school_info_class_code where student_admission_info.registration_final='no' and student_admission_info.student_status='Deactive' and student_admission_info.session_value='$session1' and coaching_courses.courses_status='Active' ORDER BY student_admission_info.s_no DESC";
		$run=mysqli_query($conn37,$que);
		$serial_no=0;
		while($row=mysqli_fetch_assoc($run)){
		$s_no=$row['s_no'];
		$student_name=$row['student_name'];
		$school_info_class_name=$row['school_info_class_name'];
		$student_father_name=$row['student_father_name'];
		$course_code=$row['class_code'];
		$student_date_of_birth=$row['student_date_of_birth'];
		$student_registration_number=$row['student_registration_number'];
		$student_date_of_admission=$row['student_date_of_admission'];
		$student_registration_fee=$row['student_registration_fee'];
		     	
		$update_change=$row['update_change'];
		if($row['last_updated_date']!='0000-00-00'){
		$last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
		}else{
		$last_updated_date=$row['last_updated_date'];
		}
	$serial_no++;
                ?>

    <tr>
	<td><?php echo $serial_no; ?></td>
	<td><?php echo $student_name; ?></td>
	<td><?php echo $student_father_name; ?></td>
	<td><?php echo $school_info_class_name; ?></td>
	<td><?php echo $student_date_of_admission; ?></td>
	<td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>

    <td><button type="button" onclick="post_content('student/student_admission','<?php echo 's_no='.$s_no; ?>')" class="btn btn-default my_background_color">
    <?php echo 'Make Admission'; ?></button></td>
	<td><a href='<?php echo $pdf_path; ?>registration_form/<?php echo $registration_form_pdf; ?>?id=<?php echo $student_roll_no; ?>' target="_blank"><button type="button" class="btn btn-default my_background_color"><?php echo 'Print'; ?></button></a></td>
	<td><button type="button" onclick="return valid('<?php echo $s_no; ?>')" class="btn btn-default my_background_color">
    <?php echo 'Delete'; ?></button></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>

<script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>
