<?php include("../attachment/session.php");
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$branch_code = $row['branch_code'];
}

?>
    <section class="content-header">
      <h1>
        Institute Branch
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Branch</li>
      </ol>
    </section>
<script>
	function valid(branch_code,active_inactive){
	var myval=confirm("Are you sure want to "+active_inactive+" this record !!!!");
	if(myval==true){
	delete_record(branch_code,active_inactive);
	}
	else  {
	return false;
	}
	}
	
	function delete_record(branch_code,active_inactive){
	$.ajax({
	type: "POST",
	url: access_link+"coaching_info/branch_delete.php?branch_code="+branch_code+"&active_inactive="+active_inactive+"",
	cache: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	   get_content('coaching_info/coaching_branch');
	}else{
	alert(detail); 
	}
	}
	});
	}
	</script>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_branch_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('coaching_info/coaching_branch');
            }else if(res[1]=='exist'){
			alert('Branch code already exist');
				   get_content('coaching_info/coaching_branch');
			}
			}
         });
      });
	  
	  
function for_form(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_branch_form.php?data="+value+"",
cache: false,
success: function(detail2){
$("#form_detail").html(detail2);
}
});
}
</script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Institute Branch Add</h3>
			  <button style="float:right;" value="B" type="button" class="btn btn-primary" onclick="for_form(this.value);"><i class="fa fa-minus" ></i></button>
			  <button style="float:right;" value="A" type="button" class="btn btn-primary" onclick="for_form(this.value);">Branch <i class="fa fa-plus" ></i></button>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body ">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				<div class="col-md-12 box-body table-responsive" id="form_detail">

                </div>
			    
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Branch Name</th>
                  <th>Code</th>
				  <th>City</th>
				  <th>Address</th>
				  <th>Contact No</th>
				  <th>Branch Head</th>
				  <th>Status</th>
				  <th>Edit</th>
				  <th>Delete</th>
                </tr>
                </thead>

			<?php

			$que="select * from coaching_branch";
			$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;

			while($row=mysqli_fetch_assoc($run)){

			$s_no = $row['s_no'];
			$coaching_info_branch_name = $row['coaching_info_branch_name'];
			$coaching_info_branch_code = $row['coaching_info_branch_code'];
			$coaching_info_branch_city = $row['coaching_info_branch_city'];
			$coaching_info_branch_address = $row['coaching_info_branch_address'];
			$coaching_info_branch_contact_number = $row['coaching_info_branch_contact_number'];
			$coaching_info_branch_head = $row['coaching_info_branch_head'];
			$branch_status = $row['branch_status'];
			if($branch_status=='Active'){
			$button_var='Inactive';
			}else{
			$button_var='Active';
			}
           
			$serial_no++;
			?>				

				<tbody>
				<tr  align='center' >

					<th ><?php echo $serial_no; ?></th>
					<th ><?php echo $coaching_info_branch_name; ?></th>
					<th ><?php echo $coaching_info_branch_code; ?></th>
					<th ><?php echo $coaching_info_branch_city; ?></th>
					<th ><?php echo $coaching_info_branch_address; ?></th>
					<th ><?php echo $coaching_info_branch_contact_number; ?></th>
					<th ><?php echo $coaching_info_branch_head; ?></th>
					<th  <?php if($branch_status=='Active'){ ?> style="color:green" <?php }else{ ?> style="color:red" <?php } ?>><?php echo $branch_status; ?></th>
				    <th><button type="button"  onclick="post_content('coaching_info/coaching_branch_edit','<?php echo 'code='.$coaching_info_branch_code; ?>')" class="btn btn-default my_background_color" ><?php echo $language['Edit']; ?></button></th>
					<th><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $coaching_info_branch_code; ?>','<?php echo $button_var; ?>');" ><?php echo $button_var; ?></button</th>
				</tr>
				<?php } ?>
				</tbody>

				</table>


			    </div>
		
		 
		  </form>
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
<script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>