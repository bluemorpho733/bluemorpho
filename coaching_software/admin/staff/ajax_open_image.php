<?php include("../attachment/session.php"); ?>
<?php
 
             $image_type=$_GET['image_type'];
             $emp_id=$_GET['emp_id'];
				  	$que1="select * from employee_info where emp_id='$emp_id'";
    $run1=mysqli_query($conn37,$que1);
    while($row1=mysqli_fetch_assoc($run1)){
$image=$row1[$image_type];
	}
?>


<script>
$('#myModal').modal('show'); 
</script>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" width="150%" style="margin-right:400px;">
    
      <!-- Modal content-->
      <div class="modal-content" >
	   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
 <img  src="<?php echo 'data:image;base64,'.$image; ?>"  height="400" width="100%" style="margin-top:10px;">
					
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
