<?php include("../attachment/session.php"); 

$student_roll_no1=$_GET['student_roll_no'];

$date_local=date('Y-m-d');

$update="UPDATE student_fee_structure SET fee_status='Deleted',last_updated_date='$date_local' WHERE student_roll_no='$student_roll_no1'";
mysqli_query($conn37,$update);

?>

<script>

$("#my_form").submit(function(e){
e.preventDefault();
window.scrollTo(0, 0);
get_content(loader_div);
var formdata = new FormData(this);

$.ajax({
url: access_link+"fees_installmentwise/student_fee_structure_api.php",
type: "POST",
data: formdata,
mimeTypes:"multipart/form-data",
contentType: false,
cache: false,
processData: false,
success: function(detail){
//$('#mypdf_view').html(detail);
var res=detail.split("|?|");
if(res[1]=='success'){
alert('Successfully Complete');
get_content('fees_installmentwise/student_admission_fee_list');
}else if(res[1]=='error'){
alert('error found');
get_content('fees_installmentwise/student_admission_fee_list');
}
}
});
});
</script>
<script type="text/javascript">
function student_search(data){
	$.ajax({
		type:"POST",
		url:  access_link+"fees_installmentwise/ajax_get_subject.php?data="+data+"",
		cache:false,
		success:function(datail){
			$("#subject_detail").html(datail);
			fees_detail();
		}
	});
}

function check_all() {
	if(document.getElementById("all_checked").checked)
	{
		$('.subject').prop('checked', true);
	}else{
		$('.subject').prop('checked', false);
	}
}


function for_subject(value){
$.ajax({
type: "POST",
url:  access_link+"fees_installmentwise/ajax_course_subject_fee.php?data="+value+"",
cache: false,
success: function(detail1){
$("#student_course_subject").html(detail1);
}
});
}

function for_common(value){
$.ajax({
type: "POST",
url:  access_link+"fees_installmentwise/ajax_common_subhead.php?data="+value+"",
cache: false,
success: function(detail1){
$("#course_subhead").html(detail1);
}
});
} 

function for_head_detail(value){
$.ajax({
type: "POST",
url:  access_link+"fees_installmentwise/ajax_fee_head.php?data="+value+"",
cache: false,
success: function(detail1){
$("#head_detail").html(detail1);
}
});
}  

function for_discount_type(){
var discount_type=document.getElementById('discount_type').value;
if(discount_type=='Rs'){
$('#discount_amount').show();
$('#discount_amount1').hide();
}else{
$('#discount_amount').hide();
$('#discount_amount1').show();
}
}

function for_total(value){
var coaching_info_fee_amount=document.getElementById('coaching_info_fee_amount11').value;
var aft_disc_amount=parseFloat(coaching_info_fee_amount)-parseFloat(value);
$("#coaching_info_fee_amount").val(aft_disc_amount);
}

function for_total1(value){
var coaching_info_fee_amount=document.getElementById('coaching_info_fee_amount11').value;
var aft_disc_amount= Math.round(parseFloat(coaching_info_fee_amount)-parseFloat(coaching_info_fee_amount)*parseFloat(value)/100);
$("#coaching_info_fee_amount").val(aft_disc_amount);
}


$('form').on('focus', 'input[type=number]', function (e) {
$(this).on('mousewheel.disableScroll', function (e) {
e.preventDefault()
})
})
$('form').on('blur', 'input[type=number]', function (e) {
$(this).off('mousewheel.disableScroll')
})
</script>

    <!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo $language['Fees Management']; ?><small><?php echo $language['Control Panel']; ?></small></h1>
		<ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
		<li><a href="javascript:get_content('fees_installmentwise/fees')"><i class="fa fa-money"></i> <?php echo $language['Fees']; ?></a></li>
		<li class="active"><?php echo $language['Student Fee Add']; ?></li>
		</ol>
	</section>
<form name="myForm" method="post" enctype="multipart/form-data" id="my_form">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
           <div class="box-header with-border ">
              <h3 class="box-title">Fee Set</h3>
            </div>
            <!-- /.box-header -->			
        <div class="box-body">

		<div class="box-body col-md-12 table-responsive">
			<div class="col-md-4">
				<div class="form-group">
					<label><?php echo $language['Search Student']; ?></label>
					<select name="" class="form-control select2" id="select_subj" onchange="student_search(this.value); for_subject(this.value); for_common(this.value); for_head_detail(this.value);" style="width:100%;" required>
					<?php
					$qry="select * from student_admission_info LEFT JOIN coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where coaching_courses.courses_status='Active' and student_admission_info.student_status='Active' and student_admission_info.session_value='$session1' and student_roll_no='$student_roll_no1'";
					$rest=mysqli_query($conn37,$qry);
					while($row22=mysqli_fetch_assoc($rest)){
					$student_roll_no=$row22['student_roll_no'];
					$coaching_roll_no=$row22['coaching_roll_no'];
					$student_name=$row22['student_name'];
					$course_code=$row22['course_code'];
					$coaching_info_courses_name=$row22['coaching_info_courses_name'];
					$subject_code=$row22['subject_code'];
					$my_subject_name=$row22['my_subject_name'];
					?>
					<option value="<?php echo $student_name."|?|".$course_code."|?|".$student_roll_no; ?>"><?php echo $student_name."-[".$student_roll_no."]-[".$coaching_info_courses_name."]"; ?></option>
					<?php
					}
					?>
					</select>
				</div>
			</div>
			
			<div class="col-md-8">
			<label>Subjects</label>
				<div  style="height: 42px;border:2px solid;border-radius:10px; border-color:red; " id="subject_detail">
				</div>
			</div>
			
			<div class="col-md-12 " id="head_detail"></div>
				
			<div class="col-md-2 "></div>
			
			<div class="col-md-8 box-body table-responsive" id="course_subhead"></div>
                
			<div class="col-md-3 "></div>
				
			<div class="col-md-6 box-body table-responsive" id="student_course_subject"></div>
                
			<div class="col-md-3 "></div>
			
		</div>
		
		<div class="col-md-12">
		<center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
		</div>
	
  </div>
</div>
</section>
</form>

<script>
$(function () {
    $('.select2').select2();
  });
</script>
<?php if(isset($_GET['student_roll_no'])){ ?>
<script>
student_search('<?php echo $student_name."|?|".$course_code."|?|".$student_roll_no; ?>');
for_subject('<?php echo $student_name."|?|".$course_code."|?|".$student_roll_no; ?>');
for_common('<?php echo $student_name."|?|".$course_code."|?|".$student_roll_no; ?>'); 
for_head_detail('<?php echo $student_name."|?|".$course_code."|?|".$student_roll_no; ?>');
</script>
<?php } ?>