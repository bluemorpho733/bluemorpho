
<?php
include("../attachment/session.php");

$update_record=$_GET['id'];

$query="update complaint_staff set staff_complaint_seen_or_unseen='Seen',$update_by_update_sql  where s_no='$update_record' ";

if(mysqli_query($conn37,$query)){

		echo "|?|success|?|";
}
?>