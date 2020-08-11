<?php include("../attachment/session.php"); ?>
<script>
function form_submit(){
	$.ajax({
	type: "POST",
	url: access_link+"downloads/attendance_export.php",
	data: $("#my_form").serialize(), 
	success: function(data1)
	{
	$('#get_content').html(data1);
	}
	});
}
</script>

    <section class="content-header">
      <h1>
        Download Attendance Info
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('downloads/downloads')"><i class="fa fa-phone-square"></i>Download panel</a></li>
        <li class="active"><i class="fa fa-user-plus"></i>Download</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><b>Attendance Download Info</b></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  >
			<form role="form" method="post" id="my_form"  enctype="multipart/form-data">
			<div class="col-md-12">
			
			<div class="col-md-4">	
				<div class="form-group" >
				  <th><b style="font-size:15px">Select Month</b></th>
			  <select class="form-control" name="month_name" required>
			  <option value="All" >All</option>
			  <option value="04"><?php echo $language['April']; ?></option>
			  <option value="05"><?php echo $language['May']; ?></option>
			  <option value="06"><?php echo $language['June']; ?></option>
			  <option value="07"><?php echo $language['July']; ?></option>
			  <option value="08"><?php echo $language['August']; ?></option>
			  <option value="09"><?php echo $language['September']; ?></option>
			  <option value="10"><?php echo $language['October']; ?></option>
			  <option value="11"><?php echo $language['November']; ?></option>
			  <option value="12"><?php echo $language['December']; ?></option>
			  <option value="01"><?php echo $language['January']; ?></option>
			  <option value="02"><?php echo $language['February']; ?></option>
			  <option value="03"><?php echo $language['March']; ?></option>
	                 </select>
	                  
					</div>
				</div>
							<div class="col-md-4">	
					<div class="form-group" >
					  <th><b style="font-size:15px">Select Year</b></th>
					  <?php $year=date('Y'); ?>
					  <select class="form-control" name="year_name" required>
			  <option <?php if($year=='2016'){ echo 'selected'; } ?> value="2016" >2016</option>
			  <option <?php if($year=='2017'){ echo 'selected'; } ?> value="2017" >2017</option>
			  <option <?php if($year=='2018'){ echo 'selected'; } ?> value="2018" >2018</option>
			  <option <?php if($year=='2019'){ echo 'selected'; } ?> value="2019" >2019</option>
			  <option <?php if($year=='2020'){ echo 'selected'; } ?> value="2020" >2020</option>

			
	                 </select>
	                  
					</div>
				</div>

			 <div class="col-md-4">
				 <div class="form-group" >
					  <th><b style="font-size:15px">Cources</b></th>
					 <select name="std_coures" class="form-control new_student" id="std_class" onchange="for_section(this.value);">
				<option value="All">All</option>
				<?php
				$sql= "select * From coaching_courses";
				$result=mysqli_query($conn37,$sql);
				while($row=mysqli_fetch_assoc($result)){
				$courses_code=$row['coaching_info_courses_code'];
				$courses_name=$row['coaching_info_courses_name'];
				 ?>
				<option value="<?php  echo $courses_code; ?>"><?php echo $courses_name; ?></option>
				<?php } ?>
				</select>
	
					</div>
					</div>
		
			</div></br></br></br></br></br>

					</div>
		
		<div class="col-md-12">
		   <center><input type="button" name="submit" value="Submit" class="btn btn-primary" onclick="form_submit()" /></center>
		   </div>
		   </form>	
	       </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
  
