<?php include("../attachment/session.php"); 
include("function.php");
?>
<script>
	$("#my_form").submit(function(e){
	e.preventDefault();
	var formdata = new FormData(this);
  window.scrollTo(0, 0);
  get_content(loader_div);
        $.ajax({
            url: access_link+"library/edit_book_api.php",
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
			    get_content('library/view_book_library');
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
	var str1 =detail1;                
	$("#student_course_subject").html(str1);
	}
	});
}
</script>
<script type="text/javascript">
   function for_section(value){
         
       $.ajax({
			  type: "POST",
              url: "ajax_class_section.php?class_name="+value+"",
              cache: false,
              success: function($detail){
                   var str =$detail;                
                 
                  $("#student_class_section").html(str);
				  for_list();
              }
           });
    }
</script>


    <section class="content-header">
      <h1>
       Library  Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:get_content('index_content')"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="javascript:get_content('library/library')"><i class="fa fa-book"></i> Library</a></li>
		<li><a href="javascript:get_content('library/view_book_library')"><i class="fa fa-book"></i> Book List</a></li>
        <li class="active">Edit Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
             <center><h3 class="box-title" style="color:#f4427d;font-size:30px;"><b>Update Library Book</b></h3></center></br></br></br>
            </div>
 <?php 
 
   $id=$_GET['id'];
  
  $sql="select * from school_library_book where book_id_no='$id'";
  $ex=mysqli_query($conn37,$sql);
  while($row= mysqli_fetch_assoc($ex)){
    $book_id_no=$row['book_id_no'];
    $book_title=$row['book_title'];
    $book_category=$row['book_category'];
    $course_code=$row['course_code'];
    $course_name=get_course_name($course_code);
    $subject_code=$row['subject_code'];
    $subject_name=get_subject_name($subject_code);
    $author_name=$row['author_name'];
    $vendor_name=$row['vendor_name'];
    $publish_date=$row['publish_date'];
    $publish_name=$row['publish_name'];
    $cost=$row['price'];
    $no_of_copy=$row['no_of_copy'];
	}
?>
			  
<!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
        <div class="box-body">
			<form role="form" method="post" id="my_form" enctype="multipart/form-data">
			<input type="hidden" value="<?php $id; ?>" name="s_no">
		       <div class="col-md-4">
					<div class="form-group">
					  <label>Accession NO./Book No.<font style="color:red"><b>*</b></font></label>
					   <input type="text" name="book_id_no"   placeholder="Enter Book Accession No."  value="<?php echo $book_id_no; ?>" class="form-control" readonl/>
					</div>
			    </div>
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Book Title<font style="color:red"><b>*</b></font></label>
					   <input type="text"  name="book_title"  placeholder="Enter book title"  value="<?php echo $book_title; ?>" class="form-control" required/>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="form-group">
					  <label>Author<font style="color:red"><b>*</b></font></label>
					   <input type="text" name="author"  placeholder="Enter Author name"  value="<?php echo $author_name; ?>" class="form-control" required/>
					</div>
				</div>
							
				<div class="col-md-4 ">	
					<div class="form-group" >
					  <label>Courses<font style="color:red"><b>*</b></font></label>
					    <select name="course_code" class="form-control" onchange="for_subject(this.value);">
					    <option value="<?php echo $course_code; ?>"><?php echo $course_name; ?></option>
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
				    <div class="form-group" >
					 <label >Subject</label>
						<select name="subject_code" class="form-control" id="student_course_subject">
							<option value="<?php echo $subject_code;?>"><?php echo $subject_name; ?></option>
						</select>
					</div>
				</div>
				
				<div class="col-md-4 ">				
					<div class="form-group" >
					  <label >Publisher</label>
					  <input type="text" class="form-control" name="publish_name" placeholder="Enter publication" value="<?php echo $publish_name; ?>">
					</div>
				</div>	
				<div class="col-md-4">				
					<div class="form-group">
					  <label>Publication Date</label>
					  <input type="date" class="form-control" name="publish_date" value="<?php echo $publish_date; ?>">
					</div>
				</div>	
				<div class="col-md-4">				
					<div class="form-group" >
					  <label>No. Of Copies</label>
					  <input type="Number" class="form-control" name="no_of_copy" placeholder="Enter No of Book" value="<?php echo $no_of_copy; ?>">
					</div>
				</div>
				<div class="col-md-4">				
					<div class="form-group">
					  <label >Vendor</label>
					  <input type="text" class="form-control" name="Vendor_name" placeholder="Enter Vendor Name" value="<?php echo $vendor_name; ?>">
					</div>
				</div>
				<div class="col-md-4">				
					<div class="form-group">
					  <label >Cost of Book<font style="color:red"><b>*</b></font></label>
					  <input type="Number" class="form-control" name="book_cost" placeholder="Enter book cost" value="<?php echo $cost; ?>" required>
					</div>
				</div>
				<div class="col-md-12">
					<center><input type="submit" name="finish" value="Update" class="btn my_background_color"/></center>
				</div>
		    </form>
	    </div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		<!-- /.box-body -->
        </div>
    </div>
</section>