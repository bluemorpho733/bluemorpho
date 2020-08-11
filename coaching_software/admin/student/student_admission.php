<?php include("../attachment/session.php")?>




<script type="text/javascript">

function for_check(id){
var check_value=[];
if($('#'+id).prop("checked") == true){
$("."+id).each(function() {
$(this).prop('checked',true);
check_value.push($(this).val());
});
}else{
$("."+id).each(function() {
$(this).prop('checked',false);
});
}
$("#my_subject_name").val(check_value);
}

function for_subject(){
var value1=document.getElementById('course_code').value;
$("#my_subject_name").val('');
if(value1!=''){
$.ajax({
type: "POST",
url:  access_link+"student/ajax_subject_detail.php?course_name="+value1+"",
cache: false,
success: function(detail1){
$("#subject_detail").html(detail1);
}
});
}else{
$("#subject_detail").html('');
}
}

function for_check1(){
var check_value=[];
$("#my_subject_name").val('');
$(".subject").each(function() {
if($(this).prop("checked") == true){
check_value.push($(this).val());
}
});
$("#my_subject_name").val(check_value);
}

function valid(){
var month=0;
$('.subject').each(function() {
if($(this).prop('checked')==true){
month = Number(parseInt(month)+1);
}
});
if (month>0) {
return true;
}else{
alert("Please Select Atleast One Subject !!!");
return false;
}
}
	
function open_file1(image_type,student_roll_no){

$.ajax({
address: "POST",
url: access_link+"student/ajax_open_image.php?image_type="+image_type+"&student_roll_no="+student_roll_no+"",
cache: false,
success: function(detail){
$("#mypdf_view").html('');
$("#mypdf_view").html(detail);
}
});
}
	
function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
		$('#'+id).attr('src', e.target.result);
            };
			
            reader.readAsDataURL(input.files[0]);
			
        }
    }
function check_file_type(input,id,id_show,type1){
if(type1=="image"){
	   var file = input.files[0];
	   if (file.size >= 1024 * 1024 * 1024) {
	    $('#'+id).val('');
      alert("File size must be at most 2MB");
      return;
    }  
if(!file.type.match("image/*"))
{
 $('#'+id).val('');
alert("Please Upload JPG/JPEG/PNG/GIF File");

 return;
}  
	var fileReader = new FileReader();
  fileReader.onloadend = function(e) {
    var arr = (new Uint8Array(e.target.result)).subarray(0, 4);
    var header = "";
    for (var i = 0; i < arr.length; i++) {
      header += arr[i].toString(16);
    }
	if(mimeType(header)==1){
	  $('#'+id).val('');
	alert("Please Upload JPG/JPEG/PNG/GIF File");
	
	}
  };
  fileReader.readAsArrayBuffer(file);
  readURL(input,id_show);
}else{

	   var file = input.files[0];
	   if (file.size >= 1024 * 1024 * 1024) {
	    $('#'+id).val('');
      alert("File size must be at most 2MB");
	  
      return;
    }  
 
	var fileReader = new FileReader();
  fileReader.onloadend = function(e) {
    var arr = (new Uint8Array(e.target.result)).subarray(0, 4);
    var header = "";
    for (var i = 0; i < arr.length; i++) {
      header += arr[i].toString(16);
    }
	if(mimeType(header)==1){
	 $('#'+id).val('');
	alert("Please Upload JPG/JPEG/PNG/GIF/PDF/DOC File");
	 
	}
  };
  fileReader.readAsArrayBuffer(file);
  readURL(input,id_show);
}

}
function mimeType(headerString) {
  switch (headerString) {
    case "89504e47":
      type = "image/png";
      break;
    case "47494638":
      type = "image/gif";
      break;
    case "ffd8ffe0":
    case "ffd8ffe1":
    case "ffd8ffe2":
      type = "image/jpeg";
      break;
	 case "25504446":
      type = "application/pdf";
      break;
	  case "d0cf11e0":
      type = "application/doc";
      break;
    default:
      type = "1";
      break;
  }
  return type;
}
    $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"student/student_admission_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
			// alert(detail);
			   // $("#p").html(detail);
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				  alert('Successfully Complete');
				  post_content('student/student_admission_list',res[1]);
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
	  <li><a href="javascript:get_content('student/student_admission_list')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student Admission List']; ?></a></li>
	  <li class="active"><?php echo $language['Student Admission']; ?></li>
      </ol>
    </section>

	
	<?php
	$student_roll_no=$_GET['student_roll_no'];
	$que="select * from student_admission_info where student_roll_no='$student_roll_no' and session_value='$session1'";
    $run=mysqli_query($conn37,$que);
    while($row=mysqli_fetch_assoc($run)){
    $student_name=$row['student_name'];
	$student_father_name=$row['student_father_name'];
	$student_mother_name=$row['student_mother_name'];
	$my_subject_name=$row['my_subject_name'];
	$course_code11=$row['course_code'];
	$subject_code11=$row['subject_code'];
	$student_date_of_birth=$row['student_date_of_birth'];
	$student_gender=$row['student_gender'];
	$student_religion=$row['student_religion'];
	$student_category=$row['student_category'];
	$student_rf_id_number=$row['student_rf_id_number'];
	$student_adhar_number=$row['student_adhar_number'];
	$student_registration_number=$row['student_registration_number'];
	$student_enrollment_number=$row['student_enrollment_number'];
	$student_bank_name=$row['student_bank_name'];
	$student_account_number=$row['student_account_number'];
	$student_bank_ifsc_code=$row['student_bank_ifsc_code'];
	$student_admission_type=$row['student_admission_type'];
	$student_date_of_admission=$row['student_date_of_admission'];
	$student_admission_number=$row['student_admission_number'];
	$student_father_contact_number=$row['student_father_contact_number'];
	$student_mother_contact_number=$row['student_mother_contact_number'];
	$student_contact_number=$row['student_contact_number'];
	$student_email_id=$row['student_email_id'];
	$student_admission_class=$row['student_admission_class'];
	$student_roll_no=$row['student_roll_no'];
	$student_address=$row['student_address'];
	$student_id_generate=$row['student_id_generate'];
	$student_facility=$row['student_facility'];	
	$student_bus=$row['student_bus'];	
	$student_hostel=$row['student_hostel'];	
	$student_library=$row['student_library'];	
	$student_admission_remark=$row['student_admission_remark'];	
	$student_sms_contact_number=$row['student_sms_contact_number'];	
	$student_web_sms=$row['student_web_sms'];	
	$student_hostel=$row['student_hostel'];	
	$student_library=$row['student_library'];
    $caste_certificate_no = $row['caste_certificate_no'];
	$student_bus_route = $row['student_bus_route'];
	$student_bus_no = $row['student_bus_no'];

	}

