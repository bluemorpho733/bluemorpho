<?php include("../attachment/session.php"); 
$id=$_GET['id'];
$query="delete from issue_book where id=$id";

if(mysqli_query($conn37,$query)){
	echo "|?|success|?|";
}
?>