<?php include("../attachment/session.php")?>
  
  
  <script>
function valid(s_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete_enquiry(s_no);       
 }            
else  {      
return false;
 }       
  }           

function edit_enquiry(s_no){
$.ajax({
type: "POST",
url:access_link+"enquiry/enquiry_edit.php?id="+s_no+"",
cache: false,
success: function(detail){
$("#get_content").html(detail);
}
});
}
function delete_enquiry(s_no){
$.ajax({
type: "POST",
url: access_link+"enquiry/enquiry_delete.php?id="+s_no+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				  // alert('Successfully Deleted');
				   get_content('enquiry/enquiry_list');
			   }else{
               alert(detail); 
			   }
}
});
}

   
 </script>
  
    <section class="content-header">
      <h1>
       <?php echo $language['Enquiry Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
       	 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i>  <?php echo $language['Home']; ?></a></li>
        <li><a href="javascript:get_content('enquiry/enquiry')"><i class="fa fa-phone-square"></i>  <?php echo $language['Enquiry']; ?></a></li>
        <li class="active"><i class="fa fa-list"></i>  <?php echo $language['Enquiry List']; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $language['Enquiry List']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
	    <th><?php echo $language['S No']; ?></th>
		<th><?php echo $language['Enquiry Type']; ?></th>
        <th><?php echo $language['Name']; ?></th>
        <th><?php echo $language['Father Name']; ?></th>
        <th><?php echo $language['Date']; ?></th>
        <th><?php echo $language['Contact No1']; ?></th>
	    <th><?php echo $language['Contact No2']; ?></th>
	    <th><?php echo $language['Address']; ?></th>
		<th><?php echo $language['Next Follow Up Date']; ?></th>
		<th><?php echo $language['Enquiry Remark 1']; ?></th>
		
		
		<th>Update By</th>
        <th>Date</th>
		
		<th><?php echo $language['Edit']; ?></th>
		<th><?php echo $language['Delete']; ?></th>
        </tr>
        </thead>
		
		<?php
$que="select * from enquiry_info  ORDER BY s_no DESC";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
$serial_no=0;

while($row=mysqli_fetch_assoc($run)){

	$s_no=$row['s_no'];
	$enquiry_type = $row['enquiry_type'];
	$enquiry_name = $row['enquiry_name'];
	$enquiry_father_name = $row['enquiry_father_name'];
	$enquiry_date = $row['enquiry_date'];
	$enquiry_contact_no_1 = $row['enquiry_contact_no_1'];
	$enquiry_contact_no_2 = $row['enquiry_contact_no_2'];
	$enquiry_address = $row['enquiry_address'];
	$enquiry_next_follow_up_date = $row['enquiry_next_follow_up_date'];
	$enquiry_remark_1 = $row['enquiry_remark_1'];
	$enquiry_remark_2 = $row['enquiry_remark_2'];
    
    $update_change=$row['update_change'];
	if($row['last_updated_date']!='0000-00-00'){
	$last_updated_date=date('d-m-Y',strtotime($row['last_updated_date']));
	}else{
	$last_updated_date=$row['last_updated_date'];
	}
		
	$serial_no++;
	
	
?>

<tr>

	<td><?php echo $serial_no; ?></td>
	<td><?php echo $enquiry_type; ?></td>
	<td><?php echo $enquiry_name; ?></td>
	<td><?php echo $enquiry_father_name; ?></td>
	<td><?php echo $enquiry_date; ?></td>
	<td><?php echo $enquiry_contact_no_1; ?></td>
	<td><?php echo $enquiry_contact_no_2; ?></td>
	<td><?php echo $enquiry_address; ?></td>
	<td><?php echo $enquiry_next_follow_up_date; ?></td>
	<td><?php echo $enquiry_remark_1; ?></td>
	
	<td><?php echo $update_change; ?></td>
    <td><?php echo $last_updated_date; ?></td>
	
	<td><button type="button" onclick="post_content('enquiry/enquiry_edit','<?php echo 'id='.$s_no; ?>')" class="btn btn-default" ><?php echo $language['Edit']; ?></td>
	<td><button type="button" onclick="return valid('<?php echo $s_no; ?>');" class="btn btn-default" ><?php echo $language['Delete']; ?></td>
	
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
})
</script>