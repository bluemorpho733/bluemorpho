<?php
include("../../con73/con37.php");
if(isset($_POST['submit'])){

$student_data= $_POST['student_data'];
 $count= count($student_data);
$heading_array=array();
$value_array='';
for($i=0;$i<$count;$i++){
$student_data1=explode(',',$student_data[$i]);
$student_data[$i]; 
 $student_data_value=$student_data1[0];  
 $student_data_heading=$student_data1[1]; 
if($i==0){
 $heading_array[$i]=$student_data_heading; 
 $value_array=$value_array."$student_data_value"; 
}else{
 $heading_array[$i]=$student_data_heading; 
 $value_array=$value_array.",$student_data_value"; 
}
}
$filename = tempnam(sys_get_temp_dir(), "csv");
$file = fopen($filename,"w");

// Write column names
$fieldArray=array($heading_array);
fputcsv($file,$heading_array);
$qur23="select $value_array from student_tc where student_tc_status='Active'";
 $result = mysqli_query($conn37,$qur23);
for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $dataArray[$i] = mysql_fetch_assoc($result);
	
}
if(empty($dataArray)){
//header('location:student_admission_list.php');
echo "Data not Found In this Choosen Class please choose other Class. ";
	}else{
foreach ($dataArray as $line) {
    fputcsv($file,$line);
}

fclose($file);

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=Student Tc Info.csv");

// send file to browser
readfile($filename);
unlink($filename);
}
}
?>