$que1="select * from student_documents where student_roll_no='$student_roll_no'";
$run1=mysqli_query($conn37,$que1);
if(mysqli_num_rows($run1)<1){
$query23423="insert into student_documents(student_roll_no) values('$student_roll_no')";
mysqli_query($conn37,$query23423);
}
while($row1=mysqli_fetch_assoc($run1)){
$student_image=$row1['student_image'];
$student_adhar_card_image=$row1['student_adhar_card_image'];
}
	
	?>
	
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
           
    <div class="box-body">
		<form name="myForm" method="post" enctype="multipart/form-data" action="" onsubmit="return validate();" id="my_form">
		
				
            <div class="box-body">
			<h3 style="color:#d9534f;"><b><?php echo $language['Personal Detail']; ?>:</b></h3>
			    <div class="col-md-3 ">
					<div class="form-group">
					  <label>Software Id</label>
					   <input type="text"  name="student_roll_no" value="<?php echo $student_roll_no; ?>" class="form-control" readonly>
					   <input type="hidden"  name="s_no" value="<?php echo $s_no; ?>" class="form-control" readonly>
					</div>
				</div>   	
			
				
				
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Student Registration Number<font style="color:red"><b>*</b></font></label>
						<input type="text"  name="student_registration_number" readonly id="student_registration_number" required  placeholder="Student Registration Number"  value="<?php echo $student_registration_number; ?>" class="form-control new_student">
					</div>
				</div> 				
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Student Name']; ?></label>
						   <input type="text"  name="student_name" value="<?php echo $student_name; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Student Contact Number']; ?></label>
						<input type="text" minlength="10" maxlength="10" name="student_contact_number" value="<?php echo $student_contact_number; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label><?php echo $language['Student Email Id']; ?></label>
						<input type="email"  name="student_email_id" value="<?php echo $student_email_id; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Father Name']; ?></label>
						   <input type="text"  name="student_father_name"   value="<?php echo $student_father_name; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Father Contact No']; ?></label>
						<input type="text" minlength="10" maxlength="10" name="student_father_contact_number"    value="<?php echo $student_father_contact_number; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Mother Name']; ?></label>
						<input type="text"  name="student_mother_name"   value="<?php echo $student_mother_name; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Mother Contact No']; ?></label>
						<input type="tel" minlength="10" maxlength="10" name="student_mother_contact_number"   value="<?php echo $student_mother_contact_number; ?>" class="form-control">
					</div>
				</div>			
	
				<div class="col-md-3">
					 <div class="form-group" >
					  <label ><?php echo $language['Gender']; ?></label><br>
						<div class="form-control">
							<input type="radio" name="student_gender" id="optionsRadios2" value="Male" <?php if($student_gender=='Male'){ echo 'checked'; } ?> >&nbsp;&nbsp;<b>Male</b>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="student_gender" id="optionsRadios2" value="Female" <?php if($student_gender=='Female'){ echo 'checked'; } ?> >&nbsp;&nbsp;<b>Female</b>
						</div>
				     </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label><?php echo $language['Student Address']; ?></label>
						<input type="text"  name="student_address"  id="student_address" value="<?php echo $student_address; ?>" class="form-control">
					</div>
				</div>			
				<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Religion']; ?></label>
					  <select class="form-control" name="student_religion">
					  <?php if($student_religion==null) { ?>
					  <option value="Hindu">Hindu</option>
					  <?php } else { ?>
					  <option value="<?php echo $student_religion; ?>"><?php echo $student_religion; ?></option>
					  <?php } ?>
					  <option value="Hindu">Hindu</option>
					  <option value="Muslim">Muslim</option>
					  <option value="Sikh">Sikh</option>
					  <option value="Christian">Christian</option>
					  <option value="Jain">Jain</option>
					  <option value="Buddh">Buddh</option>
					  <option value="Other">Other</option>
					  </select>
					</div>
				  </div>
				<div class="col-md-3">	
					<div class="form-group">
					  <label><?php echo $language['Category']; ?></label>
					  <select class="form-control" name="student_category" >
					  <?php if($student_category==null) { ?>
					  <option value="">Select Category</option>
					  <?php } else { ?>
					  <option value="<?php echo $student_category; ?>"><?php echo $student_category; ?></option>
					  <?php } ?>
					  <option value="General">General</option>
					  <option value="OBC">OBC</option>
					  <option value="SC">SC</option>
					  <option value="ST">ST</option>
					  <option value="Other">Other</option>
					  </select>
					</div>
				</div>	
				<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Add RF Id Number']; ?></label>
					  <input type="text"  name="student_rf_id_number"   value="<?php echo $student_rf_id_number; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Date Of Birth']; ?></label>
					  <input type="date"  name="student_date_of_birth" id="student_date_of_birth"   value="<?php echo $student_date_of_birth; ?>" oninput="get_dob_in_words(this.value);" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['SMS Contact Number']; ?></label>
						   <input type="text" minlength="10" maxlength="10" name="student_sms_contact_number"   value="<?php echo $student_sms_contact_number; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-3 ">
						<div class="form-group">
							<label><?php echo $language['SMS Facility']; ?></label>
							<select class="form-control" name="student_web_sms">
					        <option value="<?php echo $student_web_sms; ?>"><?php echo $student_web_sms; ?></option>
					        <option value="No">No</option>
					        <option value="Yes">Yes</option>
					        </select>
						</div>
				</div>				
				<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo $language['Aadhar Card (Student)']; ?></label>
						  <input type="text" minlength="12" maxlength="12" name="student_adhar_number" value="<?php echo $student_adhar_number; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label>Student Bank Name</label>
					  <input type="text"  name="student_bank_name" value="<?php echo $student_bank_name; ?>" class="form-control">
					</div>
				</div>	
				<div class="col-md-3">				
					 <div class="form-group" >
					  <label ><?php echo $language['Account Number (Student)']; ?></label>
					  <input type="number"  name="student_account_number"   value="<?php echo $student_account_number; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label >Course Name</label><br>
						<select name="course_code" id="course_code" class="form-control" onchange="for_subject();" required>
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option <?php if($coaching_info_courses_code==$course_code11){ echo 'selected'; } ?> value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					  <input type="hidden" name="my_subject_name" id="my_subject_name" value="<?php echo $my_subject_name; ?>" />
					  </div>
				</div>
				
				<div class="col-md-12">
				<div class="col-md-3" style="float:right;">
				<input type="checkbox" name="" id="subject" onclick="for_check(this.id);" class="" value="" /> <span style="color:red;">All Check / Uncheck</span>
				</div>
				</div>
				
