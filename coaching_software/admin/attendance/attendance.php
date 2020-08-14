<?php include("../attachment/session.php"); ?>

    <section class="content-header">
      <h1>
      Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>  Home</a></li>
	  <li class="active"> Attendance</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

	    <a href="javascript:get_content('attendance/student_attendance_select')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:18px;margin-left:5px;color:#fff;">Student Attendance</h3>
				<p style="margin-left:10px;color:#fff;">Enter</p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_attendance.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('attendance/student_attendance_select')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

		<a href="javascript:get_content('attendance/emp_attendance_select')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:18px;margin-left:5px;color:#fff;">Staff Attendance</h3>
				<p style="margin-left:10px;color:#fff;">Enter</p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/staff_attendance.png" style="width:70px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('attendance/emp_attendance_select')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

	<a href="javascript:get_content('attendance/student_rfid_attendance')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:18px;margin-left:5px;color:#fff;">Student Rfid</h3>
				<p style="margin-left:10px;color:#fff;">Enter</p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_rfid.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('attendance/student_rfid_attendance')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

	<a href="javascript:get_content('attendance/emp_rfid_attendance')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:18px;margin-left:5px;color:#fff;">Staff Rfid</h3>
				<p style="margin-left:10px;color:#fff;">Enter</p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/staff_rfid.png" style="width:70px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('attendance/emp_rfid_attendance')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

<!-- 	<a href="javascript:get_content('attendance/attendance_graphical_report')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background-color:#3B7A57;">
            <div class="inner"><br>
               <h3 style="font-size:18px;margin-left:5px;color:#fff;">Attendance Graphs</h3>
				<p style="margin-left:10px;color:#fff;">Enter</p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php //echo $coaching_software_path; ?>images/attendance_graph.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('attendance/attendance_graphical_report')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a> -->
		</div>
      </div>
    </section>