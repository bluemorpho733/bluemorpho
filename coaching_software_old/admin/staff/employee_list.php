<?php include("../attachment/session.php"); 
?>

<script>
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete_employee(s_no);       
 }            
else{      
return false;
 }       
  }

function delete_employee(s_no){
$.ajax({
type: "POST",
url: access_link+"staff/employee_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
		   if(res[1]=='success'){
			   alert('Successfully Deleted');
			   get_content('staff/employee_list');
		   }else{
             alert(detail); 
		   }
}
});
}

function for_drop(s_no){
  var myval=confirm("Are you sure you want to Drop this Employee !!!!");
  if(myval==true){
  for_drop11(s_no);
  }else{
  return false;
  }
}

function for_drop11(s_no){
$.ajax({
type: "POST",
url: access_link+"staff/employee_drop.php?id="+s_no+"",
cache: false,
success: function(detail){
  var res=detail.split("|?|");
  if(res[1]=='success'){
  alert('Successfully Completed');
  get_content('staff/employee_list');
  }else{
   alert(detail); 
  }
}
});
}

function open_file1(image_type,emp_id){
	$.ajax({
	address: "POST",
	url: access_link+"staff/ajax_open_image.php?image_type="+image_type+"&emp_id="+emp_id+"",
	cache: false,
	success: function(detail){
	 $("#mypdf_view").html(detail);
	}
	});
	}
</script>
  <section class="content-header">
      <h1><?php echo $language['Employee Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small></h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('staff/staff')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Employee']; ?></a></li>
	  <li class="active"><?php echo $language['Employee List']; ?></li>
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
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
				          <tr>
                    <th>#</th>
                    <th><?php echo $language['Employee Name']; ?></th>
                    <th><?php echo $language['Photo']; ?></th>
  				          <th><?php echo $language['Contact No']; ?></th>
                    <th><?php echo $language['Designation']; ?></th>
                    <th>Update By</th>
                    <th>Date</th>
                    <th>Drop</th>
                    <th><?php echo $language['Edit']; ?></th>
                    <th><?php echo $language['Delete']; ?></th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$que="select * from employee_info where emp_status='Active' and session_value='$session1' ORDER BY s_no DESC";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				$serial_no=0;
				while($row=mysqli_fetch_assoc($run)){
				$s_no=$row['s_no'];
				$emp_name=$row['emp_name'];
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
			$emp_photo ='';
			
	$que1="select * from employee_document where emp_id='$emp_id'";
    $run1=mysqli_query($conn37,$que1);
    while($row1=mysqli_fetch_assoc($run1)){
$emp_photo = $row1['emp_photo'];

	}
			
				?>

                <tr>
                <td ><?php echo $serial_no; ?></td>
				<td><?php echo $emp_name; ?></td>
						<td> <img onclick="open_file1('emp_photo','<?php echo $emp_id; ?>');" src="<?php if($emp_photo!=''){ echo 'data:image;base64,'.$emp_photo; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50" style="margin-top:10px;"></td>
				<td><?php echo $emp_mobile; ?></td>
				<td><?php echo $emp_designation; ?></td>
				
                <td><?php echo $update_change; ?></td>
                <td><?php echo $last_updated_date; ?></td>
				<td><button type="button"  class="btn btn-warning" onclick="return for_drop('<?php echo $s_no; ?>');" >Drop - Emp</button></td>
				<td><button type="button"  onclick="post_content('staff/employee_edit','<?php echo 's_no='.$s_no; ?>')" class="btn btn-default my_background_color" ><?php echo $language['Edit']; ?></button></td>
				<td><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $s_no; ?>');" ><?php echo $language['Delete']; ?></button></td>
				</tr>
				<?php } ?>
                </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<div id="mypdf_view">
			<div>
      </div>
      <!-- /.row -->
    </section>
     <script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>
  