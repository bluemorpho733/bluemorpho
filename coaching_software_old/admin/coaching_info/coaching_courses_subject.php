<?php include("../attachment/session.php"); ?>

    <section class="content-header">
      <h1>
        Institute Courses Subject
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('coaching_info/coaching_info')"><i class="fa fa-graduation-cap"></i>Coaching Info</a></li>
	  <li class="active">Institute Courses Subject</li>
      </ol>
    </section>
<script>
	function valid(courses_subject_code,active_inactive){
	var myval=confirm("Are you sure want to "+active_inactive+" this record !!!!");
	if(myval==true){
	delete_record(courses_subject_code,active_inactive);
	}
	else  {
	return false;
	}
	}
	
	function delete_record(courses_subject_code,active_inactive){
	$.ajax({
	type: "POST",
	url: access_link+"coaching_info/courses_subject_delete.php?courses_subject_code="+courses_subject_code+"&active_inactive="+active_inactive+"",
	cache: false,
	success: function(detail){
	var res=detail.split("|?|");
	if(res[1]=='success'){
	   get_content('coaching_info/coaching_courses_subject');
	}else{
	alert(detail); 
	}
	}
	});
	}
	</script>
<script>

    $("#my_form").submit(function(e){
        e.preventDefault();
window.scrollTo(0, 0);
    get_content(loader_div);
    var formdata = new FormData(this);

        $.ajax({
            url: access_link+"coaching_info/coaching_courses_subject_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('coaching_info/coaching_courses_subject');
            }else if(res[1]=='exist'){
			alert('already exist');
				   get_content('coaching_info/coaching_courses_subject');
			}
			}
         });
      });
	  
	  
	  
function for_subject_name(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_subject_name.php?coaching_info_courses_subject_code="+value+"",
cache: false,
success: function($detail1){
var str1 =$detail1;                
$("#subject_name").html(str1);
}
});
}

function for_form(value){
$.ajax({
type: "POST",
url:  access_link+"coaching_info/ajax_subject_form.php?data="+value+"",
cache: false,
success: function(detail2){
$("#form_detail").html(detail2);
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
              <h3 class="box-title">Institute Subject Add</h3>
				<button style="float:right;" value="B" type="button" class="btn btn-primary" onclick="for_form(this.value);"><i class="fa fa-minus" ></i></button>
				<button style="float:right;" value="A" type="button" class="btn btn-primary" onclick="for_form(this.value);">Subject <i class="fa fa-plus" ></i></button>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body "  class="col-md-6">
			<form role="form"  method="post" enctype="multipart/form-data" id="my_form">
		        
				
				<div class="col-md-12 box-body table-responsive" id="form_detail">
				
                </div>
			    
			<div class="col-md-12 box-body table-responsive" id="my_table"> 
                <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
				  <th>S No</th>
				  <th>Course Name</th>
				  <th>Subject Name</th>
				  <th>Duration</th>
				  <th>Trainer</th>
				  <th>Status</th>
				  <th>Edit</th>
				  <th>Delete</th>
                </tr>
                </thead>

			<?php
            $que="select * from coaching_courses_subject left join coaching_courses on coaching_courses_subject.course_code = coaching_courses.coaching_info_courses_code where coaching_courses.courses_status='Active'";
            $run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
			$serial_no=0;
            while($row=mysqli_fetch_assoc($run)){
            $s_no = $row['s_num'];
			$course_code = $row['course_code'];
			$coaching_info_courses_name = $row['coaching_info_courses_name'];
			$coaching_info_courses_subject_code = $row['coaching_info_courses_subject_code'];
			$subject_name = $row['coaching_info_courses_subject_name'];
			$coaching_info_courses_subject_duration = $row['coaching_info_courses_subject_duration'];
			$coaching_info_courses_subject_trainer = $row['coaching_info_courses_subject_trainer'];
			$courses_subject_status = $row['courses_subject_status'];
			if($courses_subject_status=='Active'){
			$button_var='Inactive';
			}else{
			$button_var='Active';
			}
           
			$serial_no++;
			?>				

				<tbody>
				<tr  align='center' >

					<th ><?php echo $serial_no; ?></th>
					<th ><?php echo $coaching_info_courses_name; ?></th>
					<th ><?php echo $subject_name; ?></th>
					<th ><?php echo $coaching_info_courses_subject_duration; ?></th>
					<th ><?php echo $coaching_info_courses_subject_trainer; ?></th>
					<th  <?php if($courses_subject_status=='Active'){ ?> style="color:green" <?php }else{ ?> style="color:red" <?php } ?>><?php echo $courses_subject_status; ?></th>
				    <th><button type="button"  onclick="post_content('coaching_info/coaching_courses_subject_edit','<?php echo 'code='.$s_no; ?>')" class="btn btn-default my_background_color" ><?php echo $language['Edit']; ?></button></th>
					<th><button type="button"  class="btn btn-default my_background_color" onclick="return valid('<?php echo $s_no; ?>','<?php echo $button_var; ?>');" ><?php echo $button_var; ?></button</th>
				</tr>
				<?php } ?>
				</tbody>

				</table>
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
<script>

$(function () {
$('.select2').select2()
})

</script>