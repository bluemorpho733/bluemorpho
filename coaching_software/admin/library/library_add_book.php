<?php include("../attachment/session.php")?>
<script>
	$("#my_form").submit(function(e){
        e.preventDefault();
    var formdata = new FormData(this);
window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"library/library_add_book_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   if(res[2]=='view'){
				   alert('Successfully Complete');
				   get_content('library/library_add_book');
				   }else{
					   alert('Please allot Unique Accession No...');
				   get_content('library/library_add_book');
				   }
                }
			}
         });
      });
</script>
<script type="text/javascript">
	function for_subject(value){
	$.ajax({
	type: "POST",
	url:  access_link+"coaching_info/ajax_course_subject.php?course_code="+value+"",
	cache: false,
	success: function(detail1){
	var str1 = detail1;
	$("#student_course_subject").html(str1);
	}
	});
}
</script>
 <section class="content-header">
      <h1> Library Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('library/library')"><i class="fa fa-book"></i> Library</a></li>
        <li class="active">Add Book</li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
	    <!-- general form elements disabled -->
      <div class="box box-primary my_border_top">
        <div class="box-header with-border ">
          <h3 class="box-title">BOOK ACQUISITION</h3>
        </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
        <div class="box-body">
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
				<div class="col-md-4">
					<div class="form-group">
					  <label>Accession NO./Book No.<font style="color:red"><b>*</b></font></label>
					   <input type="text"  name="book_id_no"   placeholder="Enter Book Accession No."  value="" class="form-control " required />
				    </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					  <label>Book Title<font style="color:red"><b>*</b></font></label>
					   <input type="text"  name="book_title"  placeholder="Enter book title"  value="" class="form-control" required />
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Author<font style="color:red"><b>*</b></font></label>
					   <input type="text" name="author"  placeholder="Enter Author Name" value="" class="form-control" required/>
					</div>
				</div>
				<div class="col-md-4 ">	
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
				
				<div class="col-md-4 ">				
				    <div class="form-group">
					    <label >Subject</label>
						<select name="subject_code" class="form-control" id="student_course_subject">
							<option value="">Select</option>
						 </select>
					</div>
				</div>
				<div class="col-md-4 ">				
					<div class="form-group" >
					  <label>Publisher</label>
					  <input type="text" class="form-control" name="publish_name" placeholder="Enter publication">
					</div>
				</div>
				<div class="col-md-4">				
					<div class="form-group">
					  <label >Publication Date</label>
					  <input type="date" class="form-control" name="publish_date">
					</div>
				</div>	
				<div class="col-md-4">				
					<div class="form-group" >
					  <label>No. Of Copies</label>
					  <input type="Number" class="form-control" name="no_of_copy" placeholder="Enter No of Book">
					</div>
				</div>	
				<div class="col-md-4 ">				
					<div class="form-group" >
					  <label>Vendor</label>
					  <input type="text" class="form-control" name="Vendor_name" placeholder="Enter Vendor Name">
					</div>
				</div>	
				<div class="col-md-4 ">				
					<div class="form-group" >
						<label >Cost of Book<font style="color:red"><b>*</b></font></label>
						<input type="Number" class="form-control" name="book_cost" placeholder="Enter book cost" required>
					</div>
				</div>
				<div class="col-md-12">
					<center><input type="submit" name="finish" value="Submit" class="btn  my_background_color" /></center>
				</div>
		    </form>
		</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
    </div>
  </div>
</section>