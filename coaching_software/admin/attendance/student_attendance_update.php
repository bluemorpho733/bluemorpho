<?php include("../attachment/session.php"); ?>
<script>
function change_date(){
    var student_courses=document.getElementById('student_courses').value;
    var attendance_student_date=document.getElementById('student_date_change').value;
    var student_subject=document.getElementById('student_subject').value;
    var radiovalue = $("input[name='order_by']:checked").val();
    if(radiovalue!=''){
    var data12="student_courses="+student_courses+"&attendance_student_date="+attendance_student_date+"&student_subject="+student_subject+"&radiovalue="+radiovalue;
	post_content('attendance/student_attendance_update',data12);
    }else{
    var data12="student_courses="+student_courses+"&attendance_student_date="+attendance_student_date+"&student_subject="+student_subject;
	post_content('attendance/student_attendance_update',data12);
    }
}

function for_check(id){
if($('#'+id).prop("checked") == true){
$("."+id).each(function() {
$(this).prop('checked',true);
});
}else{
$("."+id).each(function() {
$(this).prop('checked',false);
});
}
}

function for_message(id,value){
var for_msg=document.getElementById('parents_message_'+id).value;
var value1=for_msg.split('|?|');
var value2=value1[0]+'|?|'+value1[1]+'|?|'+value;
$('#parents_message_'+id).val(value2);
}

 $("#my_form").submit(function(e){
        e.preventDefault();
    var formdata = new FormData(this);
    window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
        url: access_link+"attendance/student_attendance_update_api.php",
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
			   post_content('attendance/student_attendance_list',res[2]);
        }
		}
         });
      });

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
		  <li><a href="javascript:get_content('attendance/student_attendance_select')"><i class="fa fa-child"></i> Student Attendance Select</a></li>
		 <li class="active">Student Attendance Update</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            $sql5=mysqli_query($conn37,"select * from coaching_courses INNER JOIN coaching_courses_subject ON coaching_courses.coaching_info_courses_code=coaching_courses_subject.course_code");
            $result5=mysqli_fetch_assoc($sql5);
            $courses_name=$result5['coaching_info_courses_name'];
            $subject_name=$result5['coaching_info_courses_subject_name'];
			$que="select `coaching_info_coaching_name` from coaching_info_general";
			$run=mysqli_query($conn37,$que);
			while($row=mysqli_fetch_assoc($run)){
			$coaching_info_coaching_name = $row['coaching_info_coaching_name'];
		    }
			$student_courses=$_GET['student_courses'];
			if($student_courses!=''){
			    $condition1=" and course_code='$student_courses'";
			}else{
			    $condition1="";
			}
			$student_subject=$_GET['student_subject'];
			if($student_subject=='All'){
			    $condition2="";
			}else{
			    $condition2=" and subject_code='$student_subject'";
			}
			$attendance_student_date=$_GET['attendance_student_date'];
			$attendance_student_date2=explode('-',$attendance_student_date);
			$attendance_student_date3=$attendance_student_date2[2]."-".$attendance_student_date2[1]."-".$attendance_student_date2[0];
			$attendance_student_date4=$attendance_student_date2[2];
			$month=$attendance_student_date2[1];
			$session_exp=explode('_',$session1);
			if($month=='01' || $month=='02' || $month=='03'){
			    $year=$session_exp[0]+1;
			}else{
			    $year=$session_exp[0];
			}
		  ?>
		  
  <form  method="post" enctype="multipart/form-data" id='my_form'>
	<input type="hidden" name="attendance_student_date" id="attendance_student_date" value="<?php echo $attendance_student_date; ?>"  />
	<input type="hidden" name="student_courses" id="student_courses" value="<?php echo $student_courses; ?>"  />
	<input type="hidden" name="student_subject" id="student_subject" value="<?php echo $student_subject; ?>"  />
        <div class="box">
            <div class="box-header">
              <div class="col-md-3"><h3 class="box-title">Student Attendance</h3></div>
              <div class="col-md-5"><span style="font-weight:bold; float:right;">ORDER BY : </span></div>
              <div class="col-md-4">
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="P" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='P'){ echo 'checked'; } } ?> /> <b>P</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="A" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='A'){ echo 'checked'; } } ?> /> <b>A</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="L" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='L'){ echo 'checked'; } } ?> /> <b>L</b></div>
                  <div class="col-md-3"><input type="radio" name="order_by" class="att_order" value="None" onclick="change_date();" <?php if(isset($_GET['radiovalue'])){ if($_GET['radiovalue']=='None'){ echo 'checked'; } } ?> /> <b>None</b></div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <div class="col-md-12">
			  <div class="col-md-6"><h4>Attendance Date : <?php echo $attendance_student_date3; ?></h4></div>
			  <div class="col-md-4"><h4>Courses : <?php echo $courses_name; ?> / <?php echo 'Subject'; ?> : '<?php echo $subject_name; ?>'</h4></div>
			  <div class="col-md-2">
			  <label>Change Date :</label>
              <input type="date" name="student_date_change" id="student_date_change" value="<?php echo $attendance_student_date; ?>" class="form-control" oninput="change_date();" />
              </div>
			  </div>
			  <div class="col-md-12">
			  <div class="col-md-4">
			  <label>Present Student <input type="checkbox" name="all_present_student" checked ></label>
			  <input type="text" name="persent_message" id="" value="Dear Parent, Your ward ? is PRESENT today (<?php echo $attendance_student_date3; ?>). Regards <?php echo $coaching_info_coaching_name; ?>" class="form-control" />
			  </div>
			  <div class="col-md-4">
			  <label>Absent Student <input type="checkbox" name="all_absent_student" checked ></label>
			  <input type="text" name="absent_message" id="" value="Dear Parent, Your ward ? is ABSENT today (<?php echo $attendance_student_date3; ?>). Kindly ensure the regularity. Regards <?php echo $coaching_info_coaching_name; ?>" class="form-control" />
			  </div>
			  <div class="col-md-4">
			  <label>Leave Student <input type="checkbox" name="all_leave_student" checked ></label>
			  <input type="text" name="leave_message" id="" value="Dear Parent, Your ward ? is on LEAVE today (<?php echo $attendance_student_date3; ?>). Kindly ensure the regularity. Regards <?php echo $coaching_info_coaching_name; ?>" class="form-control" />
			  </div>
			  </div>
			  <div class="col-md-12">&nbsp;</div>
			  </div>
			  </div>
		      <br>
			   <div class="box">
          
            <div class="box-body ">
			  <div class="col-md-12">
			  <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th>S No</th>
                  <th>Student Name</th>
                  <th>Class Roll No</th>
                  <th>Student Attendance</th>
                  <th>Student Intime</th>
                  <th><input type="checkbox" id="selection" onclick="for_check(this.id);" /> #</th>
                </tr>
                </thead>
                <tbody>
				<?php
		        $que34="select * from student_admission_info where student_status='Active' and session_value='$session1'$condition1$condition2 order by student_name ASC";
				$run34=mysqli_query($conn37,$que34) or die(mysqli_error($conn37));
                $serial_no=0;
				while($row34=mysqli_fetch_assoc($run34)){
				$unique_id = $row34['student_roll_no'];
				$coaching_roll_no = $row34['coaching_roll_no'];
				$student_name = $row34['student_name'];
				$student_courses = $row34['course_code'];
				$student_subject = $row34['subject_code'];
				$student_rf_id_number = $row34['student_rf_id_number'];
				$student_sms_contact_number	= $row34['student_sms_contact_number'];

				$serial_no++;
				$que="select * from student_attendance where attendance_roll_no='$unique_id' and month='$month' and year='$year' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				
				if(mysqli_num_rows($run)>0){
				}else{
				$que223="insert into student_attendance (attendance_roll_no,attendance_name,attendance_courses,attendance_subject,attendance_rf_id_no,month,year,session_value,$update_by_insert_sql_column) values('$unique_id','$student_name','$student_courses','$student_subject','$student_rf_id_number','$month','$year','$session1',$update_by_insert_sql_value);";
				mysqli_query($conn37,$que223) or die(mysqli_error($conn37));
			    $que="select * from student_attendance where attendance_roll_no='$unique_id' and  month='$month' and year='$year' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				}
				while($row=mysqli_fetch_assoc($run)){

				$s_no=$row['s_no'];
				$unique_id = $row['attendance_roll_no'];
				$attendance_name = $row['attendance_name'];
				$attendance_rf_id_no = $row['attendance_rf_id_no'];
				for($i=1;$i<=$attendance_student_date2[2];$i++){
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
				
				if($a!=''){
				$for_prsnt=$a;
				}else{
				$for_prsnt='P';
				}
				
				if(isset($_GET['radiovalue']) && $a==''){
				if($_GET['radiovalue']!='None'){
				$a11=$_GET['radiovalue'];
				$for_prsnt=$_GET['radiovalue'];
				}else{
				$a11=$_GET['radiovalue'];
				$for_prsnt='';
				}
				}else{
				$a11='';
				}
				?>
                <tr>
                  <td><?php echo $serial_no; ?></td>
                  <td><?php echo $attendance_name; ?></td>
                  <td><?php echo $coaching_roll_no; ?>
				  <input type="hidden" name="unique_id[]" value="<?php echo $unique_id; ?>" readonly />
				  <input type="hidden" name="attendance_rf_id_no[]" value="<?php echo $attendance_rf_id_no; ?>" readonly />
				  </td>
                  <td>
				  <select name="student_attendance[]" onchange="for_message('<?php echo $serial_no; ?>',this.value);" >
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
				  <td>
				  <input type="checkbox" name="parents_message[]" id="<?php echo 'parents_message_'.$serial_no; ?>" class="selection" value="<?php echo $student_name.'|?|'.$student_sms_contact_number.'|?|'.$for_prsnt; ?>" >
				  <!-- <input type="text" name="student_present_absent" id="" value="P" /> -->
				  </td>
                </tr>
				<?php } }?>
                </tbody>
              </table>
			  </div>
			  <div class="col-md-12">
			  <center><button type="submit" name="submit1" id="submitButtonId" class="btn btn-primary">Submit</button></center>
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
    <!-- /.content -->
  </div>


<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

