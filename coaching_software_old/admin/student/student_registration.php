<?php include("../attachment/session.php"); 
$que11="select * from login";
       $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
       while($row11=mysqli_fetch_assoc($run11)){
	   $student_id_generate=$row11['student_id_generate']; 
	   }
  ?>

   <section class="content-header">
      <h1>
        <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
		 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['Student Registration']; ?></li>
      </ol>
    </section>
	  

<script>
function for_stream(value2){
		   if(value2=="11TH" || value2=="12TH"){
$("#student_class_stream_div").show();
$("#student_class_group_div").show();
$("#student_class_group_subject_div").show();
$("#student_class_stream").attr('required',true);
$("#student_class_group").attr('required',true);
}else{
$("#student_class_stream_div").hide();
$("#student_class_group_div").hide();
$("#student_class_group_subject_div").hide();
$("#student_class_stream").attr('required',false);
$("#student_class_group").attr('required',false);
}
}

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

	function sms_contact(value1){
       
$('#student_sms_contact_number').val(value1);
    }
	  function get_group_subject(){
     var  group_name=document.getElementById('student_class_group').value;
     var  stream_name=document.getElementById('student_class_stream').value;
       $.ajax({
			  type: "POST",
              url:  access_link+"student/ajax_stream_group_subject.php?stream_name="+stream_name+"&group_name="+group_name+"",
              cache: false,
              success: function(detail1){
					var str1 =detail1;                
                  $("#student_class_group_subject").val(str1);
			   }
           });
    }
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var student_name = document.getElementById("student_name").value;
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
		$('#contact').val('Dear '+student_name+',Your Registration Have Completed Successfully . Thanking You');
		 $('#send_sms').val('Yes');
    } else {
       text.style.display = "none";
	   $('#contact').val('');
	   $('#send_sms').val('No');
    }
}



$("#my_form").submit(function(e){
e.preventDefault();

 var formdata = new FormData(this);
	window.scrollTo(0, 0);
     $("#get_content").html(loader_div);
        $.ajax({
            url: access_link+"student/student_registration_api.php",
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
				   get_content('student/student_registration_list');
            }
			}
         });
      });

</script>	
<?php
$query="select * from login";
$run=mysqli_query($conn37,$query);
while($row=mysqli_fetch_assoc($run)){
$registration_id=$row['registration_id'];	
}
?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
		    <div class="box-header with-border ">
            <h3 class="box-title">Student Registration</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
		  <form name="myForm" method="post" id="my_form" enctype="multipart/form-data" action="" onsubmit="return validate();">	
    <div class="box-body">
		

			    <div class="col-md-3">
					<div class="form-group">
						<label>Student Registration Number<font style="color:red"><b>*</b></font></label>
						<input type="text"  name="student_registration_number" id="student_registration_number" placeholder="Student Registration Number" readonly value="<?php echo $registration_id; ?>" class="form-control new_student">
					</div>
				</div>   
				<div class="col-md-3">
					<div class="form-group">
						<input type="hidden" name="student_id_generate" id="student_id_generate" value="<?php echo $student_id_generate; ?>" class="form-control ">
						<label>Student Name<font style="color:red"><b>*</b></font></label>
						<input type="text"  name="student_name" id="student_name" required  placeholder="Student Name"  value="" class="form-control new_student">
					</div>
				</div>
				<div class="col-md-3">		
					<div class="form-group">
						<label>Student Contact<font style="color:red"><b>*</b></font></label>
						<input type="tel" minlength="10" maxlength="10" name="student_contact_number" placeholder="Student Contact" oninput="sms_contact(this.value);" value="" id="student_father_contact_number" class="form-control new_student">
					</div>
				</div>
				<div class="col-md-3">		
					<div class="form-group">
						<label>Student Email ID<font style="color:red"><b>*</b></font></label>
						<input type="email" name="student_email_id" placeholder="Email ID" value="" class="form-control new_student">
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo $language['Father Name']; ?></label>
						<input type="text"  name="student_father_name" id="p" placeholder="<?php echo $language['Father Name']; ?>"  value="" class="form-control new_student">
					</div>
			    </div>
		
		
				<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Date Of Birth']; ?><font style="color:red"><b>*</b></font></label>
					  <input type="date"  name="student_date_of_birth" value="" class="form-control new_student" required>
					</div>
				</div>
				<div class="col-md-3">				
					<div class="form-group" >
					  <label ><?php echo $language['Gender']; ?></label><br>
                      <select class="form-control new_student" name="student_gender" id="student_gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					  </select>
					
					</div>
				</div>
				<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Date Of Admission']; ?></label>
					  <input type="date"  name="student_date_of_admission" placeholder=""  value="<?php echo date('Y-m-d') ?>" class="form-control">
					</div>
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<label>Address/City/State</label>
						<input type="text"  name="student_address"  id="student_address"  placeholder="Address/City/State"  value="" class="form-control">
					</div>
				</div>
				<div class="col-md-2">	
					<div class="form-group">
					  <label><?php echo $language['Student Photo']; ?></label>
					  <input type="file" name="student_image" id="student_image" placeholder="" onchange="check_file_type(this,'student_image','show_student_photo','image');" class="form-control" accept=".gif, .jpg, .jpeg, .png" value="">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					   <img id="show_student_photo" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
								<div class="col-md-3 ">				
					<div class="form-group">
					  <label>Course<font style="color:red"><b>*</b></font></label>
					 	<select name="course_code" id="course_code" class="form-control" onchange="for_subject();" required>
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
					  <input type="hidden" name="my_subject_name" id="my_subject_name" />
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
				$query="select * from coaching_courses_subject";
				$result=mysqli_query($conn37,$query);
				while($row=mysqli_fetch_assoc($result)){
				$coaching_info_courses_subject_name = $row['coaching_info_courses_subject_name'];
				$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
				?>
				<div class="col-md-3">
				<input type="checkbox" name="" id="<?php echo $coaching_info_courses_subject_code; ?>" onclick="for_check1();" class="subject" value="<?php echo $coaching_info_courses_subject_code; ?>" /> <?php echo $coaching_info_courses_subject_name; ?>
				</div>
				<?php } ?>
				</div>
				</div>				
				
				
				<div class="col-md-12">
					<div class="col-md-8">	
						<label><input type="checkbox" name="myCheck" id="myCheck"  onclick="myFunction()">&nbsp;&nbsp;&nbsp;<?php echo $language['Check For Message']; ?></label>
						<div class="form-group" id="text" style="display:none">
					  <input type="text" name="sms" placeholder="" id="contact"  class="form-control">
					  <input type="hidden" name="send_sms" placeholder="" id="send_sms"  class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
				<center><input type="submit" name="finish" onclick="return valid();" value="<?php echo $language['Submit']; ?>" class="btn my_background_color" /></center>
				</div>
				
		
	</div>
</form>
          </div>
    </div>
</section>

<script>
  $(function () {
    $('.select2').select2()
  })
</script>