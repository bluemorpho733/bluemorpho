<?php include("../attachment/session.php")?>
<style type="text/css">
	th, td { width:30px }
</style>
<script>
function get_time_table(){
	var Courses_id=document.getElementById('Courses_id').value;
	var t=1;
	if(Courses_id!='' && t==1){
	$('#time_table_list1').html(loader_div);
	$.ajax({
	type: "POST",
	url: access_link+"time_table/ajax_time_table_list.php?Courses_id="+Courses_id,
	cache: false,
	success: function(detail){
	$("#time_table_list1").html(detail);
	get_courses();
	  }
	});
	}else{
	$("#time_table_list1").html('');
	}
}

function get_courses(){
	var Courses_id=document.getElementById('Courses_id').value;
	$.ajax({
		url:access_link+"time_table/ajax_get_print.php?Courses_id="+Courses_id,
		type:"POST",
		cache:false,
		success:function($detail){
		$("#print_btn").html($detail);
		}
	});
}

</script>

    <section class="content-header">
      <h1>
        <?php echo $language['Time Table Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
	 <li><a href="javascript:get_content('time_table/time_table')"><i class="fa fa-clock-o"></i> <?php echo $language['Time Table']; ?></a></li>
	  <li class="active"><?php echo $language['Time Table List']; ?></li>
      </ol>
    </section>
	
	
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $language['Time Table List']; ?></h3>
            </div>
		      <div class="box-body">
				<div class="col-md-3">	
				<div class="form-group">
				<label>Courses</label>
				<select name="Courses_id" id="Courses_id"  class="form-control" onchange="get_time_table(this.value);" required>
					<option value="">Select</option>
					<?php
				    $que="select * from coaching_courses";
					$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
					while($row=mysqli_fetch_assoc($run)){
					$courses_code=$row['coaching_info_courses_code'];
					$courses_name=$row['coaching_info_courses_name'];
					?>
					<option value="<?php echo $courses_code; ?>"><?php echo $courses_name; ?></option>
					<?php
					}
					?>
				</select>
			  </div>
			  	</div>
			  	<div class="col-md-7">
			  	</div>
			  	<div class="col-md-2"  id="print_btn">

			  	</div>

		<div class="col-md-12">
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
        	<thead class="my_background_color">
                <tr>
				    <th></th>
				    <th></th>
			        <th></th>
			        <th></th>
					<th></th>
					<th>Monday</th>
			        <th>Tuesday</th>
			        <th>Wednesday</th>
			        <th>Thursday</th>
			        <th>Friday</th>
			        <th>Saturday</th>
			        <th>Sunday</th>
					<th></th>
					<th></th>
        		</tr>
       		 </thead>
                <thead class="my_background_color">
                <tr>
                	<th>Sno</th>
				    <th>Batch Name</th>
			        <th>Subject Name</th>
			        <th>Time From</th>
					<th>Time To</th>
			        <th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Teacher Name</th>
					<th>Update By</th>
					<th>Date</th>
        		</tr>
       		 </thead>
				<tbody id="time_table_list1">
		        </tbody>
             </table>
            </div>
       	</div>
          </div>
        </div>
      </div>
    </section>
  </div>
    
  </div>

