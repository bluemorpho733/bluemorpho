<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/class_priority_api.php",
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
	get_content('one_time_details/class_priority');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/class_priority');
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
<li class="active">Class Priority</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right">&nbsp;</h3>
</div>
<div class="box-body table-responsive">
<div class="col-md-8 col-md-offset-2">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
<table id="" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Class Name</th>
<th>Stream Name</th>
<th>Class Code</th>
<th>Class Priority</th>
</tr>
</thead>

<tbody>
<?php
$class_column_name="s_no,class_name,class_stream_name,class_code,class_priority";
$class_query="select $class_column_name from class_details where class_status='Active' and session_value='$session1' and (class_name!='' or class_stream_name!='') ORDER BY class_priority ASC";
$class_run=mysqli_query($conn37,$class_query) or die(mysqli_error($conn37));
$serial_no=0;
while($class_row=mysqli_fetch_assoc($class_run)){
$s_no=$class_row['s_no'];
$class_name = $class_row['class_name'];
$class_stream_name = $class_row['class_stream_name'];
$class_code = $class_row['class_code'];
$class_priority = $class_row['class_priority'];

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?><input type="hidden" name="s_no[]" value="<?php echo $s_no; ?>" class="form-control" /></td>
<td><?php echo $class_name; ?></td>
<td><?php echo $class_stream_name; ?></td>
<td><?php echo $class_code; ?></td>
<td><input type="number" name="class_priority[]" value="<?php echo $class_priority; ?>" class="form-control" /></td>
</tr>
<?php } ?>
</tbody>

<tfoot>
<td colspan="5"><center><input type="submit" name="submit" value="Save" class="btn my_background_color" /></center></td>
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