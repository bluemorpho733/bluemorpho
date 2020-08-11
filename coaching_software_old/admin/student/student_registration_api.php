<?php include("../attachment/session.php");
include("../attachment/image_compression_upload.php");

   $que11="select * from login ";
       $run11=mysqli_query($conn37,$que11) or die(mysqli_error($conn37));
       while($row11=mysqli_fetch_assoc($run11)){
	   $student_id_generate=$row11['student_id_generate']; 
	   $registration_id=$row11['registration_id']; 
	   } 
	$course_code = $_POST['course_code'];
	$subject_code = $_POST['subject_code'];
	$student_name = $_POST['student_name'];
	$student_father_name = $_POST['student_father_name'];
	$student_contact_number = $_POST['student_contact_number'];
	$student_date_of_birth = $_POST['student_date_of_birth'];
	$student_gender = $_POST['student_gender'];
	$student_date_of_admission = $_POST['student_date_of_admission'];
	$student_email_id = $_POST['student_email_id'];
	$send_sms = $_POST['send_sms'];
	$sms=$_POST['sms'];
	$student_registration_number=$registration_id+1;
	$student_address=$_POST['student_address'];
	$my_subject_name=$_POST['my_subject_name'];
	$student_id_generate=$student_id_generate+1;
    $student_image=$_FILES['student_image']['name'];            
  
  
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
	

	$query11="insert into student_documents(student_roll_no) values('$student_roll_no')";
	mysqli_query($conn37,$query11);
	if($student_image!=''){
	$imagename = $_FILES['student_image']['name'];
	$size = $_FILES['student_image']['size'];
    $uploadedfile = $_FILES['student_image']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$student_roll_no,"student_image","student_documents","student_roll_no");
	}
		
	$quer="insert into student_admission_info(my_subject_name,student_id_generate,course_code,subject_code,student_name,student_father_name,student_contact_number,student_registration_number,student_email_id,student_roll_no,student_date_of_birth,student_gender,student_date_of_admission,student_address,session_value,$update_by_insert_sql_column)values('$my_subject_name','$student_id_generate','$course_code','$subject_code','$student_name','$student_father_name','$student_contact_number','$student_registration_number','$student_email_id','$student_roll_no','$student_date_of_birth','$student_gender','$student_date_of_admission','$student_address','$session1',$update_by_insert_sql_value)";

    $quer12="update login set student_id_generate='$student_id_generate',registration_id='$student_registration_number'";
    mysqli_query($conn37,$quer12);
   
    if(mysqli_query($conn37,$quer))
	{
	if($send_sms=="Yes"){
	include("../sms/sms.php");
	sendDNDSMS($student_contact_number,$sms);	
	}
	echo "|?|success|?|";
	}
?>	