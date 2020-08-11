<?php 
if(!isset($_SESSION)){
session_start();
}
$database_blob1='new_coaching_blob';
$_SESSION['user_id']='Simption';
date_default_timezone_set("Asia/Calcutta"); 
$update_change=$_SESSION['user_id'];
$last_updated_date=date("Y-m-d h:i:sa");
$university_id='1';
$condition_with_where="";
$condition_without_where="";
$condition_insert_column=",updated_by,updation_date_time";
$condition_insert_value=",'$update_change','$last_updated_date'";
$condition_update=",updated_by='$update_change',updation_date_time='$last_updated_date'";
/*
$SERVER_NAME1=$_SERVER['SERVER_NAME'];
    $SERVER_NAME12=explode('.',$SERVER_NAME1);
    $count123=count($SERVER_NAME12);
    if($count123>2){
         $path23="https://".$SERVER_NAME12[1].".com/".$SERVER_NAME12[0];
        header('Location:'.$path23); 
    }
if(!isset($_SESSION['database_name1'])){
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


$coaching_info_coaching_board=$_SESSION['coaching_info_coaching_board'];
$multiple_coaching=$_SESSION['multiple_coaching'];
$coaching_info_medium=$_SESSION['coaching_info_medium'];
$shift=$_SESSION['shift'];


$filter37='';
if($multiple_coaching=='yes'){
$coaching_code=$_SESSION['coaching_code'];
if($coaching_code!='All'){
$filter37=$filter37."and coaching='$coaching_code'";
}
}
if($coaching_info_coaching_board=='Both'){
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
if($coaching_info_medium=='Both'){
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
$coaching_software_path="../coaching_software/";

$temp_folder_path="../../../".$_SESSION['database_name1']."/temp_documents";
$coaching_folder_path="../../../".$_SESSION['database_name1'];
	if(is_dir($coaching_folder_path)){
	if(!is_dir($temp_folder_path)){
    mkdir($temp_folder_path, 0755, true);
	}
	}

$blob_control='';
$document_path='';
$SERVER_NAME1=$_SERVER['SERVER_NAME'];
$path2343="https://".$SERVER_NAME1."/". $_SESSION['database_name1'];

*/

$session1=$_SESSION['session37'];

global $update_by_update_sql;
global $update_by_insert_sql_column;
global $update_by_insert_sql_value;

$update_change=$_SESSION['user_id'];
$last_updated_date=date("Y-m-d h:i:sa");

$update_by_insert_sql_column="update_change,last_updated_date";
$update_by_insert_sql_value="'$update_change','$last_updated_date'";
$update_by_update_sql="update_change='$update_change',last_updated_date='$last_updated_date'";



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

$language=$_SESSION["lang"];
$session12=$_SESSION["session37"];
$database_blob1='new_coaching_blob';

if($language=='Hindi'){
include("language_hindi.php");
}else{
include("language_english.php");
}
$coaching_software_path="../coaching_software/";


$pdf_path="../coaching_software/pdf/pdf/";
$pdf_database_name='';
$blob_control='';
$document_path='';

?>