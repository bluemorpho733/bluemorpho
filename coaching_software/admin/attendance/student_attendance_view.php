<?php include("../attachment/session.php"); ?>

       <section class="content-header">
      <h1>
        Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
			 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('attendance/attendance')"><i class="fa fa-child"></i> Attendance</a></li>
	  <li><a href="javascript:get_content('attendance/student_attendance_select')"><i class="fa fa-child"></i> Student Attendance Select</a></li>
	 <li class="active">Student Attendance View</li>
      </ol>
    </section>
	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <?php
		  $unique_id=$_GET['id'];
		  // $class=$_GET['class'];
		  // $section=$_GET['section'];
		  $class=$_GET['student_courses'];
		  $section=$_GET['student_subject'];		  
		  $current_month=$_GET['current_month'];
		  $year=$_GET['year'];
		  $student_name=$_GET['name'];

          $student_name= str_replace("%20"," ",$student_name);
		  ?>
		  <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
			  <input type="hidden" name="current_year" id="current_year" value="<?php echo $year; ?>" />
			  <input type="hidden" name="student_section" id="student_section" value="<?php echo $section; ?>" />
			  <input type="hidden" name="student_name" id="student_name" value="<?php echo $student_name; ?>" />
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
				
                <tr>
                  <th>Month <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
				  <th>Student Name : <?php echo $student_name; ?></th>
                  <th>Monthly Attendance</th>
                  <th>Class : <?php echo $class; ?> / Section : '<?php echo $section; ?>'<input typt="text" name="student_class" id="student_class" value="<?php echo $class; ?>" style="display:none;" /></th>
                </tr>
                </thead>
                <tbody id="stud_list">
                <tr>
				  <td><button type="button" class="btn btn-success">Date <i class="fa fa-arrow-right" aria-hidden="true"></i></button></td>
				  <td colspan="3">
				  <?php
				  $date1=$year.'-'.$current_month.'-01';
				  $count = date(' t ', strtotime($date1) );
				  for($i=1;$i<=31;$i++){
				  $a=$i;
				  ?>
			  <button style="width:25px;padding-left:5px" type="button" class="btn btn-success"><?php echo $a; ?></button>
				  <?php } ?>
				  <button style="width:50px;padding-left:1px" type="button" class="btn btn-primary">Present</button>
				  <button style="width:50px;padding-left:2px" type="button" class="btn btn-danger">Absent</button>
				  <button style="width:50px;padding-left:5px" type="button" class="btn btn-warning">Leave</button>
                  <button style="width:50px;padding-left:1px" type="button" class="btn btn-info">Holiday</button>
                   <button style="width:50px;padding-left:1px" type="button" class="btn btn-success">Sunday</button>
                    <button style="width:50px;padding-left:1px" type="button" class="btn ">N Fill</button>
				  </td>
				</tr>
				<?php
		        $month23 = date('m');
			    $year23 = date('Y');
				$total_all_present=0;
				$total_all_absent=0;
				$total_all_leave=0;
				$total_all_holiday=0;
				$total_all_not_mark=0;
				$que="select * from student_attendance where attendance_roll_no='$unique_id' and session_value='$session1' order by attendance_name ASC";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				while($row=mysqli_fetch_assoc($run)){
				$unique_id = $row['attendance_roll_no'];
				$attendance_name = $row['attendance_name'];
				$month1 = $row['month'];
				$year342 = $row['year'];
				$month_name = date('F', mktime(0, 0, 0, $month1, 10));
				$date2=$year.'-'.$month_name.'-01';
				$number = date(' t ', strtotime($date2) );
				$day_name = date(' N ', strtotime($date2) );
				$day_diff=8-$day_name;
				?>
                <tr>
                  <td><b><?php echo $month_name; ?></b><input type="text" name="student_unique_id" id="student_unique_id" value="<?php echo $unique_id; ?>" style="display:none;" /></td>
				  <td colspan="3">
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
                $date3=$x.'-'.$month1 .'-'.$year;
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
                  <button type="button" class="<?php if($a=='P'){ echo 'btn btn-primary'; }elseif($a=='A'){ echo 'btn btn-danger'; }elseif($a=='H'){ echo 'btn btn-info'; }elseif($a=='P/2'){ echo 'btn'; }elseif($a=='L'){ echo 'btn btn-warning'; }elseif($a=='S'){ echo 'btn btn-success'; }elseif($b==''){ echo 'btn'; } ?>" title="<?php if($a=='P'){ echo 'Present-Intime:'.$intime_897.'-Outtime:'.$outtime_897; }elseif($a=='P/2'){ echo 'Half-Intime:'.$intime_897.'-Outtime:'.$outtime_897; }elseif($a=='A'){ echo 'Absent'; }elseif($a=='L'){ echo 'Leave'; }elseif($a=='H'){ echo $h; }elseif($a=='S'){ echo 'Sunday'; }elseif($b==''){ echo 'Not Fill'; } ?>" style="width:25px;padding-left:5px;<?php if($a=='P/2'){ echo 'background-image: url(../../images/halfday.jpg);'; } ?>"><?php echo $a; ?></button>
				  <?php }
$date_diff1=31-$number;
 for($j=1;$j<=$date_diff1;$j++){
 ?>
<button style="width:25px;padding-left:5px" type="button" ></button>
<?php } ?>
				  <button style="width:50px;" type="button" class="btn btn-primary"><?php echo $total_present; ?></button>
				  <button style="width:50px;" type="button" class="btn btn-danger"><?php echo $total_absent; ?></button>
				  <button style="width:50px;" type="button" class="btn btn-warning"><?php echo $total_leave; ?></button>
                  <button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_holiday; ?></button>
                  <button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_sunday; ?></button>
                  <button style="width:50px;" type="button" class="btn btn-info"><?php echo $total_not_mark-$total_sunday; ?></button>
				  </td>
                </tr>
				<?php }  ?>

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



