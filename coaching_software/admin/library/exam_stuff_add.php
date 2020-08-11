<?php include("../attachment/session.php"); 
include("function.php");
?>
<script type="text/javascript">
         	function for_subject(value){
			$.ajax({
			address: "POST",
			url: access_link+"library/ajax_get_subject.php?value="+value+"",
			cache: false,
			success: function(detail){
			 $("#subject_name").html(detail);
			 for_list();
			}
			});
	    }
</script>
<script type="text/javascript">
         	function for_subject_exam_stuff(value){
			$.ajax({
			address: "POST",
			url: access_link+"library/ajax_get_subject_exam_stuff.php?value="+value+"",
			cache: false,
			success: function(detail){
			 $("#subject_name_exam_stuff").html(detail);
			 for_list();
			}
			
			});
			}
</script>
<script type="text/javascript">
         	function for_document_exam_stuff(){
			var value1=document.getElementById('student_class1').value;
			var value=document.getElementById('subject_name_exam_stuff').value;
			$.ajax({
			address: "POST",
			url: access_link+"library/ajax_get_document_name.php?value="+value+"&value1="+value1+"",
			cache: false,
			success: function(detail){
			 $("#document_name_exam_stuff").html(detail);
			 for_list();
			}
		});
	}
			
			function for_document(){
			var value=document.getElementById('subject_name_exam_stuff').value;
			var value1=document.getElementById('student_class1').value;
			var value2=document.getElementById('document_name_exam_stuff').value;
			if(value!='' && value1!='' && value2!=''){
			$('#my_button').show("");
			}else{
			$('#my_button').hide("");
			}
			}
	
	function for_detail(){
        var value=document.getElementById('subject_name_exam_stuff').value;
        var value1=document.getElementById('student_class1').value;
        var value2=document.getElementById('document_name_exam_stuff').value;
        if(value!='' && value1!='' && value2!=''){
        post_content("library/exam_stuff_detail","class="+value1+"&subject="+value+"&document="+value2);
        }else{
        alert("Please Select All Field !!!");
        }
	}
			
	$("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
    window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"library/exam_stuff_add_api.php",
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
				  get_content('library/exam_stuff_add');
                }
			}
        });
    });
</script>

<script type="text/javascript">
	function for_subject(value){
	$.ajax({
	type: "POST",
	url: access_link+"coaching_info/ajax_course_subject.php?course_code="+value+"",
	cache: false,
	success: function(detail1){
	var str1 = detail1;                
	$("#student_course_subject").html(str1);
	}
	});
}
</script>

<script type="text/javascript">
function check_file_type(input,id,id_show,type1){
if(type1=="image"){
	   var file = input.files[0];
	   if (file.size >= 1024 * 1024 * 1024) {
	   $('#'+id).val('');
      alert("File size must be at most 2MB");
      return;
    }  
if(!file.type.match("image/*"))
{
 $('#'+id).val('');
alert("Please Upload JPG/JPEG/PNG/GIF File");
return;
}  
	var fileReader = new FileReader();
  fileReader.onloadend = function(e) {
    var arr = (new Uint8Array(e.target.result)).subarray(0, 4);
    var header = "";
    for (var i = 0; i < arr.length; i++) {
      header += arr[i].toString(16);
    }
	if(mimeType(header)==1){
	  $('#'+id).val('');
	alert("Please Upload JPG/JPEG/PNG/GIF File");
	
	}
  };
  fileReader.readAsArrayBuffer(file);
  readURL(input,id_show);
}else{

	   var file = input.files[0];
	   if (file.size >= 1024 * 1024 * 1024) {
	    $('#'+id).val('');
      alert("File size must be at most 2MB");
	  
      return;
    }  
 
	var fileReader = new FileReader();
  fileReader.onloadend = function(e) {
    var arr = (new Uint8Array(e.target.result)).subarray(0, 4);
    var header = "";
    for (var i = 0; i < arr.length; i++) {
      header += arr[i].toString(16);
    }
	if(mimeType(header)==1){
	 $('#'+id).val('');
	alert("Please Upload JPG/JPEG/PNG/GIF/PDF/DOC File");
	 
	}
  };
  fileReader.readAsArrayBuffer(file);
  readURL(input,id_show);
}

}

