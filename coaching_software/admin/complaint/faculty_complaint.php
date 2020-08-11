<?php include("../attachment/session.php"); ?>

<script>
    $("#my_form").submit(function(e){
        e.preventDefault();
    var formdata = new FormData(this);
	window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"complaint/faculty_complaint_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   get_content('complaint/staff_complaint');
            }
			}
         });
      });
</script>
<script>
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete_complaint(s_no);       
 }            
else  {      
return false;
 }       
  } 
  
function delete_complaint(s_no){
$.ajax({
type: "POST",
url: access_link+"complaint/staff_complaint_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
	   if(res[1]=='success'){
		   alert('Successfully Deleted');
		   get_content('complaint/faculty_complaint');
	   }else{
	   alert(detail); 
	   }
}
});
}
</script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $language['Complaint And Feedback Management']; ?>
		<small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:get_content('index_content')"><i class="fa fa-home"></i>  <?php echo $language['Home']; ?></a></li>
        <li><a href="javascript:get_content('complaint/complaint')"><i class="fa fa-times-circle"></i>  <?php echo $language['Complaints']; ?></a></li>
        <li><i class="fa fa-list"></i>Complaint Employee</li>
      </ol>
    </section>
	
	<!-- Model Box -->
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    <span aria-hidden="true">&times;</span></button>
	    <h4 class="modal-title">Teacher Reply</h4>
		</div>
		<form id="my_form" method="post" enctype="multipart/form-data" >
	    <div class="modal-body">
			 <div class="">
				<label>Reply to Parents</label>
			    <input type="text" name="staff_complaint_reply" placeholder="Reply to Parents"  value="" class="form-control">
				<input type="hidden" id="reply_roll_no" name="reply_roll_no"   value="" class="form-control">
			 </div>
	   					  
		  </div>
		  <div class="modal-footer">
		  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		  <input type="submit" name="submit" value="Send" class="btn btn-primary" >
		  </div>
		</form>
		</div>
		  <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		  </div>

    <!-- Main content -->
      <section class="content">
      <div class="row">
      <div class="col-xs-12">
         
          <!-- /.box -->

            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee Complaint List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead class="my_background_color">
                <tr>
                  <th><?php echo $language['S No']; ?></th>
                  <th> Complaint </th>
				  <th><?php echo $language['Roll No']; ?></th>
				  <th>Complaint Date</th>
				  <th>Faculty Name</th>
		    	  <th>Student Name</th>
			      <th>Student class</th>
				  <th>Update By</th>
                  <th>Date</th>
				  <th><?php echo $language['Delete']; ?></th>
				  <th style="display:none;"><?php echo $language['Status']; ?></th>
				  <th style="display:none;"><?php echo $language['Reply']; ?></th>
                </tr>
              </thead>
<?php
$que="select * from faculty_complaint ORDER BY complaint_date DESC";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
while($row=mysqli_fetch_assoc($run)){
	$s_no=$row['s_no'];
	$student_complaint_date_1=$row['complaint_date'];
	$student_complaint_date_2=explode("/",$student_complaint_date_1);
	$student_complaint_date=$student_complaint_date_2[2]."/".$student_complaint_date_2[1]."/".$student_complaint_date_2[0];
	$complaint = $row['complaint'];
	$reply = $row['reply'];
	$student_roll_no = $row['student_roll_no'];
	$faculty_name = $row['faculty_name'];
	$student_name = $row['student_name'];
	$student_courses= $row['student_courses'];
    $update_change=$row['update_change'];
    if($row['last_updated_date']!='0000-00-00'){
    $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
    }else{
    $last_updated_date=$row['last_updated_date'];
    }
	$serial_no++;
?>

<tr  align='center'>
	<th><?php echo $serial_no; ?></th>
	<th><?php echo $complaint; ?></th>
	<th><?php echo $student_roll_no; ?></th>
	<th><?php echo $student_complaint_date; ?></th>
	<th><?php echo $faculty_name ; ?></th>
	<th><?php echo $student_name ; ?></th>
	<th><?php echo $student_courses ; ?></th>
    <td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>
	<th><button type="button" onclick="return valid('<?php echo $s_no; ?>');" class="btn btn-default"><?php echo $language['Delete']; ?></th>
	<th style="display:none;"><a href="javascript:post_content('complaint/seen_unseen_staff','id=<?php echo $s_no; ?>')"><button type="button" class="btn btn-default "  ><?php echo $staff_complaint_seen_or_unseen; ?></th>
	<th style="display:none;"><button type="button" class="btn btn-default " value="<?php echo $student_roll_no; ?>" onclick="open_model(this.value)" data-toggle="modal"  data-target="#modal-default" id="student_roll_no" >Reply</th>
	</tr>
	<?php } ?>			  
			  
			  
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
<script>
	function open_model(roll_no){
	document.getElementById("reply_roll_no").value=roll_no;
	}
</script>
