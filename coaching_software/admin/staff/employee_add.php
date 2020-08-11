<?php include("../attachment/session.php")?>
<script>
function for_teaching(value){
if(value=='Teaching'){
$('#for_class_prefered').show();
$('#for_subject_prefered').show();
}else{
$('#for_class_prefered').hide();
$('#emp_class_preferred').val('');
$('#for_subject_prefered').hide();
$('#emp_subject_preferred').val('');
}
}

function check_mobile(mobile){
	var number=mobile.toString().length;
	if(number!=10){
	  alert("please enter valid number");
        $("#emp_mobile").focus();
        document.getElementById('emp_mobile').style.borderColor="red";
	}
}

function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var emp_name = document.getElementById("emp_name").value;
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
		$('#contact').val('Dear '+emp_name+', Congratulation You Have Become Part of our organisation.');
		 $('#send_sms').val('Yes');
    } else {
       text.style.display = "none";
	   $('#contact').val('');
	   $('#send_sms').val('No');
    }
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
	   if (file.size >= 5 * 1024 * 1024) {
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
	   if (file.size >= 5 * 1024 * 1024) {
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
    window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"staff/employee_add_api.php",
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
				   post_content('staff/subject_allotment','emp_id='+res[2]);
            }
			}
         });
      });
    
</script> 
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $language['Employee Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small></h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('staff/staff')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Employee']; ?></a></li>
	  <li class="active"><?php echo $language['Add Employee']; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">	
				<h3 class="box-title"><b>Employee Add</b></h3>
            </div>

    <div class="box-body">
	<form method="post" enctype="multipart/form-data" action="" id="my_form">
			 
		<div class="box-body">
		<div class="col-md-12"><h4 style="color:#d9534f;"><b><?php echo $language['Personal Detail']; ?>:</b></h4></div>
			<div class="col-md-3 ">
				<div class="form-group">
                    <label><?php echo $language['Employee Name']; ?><font style="color:red"><b>*</b></font></label>
                    <input type="text" required name="emp_name" id="emp_name" placeholder="<?php echo $language['Employee Name']; ?>" oninput="myFunction();"  value="" class="form-control">
                </div>
					
			</div>
			<div class="col-md-3 ">
				<div class="form-group">
                  <label><?php echo $language['Gender']; ?><font style="color:red"><b>*</b></font></label>
                   <select name="emp_gender" class="form-control" required="">
			          <option value="Male">Male</option>  
			          <option value="Female">Female</option>
			        </select>
				</div>
			</div>
			<div class="col-md-3 ">		
				<div class="form-group">
                    <label><?php echo $language['Date Of Birth']; ?><font style="color:red"><b>*</b></font></label>
                    <input type="date" name="emp_dob" placeholder="<?php echo $language['Date Of Birth']; ?>"  value="" class="form-control" required="">
                </div>
			</div>
			<div class="col-md-3 ">	
				<div class="form-group">
                    <label><?php echo $language['Husband Father Name']; ?><font style="color:red"><b>*</b></font></label>
                    <input type="text" name="emp_father" placeholder="<?php echo $language['Husband Father Name']; ?>"  value="" class="form-control" required="">
                </div>
			</div>
			<div class="col-md-3 ">				
				<div class="form-group">
                    <label><?php echo $language['Email Address']; ?> <font style="color:red"><b>*</b></font></label>
                    <input type="email" name="emp_email" placeholder="<?php echo $language['Email Address']; ?>"  value="" class="form-control" required>
                </div>
			</div>
			<div class="col-md-3 ">				
				<div class="form-group">
                    <label><?php echo $language['Mobile No']; ?> <font style="color:red"><b>*</b></font></label>
                    <input type="number" id="emp_mobile" required name="emp_mobile" placeholder="<?php echo $language['Mobile No']; ?>"  onchange="check_mobile(this.value)" value="" class="form-control" >
                </div>
			</div>	
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label><?php echo $language['Address']; ?></label>
                   <input type="text" name="emp_address" placeholder="<?php echo $language['Address']; ?>"  value="" class="form-control" >
                </div>
			</div>
			<div class="col-md-3 ">				
				<div class="form-group">
                    <label><?php echo $language['Employee Qualification']; ?><font style="color:red"><b>*</b></font></label>
                    <input type="text" name="emp_qualification" placeholder="<?php echo $language['Employee Qualification']; ?>"  value="" class="form-control" required="">
                </div>
			</div>
			
		</div>	
		<div class="box-body ">
		  <div class="col-md-12"><h4 style="color:#d9534f;"><b>Document Upload:</b></h4></div>

                <div class="col-md-2">	
					<div class="form-group" >
					  <label>Employee Photo</label>
					  <input type="file" id="emp_photo" name="emp_photo" placeholder="" onchange="check_file_type(this,'emp_photo','show_emp_photo','image');"  value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img id="show_emp_photo" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				<div class="col-md-2">	
					<div class="form-group" > 
					  <label>Experience Letter</label>
					  <input type="file"  id="emp_experience_latter" name="emp_experience_latter" placeholder="" onchange="check_file_type(this,'emp_experience_latter','show_emp_experience_latter','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					    <img id="show_emp_experience_latter" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				<div class="col-md-2">	
					<div class="form-group" > 
					  <label>Qualification Proof</label>
					  <input type="file"  id="emp_degree" name="emp_degree" placeholder="" onchange="check_file_type(this,'emp_degree','show_emp_degree','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					   <img id="show_emp_degree" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				<div class="col-md-2">	
					<div class="form-group">
					  <label>Id Proof</label>
					  <input type="file" id="emp_id_proof" name="emp_id_proof" placeholder=""  value="" onchange="check_file_type(this,'emp_id_proof','show_emp_id_proof','image');"class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group" >
					   <img id="show_emp_id_proof" src='<?php echo $coaching_software_path; ?>images/student_blank.png' width='60px' height='60px'>
					</div>
				</div>
				</div>

		  <div class="box-body">
		  <div class="col-md-12"><h4 style="color:#d9534f;"><b><?php echo $language['Document Details']; ?>:</b></h4></div>
			<div class="col-md-3">				
				<div class="form-group">
                    <label><?php echo $language['Date Of joining']; ?></label>
                    <input type="date" name="emp_doj" placeholder=""  value="<?php echo date('Y-m-d'); ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-3">				
				<div class="form-group">
                    <label><?php echo $language['Rfid No']; ?></label>
                    <input type="text" name="emp_rf_id_no" placeholder="<?php echo $language['Rfid No']; ?>"  value="" class="form-control">
                </div>
			</div>
			<div class="col-md-3 ">				
				<div class="form-group">
                  <label><?php echo $language['Categories']; ?></label>
                    <select name="emp_categories" class="form-control" onchange="for_teaching(this.value);">
			          <option value="Teaching"><?php echo $language['Teaching']; ?></option>  
			          <option value="Non Teaching"><?php echo $language['Non Teaching']; ?></option>
			        </select>
                </div>
			</div>

			<div class="col-md-3">				
				<div class="form-group">
                   <label><?php echo $language['Designation']; ?></label>
				      <input type="text" name="emp_designation" class="form-control" placeholder="Designation">
               </select>
                </div>
			</div>
		</div>
		
	<div class="box-body">
		<div class="col-md-12"><h4 style="color:#d9534f;"><b><?php echo $language['Salary Details']; ?>:</b></h4></div>
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label ><?php echo $language['Pan Card No']; ?></label>
                   <input type="text" name="emp_pan_card_no" placeholder="<?php echo $language['Pan Card No']; ?>"  value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                  <label ><?php echo $language['Aadhar No']; ?></label>
                  <input type="text"  name="emp_uid_no" placeholder="<?php echo $language['Aadhar No']; ?>"  value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                  <label ><?php echo $language['Bank Name']; ?> </label>
                  <input type="text" name="emp_bank_name" placeholder="<?php echo $language['Bank Name']; ?>"  value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                   <label ><?php echo $language['Bank Account No']; ?></label>
                   <input type="text" name="emp_account_no" placeholder="<?php echo $language['Bank Account No']; ?>"  value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                   <label ><?php echo $language['Bank Ifsc Code']; ?></label>
                   <input type="text" name="emp_ifsc_code" placeholder="<?php echo $language['Bank Ifsc Code']; ?>"  value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                   <label><?php echo $language['Salary']; ?> <font style="color:red"><b>*</b></font></label>
                   <input type="number" required name="emp_basic_salary" placeholder="<?php echo $language['Salary']; ?>"  min="0" value="" class="form-control">
                </div>
			</div>
			<div class="col-md-3">				
				<div class="form-group">
                   <label ><?php echo $language['Other Wages']; ?> </label>
                   <input type="number"  name="emp_other_wages" placeholder="<?php echo $language['Other Wages']; ?>"  min="0" value="" class="form-control">
                </div>
			</div>
			
			<div class="col-md-3">				
				<div class="form-group">
                   <label ><?php echo $language['Pf Number']; ?></label>
                   <input type="text" name="emp_pf_number" placeholder="<?php echo $language['Pf Number']; ?>"  value="" class="form-control">
                </div>
			</div>
			<div class="col-md-3">				
				<div class="form-group">
                   <label ><?php echo $language['Remark']; ?></label>
                   <input type="text" name="remarks" placeholder="<?php echo $language['Remark']; ?>"  value="" class="form-control">
                </div>
			</div>
		</div>
		<div class="box-body">
		<div class="col-md-12"><h4 style="color:#d9534f;"><b><?php echo $language['Leave Details']; ?>:</b></h4></div>
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label ><?php echo $language['Casual Leave']; ?></label>
                   <input type="number" name="emp_leave_cl" placeholder="<?php echo $language['Casual Leave']; ?>"  value="" class="form-control" min="0">
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                  <label ><?php echo $language['Pay Earn Leave']; ?></label>
                  <input type="number"  name="emp_leave_pl" min="0" placeholder="<?php echo $language['Pay Earn Leave']; ?>"  value="" class="form-control"   >
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                  <label ><?php echo $language['Sick Leave']; ?></label>
                  <input type="number" name="emp_leave_sl" placeholder="<?php echo $language['Sick Leave']; ?>"  value="" class="form-control" min="0">
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label ><?php echo $language['Other Leave']; ?></label>
                   <input type="number" name="emp_leave_other" placeholder="<?php echo $language['Other Leave']; ?>"  value="" class="form-control" min="0">
                </div>
			</div>
			
			
		</div>

<div class="box-body ">
		<div class="col-md-12"><h4 style="color:#d9534f;"><b><?php echo $language['Message Details']; ?>:</b></h4></div>
			<div class="col-md-3 ">				
				<div class="form-group">
                   &nbsp;
                </div>
			</div>
			
			<div class="col-md-6 ">				
				<div class="form-group">
					<label><input type="checkbox" name="myCheck" id="myCheck" onclick="myFunction();">&nbsp;&nbsp;&nbsp;<?php echo $language['Check For Message']; ?></label>
				    <div class="form-group" id="text" style="display:none">
					
					  <input type="text" name="sms" placeholder="" id="contact"  class="form-control">
					  <input type="hidden" name="send_sms" placeholder="" id="send_sms"  class="form-control">
					 
					</div>
                </div>
			</div>
			
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

    
 