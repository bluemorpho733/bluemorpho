<?php include("../attachment/session.php"); ?>
<script>
function emp_attendance(value){
  if(value!=''){
      $("#search_list").html(loader_div);
  $.ajax({
  type: "POST",
  url: access_link+"attendance/ajax_emp_attendance_search.php?type="+value+"",
  cache: false,
  success: function(detail){
  $("#search_list").html(detail);
    }
  });
  }else{
  $("#search_list").html('');
  }
}
function fill_attendance(){
  var staff_attendance_date=document.getElementById('staff_attendance_date').value;
  var staff_type=document.getElementById('staff_type').value;
  if(staff_attendance_date!='' && staff_type!=''){
  var data12="staff_type="+staff_type+"&date="+staff_attendance_date;
  post_content('attendance/emp_attendance_update',data12);
  }else{
  alert("Please Select Date and Staff Type");
  }
}
function view_attendance(){
  var staff_attendance_date=document.getElementById('staff_attendance_date').value;
  var staff_type=document.getElementById('staff_type').value;
  if(staff_attendance_date!='' && staff_type!=''){
  var data12="staff_type="+staff_type+"&date="+staff_attendance_date;
  post_content('attendance/emp_attendance_list',data12);
  }else{
  alert("Please Select Date and Staff Type");
  }
}
</script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
    	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
    	  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
    	 <li class="active">Staff Attendance Select</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-sm-3">
		  <form  method="post" enctype="multipart/form-data">
		  <!-- /.box -->
         <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <h3 class="box-title">Fill Attendance</h3>
            </div>
            <!-- /.box-header -->
<div class="box-body table-responsive">
    <div class="form-group">
      <label>Staff Type :</label>
      <select name="staff_type" id="staff_type" class="form-control" onchange="emp_attendance(this.value);" required>
      <option value="">Select </option>
      <option value="Teaching">Teaching </option>
      <option value="Non Teaching">Non Teaching </option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Date :</label>
      <?php $today_date= date('Y-m-d');
      $date_diff=  date('Y-m-d', strtotime($today_date. '-1000day'));
      ?>
      <input  type="date" class="form-control" id='staff_attendance_date' name="staff_attendance_date" max="<?php echo date('Y-m-d'); ?>" min="<?php echo $date_diff; ?>" value="<?php echo date('Y-m-d'); ?>" >
    </div>
    <div class="form-group">
      <center><button type="button" onclick="fill_attendance();" class="btn btn-default my_background_color">Fill Attendance</button>
      <button type="button" name="view" onclick="view_attendance();" class="btn btn-default my_background_color">View Attendance</button></center>
    </div>  
</div>
          </div>
		  </form>
		</div>
		<div class="col-sm-9">
       <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <h3 class="box-title">Current Month Attendance List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="height:800px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th>S No</th>
                  <th>Staff Name</th>
                  <th>Type</th>
				          <th>Designation</th>
                  <th>Month</th>
                  <th>Present</th>
                  <th>Absent</th>
                  <th>Leave</th>
                  <th>Update By</th>
                  <th>Date</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody id="search_list">
                </tbody>
             </table>
            </div>
          </div>
		</div>
      </div>
    </section>
<script>
$(function () {
$('#example1').DataTable()
})
</script>    
