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
        Downloads Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	    <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('downloads/downloads')"><i class="fa fa-phone-square"></i>Download panel</a></li>
	    <li><a href="javascript:get_content('downloads/select_student')"><i class="fa fa-stack-overflow"></i>Select Student</a></li>
	    <li class="active">Download PDF EXCEL</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="box box-primary my_border_top">
		<div class="box-header with-border ">
		<div class="col-md-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn default" onclick="exportTableToExcel('printTable', 'Student Data')"><i class="fa fa-print" aria-hidden="true"></i>Print In Excel</button></center>
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
			$courses = $_POST['courses'];
			if($courses=='All'){
			$courses_name="All";
			}else{
			$sql2=mysqli_query($conn37,"select coaching_info_courses_name from coaching_courses where coaching_info_courses_code='$courses'");
			$res2=mysqli_fetch_assoc($sql2);
			$courses_name=$res2['coaching_info_courses_name'];	
			}

			?>
			  
			  <table cellspacing="0" cellpadding="5px;" class="" style="width:100%">
			  <tr>
			  <td colspan="3"><span style="font-size:20px;font-weight:bold"><center><b><?php echo $coaching_info_coaching_name; ?></b></center></span></td>
			  </tr>
  			  <tr>
			  <td colspan="3"><span style="font-size:20px;font-weight:bold"><center><b>Courses Name : <?php echo $courses_name; ?></b></center></span></td>
			  </tr>
			  <tr>
			  </tr>
			  </table>
				  <?php
				
				  $student_data=$_POST['student_data'];
				  $head_count=count($student_data);
				  ?>
				  <table id="example1" class="table table-bordered table-striped" border="1px" cellpadding="10px" cellspacing="0" width="100%">
						<thead class="my_background_color">
								<tr>
								  <th>S.No.</th>
								  <?php
								  $info_column_name='';
								  $info_column_arr='';
								  for($i=0;$i<$head_count;$i++){
								  $student_data1=explode("|?|",$student_data[$i]);
								  $info_heading=$student_data1[1];
								  $info_column_arr[$i]=$student_data1[0];
								  if($student_data1[0]!='bus_ragistration_no'){
								  $info_column_name=$info_column_name.",$student_data1[0]";
								  }
								  ?>
								  <th><?php echo $info_heading; ?></th>
								  <?php } ?>
								</tr>
						</thead>
					<tbody >
					<?php
					$category = $_POST['category']; 
					$gender = $_POST['gender'];
					$courses = $_POST['courses'];
					$Student_Status = $_POST['Student_Status'];

					if($category!='All'){
					$condition1 =" and student_category='$category'";
					}else{
					$condition1="";
					}
					if($gender!='All'){
					$condition2 =" and student_gender='$gender'";
					}else{
					$condition2="";
					}
					if($courses!='All'){
					$condition3 =" and course_code='$courses'";
					}else{
					$condition3="";
					}

					if($Student_Status!='All')
					{
						$condition4=" and student_status='$Student_Status'";
					}
					else{
						$condition4="";
					}
	
				$query="select * from student_admission_info where s_no!='' and session_value='$session1'$condition1$condition2$condition3$condition4";
					$result=mysqli_query($conn37,$query)or die(mysqli_error($conn37));
					$serial_no=0;
					while($row=mysqli_fetch_assoc($result)){
					$student_roll_no=$row['student_roll_no'];
					$serial_no++;
					?>
					<tr>
					<td><?php echo $serial_no; ?></td>
					<?php for($j=0;$j<$head_count;$j++){ ?>
					<?php if($info_column_arr[$j]=='student_photo'){

				$que1="select * from student_documents where student_roll_no='$student_roll_no'";
			    $run1=mysqli_query($conn37,$que1);
			    while($row1=mysqli_fetch_assoc($run1)){
				$student_image=$row1['student_image'];
				}
					?>
					<td><img src="<?php if($student_image!=''){ echo 'data:image;base64,'.$student_image; }else{ echo $coaching_software_path."images/student_blank.png"; }  ?>" height="50px;" width="50px;"></td>
				<?php }else{ ?>
				
				<?php if($info_column_arr[$j]=='student_date_of_birth'){ ?>
				<?php if($row[$info_column_arr[$j]]!=''){ ?>
				<td><?php echo date('d-m-Y',strtotime($row[$info_column_arr[$j]])); ?></td>
				<?php }else{ ?>
				<td><?php echo $row[$info_column_arr[$j]]; ?></td>
				<?php } }elseif($info_column_arr[$j]=='student_date_of_admission'){ ?>
				<?php if($row[$info_column_arr[$j]]!=''){ ?>
				<td><?php echo date('d-m-Y',strtotime($row[$info_column_arr[$j]])); ?></td>
				<?php }else{ ?>
				<td><?php echo $row[$info_column_arr[$j]]; ?></td>
				<?php } }elseif($info_column_arr[$j]=='bus_ragistration_no'){ ?>
				<td><?php echo $bus_ragistration_no; ?></td>
				<?php }else{ ?>
				
					<td><?php echo $row[$info_column_arr[$j]]; ?></td>
					<?php } } } ?>
					</tr>
					<?php
					}
					?>
					</tbody>
				 </table>
			  
        <!-- /.col -->
      </div>
      </div>
			  <div class="col-sm-12">&nbsp;</div>
			  <div class="col-sm-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="exportTableToExcel('printTable', 'Student Data')"><i class="fa fa-print" aria-hidden="true"></i>  Print In Excel</button></center>
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
