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
	function registration_delete(student_roll_no,student_date_of_admission,student_registration_fee){

     $("#get_content").html(loader_div);
$.ajax({
type: "POST",
url: access_link+"student/student_registration_delete.php?id="+student_roll_no+"&date="+student_date_of_admission+"&amount="+student_registration_fee+"",
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
        <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['Student Registration List']; ?></li>
      </ol>
    </section>
	
	<!---*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************    <section class="content">
      <!-- Small boxes (Stat box) -->
	   <section class="content">
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
            <h3 class="box-title"><?php echo $language['Registration List']; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			    <div class="col-md-3">	
					<div class="form-group">
					    <label>Course Name</label>
					 	<select name="course_code" class="form-control" onchange="for_list(this.value);" required>
							<option value="All">All</option>
							<?php
							$que="select * from coaching_courses";
							$run=mysqli_query($conn37,$que);
							while($row=mysqli_fetch_assoc($run)){
							$s_no = $row['s_no'];
							$coaching_info_courses_name = $row['coaching_info_courses_name'];
							$coaching_info_courses_code = $row['coaching_info_courses_code'];
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
				  <th><?php echo $language['Student Name']; ?></th>
				  <th><?php echo $language['Father Name']; ?></th>
				  <th>Course</th>
				  <th><?php echo $language['Registration Date']; ?></th>
				  <th>Update By</th>
                  <th>Date</th>
                  <th><?php echo $language['Make Admission']; ?></th>
                  <th><?php echo $language ['Print']; ?></th>
				  <th><?php echo $language['Delete']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php	
	$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$registration_form_pdf = $row['registration_form_pdf'];
}	

		$que="select * from student_admission_info left join coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where student_admission_info.registration_final='no' and student_admission_info.student_status='Deactive' and student_admission_info.session_value='$session1' and coaching_courses.courses_status='Active' ORDER BY student_admission_info.s_no DESC";
		$run=mysqli_query($conn37,$que);
		$serial_no=0;
		while($row=mysqli_fetch_assoc($run)){
		$s_no=$row['s_no'];
		$student_name=$row['student_name'];
		$coaching_info_courses_name=$row['coaching_info_courses_name'];
		$student_father_name=$row['student_father_name'];
		$course_code=$row['course_code'];
		$student_date_of_birth=$row['student_date_of_birth'];
		$student_roll_no=$row['student_roll_no'];
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
	<td><?php echo $coaching_info_courses_name; ?></td>
	<td><?php echo $student_date_of_admission; ?></td>
	<td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>

    <td><button type="button" onclick="post_content('student/student_admission','<?php echo 'student_roll_no='.$student_roll_no; ?>')" class="btn btn-default my_background_color">
    <?php echo $language['Make Admission']; ?></button></td>
	<td><a href='<?php echo $pdf_path; ?>registration_form/<?php echo $registration_form_pdf; ?>?id=<?php echo $student_roll_no; ?>' target="_blank"><button type="button" class="btn btn-default my_background_color"><?php echo $language['Print']; ?></button></a></td>
	<td><button type="button" onclick="return valid('<?php echo $student_roll_no; ?>','<?php echo $student_date_of_admission; ?>','<?php echo $student_registration_fee; ?>')" class="btn btn-default my_background_color">
    <?php echo $language['Delete']; ?></button></td>
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
