<?php include("../coaching_software/admin/attachment/session_index.php")?>  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management Software By Blue Morpho Pvt Ltd </title>
		
		<meta name="keywords" content="School Management Software, Hostel management Software, best Hostel Software, Coaching Hostel Software, Hostel ERP Software, Hostel Student management Software, Hostel management"/>
       
	   <meta name="description" content="Simption Tech Pvt Ltd Provides a Coaching management Software That Contains Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application."/>

    <link rel="shortcut icon" type="image/icon" href="../../coaching_assets/images/favicon.png"/>
	
	<meta property="article:publisher" content="https://www.facebook.com/simptiontechpvtltd/" />
	<meta name="msvalidate.01" content="C676B6D610F3665D3D6AFE5BFA86FAC5" />
<meta name="twitter:site" content="@simption_tech" />
<META NAME="ROBOTS" CONTENT="ALL">
<meta name="author" content="Simption Tech Pvt Ltd">
<meta name="designer" content="http://www.simption.com">
<meta name="robots" content="default, follow, all">
<meta name="rating" content="General">
<meta name="classification" content="Simption Coaching Management Software"/>
<meta name="Language" content="us-en"/> 
<meta name="Audience" content="All"/> 
<meta name="distribution" content="Global"/> 
<meta name="googlebot" content="index, follow"/>
<meta name="Revisit-After" content="1 days"/> 
<meta name="google-site-verification" content="googleffc254dfcdc26a00" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="category" content="Simption Coaching Management Software is a best software For Coaching Management. Simption Coaching Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
 <link rel="canonical" href="http://simptiontechpvtltd.blogspot.in/2017/07/new-latest-gst-software-updated-for.html"/>
   

<meta property="og:url"           content="http://www.coaching.simption.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Simption Coaching Management Software" />
	<meta property="og:description"   content="Simption Coaching Management Software is a best software For Coaching Management. Simption Coaching Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
	<meta property="og:image"         content="https://lh3.googleusercontent.com/-bJcXHC79Mdo/WGzq4GKuqiI/AAAAAAAAAfQ/IzvLYf3eib0gTEPzMP5TayWQtE8RhicCwCJoC/w426-h298/simptionbanner.jpg" /> 
 <?php include("../coaching_software/admin/attachment/link_css.php")?>
 
 <style>
     .load-bar {
  position: relative;
  margin-top: 0px;
  width: 100%;
  height: 3px;
  background-color: #34fa2c;
}
.bar {
  content: "";
  display: inline;
  position: absolute;
  width: 0;
  height: 100%;
  left: 50%;
  text-align: center;
}
.bar:nth-child(1) {
  background-color: #fa4733;
  animation: loading 1s linear infinite;
}
.bar:nth-child(2) {
  background-color: #3078f7;
  animation: loading 1s linear 300ms infinite;
}
.bar:nth-child(3) {
  background-color: #45fa2c;
  animation: loading 1s linear 500ms infinite;
}
@keyframes loading {
    from {left: 50%; width: 0;z-index:100;}
    33.3333% {left: 0; width: 100%;z-index: 10;}
    to {left: 0; width: 100%;}
}
 </style>
<input type='hidden' value='<?php echo $_SESSION['hindi_typing']; ?>' id="language_change_37" >
 <input type="hidden" value="" id="hidden_value1"/>
<input type="hidden" value="" id="hidden_value2"/>
<script>





var access_link='../coaching_software/admin/';
var css_js_path='../../coaching_software';
	var langue345=document.getElementById('language_change_37').value;
   var loader_div="<div class='load-bar'><div class='bar'></div><div class='bar'></div><div class='bar'></div></div>";
function get_content(link){


     $("#get_content").html(loader_div);
       var hidden_value22= $('#hidden_value2').val();
   if(hidden_value22==0){
      $('#hidden_value1').val('0');
   }else{
       $('#hidden_value2').val('0');
   }
	var url2="../coaching_software/admin/"+link+".php";
    $.get(url2, function(data, status){
        $("#get_content").html(data);
		window.location.hash = "#"+link;
		
    });
 

}
function post_content(link,content){


     $("#get_content").html(loader_div);
          var hidden_value22= $('#hidden_value2').val();
   if(hidden_value22==0){
      $('#hidden_value1').val('0');
   }else{
       $('#hidden_value2').val('0');
   }
	$.ajax({
type: "POST",
url: "../coaching_software/admin/"+link+".php?"+content,
cache: false,
success: function(data){
 $("#get_content").html(data);
		window.location.hash = "#"+link+"?"+content;
}
});

}
</script>

<body class="hold-transition skin-blue fixed sidebar-mini">
 <?php include("../coaching_software/admin/attachment/header_index.php")?>
 <?php include("../coaching_software/admin/attachment/sidebar_index.php")?>

 <div class="content-wrapper" id="get_content">
 

 </div>

  <?php include("../coaching_software/admin/attachment/link_js.php")?>

 <?php include("../coaching_software/admin/attachment/sidebar_2.php");?>

 <?php include("../coaching_software/admin/attachment/footer.php")?>

 

</body>
</html>
 	<script type="text/javascript" src="../coaching_software/assests/js/pramukhime.js"></script>
	<script type="text/javascript" src="../coaching_software/assests/js/pramukhindic.js"></script>

		

<script>
function url_control(){
var url=window.location.href;
var url1=url.split('#');
var hash_tag=url1.length;
if(hash_tag<2)
{
get_content('index_content');
}else{
var url2=url1[1].split('?');
var question_tag=url2.length;
if(question_tag<2){
get_content(url1[1]);
}else{
post_content(url2[0],url2[1]);	
}	
}
}
$(window).on('popstate', function (e) {
    var hidden_value11= $('#hidden_value1').val();
   if(hidden_value11==0){
       $('#hidden_value1').val('1');
       $('#hidden_value2').val('0');
   }else{
      $('#hidden_value2').val('1');
 url_control();
   }
});
$( document ).ready(function() {
    url_control();
});
	if(langue345=='Hindi'){
                      		
                       pramukhIME.addKeyboard(PramukhIndic);
            pramukhIME.enable();     	

			pramukhIME.setLanguage('hindi', 'pramukhindic');
				    var kb = new PramukhIndic('hindi');
var settings = [{language:'all', kb: 'pramukhindic', digitInEnglish: true}];
pramukhIME.setSettings(settings);
	}else{
	    	pramukhIME.addKeyboard(PramukhIndic);
            pramukhIME.enable();
            pramukhIME.setLanguage('english', 'pramukhime');
	}
</script>
	<script src="../coaching_software/admin/attachment/file_check.js"></script>