<?php include("../attachment/session.php"); ?>


<script type="text/javascript">
    function fill_detail(value){

		$('#rfid_no').val(value);
		set_attendance(value);

    }

    function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
		$('#contact').val('Dear Parents, Your Child has Come to School.');
		 $('#send_sms').val('Yes');
    } else {
       text.style.display = "none";
	   $('#contact').val('');
	   $('#send_sms').val('No');
    }
}

function set_attendance(value){

var sms=document.getElementById('contact').value;
var send_sms=document.getElementById('send_sms').value;
$.ajax({
	type:"POST",
	url:access_link+"attendance/ajax_set_student_rfid_attendance.php?rfid="+value+"&sms="+sms+"&send_sms="+send_sms+"",
	cache:false,
	success:function(data)
	{
	$('#rfid_no').val('');
	$('#hidden_rfid').val(value);
	attendance_detail();
	}
});

}
function check_same(value){
var len=value.length;
if(len==10){
var hidden_rfid1=document.getElementById('hidden_rfid').value;
if(hidden_rfid1==value){
$('#rfid_no').val('');
}
}
}

function attendance_detail(){
    $("#attendance_list").html(loader_div);
$.ajax({
	type:"POST",
	url:access_link+"attendance/ajax_get_attendance_list.php",
	cache:false,
	success:function(data)
	{
	$('#attendance_list').html(data);
	}
});
}

// setInterval(function(){
    // attendance_detail()
// }, 5000);
</script>


  

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
	  <li class="active">Student RFID Attendance</li>
      </ol>
    </section>
	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <div class="col-md-8"><h3 class="box-title">RFID Attendance</h3></div>
			  <div class="col-md-4"><button type="button" class="btn my_background_color" style="float:right;" onclick="attendance_detail();">Refresh List</button></div>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
	
				<div class="col-md-4 box-body table-responsive">
                <table id="table-data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Enter RFID No</th>
                </tr>
                </thead>
				<tbody>
					<tr>
					<input type="hidden" id="hidden_rfid">
					<td><input type="text" name="rfid_no" id="rfid_no" placeholder="Enter RFID No" autofocus required value="" oninput="check_same(this.value);" onchange="set_attendance(this.value);" autocomplete="off"></td>
					</tr>
					<tr>
					<td>&nbsp;</td>
					</tr>
					<tr>
					<td>
					<label>Search Student</label>
					  <select name="" id="select_rfid_no" class="form-control select2" onchange="fill_detail(this.value);" style="width:100%;">
					  <option value="">Select student</option>
					        <?php
							
							$qry="select * from student_admission_info where student_status='Active' and student_rf_id_number!='' and session_value='$session1'";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$student_roll_no=$row22['student_roll_no'];
							$school_roll_no=$row22['school_roll_no'];
							$student_name=$row22['student_name'];
							$student_class=$row22['student_class'];
							$student_section=$row22['student_class_section'];
							$student_father_name=$row22['student_father_name'];
							$student_father_contact_number=$row22['student_father_contact_number'];
							$student_rf_id_number=$row22['student_rf_id_number'];
							?>
							<option value="<?php echo $student_rf_id_number; ?>"><?php echo $student_name."[".$school_roll_no."]-[".$student_rf_id_number."]-[".$student_class."-".$student_section."]-[".$student_father_name."-".$student_father_contact_number."]"; ?></option>
							<?php
							}
							?>
					  </select>
					</td>
					</tr>
                    <tr>
					<td>
					<div class="form-group">
					<label><input type="checkbox" name="myCheck" id="myCheck" checked onclick="myFunction();">&nbsp;&nbsp;&nbsp;Check For Present Student Message</label>
				    <div class="form-group" id="text" style="display:none">
					
					  <input type="text" name="sms" placeholder="" id="contact"  class="form-control">
					  <input type="hidden" name="send_sms" placeholder="" id="send_sms"  class="form-control">
					 
					</div>
					</div>
					</td>
					</tr>
					</tbody>
				
                </table>
                </div>
					            
				<div class="col-md-8 box-body table-responsive" id="attendance_list">
                
                </div>
				
		  </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>


</div>

</body>
</html>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script>
myFunction();
</script>