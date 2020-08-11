<?php include("../attachment/session.php")?>

	<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
<script type="text/javascript">
function for_teacher_detail(){
var courses_id=$("#courses").val();
var day=$("#student_days").val();
$('#change_teacher').html(loader_div);
$.ajax({
type: "POST",
url: access_link+"time_table/ajax_get_teacher_detail.php?day="+day+"&courses_id="+courses_id+"",
cache: false,
success: function(detail){
//alert(detail);
$("#change_teacher").html(detail);
  }
});
}
// function for_courses(){
// 	var courses_id=$("#courses").val();
// 	$.ajax({
// 	type: "POST",
// 	url: access_link+"time_table/change_header.php?courses_id="+courses_id+"",
// 	cache: false,
// 	success: function(detail){
// 	$("#change_teacher").html(detail);
// 	  }
// 	});
// 	for_teacher_detail();
// }
</script>

 <section class="content-header">
      <h1>
        <?php echo $language['Time Table Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
	 <li><a href="javascript:get_content('time_table/time_table')"><i class="fa fa-clock-o"></i> <?php echo $language['Time Table']; ?></a></li>
	  <li class="active"><?php echo $language['Teacher Availability']; ?></li>
      </ol>
    </section>
	

	
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Teacher Availability']; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			<form role="form"  method="post" enctype="multipart/form-data">
				 <div class="col-md-4 ">	
				<div class="form-group">
				<label><?php echo $language['Select Day']; ?></label>
				<select name="student_class1" id="student_days"  class="form-control" onchange="for_teacher_detail();" required>
					<option value="">Select Day</option>
					<option value="monday"><?php echo $language['Monday']; ?></option>
					<option value="tuesday"><?php echo $language['Tuesday']; ?></option>
					<option value="wednesday"><?php echo $language['Wednesday']; ?></option>
					<option value="thursday"><?php echo $language['Thursday']; ?></option>
					<option value="friday"><?php echo $language['Friday']; ?></option>
					<option value="saturday"><?php echo $language['Saturday']; ?></option>
					<option value="sunday">Sunday</option>
				</select>
			  </div>
			  	</div>

			 <div class="col-md-4 ">	
				<div class="form-group">
				<label>Courses</label>
				<select name="courses" id="courses"  class="form-control" onchange="for_teacher_detail()" required>
					<option value="">Select Courses</option>
					<?php 
					$sql=mysqli_query($conn37,"select * from coaching_courses");
					while($res2=mysqli_fetch_assoc($sql)){
						$courses_name=$res2['coaching_info_courses_name'];
						$courses_code=$res2['coaching_info_courses_code'];
						?>
					<option value="<?php echo $courses_code;?>"><?php echo $courses_name; ?></option>
					<?php } ?>
				</select>
			  </div>
			  	</div>
			  
				
				
				<div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                 <div class="" id="change_teacher">


                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
		  </form>
	      </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>

    
  </div>

	