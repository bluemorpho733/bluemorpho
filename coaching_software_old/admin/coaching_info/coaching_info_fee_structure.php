<?php include("../attachment/session.php");
 

?>

    <section class="content-header">
      <h1>
        Institute Fee Structure
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap">
	  </i>Coaching Info</a></li>
	  <li class="active">Fee Structure</li>
      </ol>
    </section>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
  get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_info_fee_structure_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
			//$('#mypdf_view').html(detail);
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('coaching_info/coaching_info_Fee_structure');
            }else if(res[1]=='error'){
			alert('error found');
				   get_content('coaching_info/coaching_info_Fee_structure');
			}
			}
         });
      });
	 
	  
	
function for_subject(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_course_subject_fee.php?course_code="+value+"",
cache: false,
success: function(detail1){
$("#student_course_subject").html(detail1);
}
});
} 

function for_common(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_common_subhead.php?course_code="+value+"",
cache: false,
success: function(detail1){
$("#course_subhead").html(detail1);
}
});
} 

function for_head_detail(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_fee_head.php?course_code="+value+"",
cache: false,
success: function(detail1){
$("#head_detail").html(detail1);
}
});
} 

function for_total(){
var total=0;
$(".fee").each(function() {
 total+= Number($(this).val());
});
$("#coaching_info_fee_amount").val(total);
}
	
</script>


    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Fee Structure</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-6">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive">
				<div class="col-md-3 ">				
					 <div class="form-group" >
					  <label >Course Name<font style="color:red"><b>*</b></font></label><br>
						<select name="course_code" class="form-control" onchange="for_subject(this.value); for_common(this.value); for_head_detail(this.value);"  required>
					    <option value="">Select</option>
						<?php

						$que="select * from coaching_courses where courses_status='Active'";
						$run=mysqli_query($conn37,$que);
						while($row=mysqli_fetch_assoc($run)){
						$s_no = $row['s_no'];
						$coaching_info_courses_name = $row['coaching_info_courses_name'];
						$coaching_info_courses_code = $row['coaching_info_courses_code'];
						?>
					  <option value="<?php echo $coaching_info_courses_code;?>"><?php echo $coaching_info_courses_name;?></option>
					  <?php } ?>
					  </select>
					  </div>
				</div>
				<div class="col-md-9 " id="head_detail">
				</div>
				
				<div class="col-md-2 "></div>
				
				<div class="col-md-8 box-body table-responsive" id="course_subhead">
                </div>
				
				<div class="col-md-3 "></div>
				
				<div class="col-md-6 box-body table-responsive" id="student_course_subject">
                </div>
				
				<div class="col-md-3 "></div>
				
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
				
                </div>
		
			    </div>
		
		 
		  </form>
		
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>
<script>
  $(function () {
    $('#example1').DataTable()
  })
 
</script>