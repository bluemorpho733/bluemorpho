<?php include("../attachment/session.php")?>
<script>
window.scrollTo(0, 0);
</script>
	<style>
	#gallery_list:after {
	content: "\f178";
	display: inline-block;
	padding-right: 3px;
	vertical-align: middle;
	font-weight:400;
	font-family: fontawesome;
	padding: 0 20px;
	color: #3c8dbc;
    }
	#gallery_list{
    width: 200px;
    border: 2px solid #3c8dbc;
    padding-right: -5px;
    padding-left: 5px;
    padding-bottom: 5px;
    padding-top: 5px;
	}
	.inputDnD {
    .form-control-file {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 6em;
    outline: none;
    visibility: hidden;
    cursor: pointer;
    background-color: #c61c23;
    box-shadow: 0 0 5px solid currentColor;
    &:before {
      content: attr(data-title);
      position: absolute;
      top: 0.5em;
      left: 0;
      width: 100%;
      min-height: 6em;
      line-height: 2em;
      padding-top: 1.5em;
      opacity: 1;
      visibility: visible;
      text-align: center;
      border: 0.25em dashed currentColor;
      transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
      overflow: hidden;
    }
    &:hover {
      &:before {
        border-style: solid;
        box-shadow: inset 0px 0px 0px 0.25em currentColor;
      }
    }
  }
}

body {
  background-color: #f7f7f9;
}
	</style>
       <section class="content-header">
      <h1>
        Gallery Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
	 <li class="active">Gallery</li>
      </ol>
    </section>

   <section id="portfolio">
   		 <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title">Gallery</h3>
             </div>
 
   	<div class="row">
   		<div class="col-twelve">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="padding:20px 20px 10px 10px;">
		  <!-- /.box -->
         <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <h3 class="box-title">Add Gallery <small style="color:red;">( Upload Image Less than 2MB )</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			  <a href="javascript:get_content('gallery/image_upload_frame')"><button type="button" class="btn btn-default my_background_color"  style="float:right;" >
                + Add New Gallery</button></a>
				<button type="button" style='display:none' id="new_button" data-toggle="modal" data-target="#modal-default">
               </button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
 <div class="col-md-4"></div>				
  <!-----------------------------------------------Model Box End------------------------------------------------------------>		
<div id="folio-wrap" class="bricks-wrapper col-md-12">
	<center>
		<div class="page-header">
		  <h3 id="gallery_list">Gallery List</h3>
		</div>	
	</center>	
	
	<?php		
		$que="select * from gallery GROUP BY gallery_name";
		$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
		while($row=mysqli_fetch_assoc($run)){
		$gallery_name=$row['gallery_name'];
		$image_name=$row['image_name'];
		$image_name_blob=$row['image_name_blob'];
    ?>			
	<div class="col-md-4"> 
		<center>
		<a href="javascript:post_content('gallery/view_gallery','id=<?php echo $gallery_name; ?>')" class="overlay">
		<img src="data:image/jpeg;base64,<?php echo $image_name_blob; ?>"  style="width:300px; height:200px;" >                    
		</a>
		</center>
		<center><a href="javascript:post_content('gallery/view_gallery','id=<?php echo $gallery_name; ?>')"><button type="button" class="btn btn-danger"><?php echo $gallery_name ;?></button></a></center><br><br>
	</div>
		<?php } ?>		
</div>
   		</div>
   	</div>   	
   </section>

	