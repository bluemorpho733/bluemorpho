<?php include("../attachment/session.php"); ?>

    <?php
	include("../attachment/image_compression_upload.php");
    $s_no=$_POST['s_no'];
    $student_roll_no=$_POST['student_roll_no'];
    $student_name=$_POST['student_name'];
	$student_father_name=$_POST['student_father_name'];
	$student_mother_name=$_POST['student_mother_name'];
	$course_code=$_POST['course_code'];
	$student_date_of_birth=$_POST['student_date_of_birth'];
	$student_gender=$_POST['student_gender'];
	$student_religion=$_POST['student_religion'];
	$student_category=$_POST['student_category'];
	$student_rf_id_number=$_POST['student_rf_id_number'];
	$student_adhar_number=$_POST['student_adhar_number'];
	$my_subject_name=$_POST['my_subject_name'];

	$student_registration_number=$_POST['student_registration_number'];

	$student_bank_name=$_POST['student_bank_name'];
	$student_account_number=$_POST['student_account_number'];
	$student_date_of_admission=$_POST['student_date_of_admission'];
	
	$student_admission_number=$_POST['student_admission_number'];
	$student_father_contact_number=$_POST['student_father_contact_number'];
	$student_mother_contact_number=$_POST['student_mother_contact_number'];
	$student_contact_number=$_POST['student_contact_number'];
	$student_email_id=$_POST['student_email_id'];
	$student_address=$_POST['student_address'];
	$student_hostel=$_POST['student_hostel'];	
	$student_library=$_POST['student_library'];
	$student_admission_remark = $_POST['student_admission_remark'];
	$student_sms_contact_number=$_POST['student_sms_contact_number'];
	$student_web_sms=$_POST['student_web_sms'];
	$student_image=$_FILES['student_image']['name'];
	$student_adhar_card_image=$_FILES['student_adhar_card_image']['name'];

	if($student_image!=''){
	$imagename = $_FILES['student_image']['name'];
	$size = $_FILES['student_image']['size'];
    $uploadedfile = $_FILES['student_image']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_image","student_documents","student_roll_no");
	}
	if($student_adhar_card_image!=''){
	$imagename = $_FILES['student_adhar_card_image']['name'];
	$size = $_FILES['student_adhar_card_image']['size'];
    $uploadedfile = $_FILES['student_adhar_card_image']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_adhar_card_image","student_documents","student_roll_no");
	}
	

	
$quer="update student_admission_info set my_subject_name='$my_subject_name',student_admission_remark='$student_admission_remark',student_name='$student_name',student_bank_name='$student_bank_name',student_father_name='$student_father_name',student_mother_name='$student_mother_name',course_code='$course_code',student_date_of_birth='$student_date_of_birth',student_gender='$student_gender',student_religion='$student_religion',student_category='$student_category',student_rf_id_number='$student_rf_id_number',student_adhar_number='$student_adhar_number',student_registration_number='$student_registration_number',student_account_number='$student_account_number',student_date_of_admission='$student_date_of_admission',student_admission_number='$student_admission_number',student_father_contact_number='$student_father_contact_number',student_mother_contact_number='$student_mother_contact_number',student_contact_number='$student_contact_number',student_email_id='$student_email_id',student_address='$student_address',student_sms_contact_number='$student_sms_contact_number',student_library='$student_library',registration_final='yes',student_status='Active',$update_by_update_sql where student_roll_no='$student_roll_no' and session_value='$session1'";

if(mysqli_query($conn37,$quer)){	
echo "|?|success|?|student_roll_no=".$student_roll_no."|?|";
}
	
	
