<?php include("../attachment/session.php")?>
<script type="text/javascript">
   function fill_detail(value){
          $("#student_roll_no").val('Loading.....'); 
		  $("#student_name").val('Loading.....'); 
		  $("#student_class").val('Loading.....'); 
          $("#student_section").val('Loading.....');  
			$.ajax({
				address: "POST",
				url: access_link+"holiday/ajax_search_student_box.php?id="+value+"",
				cache: false,
				success: function(detail){
				var str =detail;
				var res = str.split("|?|");
				$("#student_roll_no").val(value); 
				$("#student_name").val(res[0]); 
				$("#student_father_name").val(res[1]); 
				$("#student_contact").val(res[2]);  
				}
           });

    }
</script>  
<script>
    function check_date(){
	var from_date=document.getElementById("leave_from_date").value;
	var to_date=document.getElementById("leave_to_date").value;
	if(from_date!='' && to_date!=''){
	     $("#total_leave_days").val('Loading.....');
         $("#total_sunday").val('Loading.....');
         $("#total_holiday").val('Loading.....');
             $.ajax({
			  type: "POST",
              url: access_link+"holiday/ajax_leave_holiday_detail.php?from_date="+from_date+"&to_date="+to_date+"",
              cache: false,
              success: function(detail){
                 var str=detail;
            var res=str.split("|?|");
           $("#total_leave_days").val(res[0]);
           $("#total_sunday").val(res[1]);
           $("#total_holiday").val(res[2]);
			}
           });
            }
			}
$("#my_form").submit(function(e){
    e.preventDefault();
var formdata = new FormData(this);
window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"holiday/leave_form_api.php",
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
				   get_content('holiday/leave_list');
            }
			}
         });
      });
	  
</script>
	<script>
  $(function () {
    $('.select2').select2();
  })
</script>

    <section class="content-header">
      <h1>
       <?php echo $language['Leave Management']; ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	   <li><a href="javascript:get_content('holiday/holiday')"#><i class="fa fa-umbrella"></i> <?php echo $language['Leave Management']; ?></a></li>
        <li class="active"><i class="fa fa-user-plus"></i> <?php echo $language['Add Leave']; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Student Leave Form']; ?></h3>
            </div>
           
			
            <div class="box-body">
            <form role="form" method="post" enctype="multipart/form-data" id="my_form">
			<div class="col-md-12">
			 <div class="col-md-6 ">				
					<div class="form-group" >
					  <label><?php echo $language['Search Student']; ?></label>
					  <select name="" class="form-control select2" onchange="fill_detail(this.value);" required>
					  <option value="">Select student</option>
					        <?php
							$qry="select * from student_admission_info where student_status='Active' and session_value='$session1' ";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$student_roll_no=$row22['student_roll_no'];
							$student_name=$row22['student_name'];
							$student_class=$row22['student_class'];
							$student_section=$row22['student_class_section'];
							$student_father_name=$row22['student_father_name'];
							$student_father_contact_number=$row22['student_father_contact_number'];
							?>
							<option value="<?php echo $student_roll_no; ?>"><?php echo $student_name."[".$student_roll_no."]-[".$student_father_name."]"; ?></option>
							<?php
							}
							?>
					  </select>
					</div>
				</div>
			</div>
			
			
				<div class="col-md-4">
					<div class="form-group">
					  <label><?php echo $language['Student Name']; ?></label>
					   <input type="text"  name="student_name" placeholder="<?php echo $language['Student Name']; ?>"  id="student_name" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					  <label>Father Name</label>
					   <input type="text"  name="student_father_name" placeholder="Student Father Name"  id="student_father_name" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Contact No.</label>
						   <input type="text"  name="student_contact" placeholder="student contact"  id="student_contact" class="form-control" readonly>
						  
						</div>
							</div>
							<div class="col-md-4 ">	
					<div class="form-group" >
					  <label><?php echo $language['Student Roll No']; ?></label>
					  <input type="text"  name="student_roll_no" placeholder="<?php echo $language['Student Roll No']; ?>"  id="student_roll_no" class="form-control" readonly>
					</div>
				  </div>
				  
				<div class="col-md-4 ">	
					<div class="form-group" >
					  <label><?php echo $language['Leave From']; ?></label>
					  <input type="date"  id="leave_from_date" name="leave_from_date" placeholder="<?php echo $language['Leave From']; ?>" onchange="check_date();" value="<?php echo date("Y-m-d"); ?>" class="form-control">
					</div>
				  </div>
				<div class="col-md-4 ">	
					<div class="form-group" >
					  <label><?php echo $language['Leave To']; ?></label>
					  <input type="date"  onchange="check_date();" id="leave_to_date" name="leave_to_date" placeholder="<?php echo $language['Leave To']; ?>"  value="<?php echo date('Y-m-d');?>" class="form-control">
					</div>
				  </div>
				  <div class="col-md-4 ">	
					<div class="form-group" >
					  <label><?php echo $language['Approved By']; ?></label>
					  <input type="text"  name="approved_by" placeholder="<?php echo $language['Approved By']; ?>"  value="" class="form-control">
					</div>
				  </div>
				  <div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Upload Application']; ?></label>
					  <input type="file"  id="leave_application" name="leave_application"  value="" onchange="check_file_type(this,'leave_application','show_application','all');"class="form-control" accept=".gif, .jpg, .jpeg, .png, .pdf, .doc">
					</div>
				  </div>
				     <div class="col-md-1">	
					<div class="form-group" >
					  <img src="<?php echo $coaching_software_path; ?>images/student_blank.png" id="show_application" height="50" width="50" >
					</div>
				</div>
				  <div class="col-md-2 ">	
					<div class="form-group" >
					  <label><?php echo $language['Total leave days']; ?></label>
					  <input type="text"  name="total_leave_days" id="total_leave_days" placeholder="<?php echo $language['Total leave days']; ?>"  value="" class="form-control">
					</div>
				  </div>
				  <div class="col-md-1 ">	
					<div class="form-group" >
					  <label><?php echo $language['Total Sunday']; ?></label>
					  <input type="text"   id="total_sunday"   value="" class="form-control" readonly>
					</div>
				  </div>
				  <div class="col-md-1 ">	
					<div class="form-group" >
					  <label><?php echo $language['Total Holiday']; ?></label>
					  <input type="text"   id="total_holiday"   value="" class="form-control" readonly>
					</div>
				  </div>
				  
				<center><input type="submit" name="finish" value="<?php echo $language['Submit']; ?>" class="btn  my_background_color" /></center>
				
				
				
				
				
		</form>	
		<div class="col-md-12">
		        
		  </div>
	</div>
          </div>
    </div>
</section>

   