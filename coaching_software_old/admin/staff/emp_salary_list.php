<?php include("../attachment/session.php")?>
<script>
function open_file1(image_type,emp_id){
	$.ajax({
	address: "POST",
	url: access_link+"satff/ajax_open_image.php?image_type="+image_type+"&emp_id="+emp_id+"",
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
      <li><a href="javascript:get_content('staff/employee_list')"><i class="fa fa-male"></i><?php echo $language['Employee List']; ?></a></li>
      <li class="active"><?php echo $language['Employee Salary List']; ?></li>
    </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Emplopee Salary List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th><?php echo $language['S No']; ?></th>
                  <th><?php echo $language['Employee Name']; ?></th>
                  <th><?php echo $language['Photo']; ?></th>
				          <th><?php echo $language['Contact No']; ?></th>
                  <th><?php echo $language['Designation']; ?></th>
                  <th><?php echo $language['Salary']; ?></th>
				          <th><?php echo $language['Details']; ?></th>
                </tr>
                </thead>
    <tbody>      
      <?php
			$que="select * from employee_info where emp_status='Active' GROUP BY emp_id";
			$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;
			while($row=mysqli_fetch_assoc($run)){
					$emp_name=$row['emp_name'];
					$emp_mobile=$row['emp_mobile'];
					$emp_designation=$row['emp_designation'];
					$emp_id=$row['emp_id'];
				    $serial_no++;
          $que2="select * from employee_document where emp_id='$emp_id'";
              $run2=mysqli_query($conn37,$que2);
              $emp_photo='';
              while($row2=mysqli_fetch_assoc($run2)){
          	 $emp_photo=$row2['emp_photo'];
}
				
			    ?>
				<tr>
				<td><?php echo $serial_no; ?></td>
				<td><?php echo $emp_name; ?></td>
				<td> <img onclick="open_file1('emp_photo','<?php echo $emp_id; ?>');" src="<?php if($emp_photo!=''){ echo 'data:image;base64,'.$emp_photo; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50" style="margin-top:10px;"></td>
				<td><?php echo $emp_mobile; ?></td>
				<td><?php echo $emp_designation; ?></td>
				<td><button type="button" onclick="post_content('staff/emp_salary_generate','<?php echo 'emp_id='.$emp_id; ?>')" class="btn btn-default my_background_color"  ><?php echo $language['Salary Generate']; ?></button></td>
				<td><button type="button"onclick="post_content('staff/emp_salary_list_particular','<?php echo 'emp_id='.$emp_id; ?>')" class="btn btn-default my_background_color"  ><?php echo $language['Details']; ?></button></td>
				</tr>
				<?php }    ?>
	</tbody>
    </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
   <div id="mypdf_view">
			<div>
    </section>
    <script>
$(function () {
$('#example1').DataTable()
})

</script>
   