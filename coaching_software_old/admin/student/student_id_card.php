<?php include("../attachment/session.php"); ?>
<script type="text/javascript">
function for_list(){ 
var get_subject= document.getElementById('get_subject').value;
var course_code= document.getElementById('course_code').value;
var student_identity_category=document.getElementById('student_identity_category').value;
$("#my_table").html(loader_div);
$.ajax({
type: "POST",
url:  access_link+"student/ajax_student_id_card.php?id="+course_code+"&get_subject="+get_subject+"&student_identity_category="+student_identity_category+"",
cache: false,
success: function(detail){
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

</script>
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
         <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['Student ID Card']; ?></li>
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
			<?php 
$que="select * from coaching_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
$id_card_student_pdf = $row['id_card_student_pdf'];
}	
   ?>
            <div class="box-body">
			<form role="form"  method="post" id="my_form" action="<?php echo $pdf_path; ?>id_card_page/<?php echo $id_card_student_pdf; ?>" onsubmit="return checked_null_value();" enctype="multipart/form-data" target="_blank">
			
			    <div class="col-md-2">	
					<div class="form-group" >
					    <label>Course</label>
							<select name="course_code" class="form-control" id="course_code" onchange="get_course(this.value);" required>
							<option value="All">All</option>
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
				<div class="col-md-2">	
					<div class="form-group">
					    <label>Subject</label>
					   	<select name="subject_code" class="form-control" oninput='for_list();' id="get_subject">
							<option value="All">All</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">	
					<div class="form-group">
					    <label>Student Identity Category</label>
							<select class="form-control" name="student_identity_category" onchange='for_list();' id="student_identity_category">
						<option value="all">All</option>
						<?php
						$query1="select identity_category_name from school_info_identity_category";
						$res1=mysqli_query($conn37,$query1);
						while($row1=mysqli_fetch_assoc($res1)){
						$identity_category_name=$row1['identity_category_name'];
						?>
						<option value="<?php echo $identity_category_name; ?>"><?php echo $identity_category_name; ?></option>
						<?php } ?>
							</select>
					</div>
				</div>
				<div class="col-md-3">	
					<div class="form-group">
					    <label>Elements</label>
					    <!-- Default inline 1-->
						<div class="custom-control custom-checkbox custom-control-inline ">
						  <input type="checkbox" class="custom-control-input" id="defaultInline1" name="address" checked value="address"/>
						  <label class="custom-control-label" for="defaultInline1">Address</label>
						   <input type="checkbox" class="custom-control-input" id="defaultInline2" name="website" checked value="website">
						  <label class="custom-control-label" for="defaultInline2"/>Website</label>
						</div>
					</div>
				</div>
		
				<div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" id="my_table">
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th><?php echo $language['S No']; ?></th>
				  <th>Admission No.</th>
                  <th><?php echo $language['Student Roll No']; ?></th>
                  <th><?php echo $language['Student Name']; ?></th>
                  <th><?php echo $language['Class']; ?></th>
                  <th><?php echo $language['Select Student']; ?>
				  
				  <th>Update By</th>
                  <th>Date</th>
				  </th>
                </tr>
                </thead>
				
				<tbody id="example2">
				
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



<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

<script>
function checked_null_value()
{
var number_checked =$('[name="school_id_card_info[]"]:checked').length;
if(number_checked == 0)
{
 alert('Please select atleast one student');
 return false;
}
else {
return true;
}
}
</script>