 <?php 
include("../../con73/con37.php");
	$que_bal="select * from sms_balance";
$run_bal=mysqli_query($conn37,$que_bal) or die(mysqli_error($conn37));
while($row_bal=mysqli_fetch_assoc($run_bal)){
$balance45=$row_bal['balance_amount'];
	$sms_username8 = $row_bal['sms_username'];
	$sms_password8 = $row_bal['sms_password'];
	$sms_sender_id8 = $row_bal['sms_sender_id'];
}
function sendDNDSMS($mobile, $msg){
		global $SETTINGS;
		global $sms_username8;
global $sms_password8;
global $sms_sender_id8;
global $balance45;
if($balance45>0){
		$param["username"] = $sms_username8;
		$param["password"] = $sms_password8;		
		$param["senderid"] = $sms_sender_id8;	
	-		
	    
		$param["route"] = "1";
		$reg='/^[A-Za-z0-9!@#$%^&* ]*$/';	
$stringlenght=strlen($msg);		
if(!preg_match($reg,$msg)){
    $msgcount=(int)($stringlenght/70+1);

		$param["unicode"] = "2";
		}else{
		$msgcount=(int)($stringlenght/140+1);
		}
		$param["number"] = $mobile;
		$param["message"] = $msg;
		
		
		 $request="";
		foreach($param as $key=>$val) { 
			$request.= $key."=".urlencode($val); 
			$request.= "&"; 
		
		}
		$request = substr($request, 0, strlen($request)-1); 
		
		 $url = "http://88.99.240.160/http-api.php?".$request; 
		$ch = curl_init($url); 
		
		curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 

		
		 $curl_scraped_page = curl_exec($ch); 
		 $msg_id1=explode(':',$curl_scraped_page);
		 $msg_id= trim($msg_id1[1]," ");
		 $contact_number=explode(',',$mobile);
	       $count=count($contact_number);
          for($c=0;$c<$count;$c++){
			$query="insert sms_info(contact_no,message_id,message) Values('$contact_number[$c]','$msg_id','$msg')"; 
			mysqli_query($conn37,$query) or die(mysqli_error($conn37));
			}
			$balance_amount1=$balance45-$count*$msgcount;
			$qer45="update sms_balance set balance_amount='$balance_amount1'";
			mysqli_query($conn37,$qer45);
		curl_close($ch); 
		
				
		return $curl_scraped_page;

		}else{
		echo "<script>alert('Your Msg Balance Is Too Low To Send');</script>";
		
	}	}

	
	function getDelivery($msg_id){
		error_reporting(E_ALL & ~E_NOTICE);
		global $SETTINGS;
		global $sms_username8;
       global $sms_password8;
       global $sms_sender_id8;

	
		 $url="http://88.99.240.160/http-dlr.php?username=$sms_username8&password=$sms_password8&msg_id=$msg_id&format=JSON";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$curl_scraped_page = curl_exec($curl);

		 $abc1=explode('[',(string)$curl_scraped_page);
			$abc12=explode('{',$abc1[1]);
			$i=1;
			while($abc12[$i]!=null){
			
			$abc123=explode('"',$abc12[$i]);
			   $contact=$abc123[7];
			   $delivery_time=$abc123[19];
			   $delivery_status=$abc123[23];
			   
			   $contact2=$contact[2].$contact[3].$contact[4].$contact[5].$contact[6].$contact[7].$contact[8].$contact[9].$contact[10].$contact[11].$contact[12];
			 
			 
		 $query="update sms_info set delivery_report='$delivery_status',delivery_date='$delivery_time' where message_id='$msg_id' and (contact_no='$contact' or contact_no='$contact2')"; 
              mysqli_query($conn37,$query) or die(mysqli_error($conn37));
		$i++;
			}
			
		curl_close($curl); 
	
				
		//return $curl_scraped_page;
	}
	?>