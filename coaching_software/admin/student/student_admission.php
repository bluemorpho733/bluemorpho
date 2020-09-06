<?php include("../attachment/session.php"); 
$que11="select * from login";
       $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
       while($row11=mysqli_fetch_assoc($run11)){
	   $student_id_generate=$row11['student_id_generate']; 
	   }
  ?>

   <section class="content-header">
      <h1>
        <?php echo 'Student Management'; ?>
        <small><?php echo 'Control Panel'; ?></small>
      </h1>
      <ol class="breadcrumb">
		 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo 'Student'; ?></a></li>
	  <li class="active"><?php echo 'Student Registration'; ?></li>
      </ol>
    </section>
	  

<script>

function get_dob_in_words(dob1){
       $.ajax({
			  type: "POST",
              url: access_link+"student/ajax_datetoword.php?dob="+dob1+"",
              cache: false,
              success: function(detail){
                  
				  document.getElementById('student_date_of_birth_in_word1').value=detail;
              }
           });

    }
























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

// function valid(){
// var month=0;
// $('.subject').each(function() {
// if($(this).prop('checked')==true){
// month = Number(parseInt(month)+1);
// }
// });
// if (month>0) {
// 	return true;
// }else{
// 	alert("Please Select Atleast One Subject !!!");
// 	return false;
// }
// }

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
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('student/student_registration_list');
            }
			}
         });
      });

