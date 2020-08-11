<?php include("attachment/session_index.php");?>
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>
	<section class="col-lg-12">
          <div class="box">
		 
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<b>Important</b></h3>
				</div>
            <!-- /.box-header -->
				<div class="box-body">
                        
					<a href="javascript:get_content('coaching_info/coaching_info')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Coaching Info</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/school_info.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('coaching_info/coaching_info')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					   </a>
					   
					   <a href="javascript:get_content('student/students')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Student</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('student/students')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a>
						
			          <a href="javascript:get_content('staff/staff')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #3A3897   0%, #A3A1FF 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Staff</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/staff.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('staff/staff')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a>

	
						<!-- <a href="javascript:get_content('enquiry/enquiry')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;"><?php // echo $language['Enquiry']; ?></h3>
									<p style="margin-left:10px;color:#fff;"><?php // echo $language['Enter']; ?></p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php // echo $coaching_software_path; ?>images/enquiry.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('enquiry/enquiry')" class="small-box-footer"><?php // echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a> -->
						
						<a href="javascript:get_content('one_time_details/one_time_details')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">One Time Details</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry.png" style="width:60px;height:60px;margin-top:20px;" alt=""  title="School Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('one_time_details/one_time_details')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a>
		
				</div>
          </div>
      </section>
	<!-------------------------------------- Important Panel End --------------------------------->	
    <!-------------------------------------- Account Panel Start --------------------------------->
	<section class="col-lg-12 ">
          <div class="box">
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;<b>Management</b></h3>
				</div>
				<div class="box-body">
							
					<a href="javascript:get_content('attendance/attendance')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #4F00BC   0%, #29ABE2 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Attendance</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/attendence.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('attendance/attendance')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						 </a>

			
					<!-- <a href="javascript:get_content('fees_installmentwise/fees')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Fees</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img  src="<?php //echo $coaching_software_path; ?>images/fee.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('fees_installmentwise/fees')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a> -->
					
					<a href="javascript:get_content('fee_details/fee_details')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Fee Details</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/fee.png" style="width:60px;height:60px;margin-top:20px;" alt=""  title="School Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('fee_details/fee_details')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					
					<a href="javascript:get_content('dues/dues')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Dues</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/dues.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('dues/dues')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					
					<a href="javascript:get_content('sms/sms_panel')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #B066FE  0%, #63E2FF 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Sms Services</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/sms.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('sms/sms')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					

					
				</div>
          </div>
      </section>
	<!-------------------------------------- Account Panel End --------------------------------->	
	<!-------------------------------------- Academic Panel Start --------------------------------->
	<section class="col-lg-12 ">
         <div class="box ">
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Academic</b></h3>
				</div>
            <div class="box-body">
			
				<a href="javascript:get_content('certificate/certificate')">
					<div class="col-lg-3 col-xs-6">
					  <div class="small-box" style="background:linear-gradient(to bottom, #009E00  0%, #FFFF96 100%);">
						<div class="inner"><br>
						  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Certificate</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
						</div>
						<div class="icon">
						  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/certificate.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
						</div>
						<a href="javascript:get_content('certificate/certificate')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				</a>
				
				<a href="javascript:get_content('examination/examination')">
					<div class="col-lg-3 col-xs-6">
					  <div class="small-box" style="background:linear-gradient(to bottom, #312A6C  0%, #852D91 100%);">
						<div class="inner"><br>
						  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Examination</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
						</div>
						<div class="icon">
						  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/exam.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
						</div>
						<a href="javascript:get_content('examination/examination')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				</a>
				
				<a href="javascript:get_content('time_table/time_table')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Time Table</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/time_table.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('time_table/time_table')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					
					<a href="javascript:get_content('library/library')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Library</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/library.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('library/library')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a>
				
			
			 </div>
          </div>
        </section>
	<!-------------------------------------- Academic Panel End --------------------------------->
	 <!-------------------------------------- Services Panel Start --------------------------------->
	<section class="col-lg-12 ">
        <div class="box ">
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-folder-open-o"></i>&nbsp;&nbsp;&nbsp;<b>Services</b></h3>
				</div>
            <div class="box-body">
		
					<a href="javascript:get_content('complaint/complaint')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #93278F 0%, #00A99D 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Complaints</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/complain.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('complaint/complaint')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					
					<a href="javascript:get_content('gallery/gallery')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #ED1C24  0%, #FCEE21 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Gallery</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/gallery.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('gallery/gallery')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
					</a>
					
				<a href="javascript:get_content('downloads/downloads')">
					<div class="col-lg-3 col-xs-6">
					  <div class="small-box" style="background:linear-gradient(to bottom, #4F00BC  0%, #29ABE2 100%);">
						<div class="inner"><br>
						  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Downloads</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
						</div>
						<div class="icon">
						  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/download.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
						</div>
						<a href="javascript:get_content('downloads/downloads')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				</a>
				
				
			        <a href="javascript:get_content('stock/stock')">
							<div class="col-lg-3 col-xs-6">
							  <div class="small-box" style="background:linear-gradient(to bottom, #009245  0%, #FCEE21 100%);">
								<div class="inner"><br>
								  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Stock</h3>
									<p style="margin-left:10px;color:#fff;">Enter</p>
								</div>
								<div class="icon">
								  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/stock.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
								</div>
								<a href="javascript:get_content('stock/stock')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  </div>
							</div>
						</a>
				
			
	
		     </div>
         </div>
     </section>
	<!-------------------------------------- Services Panel End --------------------------------->
	<!-------------------------------------- Backup Panel Start --------------------------------->
		<section class="col-lg-12 ">
          <div class="box">
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-rocket"></i>&nbsp;&nbsp;&nbsp;<b>Other</b></h3>
				</div>
            <div class="box-body">
				

			   
				<a href="javascript:get_content('reminder/reminder')">
						<div class="col-lg-3 col-xs-6">
						  <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
							<div class="inner"><br>
							  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Reminder</h3>
								<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
							<div class="icon">
							  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/new_enquiry.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('reminder/reminder')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div>
				</a>
				
					
						
				<a href="javascript:get_content('recycle_bin/recycle_bin')">
					<div class="col-lg-3 col-xs-6">
					  <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
						<div class="inner"><br>
						  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Recycle Bin</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
						</div>
						<div class="icon">
						  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/recyclebin.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
						</div>
						<a href="javascript:get_content('recycle_bin/recycle_bin')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				 </a>
				 <a href="javascript:get_content('holiday/holiday')">
					<div class="col-lg-3 col-xs-6">
					  <div class="small-box" style="background:linear-gradient(to bottom, #3A3897  0%, #A3A1FF 100%);">
						<div class="inner"><br>
						  <h3 style="font-size:20px;margin-left:10px;color:#fff;">Holiday & Leave</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
						</div>
						<div class="icon">
						  <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/holiday.png" style="width:60px;height:60px;margin-top:20px;" alt="Simption Tech Pvt Ltd "  title="Coaching Management System" class="image1"></i>
						</div>
						<a href="javascript:get_content('holiday/holiday')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				 </a>

			 
            </div>
          </div>
        </section>

		  
 