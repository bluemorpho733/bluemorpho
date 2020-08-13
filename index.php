<?php
session_start();
?>
<!DOCTYPE html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login School Management Software By Blue Morpho Pvt Ltd Bhopal</title>
		
		<meta name="keywords" content="Coaching Management Software, Hostel management Software, best Hostel Software, Coaching Hostel Software, Hostel ERP Software, Hostel Student management Software, Hostel management"/>
       
	   <meta name="description" content="Simption Tech Pvt Ltd Provides a Coaching management Software That Contains Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
       Application,Teacher Android Application,Bus Driver Android Application."/>

    <link rel="shortcut icon" type="image/icon" href="coaching_software/images/favicon.png"/>
	
	<meta property="article:publisher" content="https://www.facebook.com/simptiontechpvtltd/" />
	<meta name="msvalidate.01" content="C676B6D610F3665D3D6AFE5BFA86FAC5" />
<meta name="twitter:site" content="@simption_tech" />
<META NAME="ROBOTS" CONTENT="ALL">
<meta name="author" content="Simption Tech Pvt Ltd">
<meta name="designer" content="http://www.simption.com">
<meta name="robots" content="default, follow, all">
<meta name="rating" content="General">
<meta name="classification" content="Simption Management Software"/>
<meta name="Language" content="us-en"/> 
<meta name="Audience" content="All"/> 
<meta name="distribution" content="Global"/> 
<meta name="googlebot" content="index, follow"/>
<meta name="Revisit-After" content="1 days"/> 
<meta name="google-site-verification" content="googleffc254dfcdc26a00" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="category" content="Simption  Management Software is a best software For Management. Simption Coaching Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
 <link rel="canonical" href="http://simptiontechpvtltd.blogspot.in/2017/07/new-latest-gst-software-updated-for.html"/>
   

<meta property="og:url"           content="http://www.simption.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="BlueMorpho Management Software" />
	<meta property="og:description"   content="BlueMorpho Management Software is a best software For Management. Simption  Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
	<meta property="og:image"         content="https://lh3.googleusercontent.com/-bJcXHC79Mdo/WGzq4GKuqiI/AAAAAAAAAfQ/IzvLYf3eib0gTEPzMP5TayWQtE8RhicCwCJoC/w426-h298/simptionbanner.jpg" /> 
 
 <link rel="stylesheet" href="coaching_software/assests/css/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="coaching_software/assests/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="coaching_software/assests/css/AdminLTE.min.css">
<style>


// .particles-js-canvas-el {
  // position: absolute;
  // left: 450px;
  // top: 0px;
  // z-index: -1;
// }	

// @media only screen and (max-width: 600px) {
  // .particles-js-canvas-el {
      // position: absolute;
  // left: 10px;
  // top: 0px;
  // z-index: -1;
  // }
  // .login-box-body{
	  // width:100%;
  // }
// }

