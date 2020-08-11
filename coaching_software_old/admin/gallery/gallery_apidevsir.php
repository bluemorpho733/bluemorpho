<?php include("../attachment/session.php");

$gallery_name_1=$_POST['gallery_name'];
if(empty($gallery_name_1)){
$gallery_name_1=date('d-M-Y');
}
if(!empty($_FILES)){     
			


    echo $fileName = $_FILES['file']['name'];
	$imgData =base64_encode(file_get_contents($filename));
 
    									
												$que="select * from login";
												$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
												
												while($row=mysqli_fetch_assoc($run)){

													 $server_key=$row['blank_field_4'];
													}
										

    $path_to_fcm = "https://fcm.googleapis.com/fcm/send";
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
				'notification'=> array('title'=>"Gallery Images",'body'=>"Images of  ".$gallery_name_1)
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
    
    
    
   
		$mysql_insert = "INSERT INTO gallery (image_name, upload_time, gallery_name)VALUES('".$imgData."','".date("Y-m-d H:i:s")."','$gallery_name_1')";
		mysqli_query($conn37,$mysql_insert) or die(mysqli_error($conn37));
      
echo "|?|success|?|";
}
  


?>