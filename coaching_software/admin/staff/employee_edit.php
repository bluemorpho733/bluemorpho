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
function open_file1(image_type,emp_id){
	$.ajax({
	address: "POST",
	url: access_link+"staff/ajax_open_image.php?image_type="+image_type+"&emp_id="+emp_id+"",
	cache: false,
	success: function(detail){
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
window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"staff/employee_edit_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
				//alert(detail);
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   post_content('staff/employee_list',res[2]);
            }
			}
         });
      });
</script> 
<?php
$s_no=$_GET['s_no'];
$que="select * from employee_info where s_no='$s_no'";
$run=mysqli_query($conn37,$que);
$serial_no=0;
while($row=mysqli_fetch_assoc($run)){
    
	$emp_name = $row['emp_name'];
	$emp_gender = $row['emp_gender'];
	$emp_dob = $row['emp_dob'];
	$emp_father = $row['emp_father'];
	$emp_email = $row['emp_email'];
	$emp_mobile = $row['emp_mobile'];
	$emp_address = $row['emp_address'];
	$emp_qualification = $row['emp_qualification'];
	$emp_doj = $row['emp_doj'];
	$emp_categories = $row['emp_categories'];
	// $emp_class_preferred = $row['emp_class_preferred'];
	// $emp_subject_preferred = $row['emp_subject_preferred'];
	$emp_designation = $row['emp_designation'];
	$emp_casual_leave = $row['emp_casual_leave'];
	$emp_pan_card_no = $row['emp_pan_card_no'];
	$emp_bank_name = $row['emp_bank_name'];
	$emp_account_no = $row['emp_account_no'];
	$emp_ifsc_code = $row['emp_ifsc_code'];
	$emp_basic_salary = $row['emp_basic_salary'];
	$emp_pf_number = $row['emp_pf_number'];
    $emp_uid_no = $row['emp_uid_no'];
    $emp_id = $row['emp_id'];
	$remarks = $row['remarks'];
	$emp_rf_id_no = $row['emp_rf_id_no'];
	$emp_leave_cl=$row['emp_leave_cl'];
	$emp_leave_pl=$row['emp_leave_pl'];
	$emp_leave_sl=$row['emp_leave_sl'];
	$emp_other_wages=$row['emp_other_wages'];
	$emp_leave_other=$row['emp_leave_other'];
	

	
}	

	$que1="select * from employee_document where emp_id='$emp_id'";
    $run1=mysqli_query($conn37,$que1);
	if(mysqli_num_rows($run1)<1){
	$query23423="insert into employee_document(emp_id) values('$emp_id')";
   mysqli_query($conn37,$query23423);
}
    while($row1=mysqli_fetch_assoc($run1)){
$emp_photo = $row1['emp_photo'];
$emp_experience_latter = $row1['emp_experience_latter'];
$emp_degree = $row1['emp_degree'];
$emp_id_proof = $row1['emp_id_proof'];
$emp_other_document1 = $row1['emp_other_document1'];
$emp_other_document2 = $row1['emp_other_document2'];

	}
