<?php session_start();
/*
	$SERVER_NAME1=$_SERVER['SERVER_NAME'];
    $SERVER_NAME12=explode('.',$SERVER_NAME1);
    $count123=count($SERVER_NAME12);
    if($count123>2){
        $path23="https://".$SERVER_NAME12[1].".com/".$SERVER_NAME12[0];
         header('Location:'.$path23); 
    }
if(!isset($_SESSION['session37'])){
echo "<script>window.open('index.php','_self')</script>";
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
*/
$session1=$_SESSION['session37'];
$con371="../coaching_software/con73/con37.php";
$con372="../con73/con37.php";
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
?>