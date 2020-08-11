<?php include("../attachment/session.php"); 
include("../attachment/image_compression_upload.php");
    $que11="select * from login";
    $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
    while($row11=mysqli_fetch_assoc($run11)){
	$employee_id_no=$row11['employee_id_no'];
	$employee_id_no++;
	}
	$emp_name = $_POST['emp_name'];
	$emp_gender = $_POST['emp_gender'];
	$emp_dob = $_POST['emp_dob'];
	$emp_father = $_POST['emp_father'];
	$emp_email = $_POST['emp_email'];
	$emp_mobile = $_POST['emp_mobile'];
	$emp_address = $_POST['emp_address'];
	$emp_qualification = $_POST['emp_qualification'];
	$emp_doj = $_POST['emp_doj'];
	$emp_categories = $_POST['emp_categories'];
	// $emp_class_preferred = $_POST['emp_class_preferred'];
	$emp_designation = $_POST['emp_designation'];
	$emp_leave_cl = $_POST['emp_leave_cl'];
	$emp_leave_pl = $_POST['emp_leave_pl'];
	$emp_leave_sl = $_POST['emp_leave_sl'];
	$emp_other_wages = $_POST['emp_other_wages'];
	$emp_leave_other = $_POST['emp_leave_other'];
	$emp_pan_card_no = $_POST['emp_pan_card_no'];
	$emp_bank_name = $_POST['emp_bank_name'];
	$emp_account_no = $_POST['emp_account_no'];
	$emp_ifsc_code = $_POST['emp_ifsc_code'];
	$emp_basic_salary = $_POST['emp_basic_salary'];
	$emp_pf_number = $_POST['emp_pf_number'];
	// $emp_subject_preferred = $_POST['emp_subject_preferred'];
	$emp_uid_no = $_POST['emp_uid_no'];
	$remarks = $_POST['remarks'];
	$emp_rf_id_no = $_POST['emp_rf_id_no'];
    $send_sms = $_POST['send_sms'];
	$sms1=$_POST['sms'];
	
	
   $quer="insert into employee_info(emp_name,emp_gender,emp_dob,emp_father,emp_email,emp_mobile,emp_address,emp_qualification,emp_doj,emp_categories,emp_designation,emp_leave_cl,emp_leave_pl,emp_leave_sl,emp_leave_other,emp_pan_card_no,emp_bank_name,emp_account_no,emp_ifsc_code,emp_basic_salary,emp_pf_number,emp_uid_no,remarks,emp_id,emp_rf_id_no,emp_other_wages,session_value,$update_by_insert_sql_column)
    values('$emp_name','$emp_gender','$emp_dob','$emp_father','$emp_email','$emp_mobile','$emp_address','$emp_qualification','$emp_doj','$emp_categories','$emp_designation','$emp_leave_cl','$emp_leave_pl','$emp_leave_sl','$emp_leave_other','$emp_pan_card_no','$emp_bank_name','$emp_account_no','$emp_ifsc_code','$emp_basic_salary','$emp_pf_number','$emp_uid_no','$remarks','$employee_id_no','$emp_rf_id_no','$emp_other_wages','$session1',$update_by_insert_sql_value)";
	
   	$query11="insert into employee_document(emp_id) values('$employee_id_no')";
    mysqli_query($conn37,$query11);
    $quer12="update login set employee_id_no='$employee_id_no'";
    mysqli_query($conn37,$quer12);

if(mysqli_query($conn37,$quer)){
	echo "done";
	$emp_photo=$_FILES['emp_photo']['name'];
	$emp_experience_latter=$_FILES['emp_experience_latter']['name'];
	$emp_degree=$_FILES['emp_degree']['name'];
	$emp_id_proof=$_FILES['emp_id_proof']['name'];
	$emp_other_document1=$_FILES['emp_other_document1']['name'];
	$emp_other_document2=$_FILES['emp_other_document2']['name'];
	if($emp_photo!=''){
	$imagename = $_FILES['emp_photo']['name'];
	$size = $_FILES['emp_photo']['size'];
    $uploadedfile = $_FILES['emp_photo']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_photo","employee_document","emp_id");
	}
	if($emp_experience_latter!=''){
	$imagename = $_FILES['emp_experience_latter']['name'];
	$size = $_FILES['emp_experience_latter']['size'];
    $uploadedfile = $_FILES['emp_experience_latter']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_experience_latter","employee_document","emp_id");
	}
	if($emp_degree!=''){
	$imagename = $_FILES['emp_degree']['name'];
	$size = $_FILES['emp_degree']['size'];
    $uploadedfile = $_FILES['emp_degree']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_degree","employee_document","emp_id");
	}
	if($emp_id_proof!=''){
	$imagename = $_FILES['emp_id_proof']['name'];
	$size = $_FILES['emp_id_proof']['size'];
    $uploadedfile = $_FILES['emp_id_proof']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_id_proof","employee_document","emp_id");
	}
	// if($emp_other_document1!=''){
	// $imagename = $_FILES['emp_other_document1']['name'];
	// $size = $_FILES['emp_other_document1']['size'];
 //    $uploadedfile = $_FILES['emp_other_document1']['tmp_name'];
	
	// camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_other_document1","employee_document","emp_id");
	// }
	// if($emp_other_document2!=''){
	// $imagename = $_FILES['emp_other_document2']['name'];
	// $size = $_FILES['emp_other_document2']['size'];
 //    $uploadedfile = $_FILES['emp_other_document2']['tmp_name'];
	
	// camera_code($size,$imagename,$uploadedfile,$employee_id_no,"emp_other_document2","employee_document","emp_id");
	// }

        if($send_sms=="Yes"){
		include("../sms/sms.php");
		sendDNDSMS($emp_mobile,$sms1);	
	}
	
		echo "|?|success|?|$employee_id_no";
	}