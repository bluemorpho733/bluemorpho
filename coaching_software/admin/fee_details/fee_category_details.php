<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"fee_details/add_fee_category_api.php",
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
	get_content('fee_details/fee_category_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('fee_details/fee_category_details');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});

function for_edit_board(s_no,board_name){
$("#s_no").val(s_no);
$("#board_name").val(board_name);
$("#for_open_edit_modal").click();
}

$("#my_form_edit").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//$("#board-edit-modal").modal("hide");
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"fee_details/edit_board_api.php",
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
	get_content('fee_details/board_details');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('fee_details/board_details');
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
<small>Fee Details</small>
</h1>
<ol class="breadcrumb">
<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>Home</a></li>
<li><a href="javascript:get_content('fee_details/fee_details')">Fee Details</a></li>
<li class="active">Fee Category Details</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right"><a href="javascript:get_content('fee_details/fee_category_priority')"><button class="btn my_background_color">Set Priority</button></a></h3>
</div>
<div class="box-body table-responsive">
<div class="col-md-4">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
<table id="" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>Fee Category Details</th>
</tr>
</thead>
<body>
<tr>
<td>
<div class="form-group">
<label>Fee Category</label>
<input type="text"  name="fee_category_name" class="form-control" required />
</div>
</td>
</tr>
</body>
<tfoot>
<tr>
<td><span style="float:right;"><input type="submit" name="submit" value="Save" class="btn my_background_color" /></span></td>
</tr>
</tfoot>
</table>
</form>
</div>
<div class="col-md-8">
<table id="example1" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Fee Category Name</th>
<th>Fee Category Code</th>
<th>Fee Category Priority</th>
<th>Updated By</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<?php
$fee_category_column_name="s_no,fee_category_name,fee_category_code,fee_category_priority,updated_by,updated_date";
$fee_category_query="select $fee_category_column_name from fee_category_details where fee_category_status='Active' and session_value='$session1' and fee_category_name!='' ORDER BY fee_category_priority ASC";
$fee_category_run=mysqli_query($conn37,$fee_category_query) or die(mysqli_error($conn37));
$serial_no=0;
while($fee_category_row=mysqli_fetch_assoc($fee_category_run)){
$s_no=$fee_category_row['s_no'];
$fee_category_name = $fee_category_row['fee_category_name'];
$fee_category_code = $fee_category_row['fee_category_code'];
$fee_category_priority = $fee_category_row['fee_category_priority'];
$updated_by = $fee_category_row['updated_by'];
$updated_date=date('d-m-Y h:i:s',strtotime($fee_category_row['updated_date']));

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?></td>
<td><?php echo $fee_category_name; ?></td>
<td><?php echo $fee_category_code; ?></td>
<td><?php echo $fee_category_priority; ?></td>
<td><?php echo $updated_by; ?></td>
<td><?php echo $updated_date; ?></td>
<td>
<button class="btn my_background_color" onclick="for_edit_fee_category('<?php echo $s_no; ?>','<?php echo $board_name; ?>');" ><i class="fa fa-edit"></i></button>&nbsp;&nbsp;
<button class="btn my_background_color" onclick="for_delete('<?php echo $s_no; ?>','<?php echo $board_name; ?>');" ><i class="fa fa-trash"></i></button>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
</div>

</section>

<script>
$(function () {
$('#example1').DataTable()
});
</script>
