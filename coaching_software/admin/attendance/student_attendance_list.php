<?php include("../attachment/session.php"); ?>

<script>
function attendance_list(value){
var year=document.getElementById('current_year').value;
var student_courses=document.getElementById('student_courses').value;
var student_subject=document.getElementById('student_subject').value;
var new_date=year+'-'+value+'-01';
var data12="student_courses="+student_courses+"&attendance_student_date="+new_date+"&student_subject="+student_subject;
	post_content('attendance/student_attendance_list',data12);
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
	  <li><a href="javascript:get_content('attendance/student_attendance_select')"><i class="fa fa-child"></i> Student Attendance Select</a></li>
	 <li class="active"> Student Attendance List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
		  $student_courses=$_GET['student_courses'];
		  if($student_courses!=''){
		      $condition1=" and course_code='$student_courses'";
		  }else{
		      $condition1="";
		  }
		  $subject_code=$_GET['student_subject'];
		  if($subject_code=='All'){
		      $condition2="";
		  }else{
		      $condition2=" and subject_code='subject_code'";
		  }
	
          $sql6=mysqli_query($conn37,"select * from coaching_courses where coaching_info_courses_code='$student_courses'");
          $result6=mysqli_fetch_assoc($sql6);
          $course_name=$result6['coaching_info_courses_name'];
          $sql7=mysqli_query($conn37,"select * from coaching_courses_subject where coaching_info_courses_subject_code='$subject_code'");
          $result7=mysqli_fetch_assoc($sql7);
          $subject_name=$result7['coaching_info_courses_subject_name'];

		  $date=$_GET['attendance_student_date'];
		  $date0=explode('-',$date);
		   $year=$date0[0];
			$current_month=$date0[1];
			$session_exp=explode('_',$session1);
			if($current_month=='01' || $current_month=='02' || $current_month=='03'){
			    $year1=$session_exp[0]+1;
			}else{
			    $year1=$session_exp[0];
			}
			$current_month2=$current_month;
		  ?>
		  <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
			  <label>Month : </label>
			  <select name="attendance_student_month" id="attendance_student_month" onchange="attendance_list(this.value);" class="form-control">
			  <option <?php if($current_month2=='04'){ echo "selected"; } ?> value="04">April </option>
			  <option <?php if($current_month2=='05'){ echo "selected"; } ?> value="05">May </option>
			  <option <?php if($current_month2=='06'){ echo "selected"; } ?> value="06">June </option>
			  <option <?php if($current_month2=='07'){ echo "selected"; } ?> value="07">July </option>
			  <option <?php if($current_month2=='08'){ echo "selected"; } ?> value="08">August </option>
			  <option <?php if($current_month2=='09'){ echo "selected"; } ?> value="09">September </option>
			  <option <?php if($current_month2=='10'){ echo "selected"; } ?> value="10">October </option>
			  <option <?php if($current_month2=='11'){ echo "selected"; } ?> value="11">November </option>
			  <option <?php if($current_month2=='12'){ echo "selected"; } ?> value="12">December </option>
			  <option <?php if($current_month2=='01'){ echo "selected"; } ?> value="01">January </option>
			  <option <?php if($current_month2=='02'){ echo "selected"; } ?> value="02">February </option>
			  <option <?php if($current_month2=='03'){ echo "selected"; } ?> value="03">March </option>
			  </select>
			  <input type="hidden" name="current_year" id="current_year" value="<?php echo $year; ?>" />
			  <input type="hidden" id="student_courses" value="<?php echo $student_courses; ?>" />
			  <input type="hidden" id="student_subject" value="<?php echo $subject_code; ?>" />
	
			  </h3>
			 <button style="width:100px;" type="button" class="btn btn-primary">Present</button>
			 <button style="width:100px;" type="button" class="btn btn-danger">Absent</button>
			 <button style="width:100px;" type="button" class="btn btn-warning">Leave</button>
			 <button style="width:100px;" type="button" class="btn btn-info">Holiday</button>
			 <button style="width:100px;" type="button" class="btn btn-success">Sunday</button>
			 <button style="width:100px;" type="button" class="btn ">Not Filled</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped" style="width: 1500px; overflow: auto;">
                <thead class="my_background_color">
				<?php
				$current_month1=$current_month;
				$month_wise='';
				if($current_month1=="01") 
					   $month_wise="January";
				if($current_month1=="02") 
					   $month_wise="February";
				if($current_month1=="03") 
					   $month_wise="March";
				if($current_month1=="04") 
					   $month_wise="April";
				if($current_month1=="05") 
					   $month_wise="May";
				if($current_month1=="06") 
					   $month_wise="June";
				if($current_month1=="07") 
					   $month_wise="july";
				if($current_month1=="08") 
					   $month_wise="August";
				if($current_month1=="09") 
					   $month_wise="September";
				if($current_month1=="10") 
					   $month_wise="October";
				if($current_month1=="11") 
					   $month_wise="November";
				if($current_month1=="12") 
					   $month_wise="December";
				?>
                <tr>
                  <th>Student Name</th>
                  <th><span id="by_month"><?php echo $month_wise; ?></span> Month Attendance</th>
                  <th><?php echo 'Student Courses'; ?> : <?php echo $course_name; ?><input typt="text" name="student_courses" id="student_courses" value="<?php echo $student_courses; ?>" style="display:none;" /><input typt="text" name="student_subject" id="student_subject" value="<?php echo $student_subject; ?>" style="display:none;" /></th>
                </tr>
                </thead>
                <tbody id="stud_list">
                <tr>
				  <td><button type="button" class="btn btn-success">Date : </button></td>
				  <td colspan="2">
				  <?php
				  $date0=explode('-',$date);
				  $date1=$year1.'-'.$date0[1].'-01';
				  $count = date(' t ', strtotime($date1) );
					
				  for($i=1;$i<=$count;$i++){
				  
				  $a=$i;
				  
				  ?>
				  <button style="width:25px;padding-left:5px" type="button" class="btn btn-success"><?php echo $a; ?></button>
				  <?php } ?>
				  <button style="width:50px;padding-left:1px" type="button" class="btn btn-primary">Present</button>
				  <button style="width:50px;padding-left:2px" type="button" class="btn btn-danger">Absent</button>
				  <button style="width:50px;padding-left:5px" type="button" class="btn btn-warning">Leave</button>
                  <button style="width:50px;padding-left:1px" type="button" class="btn btn-info">Holiday</button>
				     <button style="width:50px;padding-left:1px" type="button" class="btn btn-success">Sunday</button>
                    <button style="width:50px;padding-left:1px" type="button" class="btn ">Not Fill</button>
				  </td>
				</tr>
				<?php
			    $que34="select * from student_admission_info where student_status='Active' and session_value='$session1'$condition1$condition2 order by student_name ASC";
				$run34=mysqli_query($conn37,$que34) or die(mysqli_error($conn37));

				while($row34=mysqli_fetch_assoc($run34)){
				$unique_id = $row34['student_roll_no'];

				$que="select * from student_attendance where attendance_roll_no='$unique_id' and month='$current_month' and year='$year1' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				while($row=mysqli_fetch_assoc($run)){
					$attendance_name = $row['attendance_name'];
					$date1=explode('-',$date);
					$date2=$year1.'-'.$date1[1].'-01';
					$number = date(' t ', strtotime($date2) );
					
					$day_name = date(' N ', strtotime($date2) );
				    $day_diff=8-$day_name;
				?>
                <tr>
                  <td><?php echo $attendance_name; ?></td>
				  <td colspan="2">
				  <?php
				  $total_present=0;
				  $total_absent=0;
                  $total_holiday=0;
				  $total_leave=0;
				  $total_sunday=0;
				  $total_not_mark=0;
				  for($i=1;$i<=$number;$i++){
			
				  if($i<10){
				  $x='0'.$i;
				  $a=$row['0'.$i];
				  $intime_897=$row['intime_0'.$i];
				  $outtime_897=$row['outtime_0'.$i];
				  $b=$a;
				  if($a==''){
				  $a=strtoupper('0'.$i);
				  }
				  }else{
				  $x=$i;
				  $a=$row[$i];
				  $intime_897=$row['intime_'.$i];
				  $outtime_897=$row['outtime_'.$i];
				  $b=$a;
				  if($a==''){
				  $a=strtoupper($i);
				  }
				  }
				
			  if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
				  $a="S";
				    $total_sunday++;
				  }
                $date3=$x.'-'.$current_month.'-'.$year1;
                $que6="select * from holiday_manage where holiday_date='$date3'";
				$result=mysqli_query($conn37,$que6) or die(mysqli_error($conn37));
				while($row5=mysqli_fetch_assoc($result)){
                $a="H";
                $h= $row5['holiday_name'];
                }
                    if($a=='P'){
				  $total_present=$total_present+1;
				  }elseif($a=='P/2'){
				   $total_present=$total_present+0.5;
				  }elseif($a=='A'){
				  $total_absent++;
				  }elseif($a=='L'){
				  $total_leave++;
				  }elseif($a=='H'){
				  $total_holiday++;
				  }else{
					  $total_not_mark++;
				  }
				  ?> 
                  <button type="button" class="<?php if($a=='P'){ echo 'btn btn-primary'; }elseif($a=='A'){ echo 'btn btn-danger'; }elseif($a=='H'){ echo 'btn btn-info'; }elseif($a=='P/2'){ echo 'btn'; }elseif($a=='L'){ echo 'btn btn-warning'; }elseif($a=='S'){ echo 'btn btn-success'; }elseif($b==''){ echo 'btn'; } ?>" title="<?php if($a=='P'){ echo 'Present-Intime:'.$intime_897.'-Outtime:'.$outtime_897; }elseif($a=='P/2'){ echo 'Half-Intime:'.$intime_897.'-Outtime:'.$outtime_897; }elseif($a=='A'){ echo 'Absent'; }elseif($a=='L'){ echo 'Leave'; }elseif($a=='H'){ echo $h; }elseif($a=='S'){ echo 'Sunday'; }elseif($b==''){ echo 'Not Fill'; } ?>" style="width:25px;padding-left:5px;color:white;<?php if($a=='P/2'){ echo 'background-image: url(../../images/halfday.jpg);'; } ?>"><?php echo $a; ?></button>

                  <?php } ?>
				  <button style="width:50px;" type="button" class="btn btn-primary"><?php echo $total_present; ?></button>
				  <button style="width:50px;" type="button" class="btn btn-danger"><?php echo $total_absent; ?></button>
				  <button style="width:50px;" type="button" class="btn btn-warning"><?php echo $total_leave; ?></button>
                  <button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_holiday; ?></button>
				<button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_sunday; ?></button>
                  <button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_not_mark-$total_sunday; ?></button>
				  
				  </td>
                </tr>
				<?php } }?>

                </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