?>
  

    <section class="content-header">
       <h1><?php echo $language['Employee Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small></h1>
      <ol class="breadcrumb">
		 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('staff/staff')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Employee']; ?></a></li>
	 <li><a href="javascript:get_content('staff/employee_list')"><i class="fa fa-male"></i><?php echo $language['Employee List']; ?></a></li>
	 <li class="active"><?php echo $language['Edit Employee']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
    <div class="box-body">
	<form method="post" enctype="multipart/form-data" action="" id="my_form">
			  <input type="hidden" name="s_no"   value="<?php echo $s_no; ?>" class="form-control">
			  <input type="hidden" name="emp_id"   value="<?php echo $emp_id; ?>" class="form-control">
		<div class="box-body ">
		<h3 style="color:#d9534f;"><b><?php echo $language['Personal Detail']; ?>:</b></h3>
			<div class="col-md-4 ">
				<div class="form-group">
                    <label><?php echo $language['Employee Name']; ?></label>
                    <input type="text" name="emp_name" placeholder="<?php echo $language['Employee Name']; ?>"  value="<?php echo $emp_name; ?>" class="form-control">
                </div>	
			</div>
			<div class="col-md-4 ">
				<div class="form-group">
                  <label><?php echo $language['Gender']; ?></label>
                   <select name="emp_gender" class="form-control">
				      <option value="<?php echo $emp_gender; ?>"><?php echo $emp_gender; ?></option>  
			          <option value="Male">Male</option>  
			          <option value="Female">Female</option>
			        </select>
				</div>
			</div>
			<div class="col-md-4 ">		
				<div class="form-group">
                    <label><?php echo $language['Date Of Birth']; ?></label>
                    <input type="date" name="emp_dob" placeholder="<?php echo $language['Date Of Birth']; ?>"  value="<?php echo $emp_dob; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">	
				<div class="form-group">
                    <label><?php echo $language['Husband Father Name']; ?></label>
                    <input type="text" name="emp_father" placeholder="<?php echo $language['Husband Father Name']; ?>"  value="<?php echo $emp_father; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                    <label><?php echo $language['Email Address']; ?> </label>
                    <input type="email" name="emp_email" placeholder="<?php echo $language['Email Address']; ?>"  value="<?php echo $emp_email; ?>" class="form-control" required>
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                    <label><?php echo $language['Mobile No']; ?></label>
                    <input type="text" name="emp_mobile" placeholder="<?php echo $language['Mobile No']; ?>"  value="<?php echo $emp_mobile; ?>" class="form-control">
                </div>
			</div>	
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label><?php echo $language['Address']; ?></label>
                   <input type="text" name="emp_address" placeholder="<?php echo $language['Address']; ?>"  value="<?php echo $emp_address; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                    <label><?php echo $language['Employee Qualification']; ?></label>
                    <input type="text" name="emp_qualification" placeholder="<?php echo $language['Employee Qualification']; ?>"  value="<?php echo $emp_qualification; ?>" class="form-control">
                </div>
			</div>
	
		</div>	
			<div class="box-body ">
		  <h3 style="color:#d9534f;"><b><?php echo $language['Document Details']; ?>:</b></h3>

                     <div class="col-md-2">	
					<div class="form-group" >
					  <label>Employee Photo</label>
					  <input type="file" id="emp_photo" name="emp_photo" placeholder="" onchange="check_file_type(this,'emp_photo','show_emp_photo','image');"  value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					 <img onclick="open_file1('emp_photo','<?php echo $emp_id; ?>');" src="<?php if($emp_photo!=''){ echo 'data:image;base64,'.$emp_photo; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_photo" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				<div class="col-md-2 ">	
					<div class="form-group" > 
					  <label>Experience Letter</label>
					  <input type="file"  id="emp_experience_latter" name="emp_experience_latter" placeholder="" onchange="check_file_type(this,'emp_experience_latter','show_emp_experience_latter','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img onclick="open_file1('emp_experience_latter','<?php echo $emp_id; ?>');" src="<?php if($emp_experience_latter!=''){ echo 'data:image;base64,'.$emp_experience_latter; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_experience_latter" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				<div class="col-md-2 ">	
					<div class="form-group" > 
					  <label>Qualification Proof</label>
					  <input type="file"  id="emp_degree" name="emp_degree" placeholder="" onchange="check_file_type(this,'emp_degree','show_emp_degree','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img onclick="open_file1('emp_degree','<?php echo $emp_id; ?>');" src="<?php if($emp_degree!=''){ echo 'data:image;base64,'.$emp_degree; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_degree" height="50" width="50" style="margin-top:10px;">
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
					  <img onclick="open_file1('emp_id_proof','<?php echo $emp_id; ?>');" src="<?php if($emp_id_proof!=''){ echo 'data:image;base64,'.$emp_id_proof; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_id_proof" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
<!-- 			    <div class="col-md-2 ">
						<div class="form-group">
						  <label>Other Document 1</label>
						   <input type="file" id="emp_other_document1" name="emp_other_document1" onchange="check_file_type(this,'emp_other_document1','show_emp_other_document1','all');" placeholder=""  value="" class="form-control" accept=".gif, .jpg, .jpeg, .png" >
						</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group" >
					  <img onclick="open_file1('emp_other_document1','<?php echo $emp_id; ?>');" src="<?php if($emp_other_document1!=''){ echo 'data:image;base64,'.$emp_other_document1; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_other_document1" height="50" width="50" style="margin-top:10px;">
					</div>
				</div> -->
<!-- 				<div class="col-md-2 ">
						<div class="form-group">
						  <label>Other Document 2</label>
						   <input type="file"  id="emp_other_document2" name="emp_other_document2"  placeholder="" onchange="check_file_type(this,'emp_other_document2','show_emp_other_document2','all');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png" >
						</div>
				</div>
			<div class="col-md-1">	
					<div class="form-group" >
					  <img onclick="open_file1('emp_other_document2','<?php echo $emp_id; ?>');" src="<?php if($emp_other_document2!=''){ echo 'data:image;base64,'.$emp_other_document2; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" id="show_emp_other_document2" height="50" width="50" style="margin-top:10px;">
					</div>
				</div> -->
				</div>
		<div class="box-body ">
		  <h3 style="color:#d9534f;"><b><?php echo $language['Document Details']; ?>:</b></h3>
			<div class="col-md-4 ">				
				<div class="form-group">
                    <label><?php echo $language['Date Of joining']; ?></label>
                    <input type="date" name="emp_doj" placeholder=""  value="<?php echo $emp_doj; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                    <label><?php echo $language['Rfid No']; ?></label>
                    <input type="text" name="emp_rf_id_no" placeholder="<?php echo $language['Rfid No']; ?>"  value="<?php echo $emp_rf_id_no; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                  <label><?php echo $language['Categories']; ?></label>
                    <select name="emp_categories" class="form-control" onchange="for_teaching(this.value);">
			          <option value="<?php echo $emp_categories; ?>"><?php echo $emp_categories; ?></option>
                      <option value="Teaching"><?php echo $language['Teaching']; ?></option>					  
			          <option value="Non Teaching"><?php echo $language['Non Teaching']; ?></option>
			        </select>
                </div>
			</div>
			
<!-- 			<div class="col-md-4 " id="for_class_prefered">				
				<div class="form-group">
                  <label><?php echo $language['Teaching Class Preferred']; ?></label>
                   <input type="text" name="emp_class_preferred" id="emp_class_preferred" placeholder="<?php echo $language['Teaching Class Preferred']; ?>"  value="<?php echo $emp_class_preferred; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 " id="for_subject_prefered">				
				<div class="form-group">
                  <label><?php echo $language['Teaching Subject Preferred']; ?></label>
                   <input type="text" name="emp_subject_preferred" id="emp_subject_preferred" placeholder="<?php echo $language['Teaching Subject Preferred']; ?>"  value="<?php echo $emp_subject_preferred; ?>" class="form-control">
                </div>
			</div> -->

			<div class="col-md-4">				
				<div class="form-group">
                   <label><?php echo $language['Designation']; ?></label>
				      <select name="emp_designation" class="form-control" >
			          <option value="">Select</option>  
			          <option value="Teacher" <?php if($emp_designation=='Teacher'){ echo 'selected'; }  ?> >Teacher</option>  
			          <option value="Peon" <?php if($emp_designation=='Peon'){ echo 'selected'; }  ?>>Peon</option>  
			          <option value="Accountant"  <?php if($emp_designation=='Accountant'){ echo 'selected'; }  ?>>Accountant</option>  
			          <option value="Librarian" <?php if($emp_designation=='Librarian'){ echo 'selected'; }  ?>>Librarian</option>  
			          <option value="Driver" <?php if($emp_designation=='Driver'){ echo 'selected'; }  ?>>Driver</option>  
			          <option value="Principle" <?php if($emp_designation=='Principle'){ echo 'selected'; }  ?>>Principle</option>  
			          <option value="Director" <?php if($emp_designation=='Director'){ echo 'selected'; }  ?>>Director</option>
			          <option value="Other" <?php if($emp_designation=='Other'){ echo 'selected'; }  ?>>Other</option>
               </select>
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label><?php echo $language['Leave for an Year']; ?></label>
                   <input type="text" name="emp_casual_leave" placeholder="<?php echo $language['Leave for an Year']; ?>"  value="<?php echo $emp_casual_leave; ?>" class="form-control">
                </div>
			</div>
		</div>
		
	<div class="box-body ">
		<h3 style="color:#d9534f;"><b><?php echo $language['Salary Details']; ?>:</b></h3>
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Pan Card No']; ?></label>
                   <input type="text" name="emp_pan_card_no" placeholder="<?php echo $language['Pan Card No']; ?>"  value="<?php echo $emp_pan_card_no; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                  <label ><?php echo $language['Aadhar No']; ?></label>
                  <input type="text"  name="emp_uid_no" placeholder="<?php echo $language['Aadhar No']; ?>"  value="<?php echo $emp_uid_no; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                  <label ><?php echo $language['Bank Name']; ?> </label>
                  <input type="text" name="emp_bank_name" placeholder="<?php echo $language['Bank Name']; ?>"  value="<?php echo $emp_bank_name; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Bank Account No']; ?></label>
                   <input type="text" name="emp_account_no" placeholder="<?php echo $language['Bank Account No']; ?>"  value="<?php echo $emp_account_no; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Bank Ifsc Code']; ?></label>
                   <input type="text" name="emp_ifsc_code" placeholder="<?php echo $language['Bank Ifsc Code']; ?>"  value="<?php echo $emp_ifsc_code; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Salary']; ?></label>
                   <input type="number" name="emp_basic_salary" placeholder="<?php echo $language['Salary']; ?>"  value="<?php echo $emp_basic_salary; ?>" min="0" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Other Wages']; ?> </label>
                   <input type="number"  name="emp_other_wages" placeholder="<?php echo $language['Other Wages']; ?>"  min="0" value="<?php echo $emp_other_wages; ?>" class="form-control">
                </div>
			</div>
			
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Pf Number']; ?></label>
                   <input type="text" name="emp_pf_number" placeholder="<?php echo $language['Pf Number']; ?>"  value="<?php echo $emp_pf_number; ?>" class="form-control">
                </div>
			</div>
			<div class="col-md-4 ">				
				<div class="form-group">
                   <label ><?php echo $language['Remark']; ?></label>
                   <input type="text" name="remarks" placeholder="<?php echo $language['Remark']; ?>"  value="<?php echo $remarks; ?>" class="form-control">
                </div>
			</div>
		</div>
	<div class="box-body ">
		<h3 style="color:#d9534f;"><b><?php echo $language['Leave Details']; ?>:</b></h3>
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label ><?php echo $language['Casual Leave']; ?></label>
                   <input type="number" name="emp_leave_cl" placeholder="<?php echo $language['Leave Details']; ?>"  value="<?php echo $emp_leave_cl; ?>" class="form-control" min="0">
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                  <label ><?php echo $language['Pay Earn Leave']; ?></label>
                  <input type="number"  name="emp_leave_pl" min="0" placeholder="<?php echo $language['Pay Earn Leave']; ?>"  value="<?php echo $emp_leave_pl; ?>" class="form-control"   >
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                  <label ><?php echo $language['Sick Leave']; ?></label>
                  <input type="number" name="emp_leave_sl" placeholder="<?php echo $language['Sick Leave']; ?>"  value="<?php echo $emp_leave_sl; ?>" class="form-control" min="0">
                </div>
			</div>
			
			<div class="col-md-3 ">				
				<div class="form-group">
                   <label ><?php echo $language['Other Leave']; ?></label>
                   <input type="number" name="emp_leave_other" placeholder="<?php echo $language['Other Leave']; ?>"  value="<?php echo $emp_leave_other; ?>" class="form-control" min="0">
                </div>
			</div>
			
			
		</div>
		<div id="mypdf_view">
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

  