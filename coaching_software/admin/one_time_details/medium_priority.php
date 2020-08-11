<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/medium_priority_api.php",
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
	get_content('one_time_details/medium_priority');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/medium_priority');
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
<li class="active">Medium Priority</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right">&nbsp;</h3>
</div>
<div class="box-body table-responsive">
<div class="col-md-6 col-md-offset-3">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
<table id="" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Medium Name</th>
<th>Medium Code</th>
<th>Medium Priority</th>
</tr>
</thead>

<tbody>
<?php
$medium_column_name="s_no,medium_name,medium_code,medium_priority";
$medium_query="select $medium_column_name from medium_details where medium_status='Active' and session_value='$session1' and medium_name!='' ORDER BY medium_priority ASC";
$medium_run=mysqli_query($conn37,$medium_query) or die(mysqli_error($conn37));
$serial_no=0;
while($medium_row=mysqli_fetch_assoc($medium_run)){
$s_no=$medium_row['s_no'];
$medium_name = $medium_row['medium_name'];
$medium_code = $medium_row['medium_code'];
$medium_priority = $medium_row['medium_priority'];

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?><input type="hidden" name="s_no[]" value="<?php echo $s_no; ?>" class="form-control" /></td>
<td><?php echo $medium_name; ?></td>
<td><?php echo $medium_code; ?></td>
<td><input type="number" name="medium_priority[]" value="<?php echo $medium_priority; ?>" class="form-control" /></td>
</tr>
<?php } ?>
</tbody>

<tfoot>
<td colspan="4"><center><input type="submit" name="submit" value="Save" class="btn my_background_color" /></center></td>
</tfoot>
</table>
</form>
</div>
</div>
</div>

</section>

<script>
$(function () {
$('#example1').DataTable()
});
</script>