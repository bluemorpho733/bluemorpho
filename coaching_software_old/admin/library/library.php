<?php include("../attachment/session.php")?>
 <script>
window.scrollTo(0, 0);
</script>
    <section class="content-header">
      <h1>
        Library Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Library Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
		<div class="box-header">

		<h3 class="box-title" style="color:teal;"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<b>Main Panel</b></h3>
		</div>
      <div class="box-body">
	  <a href="javascript:get_content('library/library_add_book')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #662D8C  0%, #ED1E79  100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Add Book']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/add_book.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('library/library_add_book')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('library/view_book_library')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #FB872B  0%, #D9E021 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['View Book']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/view_book.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd "  title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('library/view_book_library')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('library/view_issued_book_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00537E 0%, #3AA17E 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Issued Book']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/issued_book.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>           
            <a href="javascript:get_content('library/view_issued_book_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		<a href="javascript:get_content('library/view_return_book_list')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #45145A  0%, #FF5300 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;"><?php echo $language['Return Book']; ?></h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/return_book.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>  
            <a href="javascript:get_content('library/view_return_book_list')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>

		
 		<a href="javascript:get_content('library/exam_stuff_add')">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:linear-gradient(to bottom, #00FFA1  0%, #00FFFF 100%);">
            <div class="inner"><br>
               <h3 style="font-size:20px;margin-left:5px;color:#fff;">E-Stuff</h3>
				<p style="margin-left:10px;color:#fff;"><?php echo $language['Enter']; ?></p>
            </div>
            <div class="icon">
              <i class="ion"><img src="<?php echo $coaching_software_path; ?>images/exam_stuff.png" style="width:80px;margin-bottom:20px;" alt="Simption Tech Pvt Ltd" title="School Management System" class="image1"></i>
            </div>
            <a href="javascript:get_content('library/exam_stuff_add')" class="small-box-footer"><?php echo $language['More info']; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		</a>
		
		</div></div>
</section>