<?php include("../attachment/session.php");
	 
    $student_complaint_teacher_reply = $_POST['student_complaint_teacher_reply'];
	$reply_roll_no = $_POST['reply_roll_no'];
	
		$path_to_fcm = "https://fcm.googleapis.com/fcm/send";
       										$que="select * from login";
												$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
												
												while($row=mysqli_fetch_assoc($run)){

													 $server_key=$row['blank_field_4'];
													}
		
		$que1 = "select student_complaint_roll_no from complaint_student where s_no='$reply_roll_no'";
		$run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
		while($row1=mysqli_fetch_assoc($run1)){

		 $roll_no=$row1['student_complaint_roll_no'];
		}
											
        $que = "select fcm_token from fcm_info where roll_number='$roll_no'";
        $run = mysqli_query($conn37,$que);
        $row = mysqli_fetch_assoc($run);
        $fcm_token= $row['fcm_token'];
       
         $headers = array
			(
				'Authorization: key='. $server_key,
				'Content-Type: application/json'
			);
			$fields = array
			(
				'to'=> $fcm_token,
				'notification'=> array('title'=>"Complaint Reply",'body'=>$student_complaint_teacher_reply)
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
 
			curl_close($curl_session);
	
 
	
	$quer="update complaint_student set student_complaint_teacher_reply='$student_complaint_teacher_reply',student_complaint_seen_or_unseen='Seen',$update_by_update_sql  where s_no='$reply_roll_no'";

 
if(mysqli_query($conn37,$quer)){

	echo "|?|success|?|";
}

?>