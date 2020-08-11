<?php include("../attachment/session.php");
$courses_code=$_GET['code'];
$que="select * from coaching_courses where coaching_info_courses_code='$courses_code'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$s_no = $row['s_no'];
    $coaching_info_courses_name = $row['coaching_info_courses_name'];
	$coaching_info_courses_code = $row['coaching_info_courses_code'];
	$coaching_info_courses_category = $row['coaching_info_courses_category'];
	$coaching_info_courses_description = $row['coaching_info_courses_description'];
	$coaching_info_courses_duration = $row['coaching_info_courses_duration'];
	$coaching_info_courses_trainer = $row['coaching_info_courses_trainer'];
	$courses_status = $row['courses_status'];

}

?>

    <section class="content-header">
      <h1>
        Institute Courses
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Courses</li>
      </ol>
    </section>

<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_courses_edit_api.php",
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
				   get_content('coaching_info/coaching_courses');
               }
			}
         });
      });
</script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Institute Courses Edit</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-12">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive">
                <div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Name</label>
						   <input type="text"  name="coaching_info_courses_name"   placeholder="courses Name"  value="<?php echo $coaching_info_courses_name; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Code</label>
						   <input type="text"  name="coaching_info_courses_code"   placeholder="courses Code"  value="<?php echo $coaching_info_courses_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Category</label>
						   <input type="text"  name="coaching_info_courses_category"   placeholder="Courses Category"  value="<?php echo $coaching_info_courses_category; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Description</label>
						   <textarea type="textarea"  name="coaching_info_courses_description"   placeholder="Courses Description"  value="<?php echo $coaching_info_courses_description; ?>" class="form-control" maxlength="70" ><?php echo $coaching_info_courses_description; ?></textarea>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Duration</label>
						   <input type="text"  name="coaching_info_courses_duration"   placeholder="Courses Duration"  value="<?php echo $coaching_info_courses_duration; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>No. Of Trainer</label>
						   <input type="number"  name="coaching_info_courses_trainer"   placeholder="No. Of Trainer"  value="<?php echo $coaching_info_courses_trainer; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
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
 		</form>	
<div id="mypdf_view">
			<div>