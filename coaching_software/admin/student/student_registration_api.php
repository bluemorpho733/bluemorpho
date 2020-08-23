<?php include("../attachment/session.php");
include("../attachment/image_compression_upload.php");

   $que11="select * from login ";
       $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
       while($row11=mysqli_fetch_assoc($run11)){
	   $student_id_generate=$row11['student_id_generate']; 
	   $registration_id=$row11['registration_id']; 
	   } 


	$student_registration_number=$_POST['student_registration_number'];
	$stuent_old_or_new=$_POST['stuent_old_or_new'];
	$class_code = $_POST['class_code'];
	$my_subject_name=$_POST['my_subject_name'];
	$student_name = $_POST['student_name'];
	$student_father_name = $_POST['student_father_name'];
	$student_mother_name = $_POST['student_mother_name'];
	$student_father_contact_number = $_POST['student_father_contact_number'];
	$student_father_contact_number2 = $_POST['student_father_contact_number2'];
	$student_date_of_birth = $_POST['student_date_of_birth'];
	$student_date_of_birth_in_word = $_POST['student_date_of_birth_in_word'];
	$student_gender = $_POST['student_gender'];
	$student_date_of_admission = $_POST['student_date_of_admission'];
	$student_admission_type = $_POST['student_admission_type'];
	$student_admission_scheme = $_POST['student_admission_scheme'];
	$student_fee_category = $_POST['student_fee_category'];
	$student_bus = $_POST['student_bus'];
	$student_hostel = $_POST['student_hostel'];
	$student_library = $_POST['student_library'];
	$student_registration_fee = $_POST['student_registration_fee'];
	$student_sms_contact_number = $_POST['student_sms_contact_number'];
	$student_adress = $_POST['student_adress'];
	$student_city = $_POST['student_city'];
	$student_block = $_POST['student_block'];
	$student_district = $_POST['student_district'];
	$student_state = $_POST['student_state'];
	$student_pincode = $_POST['student_pincode'];
	$student_landmark = $_POST['student_landmark'];
	$send_sms = $_POST['send_sms'];
	$sms=$_POST['sms'];

	$student_image=$_FILES['student_photo']['name'];
	$father_image=$_FILES['father_photo']['name'];            
	$mother_image=$_FILES['mother_photo']['name'];    



	
	// $subject_code = $_POST['subject_code'];
	// $student_email_id = $_POST['student_email_id'];
	// $send_sms = $_POST['send_sms'];
	// $sms=$_POST['sms'];
	// $student_registration_number=$registration_id+1;
	// $student_address=$_POST['student_address'];
	
	$student_id_generate=$student_id_generate+1;
    // $student_image=$_FILES['student_image']['name'];            
  
  
  $que11="select * from login ";
       $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
       while($row11=mysqli_fetch_assoc($run11)){
       $class_roll=$row11['student_id_generate'];	   
	   }			 
	   $class_roll=$class_roll+1;
	  
    if($class_roll<10)
    {
    $class_roll_new="0000".$class_roll;
    } else if($class_roll<100)
    {
    $class_roll_new="000".$class_roll;
    }
	else if($class_roll<1000)
    {
    $class_roll_new="00".$class_roll;
    }
	else if($class_roll<10000)
    {
    $class_roll_new="0".$class_roll;
    }
    $y=date("Y")-2000;
    $student_roll_no=$y.$class_roll_new;
	

	// $query11="insert into student_documents(student_roll_no) values('$student_roll_no')";
	// mysqli_query($conn37,$query11);

	// if($student_image!=''){
	// $imagename = $_FILES['student_image']['name'];
	// $size = $_FILES['student_image']['size'];
    // $uploadedfile = $_FILES['student_image']['tmp_name'];
	
	// camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_image","student_documents","student_roll_no");
	// }
		
    // if($father_image!=''){
	// $imagename = $_FILES['father_photo']['name'];
	// $size = $_FILES['father_photo']['size'];
	// $uploadedfile = $_FILES['father_photo']['tmp_name'];
	
	// camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_father_image","student_documents","student_roll_no");
	// }

	// if($mother_image!=''){
	// $imagename = $_FILES['mother_photo']['name'];
	// $size = $_FILES['mother_photo']['size'];
	// $uploadedfile = $_FILES['mother_photo']['tmp_name'];
	
	// camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_mother_image","student_documents","student_roll_no");
	// }




	$quer="insert into registration_details(student_registration_number,stuent_old_or_new,class_code,my_subject_name,student_name,student_father_name,student_mother_name,student_father_contact_number,student_father_contact_number2,student_date_of_birth,student_date_of_birth_in_word,student_gender,student_date_of_admission,student_admission_type,student_admission_scheme,student_fee_category,student_bus,student_hostel,student_library,student_registration_fee,student_sms_contact_number,student_adress,student_city,student_block,student_district,student_state,student_pincode,student_landmark,session_value) values('$student_registration_number','$stuent_old_or_new','$class_code','$my_subject_name','$student_name','$student_father_name','$student_mother_name','$student_father_contact_number','$student_father_contact_number2','$student_date_of_birth','$student_date_of_birth_in_word','$student_gender','$student_date_of_admission','$student_admission_type','$student_admission_scheme','$student_fee_category','$student_bus','$student_hostel','$student_library','$student_registration_fee','$student_sms_contact_number','$student_adress','$student_city','$student_block','$student_district','$student_state','$student_pincode','$student_landmark','$session1')";












	// $quer="insert into student_admission_info(my_subject_name,student_id_generate,course_code,subject_code,student_name,student_father_name,
	// student_contact_number,student_registration_number,student_email_id,student_roll_no,student_date_of_birth,student_gender,
	// student_date_of_admission,student_address,session_value,$update_by_insert_sql_column)
	// values('$my_subject_name','$student_id_generate','$course_code','$subject_code','$student_name','$student_father_name',
	// '$student_contact_number','$student_registration_number','$student_email_id','$student_roll_no','$student_date_of_birth','$student_gender',
	// '$student_date_of_admission','$student_address','$session1',$update_by_insert_sql_value)";









    // $quer12="update login set student_id_generate='$student_id_generate',registration_id='$student_registration_number'";
    // mysqli_query($conn37,$quer12);
   
    if(mysqli_query($conn37,$quer))
	{
	// if($send_sms=="Yes"){
	// include("../sms/sms.php");
	// sendDNDSMS($student_contact_number,$sms);	
	// }
	echo "|?|success|?|";
	}
?>	