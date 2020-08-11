<?php include("../attachment/session.php")?>
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
url: access_link+"recycle_bin/recycle_employee_list_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Deleted');
				   get_content('recycle_bin/recycle_employee_list');
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
url: access_link+"recycle_bin/recycle_employee_list_restore.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Restore');
				   get_content('recycle_bin/recycle_employee_list');
			   }else{
               alert(detail); 
			   }
}
});
}
			


</script>
			


</script>

    <section class="content-header">
      <h1>
        Recycle Bin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
  	   <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:get_content('recycle_bin/recycle_bin')"><i class="fal fa-trash-alt"></i> Recycle Bin</a></li>
        <li class="active">Employee List Recycle Bin</li>
      </ol>
    </section>


    <!-- Main content -->
      <section class="content">
      <div class="row">
       <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
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
                  <th>Designation</th>
                  <th>Update By</th>
                  <th>Date</th>
                  <th>Restore</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
<?php
$que="select * from employee_info where emp_status='Deleted'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;

while($row=mysqli_fetch_array($run)){
		$s_no=$row['s_no'];
		$emp_name=$row['emp_name'];
		$emp_photo=$row['emp_photo'];
		$emp_mobile=$row['emp_mobile'];
		$emp_designation=$row['emp_designation'];
		$emp_id=$row['emp_id'];
		
        $update_change=$row['update_change'];
        if($row['last_updated_date']!='0000-00-00'){
        $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
        }else{
        $last_updated_date=$row['last_updated_date'];
        }
	
$serial_no++;

$que1="select * from employee_document where emp_id='$emp_id'";
$run1=mysqli_query($conn37,$que1);
while($row1=mysqli_fetch_array($run1)){
$emp_photo=$row1['emp_photo'];
}
?>
<tr>
  <td><?php echo $serial_no; ?></td>
	<td><?php echo $emp_name; ?></td>
	<td><img src="<?php if($emp_photo!=''){ echo 'data:image;base64,'.$emp_photo; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50"></td>
    <td><?php echo $emp_mobile; ?></td>
    <td><?php echo $emp_designation; ?></td>
    <td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>
    <td><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $emp_id; ?>');" ><?php echo $language['Restore']; ?></button></td>
    <td><button type="button"  class="btn btn-default my_background_color" onclick="return valid1('<?php echo $emp_id; ?>');" ><?php echo $language['Delete']; ?></button></td>
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