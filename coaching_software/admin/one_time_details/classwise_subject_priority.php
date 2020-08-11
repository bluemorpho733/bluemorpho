<?php include("../attachment/session.php"); ?>

<script>
$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
	//window.scrollTo(0, 0);
	//get_content(loader_div);
	$.ajax({
	url: access_link+"one_time_details/classwise_subject_priority_api.php",
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
	get_content('one_time_details/classwise_subject_priority');
	}else if(res[1]=='not_add'){
	alert('Limit Exceed !');
	get_content('one_time_details/classwise_subject_priority');
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
});

function for_list(){
var class_code=document.getElementById('class_code').value;
	if(class_code!=''){
	$.ajax({
	url: access_link+"one_time_details/classwise_subject_priority_list.php",
	type: "POST",
	cache: false,
	data: { class_code:class_code },
	success: function(detail){
	$("#priority_list").html(detail);
	}
	});
	}else{
	$("#priority_list").html("");
	}
}
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
<li class="active">Classwise Subject Priority</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<div class="col-md-2">&nbsp;</div>
<div class="col-md-8">
<div class="col-md-12 col-md-offset-4">
<div class="col-md-4">
<select name="" id="class_code" onchange="for_list();" class="form-control">
<option value="">Select</option>
<?php
$class_column_name="s_no,class_name,class_stream_name,class_code";
$class_query="select $class_column_name from class_details where class_status='Active' and session_value='$session1' and (class_name!='' or class_stream_name!='') ORDER BY class_priority ASC";
$class_run=mysqli_query($conn37,$class_query) or die(mysqli_error($conn37));
$sign="";
while($class_row=mysqli_fetch_assoc($class_run)){
$s_no=$class_row['s_no'];
$class_name = $class_row['class_name'];
$class_stream_name = $class_row['class_stream_name'];
$class_code = $class_row['class_code'];
if($class_stream_name!=''){
$sign="-";
}
?>
<option value="<?php echo $class_code; ?>"><?php echo $class_name.' '.$sign.' '.$class_stream_name; ?></option>
<?php } ?>
</select>
</div>
</div>
</div>
<div class="col-md-2">&nbsp;</div>
</div>
<div class="box-body table-responsive">
<form role="form" method="post" id="my_form" enctype="multipart/form-data">
<div class="col-md-6 col-md-offset-3" id="priority_list">

</div>
</form>
</div>
</div>

</section>

<script>
$(function () {
$('#example1').DataTable()
});
</script>