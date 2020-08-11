<?php include("../attachment/session.php"); 

$student_roll_no1=$_GET['student_roll_no'];

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
<form name="myForm" method="post" enctype="multipart/form-data" id="my_form">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
           <div class="box-header with-border ">
              <h3 class="box-title">Fee Detail</h3>
            </div>
            <!-- /.box-header -->			
        <div class="box-body">


			<?php
			$sub_que="select * from student_fee_structure where student_roll_no='$student_roll_no1' and fee_status='Active'";
			$run_sub=mysqli_query($conn37,$sub_que);
			while($row_sub=mysqli_fetch_assoc($run_sub)){
			$subject_code_array[]=$row_sub['subject_code'];
			}
			
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
			}
			
			?>

			<div class="col-md-4 ">
				<center><h2><b style="user-select: none;"><?php echo $coaching_info_courses_name; ?></b></h2></center>
		    </div>
			
			<div class="col-md-8">
			<label>Subjects</label>
				<div  style="height: 42px;border:2px solid;border-radius:10px; border-color:red; ">
				<?php
				for($i=0; $i<count($subject_code_array); $i++){ 
				$sql2=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code_array[$i]'");
				while ($res2=mysqli_fetch_assoc($sql2)) {
				$subject_code=$res2['coaching_info_courses_subject_code'];
				$subject_name=$res2['coaching_info_courses_subject_name'];
				?>
			<div class="col-md-2">
				<input type="checkbox" name="subject_code" id="<?php echo $subject_code; ?>" class="subject" value="<?php echo $subject_code; ?>" style="display:none;" checked> <b style="color:green;"><?php echo $i+'1'.'. '.$subject_name; ?></b>
			</div>
            <?php } } ?>
				</div>
			</div>
			
			<div class="col-md-12" >
			
			<?php
			//////Separate///////
			$amount_1=0;
			for($i=0; $i<count($subject_code_array); $i++){ 
			$que1="select * from coaching_courses_subject where course_code='$course_code' and coaching_info_courses_subject_code='$subject_code_array[$i]'";
			$run1=mysqli_query($conn37,$que1);
			while($row1=mysqli_fetch_assoc($run1)){
			$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
			$coaching_info_courses_subject_code = $row1['coaching_info_courses_subject_code'];


			$que="select * from fee_subhead_separate where subhead_name_separate!=''";
			$run=mysqli_query($conn37,$que);
			while($row=mysqli_fetch_assoc($run)){
			$s_no = $row['s_no'];
			$subhead_name_separate = $row['subhead_name_separate'];
			$subhead_code_separate = $row['subhead_code_separate'];

			$que01="select * from student_fee_structure where student_roll_no='$student_roll_no1' and subject_code='$subject_code_array[$i]'";
			$run01=mysqli_query($conn37,$que01);
			if(mysqli_num_rows($run01)>0){
			while($row01=mysqli_fetch_assoc($run01)){
			$amount="fee_subhead_amount_separate_".$subhead_code_separate;
			$subhead_amount_separate = $row01[$amount];
			}
			}else{
			$subhead_amount_separate = '';
			}

			$amount_1=$subhead_amount_separate+$amount_1;

			}
			}
			}
			//////Separate///////
			?>


			<?php
			//////Common///////
			$amount_2=0;
			$que="select * from fee_subhead_common where subhead_name_common!=''";
			$run=mysqli_query($conn37,$que);
			while($row=mysqli_fetch_assoc($run)){
			$s_no = $row['s_no'];
			$subhead_name_common = $row['subhead_name_common'];
			$subhead_code_common = $row['subhead_code_common'];


			$que1="select * from student_fee_structure where student_roll_no='$student_roll_no1'";
			$run1=mysqli_query($conn37,$que1);
			if(mysqli_num_rows($run1)>0){
			while($row1=mysqli_fetch_assoc($run1)){
			$amount1="fee_subhead_amount_common_".$subhead_code_common;
			$subhead_amount_common = $row1[$amount1];
			}}else{
			$subhead_amount_common = '';
			}
			$amount_2=$subhead_amount_common+$amount_2;
			}
			//////Common///////

			$total_amount=$amount_1+$amount_2;
			?>


		
			<?php
			$que1="select * from student_fee_structure where student_roll_no='$student_roll_no1'";
			$run1=mysqli_query($conn37,$que1);
			if(mysqli_num_rows($run1)>0){
			while($row1=mysqli_fetch_assoc($run1)){
			$fee_head_name = $row1['fee_head_name'];
			$fee_head_amount = $row1['fee_head_amount'];
			$fee_head_code = $row1['fee_head_code'];
			$discount_method = $row1['discount_method'];
			$fee_head_discount = $row1['fee_head_discount'];
			$fee_after_discount = $row1['fee_after_discount'];
			$fee_last_submission_date1=$row1['fee_last_submission_date'];
			
			if($fee_last_submission_date1!='0000-00-00'){
			$fee_last_submission_date=date('d-m-Y', strtotime($fee_last_submission_date1));
			}else{
			$fee_last_submission_date='';
			}
			
			if($discount_method=='percent'){
			$discount_method1='%';
			}else{
			$discount_method1='&#8377;';
			}
			
			}}else{
			$fee_head_name = '';
			$fee_head_amount = '';
			$que="select * from login";
			$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			while($row=mysqli_fetch_assoc($run)){
			$fee_head_code = $row['fee_structure_code'];
			}
			}
			?>

			<br>
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Student Name</label>
					   <input type="text"  name="student_name"  value="<?php echo $student_name; ?>" class="form-control" readonly>
					</div>
			</div>
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Fee Head Name</label>
					   <input type="text"  name="fee_head_name"   value="<?php echo $fee_head_name; ?>" class="form-control"  readonly>
					</div>
			</div>
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Fee Amount</label>
					   <input type="text"  name="fee_head_amount" value="<?php echo $total_amount;?>" class="form-control"  readonly>
					</div>
			</div>
			
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Fee Code</label>
					   <input type="text"  name="fee_head_code"   placeholder="Fee Code"  value="<?php echo $fee_head_code; ?>" class="form-control" readonly>
					</div>
			</div>
			
			<?php $que_bal="select * from coaching_info_pay_fee where student_roll_no='$student_roll_no1'";
			$run_bal=mysqli_query($conn37,$que_bal);
			$fee_pay_amount1=0;
			if(mysqli_num_rows($run_bal)>0){
			while($row_bal=mysqli_fetch_assoc($run_bal)){
			$fee_balance_amount = $row_bal['fee_balance_amount'];
			$fee_pay_amount = $row_bal['fee_pay_amount'];
			
			$fee_pay_amount1=$fee_pay_amount+$fee_pay_amount1;
			}
			}else{
			$fee_balance_amount=$fee_after_discount;
			$fee_pay_amount=0;
			}
			?>
			
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Paid fee</label>
					   <input type="text"  name="paid_fee"   value="<?php echo $fee_pay_amount1;?>" class="form-control" readonly>
					</div>
			</div>
			
			<div class="col-md-3 ">
					<div class="form-group">
					  <label>Remaining Fee</label>
					   <input type="text"  name="remaining_fee"  value="<?php echo $fee_balance_amount;?>" class="form-control" readonly>
					</div>
			</div>
			
			<div class="col-md-3 ">
				<div class="form-group">
				  <label>fee After Discount</label>
				   <input type="text"  name="discount_fee"   value="<?php echo $fee_after_discount; ?>" class="form-control" readonly>
				</div>
			</div>
			
			<div class="col-md-3 ">
				<div class="form-group">
				   <label>Last Submission Date</label>
				   <input type="text"  name="discount_fee" value="<?php echo $fee_last_submission_date; ?>" class="form-control" readonly>
				</div>
			</div>
			
			
			</div>
				
			<div class="col-md-2 "></div>
			
			<div class="col-md-8 box-body table-responsive" >
			
			<br>
                <center><h4 style="color:red;"><b>Fee Subhead Common</b></h4></center>
				<?php
				$amount2=0;
				$que="select * from fee_subhead_common where subhead_name_common!=''";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subhead_name_common = $row['subhead_name_common'];
				$subhead_code_common = $row['subhead_code_common'];
				

				$que1="select * from student_fee_structure where student_roll_no='$student_roll_no1'";
				$run1=mysqli_query($conn37,$que1);
				if(mysqli_num_rows($run1)>0){
				while($row1=mysqli_fetch_assoc($run1)){
				$amount1="fee_subhead_amount_common_".$subhead_code_common;
				$subhead_amount_common = $row1[$amount1];
				}}else{
				$subhead_amount_common = '';
				}
				$amount2=$subhead_amount_common+$amount2;
				?>
				
				<div class="col-md-6 ">
					<div class="form-group">
					  <label>Subhead Name</label>
					   <input type="text"  name="subhead_name_common[]" value="<?php echo $subhead_name_common ; ?>" class="form-control" readonly>
					</div>
				</div>
				
				<div class="col-md-6 ">
					<div class="form-group">
					<label>Subhead Amount</label>
					<input type="text"  name="subhead_amount_common[]"    value="<?php echo$subhead_amount_common; ?>" class="form-control fee" oninput="for_total();" readonly>
					</div>
				</div>
				<?php }?>
			
			</div>
                
			<div class="col-md-3 "></div>
				
			<div class="col-md-6 box-body table-responsive">
			
			<br>
				<center><h4 style="color:red;"><b>Fee Subhead Subjectwise</b></h4></center>
				<?php
				$amount1=0;
				for($i=0; $i<count($subject_code_array); $i++){ 
				$que1="select * from coaching_courses_subject where course_code='$course_code' and coaching_info_courses_subject_code='$subject_code_array[$i]'";
				$run1=mysqli_query($conn37,$que1);
				while($row1=mysqli_fetch_assoc($run1)){
				$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
				$coaching_info_courses_subject_code = $row1['coaching_info_courses_subject_code'];
				?>
				<center><h3 style="color:green;"><b><?php echo $coaching_info_courses_subject_name ; ?></b></h3></center>
				<input type="text" style="display:none;"  name="subject_code[]" value="<?php echo $coaching_info_courses_subject_code ; ?>"  class="form-control">
				<center><div class="col-md-6 "><label>Subhead Name</label></div></center>
				<center><div class="col-md-6 "><label>Subhead Amount</label></div></center>
				<?php
				$que="select * from fee_subhead_separate where subhead_name_separate!=''";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subhead_name_separate = $row['subhead_name_separate'];
				$subhead_code_separate = $row['subhead_code_separate'];

				$que01="select * from student_fee_structure where student_roll_no='$student_roll_no1' and subject_code='$subject_code_array[$i]'";
				$run01=mysqli_query($conn37,$que01);
				if(mysqli_num_rows($run01)>0){
				while($row01=mysqli_fetch_assoc($run01)){
				$amount="fee_subhead_amount_separate_".$subhead_code_separate;
				$subhead_amount_separate = $row01[$amount];
                }
				}else{
				$subhead_amount_separate = '';
				}
				
				$amount1=$subhead_amount_separate+$amount1;
				?>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_name_separate[]'; ?>" value="<?php echo $subhead_name_separate ; ?>" class="form-control" style="border-color: coral;"  readonly>
						</div>
				</div>
				
				<div class="col-md-6 ">
						<div class="form-group">
						   <input type="text"  name="<?php echo $coaching_info_courses_subject_code.'_subhead_amount_separate[]'; ?>" id="coaching_info_fee_amount"   value="<?php echo $subhead_amount_separate; ?>" oninput="for_total();" class="form-control fee" style="border-color: coral;" readonly>
						</div>
				</div>
				<?php } } } ?>
			
			</div>
                
			<div class="col-md-3 "></div>
			
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