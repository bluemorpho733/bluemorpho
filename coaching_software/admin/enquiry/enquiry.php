<?php include("../attachment/session.php"); ?>
    <section class="content-header">
      <h1>
        <?php echo $language['Enquiry Management']; ?>
        <small> <?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
         	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>  <?php echo $language['Home']; ?></a></li>
       <li><i class="fa fa-phone-square"></i>  <?php echo $language['Enquiry']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		<?php  if(!isset($_SESSION['sub_panel_add_enquiry'])){ ?>
	  	 
		<a href="javascript:get_content('enquiry/add_enquiry');">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
              <h3 style="font-size:22px;margin-left:10px;color:#fff;"><?php echo $language['New Enquiry']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd " title="School Management System" class="image1"></i>
            </div>
	        
		   <a href="javascript:get_content('enquiry/add_enquiry');" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		 <?php } if(!isset($_SESSION['sub_panel_enquiry_list'])){ ?>
 <a href="javascript:get_content('enquiry/enquiry_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
              <h3 style="font-size:22px;margin-left:10px;color:#fff;"><?php echo $language['Enquiry List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/enquiry_list.png" style="width:70px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('enquiry/enquiry_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		 <?php  } ?>


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