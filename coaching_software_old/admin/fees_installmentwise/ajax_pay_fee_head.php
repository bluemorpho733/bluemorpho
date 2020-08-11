<?php include("../attachment/session.php"); 
$data=$_GET['data'];
$data2=explode('|?|', $data);
$student_name=$data2[0];
$course_code=$data2[1];
$student_roll=$data2[2];
$sql=mysqli_query($conn37,"select * from student_admission_info where student_roll_no='$student_roll'");
$result=mysqli_fetch_assoc($sql);
$student_name=$result['student_name'];
$student_father_name=$result['student_father_name'];
$student_contact_number=$result['student_contact_number'];
$coaching_roll_no=$result['coaching_roll_no'];
$my_subject_code=$result['my_subject_name'];
$subject_code_array=explode(',', $my_subject_code);
?>

<?php
$query="select * from coaching_courses where coaching_info_courses_code='$course_code'";
$run_query=mysqli_query($conn37,$query);
while($row_query=mysqli_fetch_assoc($run_query)){
$coaching_info_courses_name = $row_query['coaching_info_courses_name'];
}

$amount_1=0;
for($i=0; $i<count($subject_code_array); $i++){ 
$que1="select * from coaching_courses_subject where course_code='$course_code' and coaching_info_courses_subject_code='$subject_code_array[$i]'";
$run1=mysqli_query($conn37,$que1);
while($row1=mysqli_fetch_assoc($run1)){
$coaching_info_courses_subject_name = $row1['coaching_info_courses_subject_name'];
$coaching_info_courses_subject_code = $row1['coaching_info_courses_subject_code'];
}
}
?>


				<?php
				$que1="select * from student_fee_structure where student_roll_no='$student_roll' and fee_status='Active'";
				$run1=mysqli_query($conn37,$que1);
				$fee_after_discount=0;
				while($row1=mysqli_fetch_assoc($run1)){
				$fee_head_name = $row1['fee_head_name'];
				$fee_head_amount = $row1['fee_head_amount'];
				$fee_head_code = $row1['fee_head_code'];
				$fee_head_discount = $row1['fee_head_discount'];
				$fee_after_discount = $row1['fee_after_discount'];
				$fee_last_submission_date = $row1['fee_last_submission_date'];
				
				
				if(date('Y-m-d') > $fee_last_submission_date){
				$penalty_required='required';
				$penalty_required_font='<font style="color:red"><b>*</b></font>';
				}else{
				$penalty_required='readonly';
				$penalty_required_font='';
				}
				}
				
				$que_bal="select * from coaching_info_pay_fee where student_roll_no='$student_roll'";
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
				
				if($fee_after_discount!=0){
				?>

				<br>
				<div class="col-md-8">
				<div class="col-md-6 ">
						<div class="form-group" style="border-color:blue;">
						  <label>Date</label>
						   <input type="date"  name="fee_submission_date"  value="<?php echo date('Y-m-d'); ?>" class="form-control">
						</div>
				</div>
				<div class="col-md-6 ">
						<div class="form-group">
						  <label>Student Name</label>
						   <input type="text"  name="student_name" id="student_name"  value="<?php echo $student_name; ?>" class="form-control" readonly>
						</div>
				</div>
				<div class="col-md-6 ">
						<div class="form-group">
						  <label>Father Name</label>
						   <input type="text"  name="student_father_name"  value="<?php echo $student_father_name; ?>" class="form-control" readonly>
						</div>
				</div>
				<input type="text"  name="student_roll_no"  value="<?php echo $student_roll; ?>" class="form-control"  style="display:none">
				<input type="text"  name="coaching_roll_no"  value="<?php echo $coaching_roll_no; ?>" class="form-control"  style="display:none">
				<input type="text"  name="contact_number"  value="<?php echo $student_contact_number; ?>" class="form-control"  style="display:none">
				<div class="col-md-6 ">
						<div class="form-group">
						  <label>Course Name</label>
						   <input type="text"  name="course_name"  value="<?php echo $coaching_info_courses_name; ?>" class="form-control" readonly>
						</div>
				</div>
				<input type="text"  name="course_code"  value="<?php echo $course_code; ?>" class="form-control"  style="display:none">
				<div class="col-md-6 ">
						<div class="form-group">
						  <label>Fee Head Name</label>
						   <input type="text"  name="fee_head_name"   value="<?php echo $fee_head_name; ?>" class="form-control"  readonly>
						</div>
				</div>
				
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Fee Amount</label>
						   <b><input type="text"  name="fee_amount_final" value="<?php echo $fee_after_discount;?>" class="form-control"   readonly></b>
						</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
					 <label>Amount Detail</label>
					  <center><button style="color:red;" type="button" class="btn btn-default" value="<?php echo $student_roll; ?>" onclick="amount_detail(this.value); open_model(this.value);" data-toggle="modal" data-target="#modal-default">Click</button>
					  </center>
					</div>
				</div>
				
				
			    <div class="col-md-6 " style="display:none;">
					<div class="form-group">
					  <label>Fee Code</label>
					   <input type="text"  name="fee_head_code"   placeholder="Fee Code"  value="<?php echo $fee_head_code; ?>" class="form-control" readonly>
					</div>
				</div>
				
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Balance Amount</label>
					    <input type="number"  name="fee_balance_amount"  value="<?php echo $fee_after_discount-$fee_pay_amount1;?>" class="form-control" id="final_fee_amount1" readonly>
					</div>
				</div>
				
                <input style="display:none;" type="number" value="<?php echo $fee_after_discount-$fee_pay_amount1;?>" class="form-control" id="final_fee_amount" readonly>
				
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Paid Amount</label>
					    <input type="number"  name="paid_amount"  value="<?php echo $fee_pay_amount1; ?>" class="form-control" readonly>
					</div>
				</div>
				
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Penalty<?php echo $penalty_required_font; ?></label>
					   <input type="number"  name="fee_penalty" value=""  class="form-control" <?php echo $penalty_required;?>>
					</div>
				</div>
				
				</div>
				
				<div class="col-md-4">
				  <center><label>PAY FEE HERE</label></center>
					<div  style="height: 260px;border:2px solid; border-color:#3c8dbc; " id="subject_detail">
                      <br>
					  
					<div class="col-md-6 ">
						<div class="form-group">
						  <label>Pay Amount<font style="color:red"><b>*</b></font></label>
						   <input type="number" oninput="for_pay(this.value);" id="total_paid"  name="fee_pay_amount"   placeholder="&#8377 500"  value="" class="form-control" min="0" max="<?php echo $fee_after_discount-$fee_pay_amount1;?>" required>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
						<label>Payment Mode</label>
							<select name="payment_mode" class="form-control" onchange="detail(this.value);"  required>
							  <option value="Cash">Cash</option>
							  <option value="Card">Card</option>
							  <option value="E-Payment">E-payment</option>
							  <option value="Cheque">Cheque</option>
							  <option value="Net Banking">Net Banking</option>
							</select>
						</div>
					</div>
					
					<div class="col-md-6" class="form-group" id="for_cheque_details" style="display:none;">
					 <div class="form-group">
					   <label>Cheque details</label>
					   <input type="text" name="cheque_details" class="form-control bordder-color" id="" placeholder="Enter Cheque no" >
					 </div>
					</div>

                    <div class="col-md-6" class="form-group" id="for_bank_name" style="display:none;">
					 <div class="form-group">
					   <label>Bank Name</label>
					   <input type="text" name="bank_name" class="form-control bordder-color" id="" placeholder="Write Bank Name" >
					 </div>
					</div>
 
                     <div class="col-md-6" class="form-group" id="for_account_no" style="display:none;">
					  <div class="form-group">
					   <label>Account No.</label>
					   <input type="text" name="account_no" class="form-control bordder-color" id="" placeholder="Account No." >
					  </div> 
					 </div> 
					
					<div class="col-md-6" class="form-group" id="for_ifsc_code" style="display:none;">
					 <div class="form-group">
					   <label>Ifsc Code</label>
					   <input type="text" name="bank_ifsc_code" class="form-control bordder-color" id="" placeholder="Ifsc Code" >
					 </div>
					</div>
					</div>
				</div>
				
				<div class="col-md-8"></div>
				<div class="col-md-4">
				<center><input type="submit" name="submit" value="Pay Fee" class="btn btn-primary" /></center>
				</div>
				
				<div class="col-md-8 ">	
				<label><input type="checkbox" name="myCheck" id="myCheck"  onclick="myFunction()">&nbsp;&nbsp;&nbsp;    <?php echo $language['Check For Message']; ?></label>
					<div class="form-group" id="text" style="display:none">
					<input type="text" name="sms" placeholder="" id="contact"  class="form-control">
					  <label>Contact Number</label>
					<input type="text" name="student_sms_contact_number"  value="<?php echo $student_contact_number; ?>"  class="form-control">
					<input type="hidden" name="send_sms" placeholder="" id="send_sms"  class="form-control">	 
					</div>
				</div>

			    <?php }else{ ?>
				
				<br>
				<div class="col-md-3 "></div>
				<div class="col-md-6 ">
                <center><h2 style="color:red;">Fee Not Set Yet!!</h2></center>
				</div>
                <div class="col-md-3 "></div>
                <?php } ?>
				
			
