<?php include("../attachment/session.php")?>
<script type="text/javascript">
	function check_gallery(gallery_name){
		$.ajax({
          type:"POST",
          url:access_link+"gallery/gallery_name_check.php?id="+gallery_name+"",
          cache:false,
          success:function(detail){
           if(detail==1){
           	$("#error2").html('Gallery name already exit');
           	$("#gallery_name3").focus();
           	document.getElementById("gallery_name3").style.borderColor = "red";
           	$("#update1").prop('disabled',true);
           }else{
           	$("#error2").html('');
           	document.getElementById("gallery_name3").style.borderColor = "blue";
           	$("#update1").prop('disabled',false);
           }
          }
		});
	}




$("#my_form").submit(function(e){
        e.preventDefault();
$("#modal_close").click();
    var formdata = new FormData(this);
        $.ajax({
            url: access_link+"gallery/view_gallery_update.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   $("#modal_close").click();
				   alert('Successfully Complete');
				   get_content('gallery/gallery');
            }
			}
         });
      });
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete_gallery(s_no);       
 }            
else  {      
return false;
 }       
  } 
function delete_gallery(s_no){
$.ajax({
type: "POST",
url: access_link+"gallery/gallery_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	alert('Successfully Deleted');
	get_content('gallery/gallery');
	}else{
	alert(detail); 
	}
}
});
}



</script>
	
 <?php 
if(!isset($_GET['id']))
{
   echo "<script>get_content('gallery/gallery');</script>";
}
else{
$id=$_GET['id'];
}
?>
 
<input type="hidden" id="gallery_name1" value="<?php echo $id;?>" />
 
      
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Gallery Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	 <li><a href="javascript:get_content('gallery/gallery')"><i class="fa fa-picture-o"></i> Gallery</a></li>
	 <li class="active">View Gallery</li>
      </ol>
    </section>

	
	
	
	<section class="content-header" id="my_tab">
		<button type="button" onclick="return valid('<?php echo $id; ?>');" class="btn btn-default my_background_color" style="float:right;" > Delete Gallery</button>
		<button type="button" class="btn btn-default my_background_color" style="float:right;" data-toggle="modal" data-target="#modal_edit"> Edit Gallery Name</button>
		<a href="javascript:post_content('gallery/add_photo_frame','id=<?php echo $id; ?>')" ><button type="button" class="btn btn-default my_background_color" style="float:right;" > + Add More Photos</button></a>
	 </section>

	
	 
	
	<section id="portfolio">
   	
   	
   	<div class="row" >
	
	

  	
		<!-----------------------------------------------Model Box Start----------------------------------------------------------->

	<div class="modal fade" id="modal_edit">
	 <form role="form" method="post" enctype="multipart/form-data" id="my_form">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header my_background_color">
					<button type="button" class="close" data-dismiss="modal" id="modal_close" aria-label="Close">
					  <span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Gallery Name</h4>
				  </div>
				  <div class="modal-body">
				 
				 <div class="col-md-12">
					<div class="form-group">
					   <input type="hidden"  name="gallery_name" placeholder="Name"  value="<?php echo $id; ?>" class="form-control" required>
					</div>
				  </div>
		   		<div class="col-md-12 ">		
					<div class="form-group">
					  <label>Old Gallery name <font style="color:red"><b>*</b></font></label>
					   <input type="text"  name="gallery_name" placeholder="Name"  value="<?php echo $id; ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-12 ">		
						<div class="form-group">
						  <label>New Gallery name <font style="color:red"><b>*</b> </font> <span style="color: red;" id="error2"></span></label>
						   <input type="text" id="gallery_name3" name="update_gallery_name" placeholder="Gallery Name"  value="" class="form-control" required oninput="check_gallery(this.value)">
						</div>
					</div>
			  </div>
				  <div class="modal-footer ">
					<button type="button" class="btn btn-default pull-left my_background_color"  data-dismiss="modal">Close</button>
					<input type="submit" id="update1" name="submit" value="Update Name" class="btn btn-primary my_background_color"  />
			
				  </div>
				</div>
				<!-- /.modal-content -->
			  </div>
				 </form> 
			</div>
				

   			

	        		
	<div class="col-md-12">   
<iframe
src="../coaching_software/admin/gallery/view_gallery_new.php?id=<?php echo $id; ?>" height="600" width="100%"></iframe>	
                          
	        		

				

				
					
					
					
					
   			</div> <!-- end folio-wrap -->
   		</div> <!-- end twelve -->
   	</div> <!-- end portfolio-content -->   	

   </section>  <!-- end portfolio -->

	
	
	

    
  
