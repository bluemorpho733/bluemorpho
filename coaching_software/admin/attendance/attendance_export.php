<?php include("../attachment/session.php"); ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="box box-primary my_border_top">
		<div class="box-header with-border ">
		<div class="col-md-12">
		
			  <div class="col-sm-6">
			  <center><button type="button" class="btn default" onclick="exportTableToExcel('printTable', 'Student Attendance Report')"><i class="fa fa-print" aria-hidden="true"></i>Print In Excel</button></center>
			  </div>
			  <div class="col-sm-6">
			  <center><button type="button" class="btn default" onclick="for_print();"><i class="fa fa-print" aria-hidden="true"></i>Print In Pdf</button></center>
			  </div>
			  
		</div>
        </div>
	
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
			<div class="col-xs-10 col-xs-offset-1">
            <div class="box-body table-responsive" id="printTable">
			
			<?php
			$schl_query="select school_info_school_name,school_info_dise_code,school_info_school_code from school_info_general";
			$schl_result=mysqli_query($conn37,$schl_query)or die(mysqli_error($conn37));
			while($schl_row=mysqli_fetch_assoc($schl_result)){
			$school_info_school_name=$schl_row['school_info_school_name'];
			$school_info_dise_code=$schl_row['school_info_dise_code'];
			$school_info_school_code=$schl_row['school_info_school_code'];
			}
			
			$month_name=$_POST['month_name'];
			if($month_name=='All'){
			    $monthwise=array("All"=>"All");
                $number = 31;
                $Condition3='';
			}else{
			    $session_exp=explode('_', $session1);
			    if($month_name=='01' || $month_name=='02' || $month_name=='03'){
			    $year11=$session_exp[0]+1;
			    }else{
			    $year11=$session_exp[0];
			    }
			    $monthwise=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
			    $date2=$year11.'-'.$month_name.'-01';
                $number = date(' t ', strtotime($date2) );
                $Condition3=" and month='$month_name'";
			}
			?>
			  
			  <table cellspacing="0" cellpadding="0" class="" style="width:100%">
			  <tr>
			  <td colspan="3"><span style="font-size:20px;font-weight:bold;"><center><b><?php echo $school_info_school_name; ?></b></center></span></td>
			  </tr>
			  <tr>
			  <td style="float:left"><b>Dise Code : <?php echo $school_info_dise_code; ?></b></td>
			  <td><center><b>STUDENT ATTENDANCE REPORT</b></center></td>
			  <td style="float:right"><b>School Code : <?php echo $school_info_school_code; ?></b></td>
			  </tr>
			  <tr>
			  <td style="float:left"><b>Month : <?php echo $monthwise[$month_name]; ?></b></td>
			  <td>&nbsp;</td>
			  <td style="float:right"><b>Session : <?php echo $session1; ?></b></td>
			  </tr>
			  </table>
				  <table id="example1" class="table table-bordered table-striped" style="width:100%" border="1px" cellspacing="0px;" cellpadding="2px;">
						<thead class="my_background_color">
								<tr>
								  <th>S.No.</th>
								  <th>Student Name</th>
								  <th>Class (Sec)</th>
								  
								  <?php
							 for($i=1;$i<=$number;$i++){
								  if($i<10){
									  $x='0'.$i;
								  }else{
									  $x=$i;
								  }
								  ?>
						<th style="width:12px"><?php echo $x; ?></th>
							 <?php } ?>
							 <th>Tot P.</th>
							 <th>Tot A.</th>
							 <th>Tot L.</th>
							 <th>Tot S.</th>
							 <th>Tot H.</th>
							 <th>Tot N M.</th>
						
								</tr>
						</thead>
					<tbody >
					<?php
					$std_class=$_POST['std_class'];
					$student_class_section=$_POST['student_class_section'];
					if($std_class!='All'){
						$Condition1=" and attendance_class='$std_class'";
						$Condition01=" and student_class='$std_class'";
					}
					else{
						$Condition1='';
						$Condition01='';
					}
					if($student_class_section!='All'){
						$Condition2=" and attendance_section='$student_class_section'";
						$Condition02=" and student_class_section='$student_class_section'";
					}
					else{
						$Condition2='';
						$Condition02='';
					}
					
					$order_by = $_POST['order_by'];
                    if($order_by!=''){
                    if($order_by=='student_name' || $order_by=='student_father_name' || $order_by=='student_class_section'){
                    $condition11 =" ORDER BY $order_by ASC";
                    }else{
                    $condition11 =" ORDER BY CAST($order_by AS UNSIGNED) ASC";
                    }
                    }else{
                    $condition11="";
                    }
                    $query1="select student_roll_no from student_admission_info where student_status='Active' and session_value='$session1'$Condition01$Condition02$filter37$condition11";
					$result1=mysqli_query($conn37,$query1)or die(mysqli_error($conn37));
					$serial_no=0;
					while($row1=mysqli_fetch_assoc($result1)){
					$student_roll_no=$row1['student_roll_no'];
					
					$query="select * from student_attendance where attendance_roll_no='$student_roll_no' and session_value='$session1'$Condition1$Condition2$Condition3$filter37";
					$result=mysqli_query($conn37,$query)or die(mysqli_error($conn37));
					$num=mysqli_num_rows($result);
					//$serial_no=0;
					//if($num>0){
					while($row=mysqli_fetch_assoc($result)){
					$serial_no++;
					?>
					<tr>
					<td><?php echo $serial_no; ?></td>
					<td><?php echo $row['attendance_name']; ?></td>
					<td><?php echo $row['attendance_class']; ?> (<?php echo $row['attendance_section']; ?>)</td>
					
				<?php 
	              $total_present=0;
				  $total_absent=0;
                 $total_holiday=0;
				  $total_leave=0;
				  $total_sunday=0;
				  $total_not_mark=0;
				  
                    $date3=$row['year'].'-'.$row['month'].'-01';
                    $number3 = date(' t ', strtotime($date3) );
                    $day_name = date(' N ', strtotime($date3) );
                    $day_diff=8-$day_name;
                    $number5=$number-$number3;
							 for($i=1;$i<=$number3;$i++){
				
								  if($i<10){
									  $x='0'.$i;
								  }else{
									  $x=$i;
								  }
								  
								  $a=$row[$x];
								  $in_time11=$row['intime_'.$x];
								  $in_time11_exp=explode(' ', $in_time11);
								  $in_time22=$in_time11_exp[1];
								  $out_time11=$row['outtime_'.$x];
								  $out_time11_exp=explode(' ', $out_time11);
								  $out_time22=$out_time11_exp[1];
								  
				if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
$a='S';
				  $total_sunday++;
				  }
				$date4=$x.'-'.$row['month'].'-'.$row['year'];
                $que6="select * from holiday_manage where holiday_date='$date4'";
				$result6=mysqli_query($conn37,$que6) or die(mysqli_error($conn37));
				while($row5=mysqli_fetch_assoc($result6)){
                                $a="H";
                             }		 
				  if($a=='P'){
				  $total_present=$total_present+1;
				  }elseif($a=='P/2'){
				  $total_present=$total_present+0.5;
				  $total_absent=$total_absent+0.5;
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
				<td>
				
				<div class="col-md-12">
				<center><?php echo substr($in_time22,0,5); ?></center>
				</div>

				<div class="col-md-12">
				<center><?php echo substr($out_time22,0,5); ?></center>
				</div>
				
				<div class="col-md-12">
				<center><?php if($a==''){ echo "--"; }else{ echo $a; } ?></center>
				</div>
				</td>
				<?php } ?>
				<?php if($number5>0){ ?>
				<td colspan="<?php echo $number5; ?>"><center><span style="color:red;">---</span></center></td>
				<?php } ?>

<td><?php echo $total_present; ?></td>
<td><?php echo $total_absent; ?></td>
<td><?php echo $total_leave; ?></td>
<td><?php echo $total_sunday; ?></td>
<td><?php echo $total_holiday; ?></td>
<td><?php echo $total_not_mark-$total_sunday; ?></td>
</tr>
<?php
					} }//else{ ?>
					<!--<tr>
					<td colspan="<?php echo $number+9; ?>"><center><h4><b>No Data Found</b></h4></center></td>
					</tr>-->
					<?php //}	?>
					</tbody>
				 </table>
			  
        <!-- /.col -->
      </div>
      </div>
			  <div class="col-sm-12">&nbsp;</div>
			  <div class="col-sm-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="exportTableToExcel('printTable', 'Student Attendance Report')"><i class="fa fa-print" aria-hidden="true"></i>  Print In Excel</button></center>
			  </div>
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="for_print();"><i class="fa fa-print" aria-hidden="true"></i>  Print In Pdf</button></center>
			  </div>
			  </div>
      <!-- /.row -->
    </section>
