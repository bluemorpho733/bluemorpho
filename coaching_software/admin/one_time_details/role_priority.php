<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/role_priority_api.php",
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
	get_content('one_time_details/role_priority');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/role_priority');
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
<li class="active">Role Priority</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<h3 class="box-title pull-right">&nbsp;</h3>
</div>
<div class="box-body table-responsive">
<div class="col-md-4 col-md-offset-4">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
<table id="" class="table table-bordered table-striped">
<thead class="my_background_color">
<tr>
<th>S No</th>
<th>Role Name</th>
<th>Role Priority</th>
</tr>
</thead>

<tbody>
<?php
$role_column_name="s_no,role_name,role_priority";
$role_query="select $role_column_name from role_details where role_status='Active' and session_value='$session1' and role_name!='' ORDER BY role_priority ASC";
$role_run=mysqli_query($conn37,$role_query) or die(mysqli_error($conn37));
$serial_no=0;
while($role_row=mysqli_fetch_assoc($role_run)){
$s_no=$role_row['s_no'];
$role_name = $role_row['role_name'];
$role_priority = $role_row['role_priority'];

$serial_no++;
?>
<tr>
<td><?php echo $serial_no.'.'; ?><input type="hidden" name="s_no[]" value="<?php echo $s_no; ?>" class="form-control" /></td>
<td><?php echo $role_name; ?></td>
<td><input type="number" name="role_priority[]" value="<?php echo $role_priority; ?>" class="form-control" /></td>
</tr>
<?php } ?>
</tbody>

<tfoot>
<td colspan="3"><center><input type="submit" name="submit" value="Save" class="btn my_background_color" /></center></td>
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