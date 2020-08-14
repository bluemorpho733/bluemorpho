<?php include("../attachment/session.php")?>
 
	<script>
function change_date(){
var attendance_staff_type=document.getElementById('staff_type').value;
var attendance_emp_date=document.getElementById('emp_date_change').value;
var radiovalue = $("input[name='order_by']:checked").val();

if(radiovalue!=''){
var data12="staff_type="+attendance_staff_type+"&date="+attendance_emp_date+"&radiovalue="+radiovalue;
post_content('attendance/emp_attendance_update',data12);
}else{
var data12="staff_type="+attendance_staff_type+"&date="+attendance_emp_date;
post_content('attendance/emp_attendance_update',data12);
}

}
	
	
    $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
    window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"attendance/emp_attendance_update_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   //alert('Successfully Complete');
				   post_content('attendance/emp_attendance_list',res[2]);
            }
			}
         });
      });

	</script>
      <section class="content-header">
      <h1>
         Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
	  <li><a href="javascript:get_content('attendance/emp_attendance_select')"><i class="fa fa-child"></i> Employee Attendance Select</a></li>
	 <li class="active">Employee Attendance Update</li>
      </ol>
    </section>

	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <div class="row">

		<div class="col-sm-12">
         
          <?php
			$staff_type=$_GET['staff_type'];
			$staff_attendance_date=$_GET['date'];
			

			$staff_attendance_date2=explode('-',$staff_attendance_date);
			$staff_attendance_date3=$staff_attendance_date2[2]."-".$staff_attendance_date2[1]."-".$staff_attendance_date2[0];
			$staff_attendance_date4=$staff_attendance_date2[2];
			//$year=$staff_attendance_date2[0];
			$month=$staff_attendance_date2[1];
			$session_exp=explode('_',$session1);
			if($month=='01' || $month=='02' || $month=='03'){
			    $year=$session_exp[0]+1;
			}else{
			    $year=$session_exp[0];
			}
		  ?>
		  
		  <form  method="post" enctype="multipart/form-data" id='my_form'>
			<input type="hidden" name="staff_type" id="staff_type" value="<?php echo $staff_type; ?>"  />
			<input type="hidden" name="staff_attendance_date" value="<?php echo $staff_attendance_date; ?>"  />

        <div class="box" style="padding:10px 10px 10px 10px;">
            <div class="box-header">
              <div class="col-md-3"><h3 class="box-title">Staff Attendance</h3></div>
              <div class="col-md-5"><span style="font-weight:bold; float:right;">ORDER BY : </span></div>
              <div class="col-md-4">
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="P" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='P'){ echo 'checked'; } } ?> /> <b>P</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="A" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='A'){ echo 'checked'; } } ?> /> <b>A</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="L" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='L'){ echo 'checked'; } } ?> /> <b>L</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="None" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='None'){ echo 'checked'; } } ?> /> <b>None</b></div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12">
			  <div class="col-md-5"><h4>Attendance Date : <?php echo $staff_attendance_date3; ?></h4></div>
			  <div class="col-md-5"><h4>Staff Type : <?php echo $staff_type; ?></h4></div>
			  <div class="col-md-2">
			  <label>Change Date :</label>
              <input type="date" name="emp_date_change" id="emp_date_change" value="<?php echo $staff_attendance_date; ?>" class="form-control" oninput="change_date();" />
              </div>
			  </div>
			   </div>
			  </div>
		       <br>
			   <div class="box">
          
            <div class="box-body ">
			  <div class="col-md-12">
			  <div class="col-md-12">
			  <table id="" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th>S No</th>
                  <th>Staff Name</th>
                  <th>Unique Id</th>
                  <th>Staff Attendance</th>
                  <th>Staff Intime</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$que13="select * from employee_info where emp_status='Active' and emp_categories='$staff_type' order by emp_name ASC";
				$run13=mysqli_query($conn37,$que13) or die(mysqli_error($conn37));
				$serial_no=0;
				while($row13=mysqli_fetch_assoc($run13)){
				$emp_id = $row13['emp_id'];
				$emp_name = $row13['emp_name'];
				$emp_categories = $row13['emp_categories'];
				$emp_rf_id_no = $row13['emp_rf_id_no'];
				$emp_designation = $row13['emp_designation'];


				$que="select * from staff_attendance where staff_id='$emp_id' and month='$month' and year='$year' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				if(mysqli_num_rows($run)>0){
				}else{
			    $quer15="insert into staff_attendance(staff_name,staff_id,staff_type,staff_designation,month,year,emp_rf_id_no,session_value,$update_by_insert_sql_column)values('$emp_name','$emp_id','$emp_categories','$emp_designation','$month','$year','$emp_rf_id_no','$session1',$update_by_insert_sql_value)";
                mysqli_query($conn37,$quer15);
				$que="select * from staff_attendance where staff_id='$emp_id' and month='$month' and year='$year' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				}
				while($row=mysqli_fetch_assoc($run)){
				$s_no=$row['s_no'];
				$staff_id = $row['staff_id'];
				$staff_name = $row['staff_name'];
				
				for($i=1;$i<=$staff_attendance_date2[2];$i++){
				if($i<10){
				$a=$row['0'.$i];
				$col_name=$row['intime_0'.$i];
				$view_time=explode(" ", $col_name);
				}else{
				$a=$row[$i];
				$col_name=$row['intime_'.$i];
				$view_time=explode(" ", $col_name);
				}
			    }
			    
			    if(isset($_GET['radiovalue']) && $a==''){
				if($_GET['radiovalue']!='None'){
				$a11=$_GET['radiovalue'];
				}else{
				$a11=$_GET['radiovalue'];
				}
				}else{
				$a11='';
				}
			    
		        $serial_no++; 
		        ?>
                <tr>
                  <td><?php echo $serial_no; ?></td>
                  <td><?php echo $staff_name; ?></td>
                  <td><?php echo $staff_id; ?>
				  <input type="hidden" name="staff_id[]" value="<?php echo $staff_id; ?>" readonly />
				  <input type="hidden" name="emp_rf_id_no[]" value="<?php echo $emp_rf_id_no; ?>" readonly />
				  </td>
                  <td>
				  <select name="staff_attendance[]" >
				  <option <?php if($a=='P'){ echo "selected"; }elseif($a11=='P'){ echo "selected"; } ?> value="P">P</option>
				  <option <?php if($a=='P/2'){ echo "selected"; }elseif($a11=='P/2'){ echo "selected"; } ?> value="P/2">P/2</option>
				  <option <?php if($a=='A'){ echo "selected"; }elseif($a11=='A'){ echo "selected"; } ?> value="A">A</option>
				  <option <?php if($a=='L'){ echo "selected"; }elseif($a11=='L'){ echo "selected"; } ?> value="L">L</option>
				  <option <?php if($a=='' && $view_time[1]!='00:00:00'){ echo "selected"; }elseif($a11=='None'){ echo "selected"; } ?> value="">None</option>
				  </select>
				  <input type="hidden" name="col_name[]" value="<?php echo $col_name; ?>" readonly />
				  </td>
				  <td>
				  <?php if($view_time[1]!='00:00:00'){ ?>
				  <input type="time" name="view_intime[]" value="<?php echo $view_time[1]; ?>" style="border:none;" readonly />
				  <?php } ?>
				  </td>
                </tr>
				<?php    } } ?>
                </tbody>
              </table>
			  </div>
			  <div class="col-md-12">
			  <center><button type="submit" name="submit1" class="btn btn-primary">Submit</button></center>
			  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </form>
		
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

