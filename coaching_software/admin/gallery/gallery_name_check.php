<?php 
 include("../attachment/session.php");
 $gallery_name=$_GET['id'];
 $sql="select * from gallery where gallery_name='$gallery_name'";
 $run=mysqli_query($conn37,$sql);
 $num=mysqli_num_rows($run);
 if($num>0){
 	echo "1";
 }else{
 	echo "0";
 }
?>