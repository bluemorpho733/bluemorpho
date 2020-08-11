<?php

include("session_index.php");

//$coaching_info_logo5=$_SESSION["coaching_info_logo5"];
$coaching_info_logo5='';

// $coaching_info_logo5 THIS IS THE IMAGE VARIABLE OF THE 

?>
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo 'data:image;base64,'.$coaching_info_logo5; ?>" height="25" width="25" class="img-circle">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li ><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		
			<li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-user"></i> <span>Coaching Info</span></a></li>
			
			<li ><a href="javascript:get_content('student/students')"><i class="fa fa-user"></i> <span>Student</span></a></li>
			
			<li ><a href="javascript:get_content('staff/staff')"><i class="fa fa-users"></i> <span>Staff</span></a></li>
			
			<li ><a href="javascript:get_content('enquiry/enquiry')"><i class="fa fa-phone"></i> <span>Enquiry</span></a></li>
			
			<li ><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-address-card-o"></i> <span>Attendance</span></a></li>
			
			<li><a href="javascript:get_content('fees/fees')"><i class="fa fa-rupee"></i> <span>Fees</span></a></li>
			
			<li><a href="javascript:get_content('dues/dues')"><i class="fa fa-rupee"></i> <span>Dues</span></a></li>
			
			<li><a href="javascript:get_content('sms/sms_panel')"><i class="fa fa-envelope"></i> <span>Sms Services</span></a></li>

            <li><a href="javascript:get_content('certificate/certificate')"><i class="fa fa-certificate"></i> <span>Certificate</span></a></li>
      
	        <li><a href="javascript:get_content('examination/examination')"><i class="fa fa-edit"></i> <span>Examination</span></a></li>
	    
		    <li><a href="javascript:get_content('time_table/time_table')"><i class="fa fa-table"></i> <span>Time Table</span></a></li>
      
	       <li><a href="javascript:get_content('library/library')"><i class="fa fa-book"></i> <span>Library</span></a></li>

           <li><a href="javascript:get_content('complaint/complaint')"><i class="fa fa-minus-square"></i> <span>Complaints</span></a></li>
      
	       <li><a href="javascript:get_content('gallery/gallery')"><i class="fa fa-picture-o"></i> <span>Gallery</span></a></li>
		   
		   <li><a href="javascript:get_content('downloads/downloads')"><i class="fa fa-download"></i> <span>Downloads</span></a></li>
	
	       <li><a href="javascript:get_content('stock/stock')"><i class="fa fa-area-chart"></i> <span>Stock</span></a></li>

           <li><a href="javascript:get_content('reminder/reminder')"><i class="fa fa-bell-o"></i> <span>Reminder</span></a></li>

           <li><a href="javascript:get_content('recycle_bin/recycle_bin')"><i class="fa fa-bell-o"></i> <span>Recycle Bin</span></a></li>
	
           <li><a href="javascript:get_content('coaching_info/change_password')"><i class="fa fa-unlock-alt"></i> <span>Change Password</span></a></li>
		
		   <li><a href="javascript:get_content('attachment/logout')"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>