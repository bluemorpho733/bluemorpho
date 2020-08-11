<?php include("../attachment/session.php"); ?>
 <script>
window.scrollTo(0, 0);
</script>
     <section class="content-header">
      <h1>
        <?php echo $language['Coaching Information Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
              <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active"> <?php echo $language['Coaching Info']; ?></li>
      </ol>
    </section>
    

    
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		
       <a href="javascript:get_content('coaching_info/coaching_subject_add')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Subject Add</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_subject.png" style="width:80px;margin-bottom:14px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_subject_add')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('coaching_info/coaching_courses_subject')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">Coursewise Subject</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/class_wise_subject.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('coaching_info/coaching_courses_subject')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
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