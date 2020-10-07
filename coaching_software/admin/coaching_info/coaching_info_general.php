<?php include("../attachment/session.php");

$que="select * from coaching_info_general";
$run=mysqli_query($conn37,$que);
$serial_no=0;
while($row=mysqli_fetch_assoc($run)){
	$s_no = $row['s_no'];
	$coaching_info_coaching_name = $row['coaching_info_coaching_name'];
	$coaching_info_coaching_state = $row['coaching_info_coaching_state'];
	$coaching_info_coaching_district = $row['coaching_info_coaching_district'];
	$coaching_info_coaching_city = $row['coaching_info_coaching_city'];
	$coaching_info_coaching_pincode = $row['coaching_info_coaching_pincode'];
	$coaching_info_coaching_landmark = $row['coaching_info_coaching_landmark'];
	$coaching_info_coaching_address = $row['coaching_info_coaching_address'];	
	$coaching_info_coaching_contact_no = $row['coaching_info_coaching_contact_no'];
	$coaching_info_coaching_email_id = $row['coaching_info_coaching_email_id'];
	$coaching_info_coaching_website = $row['coaching_info_coaching_website'];	
	$coaching_info_principal_name = $row['coaching_info_principal_name'];
	$coaching_info_coaching_code = $row['coaching_info_coaching_code'];
    $coaching_info_School_type = $row['coaching_info_institute_type'];
	$coaching_info_School_category = $row['coaching_info_institute_category'];
	$coaching_info_principal_seal = $row['coaching_info_principal_seal'];
	$coaching_info_principal_signature = $row['coaching_info_principal_signature'];
	$coaching_info_logo = $row['coaching_info_logo'];
	$blank_field_1 = $row['blank_field_1'];
}

	$que1="select * from coaching_document";
    $run1=mysqli_query($conn37,$que1);
    while($row1=mysqli_fetch_assoc($run1)){
	$coaching_info_principal_seal = $row1['coaching_info_principal_seal'];
	$coaching_info_principal_signature = $row1['coaching_info_principal_signature'];
	$coaching_info_logo = $row1['coaching_info_logo'];

	}
?>

    <section class="content-header">
      <h1>
        School Information
        <small><?php echo 'Control Panel'; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">School Profile</li>
      </ol>
    </section>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_info_general_api.php",
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
				   get_content('coaching_info/coaching_info_general');
            }
			}
         });
      });
