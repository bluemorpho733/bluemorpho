<?php include("../attachment/session.php");
$branch_code=$_GET['code'];
$que="select * from coaching_branch where coaching_info_branch_code='$branch_code'";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$s_no = $row['s_no'];
    $coaching_info_branch_name = $row['coaching_info_branch_name'];
	$coaching_info_branch_code = $row['coaching_info_branch_code'];
	$coaching_info_branch_city = $row['coaching_info_branch_city'];
	$coaching_info_branch_address = $row['coaching_info_branch_address'];
	$coaching_info_branch_contact_number = $row['coaching_info_branch_contact_number'];
	$coaching_info_branch_head = $row['coaching_info_branch_head'];
	$branch_status = $row['branch_status'];

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

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_branch_edit_api.php",
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
               }
			}
         });
      });
</script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Institute Branch Edit</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-12">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive">
                <div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Name</label>
						   <input type="text"  name="coaching_info_branch_name"   placeholder="Branch Name"  value="<?php echo $coaching_info_branch_name; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Code</label>
						   <input type="text"  name="coaching_info_branch_code"   placeholder="Branch Code"  value="<?php echo $coaching_info_branch_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch City</label>
						   <input type="text"  name="coaching_info_branch_city"   placeholder="Branch City"  value="<?php echo $coaching_info_branch_city; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Address</label>
						   <input type="text"  name="coaching_info_branch_address"   placeholder="Branch Address"  value="<?php echo $coaching_info_branch_address; ?>" class="form-control" maxlength="70" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Contact No.</label>
						   <input type="text"  name="coaching_info_branch_contact_number"   placeholder="Branch Contact No."  value="<?php echo $coaching_info_branch_contact_number; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Head</label>
						   <input type="text"  name="coaching_info_branch_head"   placeholder="Branch Head"  value="<?php echo $coaching_info_branch_head; ?>" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
                </div>
			    


				
		
			    </div>
		
		 
		  </form>
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
 		</form>	
<div id="mypdf_view">
			<div>