<?php
$language=$_SESSION["lang"];
$session12=$_SESSION["session37"];


if($language=='Hindi'){
include("../attachment/language_hindi.php");
}else{
include("../attachment/language_english.php");
}
$coaching_info_username5=$_SESSION["coaching_info_username5"];
$coaching_info_logo5=$_SESSION["coaching_info_logo5"];
$coaching_info_coaching_contact_no5=$_SESSION["coaching_info_coaching_contact_no5"];
$coaching_info_principal_name5=$_SESSION["coaching_info_principal_name5"];
$coaching_info_coaching_name5=$_SESSION["coaching_info_coaching_name5"];
$software_validity_form=$_SESSION["software_validity_form"];
$software_validity_to=$_SESSION["software_validity_to"];
$path=$_SESSION["path"];
$coaching_info_coaching_name=$_SESSION["coaching_info_coaching_name"];
$coaching_info_username=$_SESSION["coaching_info_username"];
$coaching_info_coaching_contact=$_SESSION["coaching_info_coaching_contact"];
$coaching_info_principal_name=$_SESSION["coaching_info_principal_name"];
?>
  

		
<script>
if(!!window.performance && window.performance.navigation.type===2){
window.location.reload();
}
</script>
<script>
function change_lang(){
$('#finish2').click();
}
function session_change12(){
$('#finish23').click();
}

function medium_change12(){
$('#medium_finish23').click();
}

function board_change12(){
$('#board_finish23').click();
}

function coaching_change12(){
$('#coaching_finish23').click();
}