</script>	



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

	<?php
	$s_no=$_GET['s_no'];	
	$que="select * from registration_details where s_no='$s_no' and student_status=' ' and session_value='$session1'";
		$run=mysqli_query($conn37,$que);
		while($row=mysqli_fetch_assoc($run)){
		$student_registration_number=$row['student_registration_number'];
		$stuent_old_or_new=$row['stuent_old_or_new'];
		$class_code=$row['class_code'];
		$my_subject_name=$row['my_subject_name'];
		$student_name=$row['student_name'];
		$student_father_name=$row['student_father_name'];
		$student_mother_name=$row['student_mother_name'];
		$student_father_contact_number=$row['student_father_contact_number'];
		$student_father_contact_number2=$row['student_father_contact_number2'];
		$student_date_of_birth=$row['student_date_of_birth'];
		$student_date_of_birth_in_word=$row['student_date_of_birth_in_word'];
		$student_gender=$row['student_gender'];
		$student_date_of_admission=$row['student_date_of_admission'];
		$student_admission_type=$row['student_admission_type'];
		$student_admission_scheme=$row['student_admission_scheme'];
		$student_fee_category=$row['student_fee_category'];
		$student_bus=$row['student_bus'];
		$student_hostel=$row['student_hostel'];
		$student_library=$row['student_library'];
		$student_registration_fee=$row['student_registration_fee'];
		$student_sms_contact_number=$row['student_sms_contact_number'];
		$student_adress=$row['student_adress'];
		$student_city=$row['student_city'];
		$student_block=$row['student_block'];
		$student_district=$row['student_district'];
		$student_state=$row['student_state'];
		$student_pincode=$row['student_pincode'];
		$student_landmark=$row['student_landmark'];

		$student_status=$row['student_status'];
		$session_value=$row['session_value'];
		$registration_final=$row['registration_final'];
		$update_change=$row['update_change'];
		$updated_by=$row['updated_by'];
		$updated_date=$row['updated_date'];
		$last_updated_date=$row['last_updated_date'];
		}
                ?>

			    <div class="col-md-3">
					<div class="form-group">
						<label>Student Registration Number<font style="color:red"><b>*</b></font></label>
						<input type="text"  name="student_registration_number" id="student_registration_number" placeholder="Student Registration Number" readonly value="<?php echo $student_registration_number; ?>" class="form-control new_student">
					</div>
				</div>   


				<div class="col-md-3">				
					<div class="form-group">
					  <label>Student Old New</label>
					  <select class="form-control" name="stuent_old_or_new">
					  <option <?php if($stuent_old_or_new=='New'){ echo 'selected'; } ?> value="New"><?php echo "New"; ?></option>
					  <option <?php if($stuent_old_or_new=='Old'){ echo 'selected'; } ?> value="Old"><?php echo "Old"; ?></option>
					  </select>
					</div>
				</div>





				
				<div class="col-md-3 ">				
					<div class="form-group">
					  <label>Class<font style="color:red"><b>*</b></font></label>
					 	<select name="class_code" id="class_code" class="form-control" onchange="" required>
							<option value="">Select</option>





						<?php
						$que="select * from coaching_courses";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$school_info_class_name = $row['school_info_class_name'];
						$school_info_class_code = $row['school_info_class_code'];
						?>



					  <option <?php if($class_code==$school_info_class_code){ echo 'selected'; } ?> value="<?php echo $school_info_class_code;?>"><?php echo $school_info_class_name;?></option>
					  <?php } ?>
					  </select>
					  <input type="hidden" name="my_subject_name" id="my_subject_name" />
					</div>
				</div>
				


	


















				<div class="col-md-3 ">
						<div class="form-group">
						  <input type="hidden" name="student_id_generate" id="student_id_generate" value="<?php echo $student_id_generate; ?>" class="form-control ">
						  <label><?php echo "Student Name"; ?><font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="student_name" id="student_name" value="<?php echo $student_name; ?>" required  placeholder="<?php echo "Student Name"; ?>"  value="" class="form-control new_student">
						</div>
				</div>









				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo 'Father Name'; ?></label>
						<input type="text"  name="student_father_name" id="p" value="<?php echo $student_father_name; ?>" placeholder="<?php echo 'Father Name'; ?>"  value="" class="form-control new_student">
					</div>
			    </div>


					
				<div class="col-md-3 ">
					<div class="form-group">
						<label><?php echo 'Mother Name'; ?></label>
						<input type="text"  name="student_mother_name" id="p" value="<?php echo $student_mother_name; ?>" placeholder="<?php echo 'Mother Name'; ?>"  value="" class="form-control new_student">
					</div>
			    </div>


				<div class="col-md-3">		
						<div class="form-group">
						  <label><?php echo "Father Contact No1"; ?><font style="color:red"><b>*</b></font></label>
						   <input type="number" minlength="10" maxlength="10" value="<?php echo $student_father_contact_number; ?>" name="student_father_contact_number" placeholder="<?php echo "Father Contact No1"; ?>" oninput="sms_contact(this.value);" value="" id="student_father_contact_number" class="form-control new_student">
						</div>
				</div>


				<div class="col-md-3">		
						<div class="form-group">
						  <label><?php echo "Father Contact No2"; ?></label>
				<input type="number" minlength="10" maxlength="10" value="<?php echo $student_father_contact_number2; ?>" name="student_father_contact_number2" placeholder="<?php echo "Father Contact No2"; ?>"  value="" id="student_father_contact_number2" class="form-control new_student" >
						</div>
				</div>


				<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo "Date Of Birth"; ?><font style="color:red"><b>*</b></font></label>
					  <input type="date"  name="student_date_of_birth" placeholder="" value="<?php echo $student_date_of_birth; ?>" oninput="get_dob_in_words(this.value);" id="student_date_of_birth" class="form-control new_student" required>	
					</div>
				</div>
				
				

				<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Dob In Word"; ?></label>
						   <input type="text"  id="student_date_of_birth_in_word1" value="<?php echo $student_date_of_birth_in_word; ?>" name="student_date_of_birth_in_word" class="form-control" placeholder="<?php echo "Dob In Word"; ?>" readonly >
				        </div>
				</div>


				
				<div class="col-md-3">				
					<div class="form-group" >
					  <label ><?php echo 'Gender'; ?></label><br>
                      <select class="form-control new_student" name="student_gender" id="student_gender">
						<option <?php if($student_gender=='Male'){ echo 'selected'; } ?> value="Male">Male</option>
						<option <?php if($student_gender=='Female'){ echo 'selected'; } ?> value="Female">Female</option>
						<option <?php if($student_gender=='Other'){ echo 'selected'; } ?> value="Other">Other</option>
					  </select>
					
					</div>
				</div>


				
				<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo 'Date Of Admission'; ?></label>
					  <input type="date"  name="student_date_of_admission" placeholder=""  value="<?php echo $student_date_of_admission; ?>" class="form-control">
					</div>
				</div>	


				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label><?php echo "Admission Type"; ?></label>
					  <select class="form-control" name="student_admission_type" id="student_admission_type">
					  <option <?php if($student_admission_type=='Regular'){ echo 'selected'; } ?> value="Regular">Regular</option>
					  <option <?php if($student_admission_type=='Private'){ echo 'selected'; } ?> value="Private">Private</option>
					  </select>
					</div>
				 </div>


				


				 <div class="col-md-3">				
					<div class="form-group">
					  <label><?php echo "Admission Scheme"; ?></label>
					  <select class="form-control" name="student_admission_scheme">
					  <option <?php if($student_admission_scheme=='NON-RTE'){ echo 'selected'; } ?> value="NON-RTE">NON-RTE</option>
					  <option <?php if($student_admission_scheme=='RTE'){ echo 'selected'; } ?> value="RTE">RTE</option>
					  </select>
					</div>
				</div>




				<div class="col-md-3">				
					<div class="form-group" >
					  <label>Fee Category</label>
					  <select class="form-control" name="student_fee_category">
                    <?php
                    $que1="select * from school_info_fee_category where category_name!=''";
                    $run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
                    while($row1=mysqli_fetch_assoc($run1)){
                    $category_name = $row1['category_name'];
	                $category_name_hindi = $row1['category_name_hindi'];
	                $category_code = $row1['category_code'];
                    ?>
					  <option value="<?php echo $category_name.'|?|'.$category_code; ?>"><?php echo $category_name; ?></option>
					<?php } ?>
					  </select>
					  </div>
				</div>
					



				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo "Bus"; ?></label>
					  <select class="form-control"  name="student_bus">
					    <option value="No">No</option>
					  <option value="Yes">Yes</option>
					  </select>
					  </div>
				</div>



				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo "Hostel"; ?></label>
					 <select class="form-control"  name="student_hostel">
					    <option value="No">No</option>
					  <option value="Yes">Yes</option>
					  </select>
					  </div>
				</div>



				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo "Library"; ?></label>
					  <select class="form-control"  name="student_library">
					    <option value="No">No</option>
					  <option value="Yes">Yes</option>
					  </select>
					  </div>
				</div>



	
				<!-- <?php
				$que011="select fees_type from school_info_general";
			    $run011=mysqli_query($conn37,$que011);
			    while($row011=mysqli_fetch_assoc($run011)){
			    $fees_type=$row011['fees_type'];
				}
				?> -->
				
				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo "Registration Fees"; ?></label>
					  <input type="text"  name="student_registration_fee" placeholder="<?php echo "Registration Fees"; ?>"  value="" class="form-control">
					</div>
				</div>


				<div class="col-md-3">				
					<div class="form-group" >
					  <label><?php echo "Sms Contact No"; ?></label>
					  <input type="text"  name="student_sms_contact_number" id="student_sms_contact_number" placeholder="<?php echo "Sms Contact No"; ?>"  value="" class="form-control">
					</div>
				</div>









