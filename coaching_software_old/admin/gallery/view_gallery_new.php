<?php 
include("../attachment/session.php");
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['user_id'])){
echo "<script>alert('Your session has been Logged Out !!! Please Login Again');</script>";	
echo "<script>window.close();</script>";	
}
if(!isset($_GET['id']))
{
  echo "<script>alert('ID has not been set!!! Please Open Again');</script>";	
echo "<script>window.close();</script>";	
}
else{
$id=$_GET['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Gallery, Gallery Management Software (Simption School Management Software</title>
		
		<meta name="keywords" content="School Management Software, Hostel management Software, best Hostel Software, School Hostel Software, Hostel ERP Software, Hostel Student management Software, Hostel management"/>
       
	   <meta name="description" content="Simption Tech Pvt Ltd Provides a School management Software That Contains Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application."/>

    <link rel="shortcut icon" type="image/icon" href="../../images/favicon.png"/>
	
	<meta property="article:publisher" content="https://www.facebook.com/simptiontechpvtltd/" />
	<meta name="msvalidate.01" content="C676B6D610F3665D3D6AFE5BFA86FAC5" />
<meta name="twitter:site" content="@simption_tech" />
<META NAME="ROBOTS" CONTENT="ALL">
<meta name="author" content="Simption Tech Pvt Ltd">
<meta name="designer" content="http://www.simption.com">
<meta name="robots" content="default, follow, all">
<meta name="rating" content="General">
<meta name="classification" content="Simption School Management Software"/>
<meta name="Language" content="us-en"/> 
<meta name="Audience" content="All"/> 
<meta name="distribution" content="Global"/> 
<meta name="googlebot" content="index, follow"/>
<meta name="Revisit-After" content="1 days"/> 
<meta name="google-site-verification" content="googleffc254dfcdc26a00" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="category" content="Simption School Management Software is a best software For School Management. Simption School Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
 <link rel="canonical" href="http://simptiontechpvtltd.blogspot.in/2017/07/new-latest-gst-software-updated-for.html"/>
   

<meta property="og:url"           content="http://www.school.simption.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Simption School Management Software" />
	<meta property="og:description"   content="Simption School Management Software is a best software For School Management. Simption School Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
	<meta property="og:image"         content="https://lh3.googleusercontent.com/-bJcXHC79Mdo/WGzq4GKuqiI/AAAAAAAAAfQ/IzvLYf3eib0gTEPzMP5TayWQtE8RhicCwCJoC/w426-h298/simptionbanner.jpg" /> 
<!--/script-->
  <link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>
	
<script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
     <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
<link rel="stylesheet" href="css/swipebox.css">
  <link href="css/style.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/slider.css">
  <script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

  <link rel="stylesheet" href="../../assests/css/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assests/css/font-awesome/css/font-awesome.min.css">
<script type="text/javascript">
	function check_gallery(gallery_name){
		$.ajax({
          type:"POST",
          url:"gallery_name_check.php?id="+gallery_name+"",
          cache:false,
          success:function(detail){
           if(detail==1){
           	$("#error2").html('Gallery name already exit');
           	//alert('Gallery name already exit plz enter another name');
           	$("#gallery_name3").focus();
           	document.getElementById("gallery_name1").style.borderColor = "red";
           	$("#save_name2").prop('disabled',true);
           }else{
           	$("#error2").html('');
           	document.getElementById("gallery_name1").style.borderColor = "blue";
           	$("#save_name2").prop('disabled',false);
           }
          }
		});
	}
</script>

	

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
		});
	});		
	function save_image1(){
	$('#submit_button1').click();
	}
	function edit(){
	$('#gallery_name_edit_button').click();
	}

	function check_confirm(){
	var con=confirm('Do you want to delete this Pic !!!');
	if(con==true){
	return true;
	}else{
	return false;
	}
	}
function check_gallery_delete(){
var con=confirm('Do you want to delete this Gallery?? All images will automatically delete from this gallery.');
if(con==true){

return true;
}else{

return false;
}
}
function valid_1(s_no){   
	var myval=confirm("Are you sure want to delete this record !!!!");
	if(myval==true){
	delete_gallery_image(s_no);       
	 }            
	else  {      
	return false;
	 }       
  } 
  function delete_gallery_image(s_no){
	  var gallery_name=$("#gallery_name_hidden").val();
	  var content1='id='+gallery_name;
	  //post_content('gallery/view_gallery',content1);
		$.ajax({
		type: "POST",
		url: "gallery_image_delete.php?id="+s_no+"",
		cache: false,
		success: function(detail){
	    var res=detail.split("|?|");
	   if(res[1]=='success'){
	   	 alert("Successfully Deleted..");
	   	 location.reload(true);
	   }else{
         alert(detail); 
	   }
		}
		});
}
</script> 

  	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
  <?php //include("../attachment/link_css.php")?>
</head>

<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">
    <?php // include("../attachment/header.php")?>
 <?php // include("../attachment/sidebar.php")?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
	<section id="portfolio">
   	<div class="row" >	
   		<div class="col-twelve">
   			<div id="folio-wrap" class="bricks-wrapper">					    
<?php		
 $que="select * from gallery where gallery_name='$id' ";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));

while($row=mysqli_fetch_assoc($run)){
		$image_name=$row['image_name'];
		$image_name_blob=$row['image_name_blob'];
		$image_path="data:image/jpeg;base64,'".base64_encode($image_name_blob)."'";
		$s_no=$row['s_no'];
?>			
<input type="hidden" value="<?php echo $id; ?>" id="gallery_name_hidden" >
<div class="col-lg-4">
			<th><a onclick="valid_1('<?php echo $s_no; ?>');" ><i class="fa fa-times" aria-hidden="true"></i></th>
				  <div class="item-wrap animate-this" data-src="data:image/jpeg;base64,<?php echo $image_name_blob; ?>">
	                  <a href="#" class="overlay" target="_blank">
	                  	<img src="data:image/jpeg;base64,<?php echo $image_name_blob; ?>" target="_blank" style="width:300px; height:200px;"> </a>
	               </div> 
				  <br>
</div>
	<?php }  ?>                            
	        		

				

				
					
					
					
					
   			</div> <!-- end folio-wrap -->
   		</div> <!-- end twelve -->
   	</div> <!-- end portfolio-content -->   	

   </section>  <!-- end portfolio -->

	
	
	

    
  </div>
  
	
</body>
</html>
		<!-- swipe box js -->
<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
</script>
    
<script src="js/jquery.filterizr.js"></script>
<script src="js/controls.js"></script>
    <!-- Kick off Filterizr -->
<script type="text/javascript">
	$(function() {
		//Initialize filterizr with default options
		$('.filtr-container').filterizr();
	});
</script>
	<!--//gallery-->
	 
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		*/
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>
	