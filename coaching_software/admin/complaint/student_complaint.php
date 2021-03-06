<?php include("../attachment/session.php"); ?>
<script>
    $("#my_form").submit(function(e){
        e.preventDefault();
    var formdata = new FormData(this);
	window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"complaint/student_complaint_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   get_content('complaint/student_complaint');
            }
			}
         });
      });
      
    function for_seen(s_no){
        $.ajax({
        type: "POST",
        url: access_link+"complaint/seen_unseen.php?id="+s_no+"",
        cache: false,
        success: function(detail){
        var res=detail.split("|?|");
           if(res[1]=='success'){
        	   alert('Successfully Completed');
        	   get_content('complaint/student_complaint');
           }else{
           alert(detail); 
           }
        }
        });
    }
</script>
    <section class="content-header">
      <h1>
          <?php echo $language['Complaint And Feedback Management']; ?>
		<small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
        <li><a href="javascript:get_content('complaint/complaint')"><i class="fa fa-times-circle"></i> <?php echo $language['Complaints']; ?></a></li>
        <li class="active"><i class="fa fa-list"></i> <?php echo $language['Student Complaint List']; ?></li>
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
		<form method="post" id="my_form" enctype="multipart/form-data">
	    <div class="modal-body">
			 <div class="">
				<label>Reply to Parents</label>
			    <input type="text" name="student_complaint_teacher_reply" placeholder="Reply to Parents"  value="" class="form-control">
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

	
      <section class="content">
      <div class="row">
      <div class="col-xs-12">
         
          <!-- /.box -->

            <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $language['Student Complaint List']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead class="my_background_color">
                <tr>
                  <th><?php echo $language['S No']; ?></th>
                  <th><?php echo $language['Student Name']; ?></th>
                  <th><?php echo $language['Class']; ?></th>
                  <th><?php echo $language['Roll No']; ?></th>
				  <th><?php echo $language['Date']; ?></th>
				  <th><?php echo $language['Complaints']; ?></th>
				  <th><?php echo $language['Photo']; ?></th>
				  <th style="display:none;"><?php echo $language['Video']; ?></th>
				  <th><?php echo $language['Complainter Name']; ?></th>
				  <th><?php echo $language['Contact No']; ?></th>
				  <th><?php echo $language['Remark']; ?></th>
				  <th><?php echo $language['Teacher Rpy']; ?></th>
				  
				  <th>Update By</th>
                  <th>Date</th>
				  
				  <th><?php echo $language['Status']; ?></th>
				  <th><?php echo $language['Reply']; ?></th>
                </tr>
              </thead>
<?php
$que="select * from complaint_student";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;
while($row=mysqli_fetch_assoc($run)){
	$s_no=$row['s_no'];
	$student_name = $row['student_name'];
	$student_complaint_courses = $row['student_complaint_courses'];
	$student_complaint_roll_no = $row['student_complaint_roll_no'];
	$student_complaint_date = $row['student_complaint_date'];
	$student_complaint = $row['student_complaint'];
	$student_complaint_photo = $row['student_complaint_photo'];
	$student_complaint_vidio = $row['student_complaint_vidio'];
	$student_complaint_complainter_name = $row['student_complaint_complainter_name'];
	$student_complaint_contact_no = $row['student_complaint_contact_no'];
	$student_complaint_remark = $row['student_complaint_remark'];
	$student_complaint_seen_or_unseen = $row['student_complaint_seen_or_unseen'];
	$student_complaint_teacher_reply = $row['student_complaint_teacher_reply'];
    $update_change=$row['update_change'];
    if($row['last_updated_date']!='0000-00-00'){
    $last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
    }else{
    $last_updated_date=$row['last_updated_date'];
    }
	$serial_no++;
	$path="../../documents/complaint/";
?>

<tr  align='center'>

	<th><?php echo $serial_no; ?></th>
	<th><?php echo $student_name; ?></th>
	<th><?php echo $student_complaint_courses; ?></th>
	<th><?php echo $student_complaint_roll_no; ?></th>
	<th><?php echo $student_complaint_date; ?></th>
	<th><?php echo $student_complaint; ?></th>
	<?php if($student_complaint_photo==null){  ?>
	<th><img src="<?php echo '../../documents/Complaint/blank_document.jpg'; ?>" height="50" width="50"></th>
	<?php }else{ ?>
	<th><a href="<?php echo $path."/".$student_complaint_photo; ?>" target="_blank"><img src="<?php echo $path."/".$student_complaint_photo; ?>" height="50" width="50"></a></th> 
	<?php	 } ?>
	<th  style="display:none;"><a href="<?php echo $path."/".$student_complaint_vidio; ?>" target="_blank">Click</a></th>
	<th><?php echo $student_complaint_complainter_name; ?></th>
	<th><?php echo $student_complaint_contact_no; ?></th>
	<th><?php echo $student_complaint_remark; ?></th>
	<th><?php echo $student_complaint_teacher_reply; ?></th>
    <th><?php echo $update_change; ?></th>
    <th><?php echo $last_updated_date; ?></th>
	<th><button type="button" onclick="for_seen('<?php echo $s_no; ?>')" class="btn btn-default"><?php echo $student_complaint_seen_or_unseen; ?></th>
	<th><button type="button" class="btn btn-default " value="<?php echo $s_no; ?>" onclick="open_model(this.value)" data-toggle="modal"  data-target="#modal-default" id="student_complaint_roll_no" >Reply</th>
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
  </div>
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
