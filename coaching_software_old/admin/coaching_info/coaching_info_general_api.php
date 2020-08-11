<?php include("../attachment/session.php");
include("../attachment/image_compression_upload.php");
	
	$coaching_info_coaching_name = $_POST['coaching_info_coaching_name'];
	$coaching_info_coaching_state = $_POST['coaching_info_coaching_state'];
	$coaching_info_coaching_district = $_POST['coaching_info_coaching_district'];
	$coaching_info_coaching_city = $_POST['coaching_info_coaching_city'];
	$coaching_info_coaching_pincode = $_POST['coaching_info_coaching_pincode'];
	$coaching_info_coaching_landmark = $_POST['coaching_info_coaching_landmark'];
	$coaching_info_coaching_address = $_POST['coaching_info_coaching_address'];
	$coaching_info_coaching_contact_no = $_POST['coaching_info_coaching_contact_no'];
	$coaching_info_coaching_email_id = $_POST['coaching_info_coaching_email_id'];
	$coaching_info_coaching_website = $_POST['coaching_info_coaching_website'];
	$coaching_info_principal_name = $_POST['coaching_info_principal_name'];
	$coaching_info_coaching_code = $_POST['coaching_info_coaching_code'];
	
	$coaching_info_institute_category = $_POST['coaching_info_institute_category'];
    $coaching_info_institute_type = $_POST['coaching_info_institute_type'];
	$coaching_info_principal_seal=$_FILES['coaching_info_principal_seal']['name'];            
	$coaching_info_principal_signature=$_FILES['coaching_info_principal_signature']['name'];            
	$coaching_info_logo=$_FILES['coaching_info_logo']['name'];            

	if($coaching_info_principal_seal!=''){
	$imagename = $_FILES['coaching_info_principal_seal']['name'];
	$size = $_FILES['coaching_info_principal_seal']['size'];
    $uploadedfile = $_FILES['coaching_info_principal_seal']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,'1',"coaching_info_principal_seal","coaching_document","1");
	}
	if($coaching_info_principal_signature!=''){
	$imagename = $_FILES['coaching_info_principal_signature']['name'];
	$size = $_FILES['coaching_info_principal_signature']['size'];
    $uploadedfile = $_FILES['coaching_info_principal_signature']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,'1',"coaching_info_principal_signature","coaching_document","1");
	}
	if($coaching_info_logo!=''){
	$imagename = $_FILES['coaching_info_logo']['name'];
	$size = $_FILES['coaching_info_logo']['size'];
    $uploadedfile = $_FILES['coaching_info_logo']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,'1',"coaching_info_logo","coaching_document","1");
	}
	
  $quer="update coaching_info_general set coaching_info_coaching_name='$coaching_info_coaching_name',coaching_info_coaching_state='$coaching_info_coaching_state',coaching_info_coaching_district='$coaching_info_coaching_district',coaching_info_coaching_city='$coaching_info_coaching_city',coaching_info_coaching_pincode='$coaching_info_coaching_pincode',coaching_info_coaching_landmark='$coaching_info_coaching_landmark',coaching_info_coaching_address='$coaching_info_coaching_address',coaching_info_coaching_contact_no='$coaching_info_coaching_contact_no',coaching_info_principal_name='$coaching_info_principal_name',coaching_info_coaching_code='$coaching_info_coaching_code',coaching_info_institute_type='$coaching_info_institute_type',coaching_info_institute_category='$coaching_info_institute_category',coaching_info_coaching_email_id='$coaching_info_coaching_email_id',coaching_info_coaching_website='$coaching_info_coaching_website',$update_by_update_sql";
 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}
?>	