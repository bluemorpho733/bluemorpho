<?php include("../attachment/session.php"); ?>
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
url: access_link+"recycle_bin/student_registration_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Deleted');
				   get_content('recycle_bin/student_registration_list');
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
url: access_link+"recycle_bin/student_registration_restore.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Restore');
				   get_content('recycle_bin/student_registration_list');
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
        <li class="active">Student Registration List Recycle Bin</li>
      </ol>
    </section>


    <!-- Main content -->
      <section class="content">
      <div class="row">
       <div class="col-xs-12">         
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Registration List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                    <th>S no.</th>
                    <th>Employee Name</th>
                    <th>Photo</th>
                    <th>Contact No.</th>
                    <th>Father Name</th>
                    <th>Update By</th>
                    <th>Date</th>
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                
<?php
$que="select * from student_admission_info where student_status='Deleted' and registration_final='no' and session_value='$session1'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;

while($row=mysqli_fetch_array($run)){

		$s_no=$row['s_no'];
		$student_roll_no=$row['student_roll_no'];
		$student_name=$row['student_name'];
		$student_mobile=$row['student_contact_number'];
		$student_father_name=$row['student_father_name'];
		$student_id=$row['student_id_generate'];
		
		$update_change=$row['update_change'];
        if($row['last_updated_date']!='0000-00-00'){
        $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
        }else{
        $last_updated_date=$row['last_updated_date'];
        }
	
	$serial_no++;
	
// $database_name1=$_SESSION['database_name'];
// $database_blob1=$database_name1."_blob";	
$que1="select * from student_documents where student_roll_no='$student_roll_no'";
$run1=mysqli_query($conn37,$que1);
while($row1=mysqli_fetch_array($run1)){
$student_image=$row1['student_image'];
}
?>
<tr>
		<td><?php echo $serial_no; ?></td>
		<td><?php echo $student_name; ?></td>
		<td><img src="<?php if($student_image!=''){ echo 'data:image;base64,'.$student_image; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50"></td>
		<td><?php echo $student_mobile; ?></td>
		<td><?php echo $student_father_name; ?></td>
		<td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>
		<td><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $s_no; ?>');" ><?php echo $language['Restore']; ?></button></td>
	  <td><button type="button" class="btn btn-default my_background_color" onclick="return valid1('<?php echo $s_no; ?>');"><?php echo $language['Delete']; ?></button></td>
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