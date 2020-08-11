<?php include("../attachment/session.php")?>
 <script>
window.scrollTo(0, 0);
</script>
			<section class="content-header">
				<h1>
					<b>Download  Management</b>
					<small>Control Panel</small>
				</h1>
				<ol class="breadcrumb">
					 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
					 <li class="active">Download</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- Small boxes (Stat box) -->
				<div class="row">
				    <?php  if(!isset($_SESSION['sub_panel_select_student'])){ ?>
					<a href="javascript:get_content('downloads/select_student')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Student Info</h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/select_student')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
					<?php  }  ?>

					<a href="javascript:get_content('downloads/employee_download')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Employee List</h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/staff.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/employee_download')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
					<a href="javascript:get_content('downloads/employee_salary')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Employee Salary </h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/staff_salary.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/employee_salary')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
					<a href="javascript:get_content('downloads/enquiry_download_info')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Enquiry List</h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/enquiry_download_info')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
					<a href="javascript:get_content('downloads/student_fees_download_list')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background:linear-gradient(to bottom, #3A3897   0%, #A3A1FF 100%);">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Student Fees  List</h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/fee_details.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/student_fees_download_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
							
						</div>
					</div>
					</a>


					<a href="javascript:get_content('downloads/Attendance_download_list')">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background-color:#206b6f;">
							<div class="inner"><br>
								 <h3 style="font-size:20px;margin-left:5px;color:#fff;">Attendance List</h3>
								<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
							</div>
							<div class="icon">
								<i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_attendance1.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
							</div>
							<a href="javascript:get_content('downloads/Attendance_download_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>

				</div>
			</section>