function shift_change12(){
$('#shift_finish23').click();
}
function hindi_typing_lang(){
$('#hindi_typing_finish23').click();
}

	   function for_change(set_value,set_param){

       $.ajax({
			  type: "POST",
              url: access_link+"attachment/set_header_details.php?set_param="+set_param+"&set_value="+set_value+"",
              cache: false,
              success: function($detail){
                
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


<header class="main-header">
	
	
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" id="coaching_name234" >BLUEMORPHO1</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" id="coaching_name234" >BLUEMORPHO</span>
      <span class="logo-lg" id="coaching_name2341" ><?php   echo $coaching_info_coaching_name; ?></span>
     
	  
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

<h6 id="coaching_name2341" style="color:black;  font-size:15px; margin-top:22px; margin-bottom:-55px; padding-left:30px; padding-right:50px; margin-left:15px;">Annual Maintenance Free Service Date: <?php echo $software_validity_form; ?> To <?php echo $software_validity_to; ?></h6>

<h4 id="coaching_name" style="color:white; margin-top:23px; margin-bottom:-45px; padding-left:30px; padding-right:50px;"><b><?php   echo $coaching_info_coaching_name; ?></b></h4> </br>

    

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $path; ?>" height="15" width="15" class="img-circle">
              <span class="hidden-xs"><?php echo $coaching_info_principal_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $path; ?>" height="70" width="70" class="img-circle">

                <p>
                  <?php echo $coaching_info_principal_name; ?>
                  <small><?php echo $coaching_info_username; ?></small>
				  <small><?php echo $coaching_info_coaching_contact_no5; ?></small>
				  
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../coaching_info/coaching_info_general.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../attachment/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
         
            <a href="#" data-toggle="control-sidebar">  <img src="../../images/change_skin.png" height="20" width="20" class="img-circle"></a>
          </li>
        </ul>
      </div>
    </nav>
	<nav class="navbar" style="background-color:#FFFFFF;">
     <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav">
       <li class="dropdown col-md-12">
		 
		     <form  method="post" enctype="multipart/form-data" >
			  			
				
				<label><font style="color:black" size="3">Font</font></label>
				<?php echo $_SESSION['lang'] ?>
		 		    <select  name="language_change" id="language_change" onchange="for_change(this.value,'lang');" style="width:100px; margin-top:10px;">
					           <option  value="<?php echo $_SESSION['lang'] ?>"> <?php echo $_SESSION['lang'] ?></option>
					        	 <?php if($_SESSION['lang']=='Hindi'){ ?>
					           <option  value="English">English</option>
							   <?php } else { ?>
					           <option  value="Hindi">Hindi</option> 
							     <?php } ?>
					    </select>
						
                                <label><font style="color:black"  size="3">Typing</font></label>								   
						 <select  name="hindi_typing" id="hindi_typing" onchange="hindi_typing_lang();" style="width:100px; margin-top:10px;">
					           <option  value="<?php echo $_SESSION['hindi_typing'] ?>"> <?php echo $_SESSION['hindi_typing'] ?></option>
					        	 <?php if($_SESSION['hindi_typing']=='Hindi'){ ?>
					           <option  value="English">English</option>
							   <?php } else { ?>
					           <option  value="Hindi">Hindi</option> 
							     <?php } ?>
					    </select>
						<?php if($_SESSION['coaching_info_medium']=='Both'){ ?>
						<label><font style="color:black" size="3">Medium</font></label>
						<select  name="medium_change" id="medium_change" onchange="medium_change12();" style="width:100px; margin-top:10px;">
					           <option  value="<?php echo $_SESSION['medium_change'] ?>"> <?php echo $_SESSION['medium_change'] ?></option>
					        	 <?php if($_SESSION['medium_change']=='Hindi'){ ?>
					           <option  value="English">English</option>
							    <option  value="Both">Both</option>
									 <?php } else if($_SESSION['medium_change']=='English'){ ?>
					           <option  value="English">Hindi</option>
							    <option  value="Both">Both</option>
							 
							   <?php } else { ?>
					           <option  value="Hindi">Hindi</option>
							    <option  value="English">English</option>
							     <?php } ?>
					    </select>
						<?php } ?>
									<?php if($_SESSION['shift']=='yes'){ ?>
									<label><font style="color:black"  size="3">Shift</font></label> 
						<select  name="shift_change" id="shift_change" onchange="shift_change12();" style="width:100px; margin-top:10px;">
					           <option  value="<?php echo $_SESSION['shift_change'] ?>"> <?php echo $_SESSION['shift_change'] ?></option>
					        	 <?php if($_SESSION['shift_change']=='Shift1'){ ?>
					           <option  value="Shift2">Shift2</option>
							    <option  value="Both">Both</option>
							<?php }else if($_SESSION['shift_change']=='Shift2'){ ?>
					           <option  value="Shift2">Shift1</option>
							    <option  value="Both">Both</option>
							
							   <?php } else { ?>
					           <option  value="Shift1">Shift1</option>
					           <option  value="Shift2">Shift2</option>
							  
							     <?php } ?>
					    </select>
						<?php } ?>

							<?php if($_SESSION['coaching_info_coaching_board']=='Both'){ ?>
                               <label><font style="color:black"  size="3">Board</font></label>
							    <select  name="board_change" id="board_change" onchange="board_change12();" style="width:100px; margin-top:10px;">
					           <option  value="<?php echo $_SESSION['board_change'] ?>"> <?php echo $_SESSION['board_change'] ?></option>
					        	 <?php if($_SESSION['board_change']=='MP Board'){ ?>
					           <option  value="CBSE">CBSE</option>
					           <option  value="Both">Both</option>
							   <?php } else if($_SESSION['board_change']=='CBSE'){ ?>
					           <option  value="MP Board">MP Board</option>
							    <option  value="Both">Both</option>
							     <?php } else{ ?>
								  <option  value="MP Board">MP Board</option>
							  <option  value="CBSE">CBSE</option>
								  <?php }  ?>
					    </select>
						<?php } ?>
						
						<?php if($_SESSION['multiple_coaching']=='yes'){ ?>
						<label><font style="color:black"  size="3">Coaching</font></label>
							    <select  name="coaching_change" id="coaching_change" onchange="coaching_change12();" style="width:100px; margin-top:10px;">
								<?php $qur3098="select coaching_code from multiple_coaching";
								$run3098=mysql_query($qur3098) or die(mysql_error());
				        while($row3098=mysql_fetch_array($run3098)){
				       $coaching_code = $row3098['coaching_code']; ?>
					           <option <?php if($_SESSION['coaching_code']!='All'){ if($coaching_code==$_SESSION['coaching_code']){ echo "selected"; } } ?> value="<?php echo $coaching_code ?>"> <?php echo $coaching_code ?></option>
							     <?php  } ?>
								  <option  <?php if($_SESSION['coaching_code']=='All'){ echo "selected"; } ?> value="All">All</option>
					    </select>
						<?php } ?>
						
						
						<input type="submit" name="finish2" id="finish2" value="Submit" class="btn  my_background_color" style="display:none"/>
						
					<label><font style="color:black"  size="3">Session</font></label>
							    <select  name="session_change" id="session_change" onchange="session_change12();" style="width:100px; margin-top:10px;">
							<?php 
							$session_value23=$_SESSION['session_value'];
							for($d=0;$d<count($session_value23);$d++) { 
							$session_value12321=explode('_',$session_value23[$d]);
				        $session_show=$session_value12321[0].'-'.$session_value12321[1];
							
							?>
							
					           <option  <?php if($session12==$session_value23[$d]){ echo 'selected'; }?> value="<?php echo $session_value23[$d]; ?>"> <?php echo $session_show; ?></option>
					        	 <?php } ?>
					    
					    </select>
						<input type="submit" name="finish23" id="finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						<input type="submit" name="board_finish23" id="board_finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						<input type="submit" name="shift_finish23" id="shift_finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						<input type="submit" name="medium_finish23" id="medium_finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						<input type="submit" name="coaching_finish23" id="coaching_finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						<input type="submit" name="hindi_typing_finish23" id="hindi_typing_finish23" value="Submit" class="btn  my_background_color" style="display:none"/>
						</form>
          </li>
	
        </ul>
      </div>
   </nav>
	
  </header>
<div id="coaching_name2341"> 
<br><br><br>
</div>
  <?php 
if(isset($_POST['finish2'])){
	   $_SESSION['lang']=$_POST['language_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   	   if(isset($_POST['finish23'])){
	   $_SESSION['session37']=$_POST['session_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   
	   	   	   if(isset($_POST['board_finish23'])){
	   $_SESSION['board_change']=$_POST['board_change'];
	   $_SESSION['coaching_info_coaching_board']=$_POST['board_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   	   	   if(isset($_POST['medium_finish23'])){
	   $_SESSION['medium_change']=$_POST['medium_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   	   	   if(isset($_POST['shift_finish23'])){
	   $_SESSION['shift_change']=$_POST['shift_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   	   	   if(isset($_POST['coaching_finish23'])){
	   $_SESSION['coaching_code']=$_POST['coaching_change'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   	   	   	   if(isset($_POST['hindi_typing_finish23'])){
	   $_SESSION['hindi_typing']=$_POST['hindi_typing'];
	echo "<script>window.open(window.location,'_self')</script>";
	   }
	   
	?>
	    <script>window.jQuery || document.write('<script src="../../loader/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="../../loader/js/main.js"></script>
	<script type="text/javascript" src="../../assests/js/jquery.min.js"></script>

	<script type="text/javascript" src="../../assests/js/pramukhime.js"></script>
	<script type="text/javascript" src="../../assests/js/pramukhindic.js"></script>

		
	<script type="text/javascript">
	
		$(document).ready(function () {
			pramukhIME.addKeyboard(PramukhIndic);

			pramukhIME.enable();
	
		});
	
	</script>