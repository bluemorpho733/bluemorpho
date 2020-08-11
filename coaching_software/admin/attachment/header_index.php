<?php
//$language=$_SESSION["lang"];
$session12=$_SESSION["session37"];
// if($language=='Hindi'){
// include("language_hindi.php");
// }else{
// include("language_english.php");
// }

$school_full_name=$_SESSION["school_full_name"];
$school_short_name=$_SESSION["school_short_name"];
$school_email=$_SESSION["school_email"];
$school_contact_no=$_SESSION["school_contact_no"];
$school_principal_name=$_SESSION["school_principal_name"];
//$coaching_info_logo5=$_SESSION["coaching_info_logo5"];
$coaching_info_logo5='';



?>
<script>
if(!!window.performance && window.performance.navigation.type===2){
window.location.reload();
}



	   function for_change_header(set_value,set_param){

       $.ajax({
			  type: "POST",
              url: access_link+"attachment/set_header_details.php?set_param="+set_param+"&set_value="+set_value+"",
              cache: false,
              success: function($detail){
                  if(set_param=='lang'){
                window.location.reload();
                  }else if(set_param=='hindi_typing'){
                   var    langue345=set_value;
                    $("#hindi_typing").val(langue345);
                            	
                       	if(langue345=='Hindi'){
                      		
                            	

			pramukhIME.setLanguage('hindi', 'pramukhindic');
				    var kb = new PramukhIndic('hindi');
var settings = [{language:'all', kb: 'pramukhindic', digitInEnglish: true}];
pramukhIME.setSettings(settings);
	}else{
	    	pramukhIME.addKeyboard(PramukhIndic);
            pramukhIME.enable();
            pramukhIME.setLanguage('english', 'pramukhime');
	}
                      
                  }else{
					  //alert($detail);
                      url_control();
                  }
              }
           });
}
</script>
<style>
@media screen and (min-width: 1193px) {
#coaching_name{
display:block;
}

}
@media screen and (max-width: 1192px) {
#coaching_name{
display:none;
}

}
@media screen and (max-width: 768px) {
#coaching_name234{
display:none;
}
#coaching_name2341{
display:block;
}
}

</style>


<header class="main-header" >

    <!-- Logo -->
    <a href="main.php" class="logo" style="background:linear-gradient(to bottom, #4F00BC, #29ABE2 );">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" id="coaching_name234" >BLUEMORPHO1</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" id="coaching_name234" >BLUEMORPHO</span>
      <span class="logo-lg" id="coaching_name2341" ><?php echo $school_short_name; ?></span>
	  
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:linear-gradient(to bottom, #4F00BC 0%, #29ABE2 100%);">
      <!-- Sidebar toggle button-->


<h4 id="coaching_name" style="color:white;  margin-bottom:-50px; padding-left:35px; padding-right:50px;"><b><?php echo $school_short_name; ?></b></h4> </br>

    

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo 'data:image;base64,'.$coaching_info_logo5; ?>" height="15" width="15" class="img-circle">
              <span class="hidden-xs"><?php echo $school_email; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo 'data:image;base64,'.$coaching_info_logo5; ?>" height="70" width="70" class="img-circle">

                <p>
                  <small><?php echo $school_email; ?></small>
				          <small><?php echo $school_contact_no; ?></small>
				  
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:get_content('school_details/school_profile')" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:get_content('attachment/logout')" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
    
        </ul>
      </div>
    </nav>
	<nav class="navbar" style="background-color:#FFFFFF;">
     <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav">
       <li class="dropdown col-md-12">
		      
		     <form  method="post" enctype="multipart/form-data" >
			  			
				<!-- <button class="btn-primary"><a style="color:White"  href="<?php //echo $coaching_software_path; ?>images/font_help.jpeg" target="_blank" >Font Help</a></button> -->
				<!-- <label><font style="color:black" size="3">Font</font></label>
		 		    <select  name="language_change" id="language_change" onchange="for_change_header(this.value,'lang');" style="width:100px; margin-top:10px;">
					           <option  value="<?php //echo $_SESSION['lang'] ?>"> <?php //echo $_SESSION['lang'] ?></option>
					        	 <?php //if($_SESSION['lang']=='Hindi'){ ?>
					           <option  value="English">English</option>
							   <?php //} else { ?>
					           <option  value="Hindi">Hindi</option> 
							     <?php //} ?>
					    </select> -->
						
						<!-- <?php //if($_SESSION['coaching_info_medium']=='Both'){ ?>
						<label><font style="color:black" size="3">Medium</font></label>
						<select  name="medium_change" id="medium_change" onchange="for_change_header(this.value,'medium_change');" style="width:100px; margin-top:10px;">
					           <option  value="<?php //echo $_SESSION['medium_change'] ?>"> <?php //echo $_SESSION['medium_change'] ?></option>
					        	 <?php //if($_SESSION['medium_change']=='Hindi'){ ?>
					           <option  value="English">English</option>
							    <option  value="Both">Both</option>
									 <?php //} else if($_SESSION['medium_change']=='English'){ ?>
					           <option  value="English">Hindi</option>
							    <option  value="Both">Both</option>
							 
							   <?php //} else { ?>
					           <option  value="Hindi">Hindi</option>
							    <option  value="English">English</option>
							     <?php //} ?>
					    </select>
						<?php //} ?> -->
									
						
						
						
						
						<input type="submit" name="finish2" id="finish2" value="Submit" class="btn  my_background_color" style="display:none"/>
						<label><font style="color:black"  size="3">Session</font></label>
						<select  name="session_change" id="session_change" onchange="for_change_header(this.value,'session37');" style="width:100px; margin-top:10px;">
						<?php 
						$session_value23=$_SESSION['session37'];
						$sql1="select session from session_details where session_status='Active'";
						$run1=mysqli_query($conn37,$sql1);
						while($row1=mysqli_fetch_assoc($run1)){
						$session_value1232=$row1['session'];
						?>
						<option  <?php if($session12==$session_value1232){ echo 'selected'; }?> value="<?php echo $session_value1232; ?>"> <?php echo $session_value1232; ?></option>
						<?php } ?>
						</select>
					
						</form>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<div id="coaching_name2341"> 
</div>


<script>
   var x675= window.location.href; 
   var y657=x675.split('.com');
   var z435=y657[1].split('/');
   var b24356=document.getElementById('a9876').value;
   var b124356=document.getElementById('a19876').value;
   var p1544=b24356+'1';
   if(( z435[1]==b24356 || z435[1]==p1544 ) && z435[1]!='coaching_software' ){
   }else{
  window.open(b124356,'_self');
   }
</script>