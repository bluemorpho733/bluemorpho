<?php include("../attachment/session.php")?>
  <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        <?php echo $language['Stock Management']; ?>
        <small> <?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
                 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-money"></i> <?php echo $language['Stock Management']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
		<div class="box-body">

		<?php  if(!isset($_SESSION['sub_panel_add_item'])){ ?>
  <a href="javascript:get_content('stock/add_item')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Add New Item']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_new_item.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('stock/add_item')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
				 	<?php } if(!isset($_SESSION['sub_panel_stock_purchase_list'])){ ?>
 	 <a href="javascript:get_content('stock/item_list')">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
          <div class="inner"><br>
             <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Item List']; ?></h3>
			       <p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
          </div>
          <div class="icon">
            <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_new_item.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
          </div>
          <a href="javascript:get_content('stock/item_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
		</a>
				 	<?php } if(!isset($_SESSION['sub_panel_item_list'])){ ?>
 
        <a href="javascript:get_content('stock/purchase_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Purchase List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/purchase.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('stock/purchase_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
				 	<?php } if(!isset($_SESSION['sub_panel_item_list'])){ ?>
 <a href="javascript:get_content('stock/item_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Buy And Sale']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/buy_and_sale.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
            </div>
            </div>
            <a href="javascript:get_content('stock/item_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		
				 	<?php } if(!isset($_SESSION['sub_panel_sale_list'])){ ?>
 <a href="javascript:get_content('stock/sale_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Sale List']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/sale_list.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd"  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('stock/sale_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
				 	<?php }  ?>


		</div>
      </div>
	  
    </section>