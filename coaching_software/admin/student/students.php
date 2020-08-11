<?php include("../attachment/session.php"); ?>

    <section class="content-header">
      <h1>
        Student Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Student</li>
      </ol>
    </section>
	

    <!-- Main content -->
    <section class="content">
            <div class="box">
				<div class="box-header">
				  
				  <h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
				</div>
				<div class="box-body">
	 			 	<?php  if(!isset($_SESSION['sub_panel_student_registration'])){ ?>
 	 <a href="javascript:get_content('student/student_registration')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Quick Registration</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/student_registration')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
	 			 	<?php } if(!isset($_SESSION['sub_panel_student_registration_list'])){ ?>
 		<a href="javascript:get_content('student/student_registration_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Registration List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/student_registration_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
	 			 	<?php } if(!isset($_SESSION['sub_panel_student_admission_list'])){ ?>
 		<a href="javascript:get_content('student/student_admission_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Admission List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/reminder_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/student_admission_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		

     			 
     			 	<?php } if(!isset($_SESSION['sub_panel_rfid_card_generate'])){ ?>
 	
		<a href="javascript:get_content('student/rfid_card_generate')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Assign Rfid Card']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_rfid.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/rfid_card_generate')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
     			 	<?php } if(!isset($_SESSION['sub_panel_student_roll_no'])){ ?>
 	    <a href="javascript:get_content('student/student_roll_no')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Roll No Generate']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/new_admission.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/student_roll_no')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

		 	<?php } ?>
	
	 	<a href="javascript:get_content('student/student_id_card')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #3A3897   0%, #A3A1FF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Student <?php echo $language['Id Generate']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/idcard.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('student/student_id_card')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		 </div>
      </div>
     
   
       </div>
   </section>