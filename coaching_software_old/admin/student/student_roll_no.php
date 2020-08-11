<?php include("../attachment/session.php"); ?>

<script type="text/javascript">
function for_list(){ 
var get_subject=document.getElementById('get_subject').value;
var roll_no_generate_by=document.getElementById('roll_no_generate_by').value;
var course_code=document.getElementById('course_code').value;
var start_number=document.getElementById('start_number').value;
$('#my_table').html(loader_div);
$.ajax({
type: "POST",
url: access_link+"student/ajax_student_roll_no.php?id="+course_code+"&get_subject="+get_subject+"&roll_no_generate_by="+roll_no_generate_by+"&start_number="+start_number+"",
cache: false,
success: function(detail){
// alert(detail);
$('#my_table').html(detail);
}
});
}

function get_course(value1){
$.ajax({
type: "POST",
url:  access_link+"student/ajax_course_subject.php?course_name="+value1+"",
cache: false,
success: function($detail1){
var str1 =$detail1;                
$("#get_subject").html(str1);
  for_list();
}
});
}
$("#my_form").submit(function(e){
e.preventDefault();
var formdata = new FormData(this);
window.scrollTo(0, 0);
$("#get_content").html(loader_div);
$.ajax({
url: access_link+"student/student_roll_no_api.php",
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
get_content('student/student_roll_no');
}
}
});
});
</script>
    <section class="content-header">
      <h1>
         <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['Student Roll No']; ?></li>
      </ol>
    </section>
	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Student Roll No']; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
            <div class="box-body "  >
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
			    <div class="col-md-3">	
					<div class="form-group" >
					    <label>Enter No. (<small>where RollNo. You are Start</small>)</label>
					    <input type="number" name="start_number" id="start_number" oninput='for_list();' class="form-control" />
					</div>
				</div>
				<div class="col-md-3">	
					<div class="form-group" >
					    <label>Course</label>
							<select name="course_code" class="form-control" id="course_code" onchange="get_course(this.value);" required>
							<option value="">Select</option>
						<?php
						$que="select * from coaching_courses";
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
					<div class="form-group">
					  <label>Subject</label>
						<select name="subject_code" class="form-control" oninput='for_list();' id="get_subject" required>
							<option value="">Select</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-3">	
					<div class="form-group" >
					    <label><?php echo $language['Roll No. Genearate By']; ?></label>
					    <select class="form-control" name="roll_no_generate_by" onchange='for_list();' id="roll_no_generate_by" >
						<option value="Automatic">Automatic</option>
						<option value="Mannual">Mannual</option>
					    </select>
					</div>
				</div>
				<div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" id="my_table">
                
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

<?php
if(isset($_POST['finish'])){
$student_roll_no=$_POST['student_roll_no'];
$school_roll_no=$_POST['school_roll_no'];

$count=count($school_roll_no);
for($i=0; $i<$count; $i++){
$quer="update student_admission_info set school_roll_no='$school_roll_no[$i]',$update_by_update_sql  where student_roll_no='$student_roll_no[$i]' and session_value='$session1'";
mysqli_query($conn37,$quer) or die(mysqli_error($conn37));
}
echo "<script>alert('Successfully Completed !!!');</script>";
echo "<script>window.open('student_roll_no.php','_self');</script>";
}
?>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>