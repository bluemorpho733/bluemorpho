<?php include("../attachment/session.php");
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$branch_code = $row['branch_code'];
}

?>

    <section class="content-header">

      <h1>
        Institute Subject
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute subject</li>
      </ol>
    </section>
	


<script>
function save_subject(s_no){
var subject_name =document.getElementById('subject_name_'+s_no).value;
var subject_code =document.getElementById('subject_code_'+s_no).value;

$.ajax({
type: "POST",
url: access_link+"coaching_info/coaching_subject_add_api.php",
data:{
s_no:s_no,
subject_name:subject_name,
subject_code:subject_code
},
success:function(response){
var str=response.split('|?|');
if(str[1]=='success'){
$("#updated_date_"+s_no).val(str[2]);
alert('Success');
}else{
$('#subject_name_'+s_no).val('');
alert(response);
}
}
});

}
</script>


    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-6">
			
			<div class="col-md-3"></div>
			<div class="col-md-6 box-body table-responsive" id="my_table">
			<center><h3 class="box-title">Coaching Subject</h3></center>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Subject Name</th>
                  <th>Code</th>
                  <th>Updated Date</th>
                  <th>Save</th>
                </tr>
                </thead>
                
				<tbody>
				
                <?php
				$que="select * from coaching_subject";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subject_name = $row['subject_name'];
				$subject_code = $row['subject_code'];
				$updated_date = $row['updated_date'];
				?>
				<tr  align='center' >
					<th ><?php echo $s_no; ?></th>
					<th ><input type="text" id="<?php echo 'subject_name_'.$s_no; ?>" value="<?php echo $subject_name ?>" class="form-control" maxlength="50"></th>
					<th ><input type="text" id="<?php echo 'subject_code_'.$s_no; ?>" value="<?php echo $subject_code ?>" class="form-control" readonly style="border:none;"></th>
					<th ><input type="date" id="<?php echo 'updated_date_'.$s_no; ?>" value="<?php echo $updated_date; ?>" class="form-control" readonly style="border:none;"></th>
					<th><button type="button"   onclick="save_subject('<?php echo $s_no; ?>');" class="btn btn-default my_background_color" >Save</button></th>
				</tr>
				<?php }  ?>
				</tbody>
				</table>
				</div>
                </div>
		  
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>