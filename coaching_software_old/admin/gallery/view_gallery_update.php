<?php include("../attachment/session.php");
$gallery_name = $_POST['gallery_name'];
$update_gallery_name = $_POST['update_gallery_name'];
$sql="UPDATE gallery SET `gallery_name`='$update_gallery_name' WHERE gallery_name='$gallery_name '";
if(mysqli_query($conn37,$sql)){
echo "|?|success|?|";
}else{
	echo "Update Error";
}
 
?>
