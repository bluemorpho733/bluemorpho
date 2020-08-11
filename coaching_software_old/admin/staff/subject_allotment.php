<?php include("../attachment/session.php"); ?>
<style type="text/css">
	.add_allotment{
		margin-bottom: 50px;
		margin-top: 20px;
	}
</style>
<section class="content-header">
	<h1>
		Subject Allotment
		<small><?php echo $language['Control Panel']; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('staff/staff')"><i class="fa fa-graduation-cap"></i>Staff</a></li> 
		<li class="active">Batches Allotment</li>
	</ol>
</section>
<script>
	function valid(allotment_id){
	var myval=confirm("Are you sure want to delete this record !!!!");
	if(myval==true){
	delete_record(allotment_id);
	}
	else  {
	return false;
	}
	}
	
	function delete_record(allotment_id){
	$.ajax({
	type: "POST",
	url: access_link+"staff/subject_allotment_delete.php?allotment_id="+allotment_id+"",
	cache: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	   get_content('staff/subject_allotment');
	}else{
	alert(detail); 
	}
	}
	});
	}
	</script>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);
        $.ajax({
            url: access_link+"staff/subject_allotment_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('staff/subject_allotment');
            }else if(res[1]=='exist'){
			alert('Subject already exist this employee');
				   get_content('staff/subject_allotment');
			}
			}
         });
      });
	 
	  
	
function for_subject(value){
	$.ajax({
	type: "POST",
	url:  access_link+"staff/ajax_course_subject.php?course_code="+value+"",
	cache: false,
	success: function($detail1){
	var str1 =$detail1;                
	$("#student_course_subject").html(str1);
	}
	});
}  

function get_batch(subject_id){
	$.ajax({
		type:"POST",
		url:access_link+"staff/get_batch_name.php?subject_id="+subject_id+"",
		cache:false,
		success:function(data){
			$("#batch_name").html(data);
		}
	})
}
	
</script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Subject Allotment</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" class="col-md-6">
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
				<div class="col-md-4 box-body table-responsive">
				<div class="col-md-6">				
					 <div class="form-group" >
					  <label >Employee Name<font style="color:red"><b>*</b></font></label><br>
						<select name="employee_name" id="employee_name" class="form-control employee_name" required >
					    <option value="">Select</option>
						<?php
						if(isset($_GET['emp_id'])){
							$emp_id2=$_GET['emp_id'];
						}else{
							$emp_id2="";
						}
						$que="select * from employee_info where emp_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$emp_name = $row['emp_name'];
						$emp_id = $row['emp_id'];
						?>
					  <option value="<?php echo $emp_id;?>" <?php if($emp_id2==$emp_id){ echo 'selected'; }?>><?php echo $emp_name.'/'.$emp_id;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-6">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control" onchange="for_subject(this.value);"  required>
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-6">				
					 <div class="form-group" >
					  <label >Subject Name<font style="color:red"><b>*</b></font></label><br>
						<select name="subject_code" class="form-control" id="student_course_subject" required onchange="get_batch(this.value)">
					    <option value="">Select</option>
					  </select>
					  </div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
					  <label>Date<font style="color:red"><b>*</b></font></label>
                       <input type="date" name="posted_date" value="<?php echo date("Y-m-d");?>" class="form-control"> 
					</div>
				</div> 

				<div class="col-md-12 add_allotment">
				  <center><input type="submit" name="submit" value="Add Allotment" class="btn btn-default my_background_color"/></center>
				</div>
                </div>
			   
			<div class="col-md-8 box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Employee Name</th>
				  <th>Course Name</th>
				  <th>Subject Name</th>
                  <!-- <th>Batch Name</th> -->
				  <th>Date</th>
				  <th>Edit</th>
				  <th>Delete</th>
                </tr>
                </thead>

			<?php
			$que="select * from subject_allotment as sa INNER JOIN employee_info as emp_info on sa.employee_id=emp_info.emp_id where sa.session_value='$session1'";
            $run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;
            while($row=mysqli_fetch_assoc($run)){
            $s_no = $row['subject_allotment_id'];
            $subject_id = $row['subject_id'];
            $course_id = $row['course_id'];
            $emp_name = $row['emp_name'];
			$posted_date2 = $row['posted_date'];
			$posted_date=date("d-m-Y",strtotime($posted_date2));
			$emp_name = $row['emp_name'];
			$subject_allotment_status = $row['subject_allotment_status'];
			$sql1=mysqli_query($conn37,"select * from coaching_courses where coaching_info_courses_code='$course_id'");
			while ($result2=mysqli_fetch_assoc($sql1)) {
			$coaching_info_courses_name = $result2['coaching_info_courses_name'];
		    }
		    $sql2=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_id'");
		    if(mysqli_num_rows($sql2)>0){
		    	$result3=mysqli_fetch_assoc($sql2);
			$coaching_info_courses_subject_name = $result3['coaching_info_courses_subject_name'];
		    }else{
		    $coaching_info_courses_subject_name="All";	
		    }
			$serial_no++;
			?>				

				<tbody>
				<tr  align='center' >

					<th ><?php echo $serial_no; ?></th>
					<th ><?php echo $emp_name; ?></th>
					<th ><?php echo $coaching_info_courses_name; ?></th>
					<th ><?php echo $coaching_info_courses_subject_name; ?></th>
					<!-- <th ><?php echo $coaching_info_batch_name; ?></th> -->
					<th ><?php echo $posted_date; ?></th>
				    <th><button type="button"  onclick="post_content('staff/subject_allotment_edit','<?php echo 'code='.$s_no; ?>')" class="btn btn-default my_background_color" ><?php echo $language['Edit']; ?></button></th>
					<th><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $s_no; ?>')" >Delete</button></th>
				</tr>
				<?php  }  ?>
				</tbody>

				</table>
				</div>

				
		
			    </div>
		
		 
		  </form>
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
 		</form>	
<div id="mypdf_view">
			<div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.employee_name').select2()

  })
</script>
     <script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>