#jijak{
	margin:-650px 0px 0px 0px ;
}
@media only screen and (max-width: 600px){
#jijak{
	margin:-120px 0px 0px 0px;
}
}
.field-icon {
  float: right;
  margin-left: -28px;
  margin-top: -28px;
  position: relative;
  z-index: 8;
}
</style>
</head>
<script>
function myFunction() {
	
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<body class="hold-transition login-page" style="background-image:linear-gradient(to right, #4F00BC , #29ABE2);">
<section class="content">
<div id="particles-js">
<script src="software/particles.js"></script>
<script src="coaching_software/assests/js12/app.js"></script>
<script src="coaching_software/assests/js12/lib/stats.js"></script>
		 
      <!-- Small boxes (Stat box) -->
      <div class="row">
	  
	       <!-- general form elements disabled -->
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
		
	<div class="col-md-4">
			</div>
			
      <div class="col-md-4" id="jijak" >
	  <br> <br> <br> <br> <br>
				  <?php
				  include("coaching_software/con73/con37.php");
				  $sql11="select default_session,school_short_name from school_details where school_status='Active'";
				  $run11=mysqli_query($conn37,$sql11) or die(mysqli_error($conn37));
				  while($row11=mysqli_fetch_assoc($run11)){
				  $default_session=$row11['default_session']; 
				  $school_short_name=$row11['school_short_name']; 
				  }
				  ?>
				  <div class="login-logo">
					<a href="" style="color:red;"><b><?php echo ucwords($school_short_name); ?></b></a>
				  </div>
				  <!-- /.login-logo -->
				  <div class="login-box-body">
					<p class="login-box-msg" style="color:red;">Enter Your Login Information</p>

				<form  method="post">
			<div class="form-group has-feedback">
				<input type="email" name="admin_name" required placeholder="User Name"  value="" class="form-control" >
				<span class="glyphicon glyphicon-phone form-control-feedback"></span>
			</div>
								
			<div class="form-group has-feedback">
				<input type="password" name="password1" required placeholder="Password" id="myInput"  value="" class="form-control" >
				<span toggle="#password-field" onclick="myFunction()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			</div>
				 <div class="form-group"  >
					  <select class="form-control"  name="session">
						<?php						
						$sql1="select session from session_details where session_status='Active'";
						$run1=mysqli_query($conn37,$sql1) or die(mysqli_error($conn37));
						while($row1=mysqli_fetch_assoc($run1)){
						$session_value1232=$row1['session'];
						$session_show=$session_value1232;
						?>
						<option <?php if($session_value1232==$default_session){ echo 'selected'; } ?> value="<?php echo $session_value1232; ?>"><?php echo $session_show; ?></option>
						<?php }  ?>
					  </select>
					</div>
					   <div class="row">
						<div class="col-xs-4">
						 					
						</div>
					
						<div class="col-xs-4">
						  <button type="submit" name="login"  class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
						<div class="col-xs-4">
						 					
						</div>
						
					  </div>
					</form>
						
				   
				  </div>
           </div>
		   <div class="col-md-4">
			</div>			
			
				
		
		

<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
  

<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

</div>
</section>
</body>
</html>

<?php

if(isset($_POST['login'])){
$session=mysqli_real_escape_string($conn37, $_POST['session']);
$user_email=mysqli_real_escape_string($conn37, $_POST['admin_name']);
$user_pass=mysqli_real_escape_string($conn37, $_POST['password1']);

$query23="select s_no,user_role from user_details where user_email='$user_email' and user_password='$user_pass' and user_status='Active'";
$run23=mysqli_query($conn37,$query23) or die(mysqli_error($conn37));
if(mysqli_num_rows($run23)>0){
$_SESSION['session37']=$session;
// $_SESSION['lang']="English";
// $_SESSION['hindi_typing']="English";
// $_SESSION['coaching_info_coaching_board'] ='';
// $_SESSION['shift'] = '';
// $_SESSION['multiple_coaching'] = '';
// $_SESSION['coaching_info_medium'] = '';
// $_SESSION['medium_change']='Both';
// $_SESSION['shift_change']='Both';
// $_SESSION['coaching_code']='All';
// $_SESSION['board_change']='';
// $_SESSION['software_validity_form'] ='';
// $_SESSION['software_validity_to'] ='';

$que="select * from school_details where school_status='Active'";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$_SESSION['school_full_name']= $row['school_full_name'];
$_SESSION['school_short_name']= $row['school_short_name'];
$_SESSION['school_email']= $row['school_email'];
$_SESSION['school_contact_no']= $row['school_contact_no'];
$_SESSION['school_principal_name']= $row['school_principal_name'];
}

// $que1="select * from coaching_document";
// $run1=mysqli_query($conn37,$que1) or die(mysqli_error($conn37));
// while($row1=mysqli_fetch_assoc($run1)){
// $_SESSION['coaching_info_logo5']= $row1['coaching_info_logo'];
// }

echo "<script>window.open('software/main.php','_self')</script>";
}else{
echo "<script>alert('User name or Password is incorrect!!')</script>";
}
}
?>
