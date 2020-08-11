<?php 
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['user_id'])){
echo "<script>alert('Your session has been Logged Out');</script>";	
echo "<script>window.close();</script>";	
}
include("../attachment/session.php")?>
<!--/script-->
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>
<script type="text/javascript">		
	function save_image(){
	$('#submit_button').click();
	}
	function modal_name123(){
	$('#old_button').click();
	}	
	function on_close(){
	window.close();
	}
    function on_close_reopen(){
	location.reload();
	}			
	function save_name(){
	var gallery_name1=document.getElementById('gallery_name1').value;
	if(gallery_name1!=''){
	$('#modal1').hide();
	$('#gallery_name').val(gallery_name1);
	$('#new_button').click();
	}else{
		alert("Please Provide Gallery Name !!!");
			//location.reload();
	}
	}
</script>
  <link rel="stylesheet" href="../../assests/css/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assests/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assests/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../assests/css/skins/_all-skins.min.css">
</head>
 <?php 
if(!isset($_GET['id']))
{
 // echo "<script>alert('ID has not been set!!! Please Open Again');</script>";	
//echo "<script>window.close();</script>";
}
else{
$id=$_GET['id'];
}
?>
 <input type="hidden"   value="<?php echo $id; ?>" id="gallery_name1" >
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="col-sm-4"></div>
<div class="col-sm-4" style="padding:100px 100px 10px 10px;">
	<button type="button" class="btn btn-default my_background_color"  id="old_button" style='display:none'data-toggle="modal" data-target="#modal1">
                + Add New Gallery</button>
	<button type="button" style='display:none' id="new_button" data-toggle="modal" data-target="#modal-default">
   </button>
</div>
 <div class="col-sm-4"></div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
   <section id="portfolio">
   	<div class="row">
   		<div class="col-twelve">
	 
				
		<!-----------------------------------------------Model Box Start----------------------------------------------------------->

	<div class="modal fade" id="modal-default">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header my_background_color">
					<button type="button" class="close" onclick="javascript:window.parent.post_content('gallery/view_gallery','id=<?php echo $id; ?>')" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add New Gallery</h4>
				  </div>
				  <div class="modal-body">
				
						
			
	<div class="file_upload">
	
		<form method="post"  action="add_more_photos.php" class="dropzone" enctype="multipart/form-data" >
		<div class="form-group">
						  <label>Gallery Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="gallery_name"  id="gallery_name" placeholder="Gallery Name"  accept=".gif, .jpg, .jpeg, .png"  class="form-control " >
						</div>
			<div class="dz-message needsclick dropzone">
				<strong>Drop files here or click to upload.</strong><br />
			</div>
	<button type="submit" name="submit1" id="submit_button" style="display:none;">Save changes</button>
		</form>		
	</div>		
				  
				  

				  </div>
				  <div class="modal-footer ">
					<button type="button" class="btn btn-default pull-left my_background_color" onclick="javascript:window.parent.post_content('gallery/view_gallery','id=<?php echo $id; ?>')" data-dismiss="modal">Close</button>
					<button type="button" onclick="save_image()" class="btn btn-primary my_background_color">upload</button>
				  </div>
				</div>
				<!-- /.modal-content -->
			  </div>
			  <!-- /.modal-dialog -->
			</div>
			
							
  <!-----------------------------------------------Model Box End------------------------------------------------------------>		
   	 <!-- end folio-wrap -->
   		</div> <!-- end twelve -->
   	</div> <!-- end portfolio-content -->   	
</div> 
   </section>  <!-- end portfolio -->
<script src="../../assests/js/jquery.min.js"></script>
<script src="../../assests/js/jquery-ui.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

 

</body>
</html>
<script>
save_name();	
</script>	
<?php
if(isset($_POST['submit1'])){
$gallery_name_1=$_POST['gallery_name'];
if(empty($gallery_name_1)){
$gallery_name_1=date('d-M-Y');
}
if(!empty($_FILES)){     
    $fileName = $_FILES['file']['name'];
    $uploadedfile = $_FILES['file']['tmp_name'];
	$fileName=rand(1000000,9999999).$fileName;
	 $imgData =base64_encode(file_get_contents($uploadedfile));	
		echo $mysql_insert = "INSERT INTO gallery (image_name, upload_time, gallery_name,image_name_blob)VALUES('".$fileName."','".date("Y-m-d H:i:s")."','$gallery_name_1','$imgData')";
		mysqli_query($conn37,$mysql_insert) or die(mysqli_error($conn37)); 
}
echo "<script>alert('your file has success fully uploaded !!! ');</script>";
echo "<script>window.parent.post_content('gallery/view_gallery','id=$gallery_name_1');</script>";
}

?> 