<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#section-add-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/add_section_api.php",
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
	get_content('one_time_details/section_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/section_details');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});

function for_edit_section(s_no,section_name){
$("#s_no").val(s_no);
$("#section_name").val(section_name);
$("#for_open_edit_modal").click();
}

$("#my_form_edit").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#section-edit-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/edit_section_api.php",
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
	get_content('one_time_details/section_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/section_details');
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
<li class="active">Section Details</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right"><a href="javascript:get_content('one_time_details/section_priority')"><button class="btn my_background_color">Set Priority</button></a>
<button class="btn my_background_color" data-toggle="modal" data-target="#section-add-modal">Add Section</button></h3>
<span style="display:none;"><button class="btn my_background_color" id="for_open_edit_modal" data-toggle="modal" data-target="#section-edit-modal">Edit Section</button></span>
</div>
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Section Name</th>
<th>Section Code</th>
<th>Section Priority</th>
<th>Updated By</th>
<th>Date</th>
<th>Edit/Delete</th>
</tr>
</thead>

<?php
$section_column_name="s_no,section_name,section_code,section_priority,updated_by,updated_date";
$section_query="select $section_column_name from section_details where section_status='Active' and session_value='$session1' and section_name!='' ORDER BY section_priority ASC";
$section_run=mysqli_query($conn37,$section_query) or die(mysqli_error($conn37));
$serial_no=0;
while($section_row=mysqli_fetch_assoc($section_run)){
$s_no=$section_row['s_no'];
$section_name = $section_row['section_name'];
$section_code = $section_row['section_code'];
$section_priority = $section_row['section_priority'];
$updated_by = $section_row['updated_by'];
$updated_date=date('d-m-Y h:i:s',strtotime($section_row['updated_date']));

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?></td>
<td><?php echo $section_name; ?></td>
<td><?php echo $section_code; ?></td>
<td><?php echo $section_priority; ?></td>
<td><?php echo $updated_by; ?></td>
<td><?php echo $updated_date; ?></td>
<td><button class="btn my_background_color" onclick="for_edit_section('<?php echo $s_no; ?>','<?php echo $section_name; ?>');" >Edit/Delete</button></td>
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

<!-- Add Section Modal Start -->
<div class="modal fade" id="section-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Section Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="col-md-12">
	<div class="form-group">
	  <label>Section Name <font style="color:red"><b>*</b></font></label>
	  <input type="text" name="section_name" class="form-control" required />
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
<!-- Add Section Modal End -->

<!-- Edit Section Modal Start -->
<div class="modal fade" id="section-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form role="form" method="post" id="my_form_edit" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header my_background_color">
        <span class="modal-title" id="exampleModalLongTitle">Section Details</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<input type="hidden" name="s_no" id="s_no" class="form-control" />
<div class="col-md-12">
	<div class="form-group">
	  <label>Section Name</label>
	  <input type="text" name="section_name" id="section_name" class="form-control" />
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
<!-- Edit Section Modal End -->