<div class="col-md-12">
				<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Student Address"; ?></label>
						   <input type="text"  name="student_adress"  id="student_adress"    value="<?php echo "student adress"; ?>" class="form-control">
						</div>
				</div>
							<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Village/City"; ?></label>
						   <input type="text"  name="student_city"  id="student_city"    value="<?php echo "student city"; ?>" class="form-control">
						</div>
				</div>
							<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Block"; ?></label>
						   <input type="text"  name="student_block"  id="student_block"    value="<?php echo "student block"; ?>" class="form-control">
						</div>
				</div>
							<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "District"; ?></label>
						   <input type="text"  name="student_district"  id="student_district"    value="<?php echo "student district"; ?>" class="form-control">
						</div>
				</div>
							<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "State"; ?></label>
						   <input type="text"  name="student_state"  id="student_state"    value="<?php echo "student state"; ?>" class="form-control">
						
						</div>
				</div>
							<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Pincode"; ?></label>
						   <input type="text"  name="student_pincode"  id="student_pincode"    value="<?php echo "student pincode"; ?>" class="form-control">
						</div>
				</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label><?php echo "Landmark"; ?></label>
						   <input type="text"  name="student_landmark"  id="student_landmark"    value="<?php echo "student landmark"; ?>" class="form-control">
						</div>
				</div>
				</div>














				<div class="col-md-12 ">
				<div class="col-md-3">	
					<div class="form-group">
					  <label><?php echo "Student Photo"; ?></label>
					  <input type="file" name="student_photo" id="student_photo" placeholder="" onchange="check_file_type(this,'student_photo','show_student_photo','image');" class="form-control" accept=".gif, .jpg, .jpeg, .png" value="">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					   <img id="show_student_photo" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				<div class="col-md-3">	
					<div class="form-group">
					  <label>Father Photo</label>
					  <input type="file" name="father_photo" id="father_photo" placeholder="" onchange="check_file_type(this,'father_photo','show_father_photo','image');"class="form-control" accept=".gif, .jpg, .jpeg, .png" value="">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					   <img id="show_father_photo" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
					<div class="col-md-3">	
					<div class="form-group">
					  <label>Mother Photo</label>
					  <input type="file" name="mother_photo" id="mother_photo" placeholder="" onchange="check_file_type(this,'mother_photo','show_mother_photo','image');"class="form-control" accept=".gif, .jpg, .jpeg, .png" value="">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					   <img id="show_mother_photo" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				</div>





				
				<div class="col-md-12 ">
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo "Remark 1"; ?></label>
						   <input type="text"  name="student_remark_1" placeholder="<?php echo "Remark 1"; ?>"  value="" class="form-control">
						</div>
			    </div>
				<div class="col-md-3 ">
					<div class="form-group">
					  <label><?php echo "Remark 2"; ?></label>
					   <input type="text"  name="student_remark_2" placeholder="<?php echo "Remark 2"; ?>"  value="" class="form-control">
					</div>
			    </div>
							<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo "Remark 3"; ?></label>
						   <input type="text"  name="student_remark_3" placeholder="<?php echo "Remark 3"; ?>"  value="" class="form-control">
						</div>
			    </div>
							<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo "Remark 4"; ?></label>
						   <input type="text"  name="student_remark_4" placeholder="<?php echo "Remark 4"; ?>"  value="" class="form-control">
						</div>
			    </div>
				</div>





				
				<div class="col-md-12 ">
						<div class="col-md-8 ">	
				<label><input type="checkbox" name="myCheck" id="myCheck"  onclick="myFunction()">&nbsp;&nbsp;&nbsp;<?php echo "Check For Message"; ?></label>
				   <div class="form-group" id="text" style="display:none">
					  <input type="text"   name="sms" placeholder="" id="contact"  class="form-control">
					  <input type="hidden"   name="send_sms" placeholder="" id="send_sms"  class="form-control">
					 
					</div>
				</div>
				</div>









				<div class="col-md-12">
				<center><input type="submit" name="finish" value="<?php echo 'Submit'; ?>" class="btn my_background_color" /></center>
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