<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#register-add-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/add_register_api.php",
	type: "POST",
	data: formdata,
	mimeTypes:"multipart/form-data",
	contentType: false,
	cache: false,
	processData: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	alert('Successfully Completed');
	get_content('one_time_details/register_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/register_details');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});

function for_edit_register(s_no,register_name){
$("#s_no").val(s_no);
$("#register_name").val(register_name);
$("#for_open_edit_modal").click();
}

$("#my_form_edit").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#register-edit-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/edit_register_api.php",
	type: "POST",
	data: formdata,
	mimeTypes:"multipart/form-data",
	contentType: false,
	cache: false,
	processData: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	alert('Successfully Completed');
	get_content('one_time_details/register_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/register_details');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});
</script>

<!-- Header content -->
<section class="content-header">
<h1>
School Management System
<small>One Time Details</small>
</h1>
<ol class="breadcrumb">
<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>Home</a></li>
<li><a href="javascript:get_content('one_time_details/one_time_details')">One Time Details</a></li>
<li class="active">Register Details</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right"><a href="javascript:get_content('one_time_details/register_priority')"><button class="btn my_background_color">Set Priority</button></a>
<button class="btn my_background_color" data-toggle="modal" data-target="#register-add-modal">Add Register</button></h3>
<span style="display:none;"><button class="btn my_background_color" id="for_open_edit_modal" data-toggle="modal" data-target="#register-edit-modal">Edit Register</button></span>
</div>
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Register Name</th>
<th>Register Code</th>
<th>Register Priority</th>
<th>Updated By</th>
<th>Date</th>
<th>Edit/Delete</th>
</tr>
</thead>

<?php
$register_column_name="s_no,register_name,register_code,register_priority,updated_by,updated_date";
$register_query="select $register_column_name from register_details where register_status='Active' and session_value='$session1' and register_name!='' ORDER BY register_priority ASC";
$register_run=mysqli_query($conn37,$register_query) or die(mysqli_error($conn37));
$serial_no=0;
while($register_row=mysqli_fetch_assoc($register_run)){
$s_no=$register_row['s_no'];
$register_name = $register_row['register_name'];
$register_code = $register_row['register_code'];
$register_priority = $register_row['register_priority'];
$updated_by = $register_row['updated_by'];
$updated_date=date('d-m-Y h:i:s',strtotime($register_row['updated_date']));

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?></td>
<td><?php echo $register_name; ?></td>
<td><?php echo $register_code; ?></td>
<td><?php echo $register_priority; ?></td>
<td><?php echo $updated_by; ?></td>
<td><?php echo $updated_date; ?></td>
<td><button class="btn my_background_color" onclick="for_edit_register('<?php echo $s_no; ?>','<?php echo $register_name; ?>');" >Edit/Delete</button></td>
</tr>
<?php } ?>
</table>
</div>
</div>

</section>

<script>
$(function () {
$('#example1').DataTable()
});
</script>

<!-- Add Register Modal Start -->
<div class="modal fade" id="register-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Register Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="col-md-12">
	<div class="form-group">
	  <label>Register Name <font style="color:red"><b>*</b></font></label>
	  <input type="text" name="register_name" class="form-control" required />
	</div>
</div>

	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="submit" name="submit" value="Save" class="btn my_background_color" />
      </div>
    </div>
  </div>
</form>
</div>
<!-- Add Register Modal End -->

<!-- Edit Register Modal Start -->
<div class="modal fade" id="register-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form_edit" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Register Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<input type="hidden" name="s_no" id="s_no" class="form-control" />
<div class="col-md-12">
	<div class="form-group">
	  <label>Register Name</label>
	  <input type="text" name="register_name" id="register_name" class="form-control" />
	</div>
</div>

	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="submit" name="submit" value="Update" class="btn my_background_color" />
      </div>
    </div>
  </div>
</form>
</div>
<!-- Edit Register Modal End -->