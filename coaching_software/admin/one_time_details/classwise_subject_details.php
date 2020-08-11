<?php include("../attachment/session.php"); ?>

<script>
function for_subject(class_code){
	if(class_code!=''){
	$.ajax({
	url: access_link+"one_time_details/show_subject_details.php",
	type: "POST",
	cache: false,
	data: { class_code:class_code },
	success: function(detail){
	$("#show_subject_details").html(detail);
	}
	});
	}else{
	$("#show_subject_details").html("");
	}
}

function for_classwise_subject(class_code){
	if(class_code!=''){
	$.ajax({
	url: access_link+"one_time_details/show_classwise_subject_details.php",
	type: "POST",
	cache: false,
	data: { class_code:class_code },
	success: function(detail){
	$("#show_classwise_subject_details").html(detail);
	}
	});
	}else{
	$("#show_classwise_subject_details").html("");
	}
}

function classwise_subject_add(subject_code,subject_priority){
	var class_code=document.getElementById('class_code').value;
	if(class_code!='' && subject_code!=''){
	$.ajax({
	url: access_link+"one_time_details/add_classwise_subject_api.php",
	type: "POST",
	cache: false,
	data: { class_code:class_code,subject_code:subject_code,subject_priority:subject_priority },
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	alert('Successfully Completed');
	post_content("one_time_details/classwise_subject_details", "class_code="+class_code);
	}else if(res[1]=='exist'){
	alert('This Subject Already Exist in this Class !');
	post_content("one_time_details/classwise_subject_details", "class_code="+class_code);
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
	}else{
	alert("Please Select Class and Click on Add Button !");
	}
}

function for_delete(classwise_subject_sno){
var my_val=confirm("Are You Sure Want to Delete This Record !");
if(my_val==true){
classwise_subject_delete(classwise_subject_sno);
}
}

function classwise_subject_delete(classwise_subject_sno){
	var class_code=document.getElementById('class_code').value;
	if(class_code!='' && classwise_subject_sno!=''){
	$.ajax({
	url: access_link+"one_time_details/delete_classwise_subject_api.php",
	type: "POST",
	cache: false,
	data: { classwise_subject_sno:classwise_subject_sno },
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	alert('Successfully Completed');
	post_content("one_time_details/classwise_subject_details", "class_code="+class_code);
	}else if(res[1]=='session_out'){
	alert('Session Out. Please Login !');
	window.open('../index.php','_self');
	}else{
	alert(detail);
	}
	}
	});
	}else{
	alert("Please Select Class and Click on Delete Button !");
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
<li class="active">Classwise Subject Details</li>
</ol>
</section>

<?php
$get_class_code='';
if(isset($_GET['class_code'])){
$get_class_code=$_GET['class_code'];
}
?>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">
<div class="col-md-2">&nbsp;</div>
<div class="col-md-8">
<div class="col-md-12 col-md-offset-4">
<div class="col-md-4">
<select name="" id="class_code" onchange="for_subject(this.value);for_classwise_subject(this.value);" class="form-control">
<option <?php if($get_class_code==''){ echo 'selected'; } ?> value="">Select</option>
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
<option <?php if($get_class_code==$class_code){ echo 'selected'; } ?> value="<?php echo $class_code; ?>"><?php echo $class_name.' '.$sign.' '.$class_stream_name; ?></option>
<?php } ?>
</select>
</div>
</div>
</div>
<div class="col-md-2">
<a href="javascript:get_content('one_time_details/classwise_subject_priority')"><button class="btn my_background_color" style="float:right;">Set Priority</button></a>
</div>
</div>
<div class="box-body table-responsive">
<div class="col-md-6" id="show_subject_details">

</div>

<div class="col-md-6" id="show_classwise_subject_details">

</div>
</div>
</div>

</section>

<?php
if(isset($_GET['class_code'])){
?>
<script>
for_subject('<?php echo $get_class_code; ?>');
for_classwise_subject('<?php echo $get_class_code; ?>');
</script>
<?php
}
?>

<script>
// $(function () {
// $('#example1').DataTable()
// $('#example2').DataTable()
// });
</script>