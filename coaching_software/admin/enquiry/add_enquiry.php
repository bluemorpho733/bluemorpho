 <?php include("../attachment/session.php"); ?>
 <script>
	      $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
    window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"enquiry/add_enquiry_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('enquiry/enquiry_list');
            }
			}
         });
      });

	function for_subject(value){
	$.ajax({
	type: "POST",
	url:  access_link+"coaching_info/ajax_course_subject.php?course_code="+value+"",
	cache: false,
	success: function(detail1){
	var str1 =detail1;                
	$("#student_course_subject").html(str1);
	}
	});
}
</script>
 
    <section class="content-header">
      <h1>
        <?php echo $language['New Enquiry']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>  <?php echo $language['Home']; ?></a></li>
        <li><a href="javascript:get_content('enquiry/enquiry')"><i class="fa fa-phone-square"></i>  <?php echo $language['Enquiry']; ?></a></li>
        <li class="active"><i class="fa fa-user-plus"></i> <?php echo $language['Enquiry Add']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
  <div class="row">
       <!-- general form elements disabled -->
      <div class="box box-primary my_border_top">
        <div class="box-header with-border ">
          <h3 class="box-title"><?php echo $language['Enquiry Form']; ?></h3>
        </div>
        <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->

        <div class="box-body">
			<form role="form" method="post" id="my_form" enctype="multipart/form-data">
				<div class="col-md-4">				
			      <div class="form-group" >
				    <label><?php echo $language['Enquiry Type']; ?><font style="color:red"><b>*</b></font></label>
					 <select class="form-control" name="enquiry_type"  required>
						<option value=""><?php echo $language['Select']; ?></option>
						<option value="for admission"><?php echo $language['For Admission']; ?></option>
						<option value="for job"><?php echo $language['For Job']; ?></option>
						<option value="other"><?php echo $language['Other']; ?></option>
					 </select>
				  </div>
				</div>
			    <div class="col-md-4">
					<div class="form-group">
					  <label><?php echo $language['Courses']; ?></label>
						<select name="course_code" class="form-control" onchange="for_subject(this.value);">
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Subject</label>
					  <select name="subject_code" class="form-control" id="student_course_subject">
					    <option value="">Select</option>
					  </select>
					</div>
				</div>	
				<div class="col-md-4 ">	
					<div class="form-group" >
					 <label><?php echo $language['Date']; ?><font style="color:red"><b>*</b></font></label>
					 <input type="date" value="<?php echo date('Y-m-d'); ?>" name="enquiry_date" id="myLocalDate"  placeholder="Date"  value="" class="form-control" required>
					</div>
				</div>
		        <div class="col-md-4">
					<div class="form-group">
					  <label><?php echo $language['Name']; ?><font style="color:red"><b>*</b></font></label>
					   <input type="text" name="enquiry_name" placeholder="<?php echo $language['Name']; ?>" value="" class="form-control" required>
					</div>
			    </div>
			   <div class="col-md-4 ">
					<div class="form-group">
					  <label><?php echo $language['Father Name']; ?></label>
					   <input type="text"  name="enquiry_father_name"  placeholder="<?php echo $language['Father Name']; ?>"  value="" class="form-control">
					</div>
				</div>
				<div class="col-md-4 ">		
					<div class="form-group">
					    <label><?php echo $language['Address']; ?><font style="color:red"><b>*</b></font></label>
					    <input type="text" name="enquiry_address" placeholder="<?php echo $language['Address']; ?>"  value="" class="form-control" required>
					</div>
				</div>
			    <div class="col-md-4">		
					<div class="form-group">
					  <label><?php echo $language['Contact No1']; ?><font style="color:red"><b>*</b></font></label>
					   <input type="text" name="enquiry_contact_no_1" placeholder="<?php echo $language['Contact No1']; ?>"  value="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-4">		
					<div class="form-group">
					  <label><?php echo $language['Contact No2']; ?></label>
					   <input type="text" name="enquiry_contact_no_2" placeholder="<?php echo $language['Contact No2']; ?>"  value="" class="form-control">
					</div>
				</div>
				<div class="col-md-4">	
					<div class="form-group" >
					  <label><?php echo $language['Next Follow Up Date']; ?></label>
					  <input type="date"  name="enquiry_next_follow_up_date" placeholder="Date"  value="" class="form-control">
					</div>
			    </div>
			    <div class="col-md-4">		
					<div class="form-group">
					  <label><?php echo $language['Enquiry Remark 1']; ?><font style="color:red"><b>*</b></font></label>
					   <input type="text" name="enquiry_remark_1" placeholder="<?php echo $language['Enquiry Remark 1']; ?>" value="" class="form-control" required>
					</div>
				</div>
					<!-- <div class="col-md-4 ">		
						<div class="form-group">
						  <label><?php //echo $language['Enquiry Remark 2']; ?></label>
						   <input type="text" name="enquiry_remark_2" placeholder="<?php echo $language['Enquiry Remark 2']; ?>"  value="" class="form-control">
						</div>
					</div> -->
				<div class="col-md-12">
				   <center><input type="submit" name="submit" id="submitButtonId" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
	        </form>	
        </div>
        <!---------------------------------------------End Registration form--------------------------------------------------->
		  <!-- /.box-body -->
       </div>
    </div>
</section>