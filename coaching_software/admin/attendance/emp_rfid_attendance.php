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
		$('#contact').val('Dear Member, You has Come to School.');
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
	url: access_link+"attendance/ajax_set_emp_rfid_attendance.php?rfid="+value+"&sms="+sms+"&send_sms="+send_sms+"",
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
	url:access_link+"attendance/ajax_get_emp_attendance_list.php",
	cache:false,
	success:function(data)
	{
	$('#attendance_list').html(data);
	}
});
}


</script>


      <section class="content-header">
      <h1>
         Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
		 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
	  <li class="active">  Employee RFID Attendance</li>
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
					<label>Employee Name </label>
					  <select name="" id="select_rfid_no" class="form-control select2" onchange="fill_detail(this.value);" style="width:100%;">
					  <option value="">Select Employee</option>
					        <?php
							$qry="select * from employee_info where emp_status='Active' and emp_rf_id_no!=''";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$s_no=$row22['s_no'];
							$emp_name=$row22['emp_name'];
							$emp_categories=$row22['emp_categories'];
							$emp_father=$row22['emp_father'];
							$emp_mobile=$row22['emp_mobile'];
							$emp_rf_id_no=$row22['emp_rf_id_no'];
							?>
							<option value="<?php echo $emp_rf_id_no; ?>"><?php echo $emp_name."[".$s_no."]-[".$emp_rf_id_no."]-[".$emp_mobile."]-[".$emp_father."]-[".$emp_categories."]"; ?></option>
							<?php
							}
							?>
					  </select>
					</td>
					</tr>
                    <tr>
					<td>
					<div class="form-group">
					<label><input type="checkbox" name="myCheck" id="myCheck" onclick="myFunction();">&nbsp;&nbsp;&nbsp;Check For Present Employee Message</label>
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

</body>
</html>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>