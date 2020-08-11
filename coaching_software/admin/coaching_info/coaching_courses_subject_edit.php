<?php include("../attachment/session.php");
$code=$_GET['code'];
$que="select * from coaching_courses_subject left join coaching_courses on coaching_courses_subject.course_code = coaching_courses.coaching_info_courses_code where coaching_courses_subject.s_num='$code'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$s_no = $row['s_num'];
	$coaching_info_courses_name = $row['coaching_info_courses_name'];
    $subject_name = $row['coaching_info_courses_subject_name'];
    $coaching_info_courses_code = $row['course_code'];
    $subject_code = $row['coaching_info_courses_subject_code'];
	$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
	$coaching_info_courses_subject_duration = $row['coaching_info_courses_subject_duration'];
	$coaching_info_courses_subject_trainer = $row['coaching_info_courses_subject_trainer'];
	$courses_subject_status = $row['courses_subject_status'];

}

?>

    <section class="content-header">
      <h1>
        Institute Courses Subject
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Courses Subject</li>
      </ol>
    </section>

<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_courses_subject_edit_api.php",
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
				   get_content('coaching_info/coaching_courses_subject');
               }
			}
         });
      });
	  
function for_subject_name(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_subject_name.php?coaching_info_courses_subject_code="+value+"",
cache: false,
success: function($detail1){
var str1 =$detail1;                
$("#subject_name").html(str1);
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
              <h3 class="box-title">Institute Subject Edit</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-12">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive">
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control select2" required>
					   <option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
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
				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label>Subject Name<font style="color:red"><b>*</b></font></label>
						<select name="coaching_info_courses_subject_code" class="form-control select2" onchange="for_subject_name(this.value)" required>
					    <option value="<?php echo $subject_code;?>"><?php echo $subject_name;?></option>
						<?php

						$que="select * from coaching_subject where subject_name!=''";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$subject_name1 = $row['subject_name'];
						$subject_code = $row['subject_code'];
						?>
					  <option value="<?php echo $subject_code;?>"><?php echo $subject_name1;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-3 " style="display:none;">
						<div class="form-group" id="subject_name">
						  <label>Subject Name</label>
						   <input type="text"  name="coaching_info_courses_subject_name" value="<?php echo $subject_name; ?>"   class="form-control" readonly >
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>Subject Duration</label>
						   <input type="text"  name="coaching_info_courses_subject_duration"   placeholder="Courses Duration"  value="<?php echo $coaching_info_courses_subject_duration; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label>No. Of Trainer</label>
						   <input type="number"  name="coaching_info_courses_subject_trainer"   placeholder="No. Of Trainer"  value="<?php echo $coaching_info_courses_subject_trainer; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<input name="code" value="<?php echo $code; ?>" style="display:none;">
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
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
<script>

$(function () {
$('.select2').select2()
})

</script>