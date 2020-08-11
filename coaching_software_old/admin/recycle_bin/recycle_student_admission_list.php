<?php include("../attachment/session.php"); 
include('function.php');
?>

<script>
function valid1(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete_data(s_no);       
 }            
else  {      
return false;
 }       
  } 
  function delete_data(s_no){
$.ajax({
type: "POST",
url: access_link+"recycle_bin/student_admission_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Deleted');
				   get_content('recycle_bin/recycle_student_admission_list');
			   }else{
               alert(detail);
			   }
}
});
}
function valid(s_no){   
var myval=confirm("Are you sure want to restore this record !!!!");
if(myval==true){
restore_data(s_no);       
 }            
else  {      
return false;
 }       
  } 
function restore_data(s_no){
$.ajax({
type: "POST",
url: access_link+"recycle_bin/recycle_student_admission_restore.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Restore');
				   get_content('recycle_bin/recycle_student_admission_list');
			   }else{
               alert(detail); 
			   }
}
});
}
</script>

  <section class="content-header">
    <h1>
      Recycle Bin
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
     <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:get_content('recycle_bin/recycle_bin')"><i class="fal fa-trash-alt"></i> Recycle Bin</a></li>
      <li class="active">Student Admission List Recycle Bin</li>
    </ol>
  </section>
	<!---*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admission List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                  <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Student Class</th>
                    <th>Student Roll No</th>
                    <th>Update By</th>
                    <th>Date</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                
			<?php				
          $que="select * from student_admission_info where registration_final='yes' and student_status='Deleted' and session_value='$session1'  ORDER BY s_no DESC";
          $run=mysqli_query($conn37,$que);
          $serial_no=0;
          while($row=mysqli_fetch_array($run)){

				$s_no=$row['s_no'];
				$student_name=$row['student_name'];
				$student_father_name=$row['student_father_name'];
        $course_code=$row['course_code'];
        $course_name=get_course_name($course_code);
				// $student_class_section=$row['student_class_section'];
				$student_date_of_birth=$row['student_date_of_birth'];
				$student_roll_no=$row['student_roll_no'];
				$student_date_of_admission=$row['student_date_of_admission'];
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
          <td><?php echo $course_name; ?></td>
				  <td><?php echo $student_roll_no; ?></td>
          <td><?php echo $update_change; ?></td>
          <td><?php echo $last_updated_date; ?></td>

				  <td><button type="button" class="btn btn-default my_background_color" onclick="return valid('<?php echo $student_roll_no; ?>');" ><?php echo $language['Restore']; ?></button></td>
          <td><button type="button" class="btn btn-default my_background_color" onclick="return valid1('<?php echo $student_roll_no; ?>');" ><?php echo $language['Delete']; ?></button></td>
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
      <!-- /.row -->
    </section>
  <script>
    $(function(){
    $('#example1').DataTable()
    })
  </script>