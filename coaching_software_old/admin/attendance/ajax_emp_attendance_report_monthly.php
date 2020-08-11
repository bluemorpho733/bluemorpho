<?php include("../attachment/session.php"); ?>
<div class="col-sm-12">
<div class="col-sm-6">
<center><button type="button" class="btn default" onclick="exportTableToExcel('printTable', 'Employeewise Attendance Report Monthly')"><i class="fa fa-print" aria-hidden="true"></i>Print In Excel</button></center>
</div>
<div class="col-sm-6">
<center><button type="button" class="btn default" onclick="for_print();"><i class="fa fa-print" aria-hidden="true"></i>Print In Pdf</button></center>
</div>
</div>

        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
			<div class="col-xs-10 col-xs-offset-1">
            <div class="box-body table-responsive" id="printTable">
			<?php			
			$staff_type=$_GET['staff_type'];
			if($staff_type!='All'){
			    //$condition=" and class_name='$class_name'";
				//$condition1=" and student_class='$class_name'";
				$cat_count=1;
				$cat_type=array("$staff_type");;
			}else{
				//$condition="";
				//$condition1="";
				$cat_count=2;
				$cat_type=array("Teaching","Non Teaching");
			}
			
			$attendance_month=$_GET['attendance_month'];
			if($attendance_month!=''){
			    
			    if($attendance_month=="01"){
					   $attendance_month1="January";
				}elseif($attendance_month=="02"){
					   $attendance_month1="February";
				}elseif($attendance_month=="03"){
					   $attendance_month1="March";
				}elseif($attendance_month=="04"){
					   $attendance_month1="April";
				}elseif($attendance_month=="05"){
					   $attendance_month1="May";
				}elseif($attendance_month=="06"){
					   $attendance_month1="June";
				}elseif($attendance_month=="07"){
					   $attendance_month1="july";
				}elseif($attendance_month=="08"){
					   $attendance_month1="August";
				}elseif($attendance_month=="09"){
					   $attendance_month1="September";
				}elseif($attendance_month=="10"){
					   $attendance_month1="October";
				}elseif($attendance_month=="11"){
					   $attendance_month1="November";
				}elseif($attendance_month=="12"){
					   $attendance_month1="December";
				}
				$current_year=date('Y');
				$lst_date1=$current_year.'-'.$attendance_month.'-01';
				$lst_count = date(' t ', strtotime($lst_date1) );
				$month_condition=" and month='$attendance_month'";
			    $year_condition=" and year='$current_year'";
			}else{
		        
		        $attendance_month1=$attendance_month;
		        $lst_count = 0;
		        $month_condition="";
			    $year_condition="";
			}
			
			$order_by = $_GET['order_by'];
            if($order_by!=''){
            if($order_by=='emp_name'){
            $condition11 =" ORDER BY $order_by ASC";
            }else{
            $condition11 =" ORDER BY CAST($order_by AS UNSIGNED) ASC";
            }
            }else{
            $condition11="";
            }
			
			$schl_query="select school_info_school_name,school_info_dise_code,school_info_school_code from school_info_general";
			$schl_result=mysqli_query($conn37,$schl_query)or die(mysqli_error($conn37));
			while($schl_row=mysqli_fetch_assoc($schl_result)){
			$school_info_school_name=$schl_row['school_info_school_name'];
			$school_info_dise_code=$schl_row['school_info_dise_code'];
			$school_info_school_code=$schl_row['school_info_school_code'];
			}
			?>
			<table cellspacing="0" cellpadding="5px;" class="" style="width:100%">
			<tr>
			<td colspan="3"><span style="font-size:20px;font-weight:bold"><center><b><?php echo $school_info_school_name; ?></b></center></span></td>
			</tr>
			<tr>
			<td style="float:left"><b>Dise Code : <?php echo $school_info_dise_code; ?></b></td>
			<td><center><b>ATTENDANCE MONTHLY REPORT EMPLOYEEWISE</b></center></td>
			<td style="float:right"><b>School Code : <?php echo $school_info_school_code; ?></b></td>
			</tr>
			<tr>
			<td style="float:left"><b>Current Date : <?php echo date('d-m-Y'); ?></b></td>
			<td><center><b>Month : <?php echo $attendance_month1; ?></b></center></td>
			<td style="float:right"><b>Category : <?php echo $staff_type; ?></b></td>
			</tr>
			</table>
				  
				  <table id="example1" class="table table-bordered table-striped" border="1px" cellpadding="10px" cellspacing="0" width="100%">
						<thead class="my_background_color">
								<tr>
								  <th>S.No.</th>
								  <th>Employee Name</th>
								  <th>Father Name</th>
								  <th>Designation</th>
								  <th>Present</th>
								  <th>Absent</th>
								  <th>Leave</th>
								  <th>Not Mark</th>
								  <!--<th>Sunday</th>-->
								</tr>
						</thead>
					<tbody>
					<?php
					$serial_no=0;
					//$grand_total_emp=0;
					$grand_total_present=0;
					$grand_total_absent=0;
					$grand_total_leave=0;
					$grand_total_notmark=0;
					$grand_total_sunday=0;
					for($abc=0;$abc<$cat_count;$abc++){
					
					$que="select emp_id,emp_name,emp_father,emp_designation from employee_info where emp_status='Active' and emp_categories='$cat_type[$abc]'$condition11";
					$run=mysqli_query($conn37,$que);
					while($row=mysqli_fetch_assoc($run)){
					$emp_id=$row['emp_id'];
					$emp_name=$row['emp_name'];
					$emp_father=$row['emp_father'];
					$emp_designation=$row['emp_designation'];
					//$total_emp++;
					$serial_no++;
					
					$que1="select * from staff_attendance where staff_id='$emp_id' and session_value='$session1'$month_condition$year_condition";
					$run1=mysqli_query($conn37,$que1);
					//$total_emp=0;
					$total_present=0;
					$total_absent=0;
					$total_leave=0;
					$total_notmark=0;
					//$total_sunday=0;
					if(mysqli_num_rows($run1)>0){
					while($row1=mysqli_fetch_assoc($run1)){
					    
                    //$month_name = date('F', mktime(0, 0, 0, $from_date1[1], 10));
                    //$date2=$from_date1[0].'-'.$month_name.'-01';
                    //$number = date(' t ', strtotime($date2) );
                    //$day_name = date(' N ', strtotime($date2) );
                    //$day_diff=8-$day_name;
                    
                        for($i=1;$i<=$lst_count;$i++){
                        if($i<10){
                        $a=$row1['0'.$i];
                        //if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
                        //$a="S";
                        //}
                        if($a=='P'){
                            $total_present++;
                        }elseif($a=='P/2'){
                            $total_present=$total_present+0.5;
                            $total_absent=$total_absent+0.5;
                        }elseif($a=='A'){
                            $total_absent++;
                        }elseif($a=='L'){
                            $total_leave++;
                        }elseif($a==''){
                            $total_notmark++;
                        }//elseif($a=='S'){
                        //    $total_sunday++;
                        //}
                        
                        }else{
                        $a=$row1[$i];
                        //if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
                        //$a="S";
                        //}
                        if($a=='P'){
                            $total_present++;
                        }elseif($a=='P/2'){
                            $total_present=$total_present+0.5;
                            $total_absent=$total_absent+0.5;
                        }elseif($a=='A'){
                            $total_absent++;
                        }elseif($a=='L'){
                            $total_leave++;
                        }elseif($a==''){
                            $total_notmark++;
                        }//elseif($a=='S'){
                        //    $total_sunday++;
                        //}
                        
                        }
                        }
					    
					}
					}else{
					    for($i=1;$i<=$lst_count;$i++){
					        $total_notmark++;
					    }
					}
					
					//$grand_total_emp=$grand_total_emp+$total_emp;
					$grand_total_present=$grand_total_present+$total_present;
					$grand_total_absent=$grand_total_absent+$total_absent;
					$grand_total_leave=$grand_total_leave+$total_leave;
					$grand_total_notmark=$grand_total_notmark+$total_notmark;
					
					?>
					<tr>
					<td><?php echo $serial_no.'.'; ?></td>
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $emp_father; ?></td>
					<td><?php echo $emp_designation; ?></td>
					<td><?php echo $total_present; ?></td>
					<td><?php echo $total_absent; ?></td>
					<td><?php echo $total_leave; ?></td>
					<td><?php echo $total_notmark; ?></td>
					<!--<td><?php echo ''; ?></td>-->
					</tr>
					<?php } } ?>
					</tbody>
					<tfoot>
					<tr>
					<td colspan="4"><span style="float:right;font-weight:bold;">Total = </span></td>
					<td><span style="font-weight:bold;"><?php echo $grand_total_present; ?></span></td>
					<td><span style="font-weight:bold;"><?php echo $grand_total_absent; ?></span></td>
					<td><span style="font-weight:bold;"><?php echo $grand_total_leave; ?></span></td>
					<td><span style="font-weight:bold;"><?php echo $grand_total_notmark; ?></span></td>
					<!--<td><span style="font-weight:bold;"><?php echo ''; ?></span></td>-->
					</tr>
					</tfoot>
				 </table>
			  
        <!-- /.col -->
      </div>
      </div>
			  <div class="col-sm-12">&nbsp;</div>
			  <div class="col-sm-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="exportTableToExcel('printTable', 'Employeewise Attendance Report Monthly')"><i class="fa fa-print" aria-hidden="true"></i>  Print In Excel</button></center>
			  </div>
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="for_print();"><i class="fa fa-print" aria-hidden="true"></i>  Print In Pdf</button></center>
			  </div>
			  </div>
  </div>
    
  </div>