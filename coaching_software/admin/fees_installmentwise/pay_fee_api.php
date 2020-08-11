<?php include("../attachment/session.php");
	
    $fee_submission_date = $_POST['fee_submission_date'];
    $student_name = $_POST['student_name'];
    $student_father_name = $_POST['student_father_name'];
    $student_roll_no = $_POST['student_roll_no'];
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $fee_head_name = $_POST['fee_head_name'];
    $fee_amount_final = $_POST['fee_amount_final'];
    $fee_head_code = $_POST['fee_head_code'];
    $fee_balance_amount = $_POST['fee_balance_amount'];
    $fee_penalty = $_POST['fee_penalty'];
    $fee_pay_amount = $_POST['fee_pay_amount'];
    $payment_mode = $_POST['payment_mode'];
    $cheque_details = $_POST['cheque_details'];
    $bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];
    $bank_ifsc_code = $_POST['bank_ifsc_code'];
    $coaching_roll_no = $_POST['coaching_roll_no'];
    $contact_number = $_POST['contact_number'];

	
  $quer="INSERT INTO coaching_info_pay_fee (fee_submission_date,student_name,student_father_name,contact_number,student_roll_no,coaching_roll_no,course_name,course_code,fee_head_name,fee_amount_final,fee_head_code,fee_balance_amount,fee_penalty,fee_pay_amount,payment_mode,cheque_details,bank_name,account_no,bank_ifsc_code) VALUES ('$fee_submission_date','$student_name','$student_father_name','$contact_number','$student_roll_no','$coaching_roll_no','$course_name','$course_code','$fee_head_name','$fee_amount_final','$fee_head_code','$fee_balance_amount','$fee_penalty','$fee_pay_amount','$payment_mode','$cheque_details','$bank_name','$account_no','$bank_ifsc_code')";
 
 
if(mysqli_query($conn37,$quer)){

$que="select * from coaching_info_pay_fee where student_roll_no='$student_roll_no'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$s_no = $row['s_no'];
}

	echo "|?|success|?|".$fee_pay_amount."|?|".$s_no."|?|";
}else{

    echo "|?|exist|?|";

}
?>	