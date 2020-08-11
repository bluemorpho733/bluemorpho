<?php include("../attachment/session.php"); ?>
    <section class="content-header">
      <h1>
        <?php echo $language['Leave Management']; ?>
      </h1>
      <ol class="breadcrumb">
       <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
  	   <li><a href="javascript:get_content('holiday/holiday')"><i class="fa fa-umbrella"></i> <?php echo $language['Leave Management']; ?></a></li>
        <li class="active"><i class="fa fa-list"></i> <?php echo $language['Leave List']; ?></li>
      </ol>
    </section>

<script>
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
for_delete(s_no);       
 }            
else  {      
return false;
 }       
  } 
function for_delete(s_no){
$.ajax({
type: "POST",
url: access_link+"holiday/delete_leave.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
     if(res[1]=='success'){
  	   alert('Successfully Deleted');
  	   get_content('holiday/leave_list');
     }else{
           alert(detail); 
     }
}
});
}

</script>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $language['Leave List']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th><?php echo $language['S No']; ?></th>
                  <th><?php echo $language['Student Name']; ?></th>
                  <th>Father Name</th>
                  <th><?php echo $language['Roll No']; ?></th>
                  <th>Contact Number</th>
                  <th><?php echo $language['From Date']; ?></th>
                  <th><?php echo $language['To Date']; ?></th>
			             <th><?php echo $language['Total leave days']; ?></th>
                  <th><?php echo $language['Approved By']; ?></th>         
                  <th><?php echo $language['Application']; ?></th>
                  <th><?php echo $language['Action']; ?></th>
                </tr>
                </thead>
                <tbody>  
              <?php
              $que="select * from student_leave_management where session_value='$session1' ORDER BY s_no Asc";
              $run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
              $serial_no=0;
              while($row=mysqli_fetch_assoc($run)){
                $s_no=$row['s_no'];
                $student_name=$row['student_name'];
                $student_roll_no=$row['student_roll_no'];
                $student_father_name=$row['student_father_name'];
                $student_contact_number = $row['student_contact_number'];
                $leave_from_date = $row['leave_from_date'];
                $leave_to_date = $row['leave_to_date'];
                $leave_approved_by = $row['leave_approved_by'];
                $leave_total_day = $row['leave_total_day'];
              	$que1="select * from leave_document where s_no='$s_no'";
                $run1=mysqli_query($conn37,$que1);
                while($row1=mysqli_fetch_assoc($run1)){
              	$leave_application=$row1['leave_application'];
              	}
              	$serial_no++;
              ?>
		  <tr>
          <th><?php echo $s_no; ?></th>
          <th><?php echo $student_name; ?></th>
          <th><?php echo $student_father_name; ?></th>
          <th><?php echo $student_roll_no; ?></th>
          <th><?php echo $student_contact_number; ?></th>
          <th><?php echo date('d-m-Y',strtotime($leave_from_date)); ?></th>
          <th><?php echo date('d-m-Y',strtotime($leave_to_date)); ?></th>
          <th><?php echo $leave_total_day; ?></th>
          <th><?php echo $leave_approved_by; ?></th>
          <th><img src="<?php if($leave_application!=''){ echo 'data:image;base64,'.$leave_application; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50"></th>
				   <th><button type="button"  class="btn btn-default"  onclick="post_content('holiday/edit_leave','<?php echo 'id='.$s_no; ?>');" ><?php echo $language['Edit']; ?></button>
              <button type="button" onclick="return valid('<?php echo $s_no; ?>');" class="btn btn-default" id="delete" ><?php echo $language['Delete']; ?></button></th>
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
    <!-- /.content -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>