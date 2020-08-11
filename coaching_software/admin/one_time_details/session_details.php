<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#session-add-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/add_session_api.php",
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
	get_content('one_time_details/session_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/session_details');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});

function for_edit_session(s_no,session,session_start_date,session_end_date,session_description){
$("#s_no").val(s_no);
$("#session").val(session);
$("#session_start_date").val(session_start_date);
$("#session_end_date").val(session_end_date);
$("#session_description").val(session_description);
$("#for_open_edit_modal").click();
}

$("#my_form_edit").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#session-edit-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/edit_session_api.php",
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
	get_content('one_time_details/session_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/session_details');
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
<li class="active">Session Details</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right"><a href="javascript:get_content('one_time_details/session_priority')"><button class="btn my_background_color">Set Priority</button></a>
<button class="btn my_background_color" data-toggle="modal" data-target="#session-add-modal">Add Session</button></h3>
<span style="display:none;"><button class="btn my_background_color" id="for_open_edit_modal" data-toggle="modal" data-target="#session-edit-modal">Edit Session</button></span>
</div>
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Session</th>
<th>Session Start Date</th>
<th>Session End Date</th>
<th>Session Description</th>
<th>Session Priority</th>
<th>Updated By</th>
<th>Date</th>
<th>Edit/Delete</th>
</tr>
</thead>

<?php
$session_column_name="s_no,session,session_start_date,session_end_date,session_description,session_priority,updated_by,updated_date";
$session_query="select $session_column_name from session_details where session_status='Active' and session!='' ORDER BY session_priority ASC";
$session_run=mysqli_query($conn37,$session_query) or die(mysqli_error($conn37));
$serial_no=0;
while($session_row=mysqli_fetch_assoc($session_run)){
$s_no=$session_row['s_no'];
$session = $session_row['session'];
$session_start_date = date('d-m-Y',strtotime($session_row['session_start_date']));
$session_start_date1 = $session_row['session_start_date'];
$session_end_date = date('d-m-Y',strtotime($session_row['session_end_date']));
$session_end_date1 = $session_row['session_end_date'];
$session_description = $session_row['session_description'];
$session_priority = $session_row['session_priority'];
$updated_by = $session_row['updated_by'];
$updated_date=date('d-m-Y h:i:s',strtotime($session_row['updated_date']));

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?></td>
<td><?php echo $session; ?></td>
<td><?php echo $session_start_date; ?></td>
<td><?php echo $session_end_date; ?></td>
<td><?php echo $session_description; ?></td>
<td><?php echo $session_priority; ?></td>
<td><?php echo $updated_by; ?></td>
<td><?php echo $updated_date; ?></td>
<td><button class="btn my_background_color" onclick="for_edit_session('<?php echo $s_no; ?>','<?php echo $session; ?>','<?php echo $session_start_date1; ?>','<?php echo $session_end_date1; ?>','<?php echo $session_description; ?>');" >Edit/Delete</button></td>
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

<!-- Add Session Modal Start -->
<div class="modal fade" id="session-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Session Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="col-md-12">
	<div class="form-group">
	  <label>Session <font style="color:red"><b>*</b></font></label>
	  <input type="text" name="session" class="form-control" required />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	  <label>Session Start Date <font style="color:red"><b>*</b></font></label>
	  <input type="date" name="session_start_date" class="form-control" required />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	  <label>Session End Date <font style="color:red"><b>*</b></font></label>
	  <input type="date" name="session_end_date" class="form-control" required />
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
	  <label>Session Description</label>
	  <input type="text" name="session_description" class="form-control" />
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
<!-- Add Session Modal End -->

<!-- Edit Session Modal Start -->
<div class="modal fade" id="session-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form_edit" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Session Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<input type="hidden" name="s_no" id="s_no" class="form-control" />
<div class="col-md-12">
	<div class="form-group">
	  <label>Session</label>
	  <input type="text" name="session" id="session" class="form-control" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	  <label>Session Start Date</label>
	  <input type="date" name="session_start_date" id="session_start_date" class="form-control" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	  <label>Session End Date</label>
	  <input type="date" name="session_end_date" id="session_end_date" class="form-control" />
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
	  <label>Session Description</label>
	  <input type="text" name="session_description" id="session_description" class="form-control" />
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
<!-- Edit Session Modal End -->