<?php include("../attachment/session.php");
$holiday_name=$_POST['holiday_name'];
$date_1 = $_POST['date'];
$date_2 = explode("-",$date_1);
$date=$date_2[2]."-".$date_2[1]."-".$date_2[0];
$description=$_POST['description'];
$day=date("l",strtotime($date));
$year=date("Y",strtotime($date));
 
$path_to_fcm = "https://fcm.googleapis.com/fcm/send";
      	$que="select * from login";
		$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
		while($row=mysqli_fetch_assoc($run)){
			 $server_key=$row['blank_field_4'];
			}
	  $que = "select fcm_token from fcm_info";
        $run = mysqli_query($conn37,$que);
       if (mysqli_num_rows($run) > 0) {
            $key=array();
       array_keys( $array);
       while ($row = mysql_fetch_assoc($run)) {
		  $key[]=$row["fcm_token"];
       }}else {
          echo "0 results";
     }
      for($i=0;$i<=count($key);$i++){
         $headers = array
			(
				'Authorization: key='. $server_key,
				'Content-Type: application/json'
			);
			$fields = array
			(
				'to'=> $key[$i],
				'notification'=> array('title'=>"Holiday",'body'=>$holiday_name."  ".$date)
			);
			$payload  = json_encode($fields);
			$curl_session = curl_init();
			curl_setopt( $curl_session,CURLOPT_URL,$path_to_fcm );
	        curl_setopt( $curl_session,CURLOPT_POST, true );
			curl_setopt( $curl_session,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $curl_session,CURLOPT_RETURNTRANSFER, true );
			curl_setopt ($curl_session, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt( $curl_session,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl_session,CURLOPT_POSTFIELDS, $payload);
			$result = curl_exec($curl_session);
 }
			curl_close($curl_session);

$query="insert into holiday_manage (holiday_name,holiday_date,holiday_date_new,holiday_day,holiday_month,holiday_year,holiday_description,session_value,$update_by_insert_sql_column) values ('$holiday_name','$date','$date_1','$day','$date_2[1]','$year','$description','$session1',$update_by_insert_sql_value)";
if(mysqli_query($conn37,$query)){
echo "|?|success|?|";
}
?>
