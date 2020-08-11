<?php
function camera_code($size,$imagename,$uploadedfile,$data_id,$column_name2,$database_table,$data_match){
include("../../con73/con37.php");
if(strlen($imagename))
{

if(($column_name2=='student_image' || $column_name2=='student_father_image' || $column_name2=='student_mother_image' || $column_name2=='student_guardian_image'  ) && $size>(100*1024))
{
$widthArray = array(300);
$filename=compressImage($uploadedfile,$imagename,$widthArray);
}else if($size>(1024*1024)){
$widthArray = array(800);
$filename=compressImage($uploadedfile,$imagename,$widthArray);
}
else{
$filename=$uploadedfile;
}

$imgData =base64_encode(file_get_contents($filename));
unlink($filename);
$query11="update $database_table set `$column_name2`='$imgData' where $data_match='$data_id'";
mysqli_query($conn37,$query11);

}
}


function getExtension($str)
{
$i = strrpos($str,".");
if (!$i)
{
return "";
}
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}


function compressImage($uploadedfile,$imagename,$widthArray)
{
$path11 = "../my_image/";
if(!is_dir($path11)){
mkdir($path11, 0777, true);
}
$ext = strtolower(getExtension($imagename));
foreach($widthArray as $newwidth)
{
if($ext=="jpg" || $ext=="jpeg" )
{
$src = imagecreatefromjpeg($uploadedfile);
}
else if($ext=="png")
{
$src = imagecreatefrompng($uploadedfile);
}
else if($ext=="gif")
{
$src = imagecreatefromgif($uploadedfile);
}
else
{
$src = imagecreatefrombmp($uploadedfile);
}

list($width,$height)=getimagesize($uploadedfile);
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename = $path11.$newwidth.'_'.$imagename;
imagejpeg($tmp,$filename,100);
imagedestroy($tmp);
return $filename;
}
}
?>