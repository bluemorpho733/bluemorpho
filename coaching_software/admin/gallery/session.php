<?php 
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['user_id'])){
echo "<script>window.open('index.php','_self')</script>";	
}
$access_control1=$_SERVER['SCRIPT_NAME'];
$access_control2=explode('/',$access_control1);
$x=count($access_control2);
if(count($access_control2)>4){
$access_control=$access_control2[3];
$panel_name1='panel_'.$access_control;
if(isset($_SESSION[$panel_name1])){
}
else{
echo "<script>get_content('index_content')</script>";
}

}

if(count($access_control2)>4){
$access_control=$access_control2[4];
$access_control231=explode('.',$access_control);
$panel_name12='sub_panel_'.$access_control231[0];
if($panel_name12!=$panel_name1){
if(isset($_SESSION[$panel_name12])){
echo "<script>get_content('index_content')</script>";
}
else{

}
}
}
$class_fliter37='';
$session1=$_SESSION['session37'];





$school_info_school_board=$_SESSION['school_info_school_board'];
$multiple_school=$_SESSION['multiple_school'];
$school_info_medium=$_SESSION['school_info_medium'];
$shift=$_SESSION['shift'];


$filter37='';
if($multiple_school=='yes'){
$school_code=$_SESSION['school_code'];
if($school_code!='All'){
$filter37=$filter37."and school='$school_code'";
}
}
if($school_info_school_board=='Both'){
 $board_change=$_SESSION['board_change'];
if($board_change!='Both'){
$filter37=$filter37."and board='$board_change'";
}
}
if($shift=='yes'){
$shift_change=$_SESSION['shift_change'];
if($shift_change!='Both'){
$filter37=$filter37."and shift='$shift_change'";
}
}
if($school_info_medium=='Both'){
$medium_change=$_SESSION['medium_change'];
if($medium_change!='Both'){
$filter37=$filter37."and student_medium='$medium_change'";
}
}
date_default_timezone_set("Asia/Calcutta");  
$con371="../../../con73/con37.php";
$con372="../../con73/con37.php";
if(file_exists($con371)){
	include($con371);
}else if(file_exists($con372)){
	include($con372);
}else{
	echo "no database";
}
?>
<?php
$language=$_SESSION["lang"];
$session12=$_SESSION["session37"];


if($language=='Hindi'){
include("language_hindi.php");
}else{
include("language_english.php");
}
$school_software_path="../school_software/";
$temp_folder_path="../../../".$_SESSION['database_name1']."/temp_documents";
	if(!is_dir($temp_folder_path)){
    mkdir($temp_folder_path, 0755, true);
	}
$pdf_path="../school_software/pdf/pdf/";
$pdf_database_name='';
$blob_control='';
$document_path='';
?>