<div class="col-md-12">
<div class="col-md-10 col-md-offset-1" style="height: 50px;border:1px solid;border-radius:20px;" id="subject_detail">
<?php
$strcount1=substr_count($my_subject_name,',');
if($strcount1>0){
$subject_count=$strcount1;
$my_subject_name1=explode(',',$my_subject_name);
}else{
$subject_count=0;
$my_subject_name1[]=$my_subject_name;
}
$query="select * from coaching_courses_subject where course_code='$course_code11'";
$result=mysqli_query($conn37,$query);
while($row=mysqli_fetch_assoc($result)){
$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
?>
<div class="col-md-3">
<input type="checkbox" name="" id="<?php echo $coaching_info_courses_subject_code; ?>" onclick="for_check1();" class="subject" value="<?php echo $coaching_info_courses_subject_code; ?>" <?php for($i=0;$i<=$subject_count;$i++){ if($my_subject_name1[$i]==$coaching_info_courses_subject_code){ echo 'checked'; } } ?> /> <?php echo $coaching_info_courses_subject_name; ?>
</div>
<?php } ?>
</div>
</div>
	
				
			</div>
		
				
		
				 <!---------------------------End Personal Details ----------------------------------------->

				<!---------------------------Start Admission Details -------------------------------------->
				
		 <div class="box-body">
			<h3 style="color:#d9534f;"><b><?php echo $language['Admission Details']; ?>:</b></h3>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Date Of Admission']; ?></label>
						<input type="date" name="student_date_of_admission"   value="<?php echo $student_date_of_admission; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Admission No']; ?></label>
						<input type="text"  name="student_admission_number"    value="<?php echo $student_admission_number; ?>" class="form-control">
				    </div>
			    </div>			
				<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Admission Remark']; ?></label>
					  <input type="text"  name="student_admission_remark"    value="<?php echo $student_admission_remark; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3">				
					<div class="form-group">
					  <label><?php echo $language['Hostel']; ?></label>
						<select class="form-control"  name="student_hostel">
					  <option value="<?php echo $student_hostel; ?>"><?php echo $student_hostel; ?></option>
					  <option value="No">No</option>
					  <option value="Yes">Yes</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo $language['Library']; ?></label>
					  <select class="form-control"  name="student_library">
					   <option value="<?php echo $student_library; ?>"><?php echo $student_library; ?></option>
					  <option value="No">No</option>
					  <option value="Yes">Yes</option>
					  </select>
					</div>
				</div>
			</div>
		<!---------------------------End Admission Details ----------------------------------------->
			<div class="box-body" id="fee_detail">
				
			</div>
				 <!---------------------------Start Document Upload ----------------------------------------->
		    <div class="box-body">
			    <h3 style="color:#d9534f;"><b><?php echo $language['Document Uploads']; ?>:</b></h3>
				<div class="col-md-2">	
					<div class="form-group" >
					  <label><?php echo $language['Student Photo']; ?></label>
					  <input type="file" id="student_image" name="student_image"  onchange="check_file_type(this,'student_image','show_student_photo','image');"  value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					 <img onclick="open_file1('student_image','<?php echo $student_roll_no; ?>');" src="<?php if($student_image!=''){ echo 'data:image;base64,'.$student_image; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" id="show_student_photo" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				<div class="col-md-2 ">	
					<div class="form-group" > 
					  <label>Adhar Card</label>
					  <input type="file"  id="student_adhar_card_image" name="student_adhar_card_image"  onchange="check_file_type(this,'student_adhar_card_image','show_adhar_photo','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group" >
					  <img onclick="open_file1('student_adhar_card_image','<?php echo $student_roll_no; ?>');" src="<?php if($student_adhar_card_image!=''){ echo 'data:image;base64,'.$student_adhar_card_image; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" id="show_adhar_photo" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				<div id="mypdf_view">
				</div>
				</br>
				</br>
				<div class="box-body col-md-12" >
			       <div class="col-md-6">
		            <input type="submit" style="float:right;" name="finish" value="<?php echo $language['Save & Change']; ?>" class="btn  my_background_color" />
		           </div>
			    </div>
			</div>
			</br></br>
              <!---------------------------End Document Upload ----------------------------------------->

    <!---------------------------------------------End Admission form------------------------->
		  <!-- /.box-body -->
         
		</form>	
	</div>
     </div>
    </div>
</section>

<script>
//for_check();
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>