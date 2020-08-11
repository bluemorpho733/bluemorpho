<?php include("../attachment/session.php")?>
 <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        Recycle Bin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Recycle Bin</li>
      </ol>
    </section>
    <!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
  		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">
		<?php  if(!isset($_SESSION['panel_recycle_student_admission_list'])){ ?>
    <a href="javascript:get_content('recycle_bin/recycle_student_admission_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:2px;color:#fff;"><?php echo $language['Student Admission']; ?></h3>
				      <p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/recycle_bin (2).png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('recycle_bin/recycle_student_admission_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		
		<?php } if(!isset($_SESSION['panel_recycle_fee_list'])){ ?>
 <!--
		 <a href="recycle_fee_list.php">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background-color:#3B7A57;">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:5px;color:#fff;"><?php echo $language['Fee List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="../<?php echo $school_software_path; ?>images/recycle_bin (3).png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="recycle_fee_list.php" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		-->
				 	 <?php } if(!isset($_SESSION['panel_recycle_employee_list'])){ ?>
 <a href="javascript:get_content('recycle_bin/recycle_employee_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:5px;color:#fff;"><?php echo $language['Employee List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/recycle_bin (8).png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('recycle_bin/recycle_employee_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		 	 <?php } ?>
    <a href="javascript:get_content('recycle_bin/student_registration_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:2px;color:#fff;">Student Registration List</h3>
              <p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/recycle_bin (6).png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('recycle_bin/student_registration_list')" class="small-box-footer"><?php echo $language['More info']; ?><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </a>
 

		
		
	  <div class="box" style="display:none;">
  		<div class="box-header">
  		  <h3 class="box-title" style="color:teal;"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<b>Reports</b></h3>
  		</div>
  		<div class="box-body">
  		</div>
	  </div>
	  <div class="box" style="display:none;">
  		<div class="box-header">
  		  <h3 class="box-title" style="color:teal;"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<b>User Help</b></h3>
  		</div>
  		<div class="box-body">
  		</div>
	  </div>
    </section>