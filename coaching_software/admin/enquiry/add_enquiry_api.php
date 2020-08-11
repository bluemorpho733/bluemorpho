<?php include("../attachment/session.php");

	$enquiry_type = $_POST['enquiry_type'];
	$enquiry_date = $_POST['enquiry_date'];
	$course_code = $_POST['course_code'];
	$subject_code = $_POST['subject_code'];
	$enquiry_name = $_POST['enquiry_name'];
	$enquiry_father_name = $_POST['enquiry_father_name'];
	$enquiry_contact_no_1 = $_POST['enquiry_contact_no_1'];
	$enquiry_contact_no_2 = $_POST['enquiry_contact_no_2'];
	$enquiry_address = $_POST['enquiry_address'];
	$enquiry_next_follow_up_date_1 = $_POST['enquiry_next_follow_up_date'];
	$enquiry_next_follow_up_date_2 = explode("-",$enquiry_next_follow_up_date_1);
	if($enquiry_next_follow_up_date_1!=''){
	$enquiry_next_follow_up_date=$enquiry_next_follow_up_date_2[2]."-".$enquiry_next_follow_up_date_2[1]."-".$enquiry_next_follow_up_date_2[0];
	}else{
		$enquiry_next_follow_up_date='';
	}
	$enquiry_remark_1 = $_POST['enquiry_remark_1'];
	// $enquiry_remark_2 = $_POST['enquiry_remark_2'];

  $quer="insert into enquiry_info(enquiry_type,course_code,subject_code,enquiry_date,enquiry_name,enquiry_father_name,enquiry_contact_no_1,enquiry_contact_no_2,enquiry_address,enquiry_next_follow_up_date,enquiry_remark_1,session_value)
    values('$enquiry_type','$course_code','$subject_code','$enquiry_date','$enquiry_name','$enquiry_father_name','$enquiry_contact_no_1','$enquiry_contact_no_2','$enquiry_address','$enquiry_next_follow_up_date','$enquiry_remark_1','$session1')";
 
if(mysqli_query($conn37,$quer)){
echo "|?|success|?|";
}
?>