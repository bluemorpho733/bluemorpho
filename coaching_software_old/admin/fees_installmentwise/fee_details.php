<?php include("../attachment/session.php"); 

if(isset( $_GET['code'])){
$roll_no=$_GET['code'];
$condition1="student_roll_no='$roll_no'";
}else{
$condition1='';
}

if(isset( $_GET['data'])){
$data=$_GET['data'];
$condition2="s_no='$data'";
}else{
$condition2='';
}


?>
    <section class="content-header">
      <h1>
        Fees Management
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Details</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
           <div class="box-body ">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				<div class="col-md-12 box-body table-responsive">
				
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Student Name</th>
                  <th>Father Name</th>
                  <th>Student Contact</th>
                  <th>Student Roll No.</th>
				  <th>Course Name</th>
				  <th>Fee Name</th>
				  <th>Total Fee</th>
				  <th>Paid Fee</th>
				  <th>Balance</th>
				  <th>Date</th>
				  <th>Fee Receipt</th>
                </tr>
                </thead>

			<?php

			$que="select * from coaching_info_pay_fee where $condition1$condition2";
			$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;
            while($row=mysqli_fetch_assoc($run)){
            $s_no = $row['s_no'];
			$student_name = $row['student_name'];
			$student_roll_no = $row['student_roll_no'];
			$student_father_name = $row['student_father_name'];
			$course_code = $row['course_code'];
			$course_name = $row['course_name'];
			$fee_head_name = $row['fee_head_name'];
			$fee_amount_final = $row['fee_amount_final'];
			$fee_head_code = $row['fee_head_code'];
			$fee_balance_amount = $row['fee_balance_amount'];
			$coaching_roll_no = $row['coaching_roll_no'];
			$fee_pay_amount = $row['fee_pay_amount'];
			$contact_number = $row['contact_number'];
			$fee_submission_date = $row['fee_submission_date'];
            $serial_no++;
			?>				

				<tbody>
				<tr  align='center' >
                    <th><?php echo $serial_no; ?></th>
					<th><?php echo $student_name; ?></th>
					<th><?php echo $student_father_name; ?></th>
					<th><?php echo $contact_number; ?></th>
					<th><?php echo $coaching_roll_no; ?></th>
					<th><?php echo $course_name; ?></th>
					<th><?php echo $fee_head_name; ?></th>
					<th><?php echo $fee_amount_final; ?></th>
					<th><?php echo $fee_pay_amount; ?></th>
					<th><?php echo $fee_balance_amount; ?></th>
					<th><?php echo date('d-m-Y',strtotime($fee_submission_date));?></th>
				    <th><button type="button"  onclick="post_content('fee_installmentwise/fee_details','<?php echo 'code='.$student_roll_no; ?>')" class="btn btn-default my_background_color" >Print</button></th>
				</tr>
				<?php } ?>
				</tbody>

				</table>
                </div>
             </form>
		    </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
<script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>