<?php include("../attachment/session.php"); ?>
<script type="text/javascript">
function get_subject(Courses_id){
	$.ajax({
	type: "POST",
	url:access_link+"attendance/ajax_get_subject.php?Courses_id="+Courses_id+"",
	cache: false,
	success: function(detail){
	$("#student_subject").html(detail);
	attendance_list();
	}
	});
}

function attendance_list(){
	var student_courses=document.getElementById('student_courses').value;
	var student_subject=document.getElementById('student_subject').value;
	var t=1;
	if(student_courses!='' && student_subject!='' && t==1){
	$("#search_list").html(loader_div);
	$.ajax({
	type: "POST",
	url: access_link+"attendance/ajax_attendance_search.php?student_courses="+student_courses+"&student_subject="+student_subject+"",
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
	var student_courses=document.getElementById('student_courses').value;
	var student_subject=document.getElementById('student_subject').value;
	var attendance_student_date=document.getElementById('attendance_student_date').value;
	var t=1;
	if(student_courses!='' && student_subject!='' && t==1){
		var data12="student_courses="+student_courses+"&attendance_student_date="+attendance_student_date+"&student_subject="+student_subject+"";
		post_content('attendance/student_attendance_update',data12);
	}else{
	$("#get_content").html('');
	}
}
function view_attendance(){
	var student_courses=document.getElementById('student_courses').value;
	var student_subject=document.getElementById('student_subject').value;
	var attendance_student_date=document.getElementById('attendance_student_date').value;
	var t=1;
	if(student_courses!='' && student_subject!='' && t==1){
		var data12="student_courses="+student_courses+"&attendance_student_date="+attendance_student_date+"&student_subject="+student_subject;
		post_content('attendance/student_attendance_list',data12);

	}else{
	$("#get_content").html('');
	}
}



</script>
  <section class="content-header">
      <h1>
        Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
		 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
		 <li class="active">Student Attendance Select</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-sm-3">
		  <!-- /.box -->
         <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <h3 class="box-title">Fill Attendance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			  <div class="form-group">
				<label>Courses:</label>
				<select name="student_courses" id="student_courses" class="form-control" onchange="get_subject(this.value)" required>
					<option value="">Select</option>
					<?php
					$sql=mysqli_query($conn37,"select * from coaching_courses");
					while ($result=mysqli_fetch_assoc($sql)) {
						$coaching_info_courses_name=$result['coaching_info_courses_name'];
						$coaching_info_courses_code=$result['coaching_info_courses_code'];
					?>
					<option value="<?php echo $coaching_info_courses_code; ?>"><?php echo $coaching_info_courses_name; ?></option>
					<?php
					}
					?>
				</select>
			  </div>

			  <div class="form-group">
				<label>Subject:</label>
				<select name="student_subject" id="student_subject" class="form-control" onchange="attendance_list();" required>
					<option value='All'>All</option>
				</select>
			  </div>
			  <div class="form-group">
					<label for="exampleInputEmail1">Date  :</label>
					<?php $today_date= date('Y-m-d');
					$date_diff=  date('Y-m-d', strtotime($today_date. '-1000day'));
					?>
					<input  type="date" class="form-control" name="attendance_student_date" id='attendance_student_date' max="<?php echo date('Y-m-d'); ?>" min="<?php echo $date_diff; ?>" value="<?php echo date('Y-m-d'); ?>" >
			  </div>
			  <div class="form-group">
					<center><button type="submit" name="fill" onclick="fill_attendance();" class="btn btn-default my_background_color">Fill Attendance</button>
					<button type="submit" name="view" onclick="view_attendance();" class="btn btn-default my_background_color">View Attendance </button></center>
			  </div>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		 
		
		</div>
		<div class="col-sm-9">
         
          <!-- /.box -->
   <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <h3 class="box-title">Current Month Attendance List </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="height:800px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th>S No</th>
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Courses</th>
				  <th>Subject</th>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
