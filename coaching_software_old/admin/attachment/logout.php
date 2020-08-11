<?php include("../attachment/session.php"); 
session_destroy();
 echo "<script>window.open('../index.php','_self')</script>";
?>
