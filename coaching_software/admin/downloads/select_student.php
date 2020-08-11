<?php include("../attachment/session.php")?>
<script>
 function validation(){
 var category= document.getElementById('std_category').value;
 var gender= document.getElementById('std_gender').value; 
 var std_class= document.getElementById('std_class').value; 
 //alert(category+gender+std_class);
 
 if(category!='' || gender!='' || std_class!=''){

 return true;
 }else{
  alert("Please Choose Atleast One Field");
  return false;
 }
 }
 </script>

 <script type="text/javascript">
 function for_batches(value){
       $.ajax({
		  	type: "POST",
          	url: access_link+"downloads/ajax_get_batches.php?courses="+value+"",
              cache: false,
              success: function(detail){
                 $("#student_batches").html("<option value='All'>All</option>"+detail);
              }
           });
    }
	function form_submit(){
		$.ajax({
		type: "POST",
		url: access_link+"downloads/student_data.php",
		data: $("#my_form1").serialize(), 
		success: function(data1)
		{
		$('#get_content').html(data1);
		}
		});
	}
</script>

    <section class="content-header">
      <h1>
        Download Student Info
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
   <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('downloads/downloads')"><i class="fa fa-phone-square"></i>Download panel</a></li>
        <li class="active"><i class="fa fa-user-plus"></i>Select Student</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title">Download Student Info</h3>
            </div>
			
            <div class="box-body">
			<form role="form" method="post" enctype="multipart/form-data" id="my_form1">
			<div class="col-md-12">
		     <div class="col-md-3">				
			      <div class="form-group" >
				  <th><b style="font-size:15px">Choose Category</b></th>
				<select name="category" id="std_category" class="form-control">
				<option value="All">All</option>
				<option value="General">General</option>
				<option value="Obc">Obc</option>
				<option value="Sc">Sc</option>
				<option value="St">ST</option>
				</select>
				  </div>
				  </div>	
				  <div class="col-md-3">				
			      <div class="form-group" >
				  <th><b style="font-size:15px">Choose Gender</b></th>
				<select name="gender" id="std_gender" class="form-control">
				<option value="All">All</option>
				<option value="Male">Boys</option>
				<option value="Female">Girls</option>
				</select>
				  </div>
				  </div>	
				   <div class="col-md-3">				
			      <div class="form-group" >
				  <th><b style="font-size:15px">Choose Course</b></th>
				<select name="courses" class="form-control new_student" id="courses" onchange="for_batches(this.value);" >
				<option value="All">All</option>
				<?php 
				$sql= "select * From coaching_courses";
				$result=mysqli_query($conn37,$sql);
				while($row=mysqli_fetch_assoc($result)){
				$courses_name=$row['coaching_info_courses_name'];
				$courses_code=$row['coaching_info_courses_code'];
				 ?>
				<option value="<?php echo $courses_code; ?>"><?php echo $courses_name; ?></option>
				<?php } ?>
				</select>
				  </div>
				  </div>
				
					<div class="col-md-3">
				     <div class="form-group" >
					  <th><b style="font-size:15px">Student Status</b></th>
					 <select class="form-control" name="Student_Status" id="Student_Status">
					 <option value="All">All</option>
					 <option value="Active">Active</option>
					 <option value="Deleted">Deactive</option>
	                 </select>
					</div>
					</div>
				 
					
				  </div>	
        			</br></br></br>
					<hr>
					
					 <div class="col-md-12">
						<div class="form-group" >
					<input type="checkbox" value="" id="check_all" onclick="for_check(this.id);" checked><th><b style="color:red;">Check All Field/Unchecked All</b></th>
						 </div>
						 </div>

				  <div class="col-md-2">				
			      <div class="form-group" >
				  <input type="checkbox" checked name="student_data[]" value="student_name|?|student name" class="check_all"><th><b>Student Name</b></th>
				  </div>
				  </div>
	
				  <div class="col-md-2 ">	
					 <div class="form-group" >
					 <input type="checkbox" checked name="student_data[]" value="student_father_name|?|student father name" class="check_all"><th><b>Father Name</b></th>
					 </div>
				  </div>
			      <div class="col-md-2 ">
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_mother_name|?|student mother name" class="check_all"><th><b>Mother Name</b></th>
						</div>
				   </div>
				   <div class="col-md-2 ">
						<div class="form-group">
						 <input type="checkbox" checked name="student_courses[]" value="course_code|?|course code" class="check_all"><th><b>Student Cources</b></th>
						</div>
					</div>
					
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_date_of_birth|?|student date of birth" class="check_all"><th><b>Student Date Of Birth</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_gender|?|student gender" class="check_all"><th><b>Student Gender</b></th>
						</div>
					</div>
					
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_category|?|student category" class="check_all"><th><b>Student Category</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked  name="student_data[]" value="student_rf_id_number|?|student rf id number" class="check_all"><th><b>Student Rfid Number</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_adhar_number|?|student adhar number" class="check_all"><th><b>Student Adhar Number</b></th>
						</div>
					</div>

					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_date_of_admission|?|student date of admission" class="check_all"><th><b>Student Date Of Admission</b></th>
						</div>
					</div>


					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_admission_number|?|student admission number" class="check_all"><th><b>Student Admission Number</b></th>
						</div>
					</div>

					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_father_contact_number|?|student father contact number" class="check_all"><th><b>Student Father Number</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_mother_contact_number|?|student Mother Contact Number" class="check_all"><th><b>Student Mother Number</b></th>
						</div>
					</div>

					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_contact_number|?|student contact number" class="check_all"><th><b>Student Contact Number</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_email_id|?|student email id" class="check_all"><th><b>Student Email Id</b></th>
						</div>
					</div>
					<div class="col-md-2 ">		
						<div class="form-group">
						   <input type="checkbox" checked name="student_data[]" value="student_address|?|student address" class="check_all"><th><b>Student Address</b></th>
						</div>
					</div>
					
					</div>
		<div class="col-md-12">
		   <center><input type="button" name="submit" value="Submit" class="btn btn-primary" onclick="return for_validity();" /></center>
		   </div>
		   </form>	
	       </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>

</section>
  

 <script>
function for_check(id){
if($('#'+id).prop("checked") == true){
	$("."+id).each(function() {
	$(this).prop('checked',true);
	});
}else{
	$("."+id).each(function() {
	$(this).prop('checked',false);
	});
}
}
function for_validity(){
var num2=0;
$(".check_all").each(function() {
if($(this).prop('checked')==true){ 
	num2 += Number(parseInt(num2)+1);
}
});
if(num2<1){
alert('Please Select Atleast One Field !!!');
return false;
}else{
	form_submit();
return true;
}
}
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
