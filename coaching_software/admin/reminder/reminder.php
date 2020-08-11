<?php include("../attachment/session.php"); ?>
  <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        <?php echo $language['Reminder Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
                  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-history"></i> <?php echo $language['Reminder']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		<?php if(!isset($_SESSION['sub_panel_reminder_add'])){ ?>
  
		<a href="javascript:get_content('reminder/reminder_add')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
              <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Add Reminder']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
	          <div class="icon">
	            <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_reminder.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
	          </div>
            <a href="javascript:get_content('reminder/reminder_add')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<?php } if(!isset($_SESSION['sub_panel_reminder_list'])){ ?>
  <a href="javascript:get_content('reminder/reminder_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
              <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Reminder List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
	          <div class="icon">
	            <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/reminder_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
	          </div>
            <a href="javascript:get_content('reminder/reminder_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
     		<?php } if(!isset($_SESSION['sub_panel_reminder_teacher_add'])){ ?>
    <a href="javascript:get_content('reminder/reminder_teacher_add')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
              <h3 style="font-size:17px;margin-left:2px;color:#fff;"><?php echo $language['Add Teacher Reminder']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
	          <div class="icon">
	            <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/teacher_reminder.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
	          </div>
            <a href="javascript:get_content('reminder/reminder_teacher_add')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
      		<?php } if(!isset($_SESSION['sub_panel_reminder_teacher_list'])){ ?>
   <a href="javascript:get_content('reminder/reminder_teacher_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
              <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Teacher Reminder List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
	          <div class="icon">
	            <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/teacher_reminder_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
	          </div>
            <a href="javascript:get_content('reminder/reminder_teacher_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
				<?php } ?>
		</div>
  </div>
</section>