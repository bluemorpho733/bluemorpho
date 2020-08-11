<?php include("../attachment/session.php");
?>
<script>
        (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script>
function for_print()
 {
 var divToPrint=document.getElementById("printTable");
 newWin= window.open("");
 newWin.document.write(divToPrint.outerHTML);
 newWin.print();
 newWin.close();
//$('#printTable').print();
 }
</script>

  <section class="content-header">
      <h1>
        Downloads Employee Salary
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
   <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="javascript:get_content('downloads/downloads')"><i class="fa fa-phone-square"></i>Download panel</a></li>
	    <li><a href="javascript:get_content('downloads/Attendance_download_list')"><i class="fa fa-stack-overflow"></i>Attendance List</a></li>
	    <li class="active">Download Attendance Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="box box-primary my_border_top">
		<div class="box-header with-border ">
		<div class="col-md-12">
		  <div class="col-sm-6">
		  <center><button type="button" class="btn default" onclick="exportTableToExcel('printTable', 'Attendance Report')"><i class="fa fa-print" aria-hidden="true"></i>Print In Excel</button></center>
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
			$schl_query="select coaching_info_coaching_name from coaching_info_general";
			$schl_result=mysqli_query($conn37,$schl_query)or die(mysqli_error($conn37));
			while($schl_row=mysqli_fetch_assoc($schl_result)){
			$coaching_info_coaching_name=$schl_row['coaching_info_coaching_name'];
			}
			
			$month_name=$_POST['month_name'];
			$year_name=$_POST['year_name'];
			?>
			  
			  <table cellspacing="0" cellpadding="5px;" class="" style="width:100%">
			  <tr>
			  <td colspan="3"><span style="font-size:20px;font-weight:bold"><center><b><?php echo $coaching_info_coaching_name; ?></b></center></span></td>
			  </tr>
			  <tr>
			  <td><center><b>ATTENDANCE REPORT</b></center></td>
			  </tr>
			  <tr>
			  <td style="float:left"><b>Month: <?php echo $month_name; ?></b></td>
			  <td>&nbsp;</td>
			  <td style="float:right"><b>Year: <?php echo $year_name; ?></b></td>
			  </tr>
			  </table>
				  <table id="example1" class="table table-bordered table-striped" style="width:100%" border="1px" cellspacing="0px"; cellpadding="10px">
						<thead class="my_background_color">
							<tr>
							  <th>S.No.</th>
							  <th>Student Name</th>
							  <th>Course</th>
							  <th>RFID Number</th>
							  <th>Year</th>
							  <th>Month</th>
							  <?php 
							  $date2=$year_name.'-'.$month_name.'-01';
				        $number = date(' t ', strtotime($date2) );
						  $day_name = date(' N ', strtotime($date2) );
                                  $day_diff=8-$day_name;
						 for($i=1;$i<=$number;$i++){
							  if($i<10){
								  $x='0'.$i;
							  }else{
								  $x=$i;
							  }
							  ?>
					<th><?php echo $x; ?></th>
						 <?php } ?>
						 <th>Total Present</th>
						 <th>Total Absent</th>
						 <th>Total Leave</th>
						 <th>Total Sunday</th>
						 <th>Total Holiday</th>
						 <th>Total Not Mark</th>
					
							</tr>
						</thead>
					<tbody >
					<?php
					$std_coures=$_POST['std_coures'];
					if($std_coures!='All')
					{
						$Condition1=" and attendance_courses='$std_coures'";
					}
					else{
						$Condition1='';
					}

					if($month_name!='All')
					{
						$Condition2=" and month='$month_name'";
					}
					else{
						$Condition2='';
					}
					
					$query1="select student_roll_no from student_admission_info where student_status='Active' and session_value='$session1'";
					$result1=mysqli_query($conn37,$query1)or die(mysqli_error($conn37));
					$serial_no=0;
					while($row1=mysqli_fetch_assoc($result1)){
					$student_roll_no=$row1['student_roll_no'];
					
					$query="select * from student_attendance where attendance_roll_no='$student_roll_no' and session_value='$session1' and year='$year_name'$Condition1$Condition2";
					$result=mysqli_query($conn37,$query)or die(mysqli_error($conn37));
					$num=mysqli_num_rows($result);
					//if($num>0){
					while($row=mysqli_fetch_assoc($result)){
					$serial_no++;
					?>
					<tr>
					<td><?php echo $serial_no; ?></td>
					<td><?php echo $row['attendance_name']; ?></td>
					<td><?php echo $row['attendance_courses']; ?></td>
					<td><?php echo $row['attendance_rf_id_no']; ?></td>
					<td><?php echo $row['year']; ?></td>
					<td><?php echo $row['month']; ?></td>
					
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
								  }else{
									  $x=$i;
								  }
								  
								  $a=$row[$x];
								  
				if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
$a='S';
				  $total_sunday++;
				  }
				$date3=$x.'-'.$row['month'].'-'.$year_name;
                $que6="select * from holiday_manage where holiday_date='$date3'";
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
				<td><?php echo $a; ?></td>
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
					<td colspan="44"><h4><b>No Data Found</b> <h4></td>
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
			  <center><button type="button" class="btn my_background_color" onclick="exportTableToExcel('printTable', 'Attendance Report')"><i class="fa fa-print" aria-hidden="true"></i>  Print In Excel</button></center>
			  </div>
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="for_print();"><i class="fa fa-print" aria-hidden="true"></i>  Print In Pdf</button></center>
			  </div>
			  </div>
      <!-- /.row -->
    </section>

  
<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
