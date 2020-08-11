<?php include("../attachment/session.php"); ?>
<style type="text/css">
	.add_allotment{
		margin-bottom: 50px;
		margin-top: 20px;
	}
</style>
    <section class="content-header">
      <h1>
        Batches Allotment
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('staff/subject_allotment')"><i class="fa fa-graduation-cap"></i>Subject Allotment List</a></li>
	  <li class="active">Subject Allotment Edit</li>
      </ol>
    </section>
<script>
	function valid(batch_code,active_inactive){
	var myval=confirm("Are you sure want to "+active_inactive+" this record !!!!");
	if(myval==true){
	delete_record(batch_code,active_inactive);
	}
	else  {
	return false;
	}
	}
	
	function delete_record(batch_code,active_inactive){
	$.ajax({
	type: "POST",
	url: access_link+"coaching_info/batch_delete.php?batch_code="+batch_code+"&active_inactive="+active_inactive+"",
	cache: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	   get_content('coaching_info/coaching_batch');
	}else{
	alert(detail); 
	}
	}
	});
	}
	</script>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);
        $.ajax({
            url: access_link+"staff/update_subject_allotment_api.php",
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
				   get_content('staff/subject_allotment');
            }
			}
         });
      });
	 
function subject_code(){
	var courses_id=document.getElementById("courses_id").value;
	for_subject(courses_id);
}
 
	
function for_subject(value){
var subject_id=document.getElementById("subject_id").value;
$.ajax({
type: "POST",
url:  access_link+"staff/ajax_get_subject.php?course_code="+value+"&subject_id="+subject_id+"",
cache: false,
success: function($detail1){            
$("#student_course_subject").html($detail1);
}
});
}  


	
</script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Batches Allotment</h3>
            </div>
            <!-- /.box-header -->

            <?php 
             $subject_allotment_id=$_GET['code'];
             if($subject_allotment_id!=''){
             	$sql=mysqli_query($conn37,"select * from subject_allotment where subject_allotment_id='$subject_allotment_id'");
             	while ($result=mysqli_fetch_assoc($sql)) {
             		$subject_allotment_id=$result['subject_allotment_id'];
             		$employee_id=$result['employee_id'];
             		$course_id=$result['course_id'];
             		$subject_id=$result['subject_id'];
             		$posted_date=$result['posted_date'];
             		$subject_allotment_status=$result['subject_allotment_status'];
             	}
             }
           
            ?>
		
            <div class="box-body" class="col-md-6">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
				<div class="col-md-12 box-body table-responsive">
					<input type="hidden" name="subject_allotment_id" value="<?php echo $subject_allotment_id;?>">
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label >Employee Name<font style="color:red"><b>*</b></font></label><br>
						<select name="employee_name" id="employee_name" class="form-control employee_name" required disabled>
						<?php
						$que="select * from employee_info where emp_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$emp_name = $row['emp_name'];
						$emp_id = $row['emp_id'];
						?>
					  <option value="<?php echo $emp_id;?>" <?php if($employee_id==$emp_id){echo 'selected'; }?>><?php echo $emp_name.'/'.$emp_id;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control" onchange="for_subject(this.value);"  required id="courses_id">
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option value="<?php echo $coaching_info_courses_code;?>" <?php if($course_id==$coaching_info_courses_code){ echo 'selected';}?>><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-3">				
					 <div class="form-group" >
					 	<input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subject_id; ?>">
					  <label >Subject Name<font style="color:red"><b>*</b></font></label><br>
						<select name="subject_code" class="form-control" id="student_course_subject" required onchange="get_batch(this.value)">
					    <option value="">Select</option>
					  </select>
					  </div>
				</div>
                <div class="col-md-3">
						<div class="form-group">
						  <label>Date<font style="color:red"><b>*</b></font></label>
						  <input type="date" name="posted_date" value="<?php echo $posted_date;?>" class="form-control" >
						</div>
				</div>
                <div class="col-md-3">
						<div class="form-group">
						  <label>Status<font style="color:red"><b>*</b></font></label>
						  <select name="status" id="status" class="form-control" required>
						  	 <option value="Active" <?php if($subject_allotment_status=='Active'){ echo "selected"; }?>>Active</option>
						  	 <option value="Deactive" <?php if($subject_allotment_status=='Deactive'){ echo "selected"; }?>>Deactive</option>
						  </select>
						</div>
				</div>

				<div class="col-md-12 add_allotment">
				  <center><input type="submit" name="submit" value="Update Allotment" class="btn btn-success" /></center>
				</div>
                </div>
			    </div>
		
		 
		  </form>
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
 		</form>	
<div id="mypdf_view">
			<div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.employee_name').select2()

  })
  subject_code();
  batch_code();
</script>


