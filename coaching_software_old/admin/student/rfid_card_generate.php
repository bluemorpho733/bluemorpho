<?php include("../attachment/session.php"); ?>
<script type="text/javascript">
	function for_list(){
	var course_code= document.getElementById('course_code').value;
	var get_subject=document.getElementById('get_subject').value;
	if(course_code!='' && get_subject!=''){
	$('#student_detail').html(loader_div); 
	$.ajax({
	type: "POST",
	url: access_link+"student/ajax_rfid_get.php?id="+course_code+"&get_subject="+get_subject+"",
	cache: false,
	success: function(detail){
	// alert(detail);
	$('#student_detail').html(detail);
	}
	});
	}else{
	$('#student_detail').html('');
	}
	}
</script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['Student RFID Card']; ?></li>
      </ol>
    </section>
	
	<script type="text/javascript">
	
    $("#my_form").submit(function(e){
        e.preventDefault();
 $('#modal-default').modal('hide');
		var get_subject= document.getElementById('get_subject').value;
		var course_code=document.getElementById('course_code').value;
		var data12="course_code="+course_code+"&get_subject="+get_subject;
    var formdata = new FormData(this);
            $.ajax({
            url: access_link+"student/rfid_card_generate_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
				   alert(res[1]);
				      $("#student_rf_id_number").val("");
				  // for_list();
            
			}
         });
      });
	  
function get_course(value1){
$.ajax({
type: "POST",
url:  access_link+"student/ajax_course_subject.php?course_name="+value1+"",
cache: false,
success: function(detail1){
$("#get_subject").html(detail1);
for_list();
}
});
}
</script>
</script>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Assign RFID']; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
			    <div class="col-md-3 ">	
					<div class="form-group" >
					    <label>Course</label>
								 	<select name="course_code" class="form-control" id="course_code" onchange="get_course(this.value);" required>
							<option value="">Select</option>
						<?php
						$que="select * from coaching_courses";
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
				<div class="col-md-3">	
					<div class="form-group">
					    <label>Subject</label>
					 	 	<select name="subject_code" class="form-control" id="get_subject" onchange='for_list();' required>
							<option value="">Select</option>
							</select>
					</div>
				</div>
				
				<div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" id="student_detail">
                <table  class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th><?php echo $language['S No']; ?></th>
				  <th>Admission No.</th>
                  <th><?php echo $language['Student Name']; ?></th>
                  <th><?php echo $language['Father Name']; ?></th>
                  <th><?php echo $language['Roll No']; ?></th>
				  <th>Course/Subject</th>
				  <th><?php echo $language['Rfid No']; ?></th>
				  
				  <th>Update By</th>
                  <th>Date</th>
				  
                  <th><?php echo $language['Action']; ?></th>
                </tr>
                </thead>
				<tbody >
		        </tbody>
                </table>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
				 <!-- modal-box-open -->
			         		<form role="form"  method="post" enctype="multipart/form-data">
	                         <div class="modal fade" id="modal-default">
							 <div class="modal-dialog">
							 <div class="modal-content">
							 <div class="modal-header my_background_color">
							 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span></button>
							 <center><h4 class="modal-title"><b><?php echo $language['ADD RFID CARD NO']; ?></b></h4></center>
							 </div>
							 <div class="modal-body">
									 
						     <div class="form-group">
						     <label><?php echo $language['Student Name']; ?><font style="color:red"><b>*</b></font></label>
						     <input type="text" class="form-control" name="student_name" id="student_name"  readonly />
						     </div>
					         <div class="form-group" style="display:none">
					         <label><?php echo $language['Roll No']; ?></label>
					         <input type="hidden" class="form-control" name="student_roll_no" id="student_roll_no1"  readonly>
							 </div>
							 <div class="form-group">
						     <label><?php echo $language['Add RFID']; ?></label>
						     <input type="text" name="student_rf_id_number"  id="student_rf_id_number" autofocus class="form-control"  />
						     </div>
							 </div>
							 <div class="modal-footer ">
							 <button type="button" class="btn btn-default pull-left my_background_color" data-dismiss="modal"><?php echo $language['Close']; ?></button>
							 <input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary my_background_color" >
							 </div>
							 </div>
							 </div>
							 </div>
					      </form>			
			              <!-- modal-box-end -->
		  <div class="col-md-12" style="display:none">
		        <center><input type="submit" name="finish" value="<?php echo $language['Submit']; ?>" class="btn my_background_color" /></center>
		  </div>
		  </form>
	      </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>

<script>
	function open_model(roll_no){
	var student=document.getElementById("student_name_"+roll_no).value;
	document.getElementById("student_name").value=student;
	document.getElementById("student_roll_no1").value=roll_no;
	}
</script>