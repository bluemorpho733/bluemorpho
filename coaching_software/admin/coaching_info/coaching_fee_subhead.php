<?php include("../attachment/session.php");
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$branch_code = $row['branch_code'];
}

?>

    <section class="content-header">

      <h1>
        Institute Fee Subhead
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Fee Subhead</li>
      </ol>
    </section>
	
<script>
function save_common(s_no){
var name_common =document.getElementById('name_common_'+s_no).value;
var code_common =document.getElementById('code_common_'+s_no).value;

$.ajax({
type: "POST",
url: access_link+"coaching_info/coaching_fee_subhead_common_api.php",
data:{
s_no:s_no,
name_common:name_common,
code_common:code_common
},
success:function(response){
var str=response.split('|?|');
if(str[1]=='success'){
alert('Success');
}else{
$('name_common_'+s_no).val('');
alert(response);
}
}
});

}
</script>

<script>
function save_separate(s_no1){
var name_separate =document.getElementById('name_separate_'+s_no1).value;
var code_separate =document.getElementById('code_separate_'+s_no1).value;

$.ajax({
type: "POST",
url: access_link+"coaching_info/coaching_fee_subhead_separate_api.php",
data:{
s_no1:s_no1,
name_separate:name_separate,
code_separate:code_separate
},
success:function(response){
var str=response.split('|?|');
if(str[1]=='success'){
alert('Success');
}else{
$('name_separate_'+s_no1).val('');
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
			
			<div class="col-md-1"></div>
			<div class="col-md-4 box-body table-responsive" id="my_table">
			<center><h3 class="box-title">Fee Subhead Separate</h3></center>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Subhead Name</th>
                  <th>Code</th>
                  <th>Save</th>
                </tr>
                </thead>
                
				<tbody>
				
                <?php
				$que="select * from fee_subhead_separate";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no1 = $row['s_no'];
				$subhead_name_separate = $row['subhead_name_separate'];
				$subhead_code_separate = $row['subhead_code_separate'];
				?>
				<tr  align='center' >
					<th ><?php echo $s_no1; ?></th>
					<th ><input type="text" id="<?php echo 'name_separate_'.$s_no1; ?>" value="<?php echo $subhead_name_separate ?>" class="form-control" maxlength="50"></th>
					<th ><input type="text" id="<?php echo 'code_separate_'.$s_no1; ?>" value="<?php echo $subhead_code_separate ?>" class="form-control" readonly style="border:none;"></th>
					<th><button type="button"   onclick="save_separate('<?php echo $s_no1; ?>');" class="btn btn-default my_background_color" >Save</button></th>
				</tr>
				<?php }  ?>
				</tbody>
				</table>
				</div>
		 <div class="col-md-2"></div>
         		
				
			<div class="col-md-4 box-body table-responsive" id="my_table">
			<center><h3 class="box-title">Fee Subhead Common</h3></center>
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Subhead Name</th>
                  <th>Code</th>
				  <th>Save</th>
                </tr>
                </thead>
                <tbody>
				
                <?php
				$que="select * from fee_subhead_common";
				$run=mysqli_query($conn37,$que);
				while($row=mysqli_fetch_assoc($run)){
				$s_no = $row['s_no'];
				$subhead_name_common = $row['subhead_name_common'];
				$subhead_code_common = $row['subhead_code_common'];
				?>
				<tr  align='center' >
					<th ><?php echo $s_no; ?></th>
					<th ><input type="text" id="<?php echo 'name_common_'.$s_no; ?>" value="<?php echo $subhead_name_common ?>" class="form-control" maxlength="50"></th>
					<th ><input type="text" id="<?php echo 'code_common_'.$s_no; ?>" value="<?php echo $subhead_code_common ?>" class="form-control" readonly style="border:none;"></th>
					<th><button type="button"  onclick="save_common('<?php echo $s_no; ?>');" class="btn btn-default my_background_color" >Save</button></th>
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