</script>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">School Profile</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  >
			<form method="post" enctype="multipart/form-data" action="" id="my_form">
			  <div class="col-md-4 ">
						<div class="form-group">
						  <label>School Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_coaching_name"   placeholder="School Name"  value="<?php echo $coaching_info_coaching_name; ?>" class="form-control" maxlength="40" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label><?php echo 'State'; ?><font style="color:red"><b>*</b></font></label>				
						   <input type="text"  name="coaching_info_coaching_state"   placeholder="State"  value="<?php echo $coaching_info_coaching_state; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label><?php echo 'District'; ?><font style="color:red"><b>*</b></font></label>
						    <input type="text"  name="coaching_info_coaching_district"   placeholder="District"  value="<?php echo $coaching_info_coaching_district; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label><?php echo 'City'; ?><font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_coaching_city"   placeholder="City"  value="<?php echo $coaching_info_coaching_city; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label><?php echo 'Pincode'; ?></label>
						   <input type="text"  name="coaching_info_coaching_pincode"   placeholder="Pincode"  value="<?php echo $coaching_info_coaching_pincode; ?>" class="form-control" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label><?php echo 'Landmark'; ?></label>
						   <input type="text"  name="coaching_info_coaching_landmark"   placeholder="Landmark"  value="<?php echo $coaching_info_coaching_landmark; ?>" class="form-control" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>School Address<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_coaching_address"   placeholder="coaching Address"  value="<?php echo $coaching_info_coaching_address; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>School Contact No<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_coaching_contact_no"   placeholder="coaching Contact No."  value="<?php echo $coaching_info_coaching_contact_no; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4">
						<div class="form-group">
						  <label>School Email Id</label>
						   <input type="text"  name="coaching_info_coaching_email_id"   placeholder="coaching Email Id"  value="<?php echo $coaching_info_coaching_email_id; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-4">
						<div class="form-group">
						  <label>School Website</label>
						   <input type="text"  name="coaching_info_coaching_website" placeholder="coaching Website"  value="<?php echo $coaching_info_coaching_website; ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>School Head<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_principal_name"   placeholder="School Head"  value="<?php echo $coaching_info_principal_name; ?>" class="form-control" required>
						</div>
				</div>
				<div class="col-md-4 ">		
						<div class="form-group">
						  <label>School Code</label>
						   <input type="text" name="coaching_info_coaching_code" placeholder="School Code"  value="<?php echo $coaching_info_coaching_code; ?>" class="form-control">
						</div>
					</div>

			 <div class="col-md-4 ">				
					 <div class="form-group" >
					  <label >School Type<font style="color:red"><b>*</b></font></label><br>
						<select name="coaching_info_School_type" class="form-control" required>
					  <option value="<?php echo $coaching_info_School_type;?>"><?php echo $coaching_info_School_type;?></option>
					  <option value="Franchise">Franchise</option>
					  <option value="Self Owned">Self Owned</option>
					  </select>
					  </div>
				</div>
              <div class="col-md-4 ">				
				 <div class="form-group" >
				  <label >School Category<font style="color:red"><b>*</b></font></label><br>
					<select name="coaching_info_School_category" class="form-control" required>
				  <option value="<?php echo $coaching_info_School_category;?>"><?php echo $coaching_info_School_category;?></option>
				  <option value="Competitive">Competitive</option>
				  <option value="School Level Classes">School Level Classes</option>
				  <option value="Collage Level Classes">Collage Level Classes</option>
				  <option value="Diploma Level Classes">Diploma Level Classes</option>
				  <option value="General Certification Level">General Certification Level</option>
				  <option value="Extra Curricular Courses">Extra Curricular Courses</option>
				  <option value="Outdoor Courses">Outdoor Courses</option>
				  </select>
				  </div>
			  </div>
	
				<div class="col-lg-12">
				<div class="col-md-3 ">	
					<div class="form-group" > 
					   <label>School Seal</label>
					  <input type="file"  id="coaching_info_principal_seal" name="coaching_info_principal_seal" placeholder="" onchange="check_file_type(this,'coaching_info_principal_seal','shwo_coaching_info_principal_seal','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img onclick="open_file1('coaching_info_principal_seal','coaching_info_general','1','1');" src="<?php if($coaching_info_principal_seal!=''){ echo 'data:image;base64,'.$coaching_info_principal_seal; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" id="shwo_coaching_info_principal_seal" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				<div class="col-md-3 ">	
					<div class="form-group" > 
					   <label>School Head Signature</label>
					  <input type="file"  id="coaching_info_principal_signature" name="coaching_info_principal_signature" placeholder="" onchange="check_file_type(this,'coaching_info_principal_signature','show_coaching_info_principal_signature','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img onclick="open_file1('coaching_info_principal_signature','coaching_info_general','1','1');" src="<?php if($coaching_info_principal_signature!=''){ echo 'data:image;base64,'.$coaching_info_principal_signature; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" id="show_coaching_info_principal_signature" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				
			 <div class="col-md-3 ">	
				<div class="form-group" > 
				  <label><?php echo 'Logo'; ?></label>
					  <input type="file"  id="coaching_info_logo" name="coaching_info_logo" placeholder="" onchange="check_file_type(this,'coaching_info_logo','show_coaching_info_logo','image');" value="" class="form-control" accept=".gif, .jpg, .jpeg, .png">
					</div>
				</div>
				<div class="col-md-1">	
					<div class="form-group">
					  <img onclick="open_file1('coaching_info_logo','coaching_info_general','1','1');" src="<?php if($coaching_info_logo!=''){ echo 'data:image;base64,'.$coaching_info_logo; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" id="show_coaching_info_logo" height="50" width="50" style="margin-top:10px;">
					</div>
				</div>
				
				
					<div class="col-md-12 ">

					</div>
				</div>	
				<div class="col-md-12">
		        <center><input type="submit" name="submit" value="<?php echo 'Submit'; ?>" class="btn btn-primary" /></center>
		  </div>
		</form>	
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
 		</form>	
<div id="mypdf_view">
			<div>