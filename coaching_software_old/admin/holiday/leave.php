<?php include("../attachment/session.php")?>
<script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        <?php echo $language['Leave Management']; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
	   <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><i class="active"></i> Leave</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		<?php  if(!isset($_SESSION['sub_panel_leave_form'])){ ?>
 		  <a href="javascript:get_content('leave/leave_form')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background-color:#E32636;">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Student Leave Form']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="../<?php echo $school_software_path; ?>images/student_leave.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('leave/leave_form')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
	 	 <?php } if(!isset($_SESSION['sub_panel_leave_list'])){ ?>
 		  <a href="javascript:get_content('leave/leave_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background-color:#3B7A57;">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Student Leave List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="../<?php echo $school_software_path; ?>images/account_list.png" style="width:55px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('leave/leave_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
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
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<b>User Help</b></h3>
		</div>
		<div class="box-body">

		<a href="<?php echo $school_software_path; ?>userhelp/New Leave panel.pdf" target="_blank">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background-color:red;">
							<div class="inner"><br>
							 <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Userhelp English']; ?></h3>
							<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
						</div>
						<div class="icon">
							<i class="ion"><img src="../<?php echo $school_software_path; ?>images/userhelp.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
						</div>
							<a href="<?php echo $school_software_path; ?>userhelp/New Leave panel.pdf" target="_blank" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
					
					
					<a href="<?php echo $school_software_path; ?>userhelp/new leave hindi.pdf" target="_blank"">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box" style="background-color:green;">
							<div class="inner"><br>
							 <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Userhelp Hindi']; ?></h3>
							<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
						</div>
						<div class="icon">
							<i class="ion"><img src="../<?php echo $school_software_path; ?>images/userhelp.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
						</div>
							<a href="<?php echo $school_software_path; ?>userhelp/new leave hindi.pdf" target="_blank"" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					</a>
		
		</div>
	  </div>
    </section>

