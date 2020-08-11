
<?php
include("../attachment/session.php");
$delete_record=$_GET['id'];
$date=date('Y/m/d');
$query="update school_library_book set school_library_book_status='Deleted',book_status_change_date='$date' where id='$delete_record'";
if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>