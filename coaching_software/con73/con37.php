<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "coaching_pro";
// Create connection
$conn37 = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn37) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>