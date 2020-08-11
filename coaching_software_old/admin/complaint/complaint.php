<?php include("../attachment/session.php"); ?>
 <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        <?php echo $language['Complaint And Feedback Management']; ?>
		<small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
        <li class="active"><i class="fa fa-times-circle"></i> <?php echo $language['Complaints']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		<?php  if(!isset($_SESSION['sub_panel_student_complaint'])){ ?>
	 	  <a href="javascript:get_content('complaint/student_complaint')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:2px;color:#fff;"><?php echo $language['Student Complaints']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('complaint/student_complaint')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		 <?php } if(!isset($_SESSION['sub_panel_staff_complaint'])){ ?>
	  <a href="javascript:get_content('complaint/staff_complaint')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:5px;color:#fff;"><?php echo $language['Staff Feedback']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('complaint/staff_complaint')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>	 
	 <?php } if(!isset($_SESSION['sub_panel_faculty_complaint'])){ ?>

	 <a href="javascript:get_content('complaint/faculty_complaint')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:5px;color:#fff;">Employee Complaints</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('complaint/faculty_complaint')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

       <?php }  ?>


		</div>
      </div>

    </section>

