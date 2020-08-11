<?php include("../attachment/session.php");

	$student_name = $_POST['student_name'];
	$student_roll_no = $_POST['student_roll_no'];
	$course_code = $_POST['course_code'];
	$subject_code = $_POST['subject_code'];
	
	$discount_method = $_POST['discount_method'];
	
	$fee_head_discount_1 = $_POST['fee_head_discount'];
	$fee_head_discount_2 = $_POST['fee_head_discount1'];
	
	if($fee_head_discount_1==''){
	$fee_head_discount= $_POST['fee_head_discount1'];
	}else{
	$fee_head_discount= $_POST['fee_head_discount'];
	}
	
	$fee_after_discount = $_POST['fee_after_discount'];
	$fee_last_submission_date = $_POST['fee_last_submission_date'];
	
	$fee_head_name = $_POST['fee_head_name'];
	$fee_head_amount = $_POST['fee_head_amount'];
	$fee_head_code = $_POST['fee_head_code'];
	$coaching_info_fee_code1 = $fee_head_code+1;

	$subhead_name_common = $_POST['subhead_name_common'];
	$subhead_amount_common = $_POST['subhead_amount_common'];
	$subhead_code_common = $_POST['subhead_code_common'];
	
	$count_common=count($subhead_code_common);
	
	$common_subhead_coloum_name='';
	$common_subhead_coloum_value='';
	$common_subhead_update='';
	
	$common_subhead_coloum_amount_name='';
	$common_subhead_coloum_amount_value='';
	$common_subhead_amount_update='';
	
	$common_subhead_coloum_code_name='';
	$common_subhead_coloum_code_value='';
	$common_subhead_code_update='';
	$comma='';
	for($i=0;$i<$count_common;$i++){
	$common_subhead_coloum_name=$common_subhead_coloum_name.$comma.'fee_subhead_name_common_'.$subhead_code_common[$i];
	$common_subhead_coloum_value=$common_subhead_coloum_value.$comma."'$subhead_name_common[$i]'";
	$common_subhead_update=$common_subhead_update.$comma."fee_subhead_name_common_".$subhead_code_common[$i]."='$subhead_name_common[$i]'";
	
	$common_subhead_coloum_amount_name=$common_subhead_coloum_amount_name.$comma.'fee_subhead_amount_common_'.$subhead_code_common[$i];
	$common_subhead_coloum_amount_value=$common_subhead_coloum_amount_value.$comma."'$subhead_amount_common[$i]'";
	$common_subhead_amount_update=$common_subhead_amount_update.$comma."fee_subhead_amount_common_".$subhead_code_common[$i]."='$subhead_amount_common[$i]'";
	
	$common_subhead_coloum_code_name=$common_subhead_coloum_code_name.$comma.'fee_subhead_code_common_'.$subhead_code_common[$i];
	$common_subhead_coloum_code_value=$common_subhead_coloum_code_value.$comma."'$subhead_code_common[$i]'";
	$common_subhead_code_update=$common_subhead_code_update.$comma."fee_subhead_code_common_".$subhead_code_common[$i]."='$subhead_code_common[$i]'";
	$comma=',';
	}
	
	
$count=count($subject_code);
$success=0;
$d=0;
for($a=0;$a<$count;$a++){
  
    $subhead_name_separate = $_POST[$subject_code[$a].'_subhead_name_separate'];
	$subhead_amount_separate = $_POST[$subject_code[$a].'_subhead_amount_separate'];
	$subhead_code_separate = $_POST[$subject_code[$a].'_subhead_code_separate'];
  
    $separate_count=count($subhead_code_separate);
	
	$separate_subhead_name_colom_name='';
	$separate_subhead_name_colom_value='';
	$separate_subhead_name_colom_update='';
	
	$separate_subhead_amount_colom_name='';
	$separate_subhead_amount_colom_value='';
	$separate_subhead_amount_colom_update='';
	
	$separate_subhead_code_colom_name='';
	$separate_subhead_code_colom_value='';
	$separate_subhead_code_colom_update='';
	$comma1='';
	
	for($j=0;$j<$separate_count;$j++){
	$separate_subhead_name_colom_name=$separate_subhead_name_colom_name.$comma1."fee_subhead_name_separate_".$subhead_code_separate[$j];
	$separate_subhead_name_colom_value=$separate_subhead_name_colom_value.$comma1."'$subhead_name_separate[$j]'";
	$separate_subhead_name_colom_update=$separate_subhead_name_colom_update.$comma1."fee_subhead_name_separate_".$subhead_code_separate[$j]."='".$subhead_name_separate[$j]."'";
	
	$separate_subhead_amount_colom_name=$separate_subhead_amount_colom_name.$comma1."fee_subhead_amount_separate_".$subhead_code_separate[$j];
	$separate_subhead_amount_colom_value=$separate_subhead_amount_colom_value.$comma1."'$subhead_amount_separate[$j]'";
	$separate_subhead_amount_colom_update=$separate_subhead_amount_colom_update.$comma1."fee_subhead_amount_separate_".$subhead_code_separate[$j]."='".$subhead_amount_separate[$j]."'";
	
	$separate_subhead_code_colom_name=$separate_subhead_code_colom_name.$comma1."fee_subhead_code_separate_".$subhead_code_separate[$j];
	$separate_subhead_code_colom_value=$separate_subhead_code_colom_value.$comma1."'$subhead_code_separate[$j]'";
	$separate_subhead_code_colom_update=$separate_subhead_code_colom_update.$comma1."fee_subhead_code_separate_".$subhead_code_separate[$j]."='".$subhead_code_separate[$j]."'";
	$comma1=',';
	}

$date=date('Y-m-d');
	
$que="select * from student_fee_structure where course_code='$course_code' and subject_code='$subject_code[$a]' and student_roll_no='$student_roll_no' and  fee_status='Active'";
$run=mysqli_query($conn37,$que);
if(mysqli_num_rows($run)>0){
$quer="update student_fee_structure set last_updated_date='$date',fee_head_name='$fee_head_name',fee_head_amount='$fee_head_amount',fee_head_code='$fee_head_code',$common_subhead_update,$common_subhead_amount_update,$common_subhead_code_update,$separate_subhead_name_colom_update,$separate_subhead_amount_colom_update,$separate_subhead_code_colom_update where course_code='$course_code' and subject_code='$subject_code[$a]' and student_roll_no='$student_roll_no'";

if(mysqli_query($conn37,$quer)){
$d++;
}

}else{

 $quer="INSERT INTO student_fee_structure (student_name,student_roll_no,course_code,subject_code,fee_head_name,discount_method,fee_head_discount,fee_after_discount,fee_last_submission_date,fee_head_amount,fee_head_code,$common_subhead_coloum_name,$common_subhead_coloum_amount_name,$common_subhead_coloum_code_name,$separate_subhead_name_colom_name,$separate_subhead_amount_colom_name,$separate_subhead_code_colom_name,fee_status,last_updated_date) VALUES ('$student_name','$student_roll_no','$course_code','$subject_code[$a]','$fee_head_name','$discount_method','$fee_head_discount','$fee_after_discount','$fee_last_submission_date','$fee_head_amount','$fee_head_code',$common_subhead_coloum_value,$common_subhead_coloum_amount_value,$common_subhead_coloum_code_value,$separate_subhead_name_colom_value,$separate_subhead_amount_colom_value,$separate_subhead_code_colom_value,'Active','$date')";

if(mysqli_query($conn37,$quer)){
$d++;
}

}

}
  
if($d>0){
echo "|?|success|?|";
}else{
echo "|?|error|?|";
}
?>	