function mimeType(headerString) {
  switch (headerString) {
    case "89504e47":
      type = "image/png";
      break;
    case "47494638":
      type = "image/gif";
      break;
    case "ffd8ffe0":
    case "ffd8ffe1":
    case "ffd8ffe2":
      type = "image/jpeg";
      break;
	 case "25504446":
      type = "application/pdf";
      break;
	  case "d0cf11e0":
      type = "application/doc";
      break;
    default:
      type = "1";
      break;
  }
  return type;
}
</script>
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   <?php echo $language['Library Management']; ?>
    <small><?php echo $language['Control Panel']; ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="javascript:get_content('index_content')"><i class="fa fa-home"></i> <?php echo $language['Home']; ?></a></li>
	<li><a href="javascript:get_content('library/library')"><i class="fa fa-book"></i> <?php echo $language['Library']; ?></a></li>
    <li class="active">Exam Stuff</li>
  </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title">Exam Stuff</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
        <div class="box-body table-responsive">
			<form id="my_form" role="form" method="post" enctype="multipart/form-data">							
			  <div class="col-md-4">	
				<div class="col-md-12">	
					<div class="form-group" >
					    <label>Courses<font style="color:red"><b>*</b></font></label>
					    <select name="course_code" class="form-control" onchange="for_subject(this.value);">
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
				
				<div class="col-md-12">				
				    <div class="form-group">
					    <label>Subject</label>
						<select name="subject_code" class="form-control" id="student_course_subject">
						   <option value="">Select</option>
						</select>
					</div>
				</div>
				
			  <div class="col-md-12">		
				<div class="form-group">
				  <label><?php echo $language['Document Name']; ?></label>
				  <input type="text" name="exam_stuff_document_name" placeholder="Document Name" value="" class="form-control" required>
				</div>
			  </div>
				 
			<div class="col-md-12 ">				
				<div class="form-group">
				  <label>Date</label>
					<input type="date" class="form-control" name="exam_stuff_date" placeholder="<?php echo $language['Publish Date']; ?>" required/> 
				</div>
			</div>
		    
		    <div class="col-md-9">	
				<div class="form-group" >
				  <label>Upload Documents</label>
				  <input type="file" id="upload_file" name="upload_file" onchange="check_file_type(this,'upload_file','show_upload_file','image');"  value="" class="form-control" accept=".gif, .jpg, .jpeg, .png" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
				 <img src="" id="show_upload_file" height="50" width="50" style="margin-top:10px;">
				</div>
			</div>
			<div class="col-md-12">
				<center><input type="submit" name="finish" value="<?php echo $language['Submit']; ?>" class="btn my_background_color"/></center>
			</div>
		</div>
				
				
	<div class="col-md-8 ">
    <center><h3 class="box-title" style="color:red;">Exam Stuff List</h3></center>
		<table id="example1" class="table table-bordered table-striped">
            <thead class="my_background_color">
                <tr>
			        <th><?php echo $language['Courses']; ?></th>
	                <th><?php echo $language['Subject']; ?></th>
	                <th><?php echo $language['Document Name']; ?></th>
			        <th><?php echo $language['Details']; ?></th>
                </tr>
            </thead>

<tr align='center'>
    <th>
	    <select class="form-control" id="student_class1" onchange="for_subject_exam_stuff(this.value);for_document();">
		  <option value="">Select Courses</option>
		    <?php
            $select="select * from library_exam_stuff Group By course_code";
            $run=mysqli_query($conn37,$select);
            while($row=mysqli_fetch_assoc($run)){          
	            $s_no=$row['s_no'];
		        $course_code = $row['course_code'];
		        $course_name = get_course_name($course_code);

            ?>
		  <option value="<?php echo $course_code; ?>" ><?php echo $course_name; ?></option>
		    <?php } ?>
		</select>
    </th>
	<th>
	    <select class="form-control" onchange="for_document_exam_stuff();for_document();" id="subject_name_exam_stuff">
		  <option value="">Select Subject</option>
		</select>
    </th>
	<th>
	    <select class="form-control" id="document_name_exam_stuff" onchange="for_document();">
		  <option value="">Select Document</option>
		</select>
    </th>
	<th>
		<button type="button" class="btn btn-default" id="my_button" onclick="for_detail();">Details</button>
	</th>
</tr>
</table>
	   </div>
	</form>
</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!--/.box-body -->
        </div>
    </div>
</section>
<script>
for_document();
</script>