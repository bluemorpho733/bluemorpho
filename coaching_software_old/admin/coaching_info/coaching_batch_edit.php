<?php include("../attachment/session.php");
$batch_code=$_GET['code'];
$que="select * from coaching_batch left join coaching_courses on coaching_batch.course_code = coaching_courses.coaching_info_courses_code where coaching_info_batch_code='$batch_code'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$s_no = $row['s_no'];
	$subject_code = $row['subject_code'];
	$coaching_info_courses_name = $row['coaching_info_courses_name'];
	$coaching_info_batch_name = $row['coaching_info_batch_name'];
	$coaching_info_batch_code = $row['coaching_info_batch_code'];
	$coaching_info_batch_time_from = $row['coaching_info_batch_time_from'];
	$coaching_info_batch_time_to = $row['coaching_info_batch_time_to'];
	$coaching_info_batch_remark = $row['coaching_info_batch_remark'];
	$batch_status = $row['batch_status'];
    }

	$que1="select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'";
	$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
	$coaching_info_courses_subject_name = '';
	while($row1=mysqli_fetch_assoc($run1)){
	$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
	}

?>

    <section class="content-header">
      <h1>
        Institute Batch
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Batch Edit</li>
      </ol>
    </section>

<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_batch_edit_api.php",
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
				   get_content('coaching_info/coaching_batch');
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
              <h3 class="box-title">Institute Subject Edit</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-12">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive">
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Courses Name</label>
						   <input type="text"  name="coaching_info_courses_name"   value="<?php echo $coaching_info_courses_name; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Subject Name</label>
						   <input type="text"  name="coaching_info_courses_name"   value="<?php echo $coaching_info_courses_subject_name; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Batch Code</label>
						   <input type="text"  name="coaching_info_batch_code"   placeholder="batch Code"  value="<?php echo $coaching_info_batch_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Batch Name</label>
						   <input type="text"  name="coaching_info_batch_name"   placeholder="batch Name"  value="<?php echo $coaching_info_batch_name; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Time From</label>
						   <input type="time"  name="coaching_info_batch_time_from" value="<?php echo $coaching_info_batch_time_from; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Time To</label>
						   <input type="time"  name="coaching_info_batch_time_to" value="<?php echo $coaching_info_batch_time_to; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Remark</label>
						   <input type="text"  name="coaching_info_batch_remark"   placeholder="Remark"  value="<?php echo $coaching_info_batch_remark; ?>" class="form-control" maxlength="100" >
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