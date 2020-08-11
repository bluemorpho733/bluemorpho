<?php include("../attachment/session.php"); ?>
    <!-- Content Header (Page header) -->
		<section class="content-header">
		<h1>
		<?php echo $language['Fees Management']; ?>
		<small><?php echo $language['Control Panel']; ?></small>
		</h1>
		<ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
		<li class="active"><?php echo $language['Fees']; ?></li>
		</ol>
		</section>
    <!-- Main content -->
		<section class="content">
			<div class="box">
				<div class="box-header">
				<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
				</div>
				<div class="box-body">
					<a href="javascript:get_content('fees_installmentwise/student_admission_fee_list')">
						<div class="col-lg-3 col-xs-6">
							<div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
							<div class="inner"><br>
							<h3 style="font-size:20px;margin-left:5px;color:#fff;">Set Fees</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
								<div class="icon">
								<i class="ion"><img src="../coaching_software/images/fee_details.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
								</div>
							<a href="javascript:get_content('fees_installmentwise/student_admission_fee_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
					<a href="javascript:get_content('fees_installmentwise/student_fee_pay_form')">
						<div class="col-lg-3 col-xs-6">
							<div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
							<div class="inner"><br>
							<h3 style="font-size:20px;margin-left:5px;color:#fff;">Pay Fees</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
								<div class="icon">
								<i class="ion"><img src="../coaching_software/images/pay_fee.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
								</div>
							<a href="javascript:get_content('fees_installmentwise/student_fee_pay_form')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
					<a href="javascript:get_content('fees_installmentwise/student_fee_detail_list')">
						<div class="col-lg-3 col-xs-6">
							<div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
							<div class="inner"><br>
							<h3 style="font-size:20px;margin-left:5px;color:#fff;">Fee Receipt</h3>
							<p style="margin-left:10px;color:#fff;">Enter</p>
							</div>
								<div class="icon">
								<i class="ion"><img src="../coaching_software/images/purchase.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
								</div>
							<a href="javascript:get_content('fees_installmentwise/student_fee_detail_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
			</div>
		</section>