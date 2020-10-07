<?php include("../attachment/session.php"); ?>
 <script>
window.scrollTo(0, 0);
</script>
     <section class="content-header">
      <h1>
        <?php echo 'Coaching Information Management'; ?>
        <small><?php echo 'Control Panel'; ?></small>
      </h1>
      <ol class="breadcrumb">
              <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active"> <?php echo 'Coaching Info'; ?></li>
      </ol>
    </section>
    

    
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		
       <a href="javascript:get_content('coaching_info/coaching_info_general')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Institute Profile</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/school_info.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_info_general')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		
		<a href="javascript:get_content('coaching_info/coaching_branch')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Institute Branch</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/bus_staff.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_branch')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('coaching_info/coaching_courses')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Institute Courses</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/fill_marksheet.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_courses')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('coaching_info/coaching_subject_panel')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Subject</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/exam_stuff.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_subject_panel')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('coaching_info/coaching_batch')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Institute Batches</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/daily_entry.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_batch')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('coaching_info/fee_structure_panel')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #3A3897   0%, #A3A1FF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Fee Structure</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo 'Enter'; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_fee.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/fee_structure_panel')" class="small-box-footer"><?php echo 'More info'; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		
		
		
		
		</div>
	  </div>
	  <div class="box">

		<div class="box-body">

		
		</div>
	  </div>
    </section>