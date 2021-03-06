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
	    <li><a href="javascript:get_content('downloads/employee_salary')"><i class="fa fa-stack-overflow"></i>Employee Salary</a></li>
	    <li class="active">Download Salary Report</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="box box-primary my_border_top">
		<div class="box-header with-border ">
		<div class="col-md-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn default" onclick="exportTableToExcel('printTable', 'Empolyee Salary Report')"><i class="fa fa-print" aria-hidden="true"></i>Print In Excel</button></center>
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
			?>
			  <table cellspacing="0" cellpadding="5px;" class="" style="width:100%">
			  <tr>
			  <td colspan="3"><span style="font-size:20px;font-weight:bold"><center><b><?php echo $coaching_info_coaching_name; ?></b></center></span></td>
			  </tr>
			  <tr>
			  <td><center><b>EMPLOYEE SALARY REPORT</b></center></td>
			  </tr>
			  </table>
				  <?php
				  $student_data=$_POST['student_data'];
				  $head_count=count($student_data);
				  ?>
				  <table id="example1" class="table table-bordered table-striped" border="1px" cellspacing="0px"; cellpadding="10px" style="width:100%">
						<thead class="my_background_color">
							<tr>
							  <th>S.No.</th>
							  <?php
							  $info_column_name='';
							  $info_column_arr='';
							  for($i=0;$i<$head_count;$i++){
							  $student_data1=explode('|?|',$student_data[$i]);
							  $info_heading=$student_data1[1];
							  $info_column_arr[$i]=$student_data1[0];
							  $info_column_name=$info_column_name.",$student_data1[0]";
							  ?>
							  <th><?php echo $info_heading; ?></th>
							  <?php } ?>
							</tr>
						</thead>
					<tbody >
					<?php
					$date_from = $_POST['date_from'];
					if($date_from!=''){
					$condition=" and employee_salary_generate_date>='$date_from'";
					}else{
					$condition="";
					}
					$date_to = $_POST['date_to'];
					if($date_to!=''){
					$condition1=" and employee_salary_generate_date<='$date_to'";
					}else{
					$condition1="";
					}
					
					
		           $query="select s_no$info_column_name from employee_salary_generate where employee_salary_status='Active' and session_value='$session1'$condition$condition1";
					$result=mysqli_query($conn37,$query)or die(mysqli_error($conn37));
					$num=mysqli_num_rows($result);
					$serial_no=0;
					if($num>0){
					while($row=mysqli_fetch_assoc($result)){
					$serial_no++;
					?>
					<tr>
					<td><?php echo $serial_no; ?></td>
					<?php for($j=0;$j<$head_count;$j++){ ?>
					<td><?php echo $row[$info_column_arr[$j]]; ?></td>
					<?php } ?>
					</tr>
					<?php
					}}
					else{
						?>
						<tr>
					<td colspan="<?php echo $head_count ?>"><h4>No data available in table<h4></td>
					</tr>
					<?php }
					?>
					</tbody>
				 </table>
			  
        <!-- /.col -->
      </div>
      </div>
			  <div class="col-sm-12">&nbsp;</div>
			  <div class="col-sm-12">
			  <div class="col-sm-6">
			  <center><button type="button" class="btn my_background_color" onclick="exportTableToExcel('printTable', 'Empolyee Salary Report')"><i class="fa fa-print" aria-hidden="true"></i>  Print In Excel</button></center>
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
