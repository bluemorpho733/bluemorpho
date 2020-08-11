<?php include("../attachment/session.php"); ?>

</head>


<script type="text/javascript">

function for_subject(value){
$.ajax({
type: "POST",
url:  access_link+"time_table/ajax_course_subject.php?course_code="+value+"",
cache: false,
success: function(detail1){          
$("#student_course_subject").html(detail1);
get_batch();
}
});
}

function get_batch(){
var course_code=document.getElementById('course_code').value;
var subject_code=document.getElementById('student_course_subject').value;
if(course_code!='' && subject_code!=''){
$('#batch_list').html(loader_div);
$.ajax({
type: "POST",
url: access_link+"time_table/ajax_get_batch.php?course="+course_code+"&subject="+subject_code+"",
cache: false,
success: function(detail){
$("#batch_list").html(detail);
}
});
}else{
$("#batch_list").html('');
}
}

function fill_teacher_name(row_num){
var teacher_name=document.getElementById('teacher_name_monday_'+row_num).value;
$('#teacher_name_tuesday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
$('#teacher_name_wednesday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
$('#teacher_name_thursday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
$('#teacher_name_friday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
$('#teacher_name_saturday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
$('#teacher_name_sunday_'+row_num).prepend( '<option value="'+teacher_name+'" selected>'+teacher_name+'</option>');
}


$("#my_form").submit(function(e){
e.preventDefault();
var formdata = new FormData(this);
window.scrollTo(0, 0);
get_content(loader_div);
$.ajax({
url: access_link+"time_table/time_table_generate_api1.php",
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
get_content('time_table/time_table_generate');
}
}
});
});


</script>

    <section class="content-header">
      <h1>
        <?php echo $language['Time Table Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
	 <li><a href="javascript:get_content('time_table/time_table')"><i class="fa fa-clock-o"></i> <?php echo $language['Time Table']; ?></a></li>
	  <li class="active"><?php echo $language['Time Table Generate']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Time Table Generate'] ; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
                  <div class="col-md-3 ">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" id="course_code" class="form-control" onchange="for_subject(this.value);"  required>
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
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label >Subject Name<font style="color:red"><b>*</b></font></label><br>
						<select name="subject_code" class="form-control" id="student_course_subject" onchange="get_batch();" required>
					    <option value="">Select</option>
					  </select>
					  </div>
				</div>
				
				
				<div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                <table id="table-data" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th></th>
				  <th></th>
                  <th></th>
				  <th></th>
				  <th></th>
				  <th colspan="1"><center><?php echo $language['Monday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Tuesday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Wednesday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Thursday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Friday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Saturday'] ; ?></center></th>
				  <th colspan="1"><center><?php echo $language['Sunday'] ; ?></center></th>
				  
				  <th></th>
				  <th></th>
				  
                  </tr>
				 <tr>
			 	 <th><center>Sno</center></th>
                 <th><center>Batch Name</center></th>
                 <th><center>Subject Name</center></th>
                 <th><center><?php echo $language['Time From'] ; ?></center></th>
                 <th><center><?php echo $language['Time To'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th><center><?php echo $language['Teacher Name'] ; ?></center></th>
                 <th>Update By</th>
                 <th>Date</th>
                 
                </tr>
                </thead>
				<tbody id="batch_list">

				
		        </tbody>
				
                </table>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
				
				
		 <div class="col-md-12">
		        <center><input type="submit" name="finish" value="<?php echo $language['Submit']; ?>" class="btn  my_background_color" /></center>
		  </div>
		  </form>
	      </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>

