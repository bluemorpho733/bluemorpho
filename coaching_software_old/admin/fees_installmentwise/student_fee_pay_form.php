<?php include("../attachment/session.php"); 


?>
    <!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo $language['Fees Management']; ?><small><?php echo $language['Control Panel']; ?></small></h1>
		<ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
		<li><a href="javascript:get_content('fees_installmentwise/fees')"><i class="fa fa-money"></i> <?php echo $language['Fees']; ?></a></li>
		<li class="active"><?php echo $language['Student Fee Add']; ?></li>
		</ol>
	</section>


<script>
$("#my_form").submit(function(e){
e.preventDefault();
window.scrollTo(0, 0);
get_content(loader_div);
var formdata = new FormData(this);
$.ajax({
url: access_link+"fees_installmentwise/pay_fee_api.php",
type: "POST",
data: formdata,
mimeTypes:"multipart/form-data",
contentType: false,
cache: false,
processData: false,
success: function(detail){
var res=detail.split("|?|");
if(res[1]=='success'){
alert('Successfully Paid Rs. '+res[2]);
post_content('fees_installmentwise/fee_details','data='+res[3]);
}else if(res[1]=='error'){
alert('error found');
get_content('fees_installmentwise/student_fee_pay_form');
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


function for_head_detail(value){
$.ajax({
type: "POST",
url:  access_link+"fees_installmentwise/ajax_pay_fee_head.php?data="+value+"",
cache: false,
success: function(detail1){
$("#head_detail").html(detail1);
}
});
}

function amount_detail(value){
$.ajax({
type: "POST",
url:  access_link+"fees_installmentwise/ajax_fee_detail_pay.php?data="+value+"",
cache: false,
success: function(detail2){
$("#amount_detail").html(detail2);
}
});
}

				
function detail(value){
if(value=='Cheque'){
$('#for_cheque_details').show();
$('#for_bank_name').hide();
$('#for_account_no').hide();
$('#for_ifsc_code').hide();
}else if(value=='Net Banking'){
$('#for_bank_name').show();
$('#for_account_no').show();
$('#for_ifsc_code').show();
$('#for_cheque_details').hide();
}else{
$('#for_cheque_details').hide();
$('#for_bank_name').hide();
$('#for_account_no').hide();
$('#for_ifsc_code').hide();
}

}

$('form').on('focus', 'input[type=number]', function (e) {
$(this).on('mousewheel.disableScroll', function (e) {
e.preventDefault()
})
})
$('form').on('blur', 'input[type=number]', function (e) {
$(this).off('mousewheel.disableScroll')
})


function for_pay(value){
var final_fee_amount1=document.getElementById('final_fee_amount').value;
var balance=parseFloat(final_fee_amount1)-parseFloat(value);
$("#final_fee_amount1").val(balance);
}


function myFunction() {
var checkBox = document.getElementById("myCheck");
var student_name = document.getElementById("student_name").value;
var total_amount = document.getElementById("total_paid").value;
var text = document.getElementById("text");
if (checkBox.checked == true){
text.style.display = "block";
$('#contact').val('Dear '+student_name+',Your Fee Amount '+total_amount+' Successfully deposited. Thanking You');
$('#send_sms').val('Yes');
}else{
text.style.display = "none";
$('#contact').val('');
$('#send_sms').val('No');
}
}	
</script>	


<div class="modal fade" id="modal-default" >
    <div class="modal-dialog" >
		<div class="modal-content" style="background-color:#DEDEDE;">
				<div class="modal-body">
				 <h4>AMOUNT DETAIL</h4>
					 <div class="col-md-12 box-body table-responsive" id="amount_detail">
					 </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" id="myModal_close" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>

	
<form name="myForm" method="post" enctype="multipart/form-data" id="my_form">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
           <div class="box-header with-border ">
              <h3 class="box-title">Fee Pay</h3>
            </div>
            <!-- /.box-header -->			
        <div class="box-body">

		<div class="box-body col-md-12 table-responsive">
			<div class="col-md-4">
				<div class="form-group" >
					<label><?php echo $language['Search Student']; ?></label>
					<select name=""  class="form-control select2" id="select_subj" onchange="student_search(this.value); for_head_detail(this.value);" style="width:100%;" required>
					<option disabled selected value>Select Student</option>
					<?php
					$qry="select * from student_admission_info LEFT JOIN coaching_courses on student_admission_info.course_code=coaching_courses.coaching_info_courses_code where coaching_courses.courses_status='Active' and student_admission_info.student_status='Active' and student_admission_info.session_value='$session1'";
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
				<div  style="height: 42px;border:2px solid; border-color:#ff9999; " id="subject_detail">
				</div>
			</div>
			
		</div>
		
		<div class="col-md-12" id="head_detail"></div>
		
		
</div>
</div>
</section>
</form>

<script>
$(function () {
    $('.select2').select2();
  });
</script>