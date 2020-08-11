<?php include("../attachment/session.php")?>
 <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        <?php echo $language['Holiday Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
   	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-photo"></i> <?php echo $language['Holiday']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">
		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">
		<?php if(!isset($_SESSION['sub_panel_add_holiday'])){ ?>
  		<a href="javascript:get_content('holiday/add_holiday')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Add Holiday']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_holiday.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('holiday/add_holiday')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
	 	 	 <?php } if(!isset($_SESSION['sub_panel_holiday_list'])){ ?>
  		<a href="javascript:get_content('holiday/holiday_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Holiday List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/holiday_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('holiday/holiday_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	</a>
	 	 <?php } ?>
	 	 		<?php  if(!isset($_SESSION['sub_panel_leave_form'])){ ?>
 		  <a href="javascript:get_content('holiday/leave_form')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Student Leave Form']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/student_leave.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('holiday/leave_form')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
	 	 <?php } if(!isset($_SESSION['sub_panel_leave_list'])){ ?>
 		  <a href="javascript:get_content('holiday/leave_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Student Leave List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/account_list.png" style="width:55px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="coaching Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('holiday/leave_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
			 <?php }  ?>


		</div>
      </div>
	  <div class="box" style="display:none;">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<b>Reports</b></h3>
		</div>
		<div class="box-body">
		</div>
	  </div>

    </section>

