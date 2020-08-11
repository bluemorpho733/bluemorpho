<?php include("../attachment/session.php"); 
include("function.php");
?>
 <script>
function valid(id){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
for_delete(id);       
 }            
else  {      
return false;
 }
}
  
function for_delete(id){
$.ajax({
type: "POST",
url: access_link+"library/delete_book.php?id="+id+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				  alert('Successfully Deleted');
				   get_content('library/view_book_library');
			   }else{
               alert(detail); 
			   }
}
});
}

</script> 
<script type="text/javascript">
   function search_class(value){
    //alert(value);
       $.ajax({
			  type: "POST",
              url: access_link+"library/library_search_class.php?id="+value+"",
              cache: false,
              success: function(detail){
            $('#search_table').html(detail);
              }
           });
    }
</script>
<script type="text/javascript">
   function search_subject(value){
     //alert(value);
	  var subject =document.getElementById('class_no').value;
	 //alert(subject);
       $.ajax({
			  type: "POST",
              url: access_link+"library/library_search_subject.php?id="+value+"&id2="+subject+"",
              cache: false,
              success: function(detail){
			  //alert(detail); 
            $('#search_table').html(detail);
              }
           });
    }
</script>
<script type="text/javascript">
   function for_section(value){

       $.ajax({
			  type: "POST",
              url: access_link+"library/ajax_class_section_code.php?class_name="+value+"",
              cache: false,
              success: function($detail){
                   var str =$detail;                
                 
                  $("#student_class_section").html(str);
				  for_exam();
				  for_list();
				  
              }
           });

    }
</script>
<script type="text/javascript">
   function for_book(value){
//alert(value);
       $.ajax({
			  type: "POST",
              url: access_link+"library/ajax_search_book.php?class="+value+"",
              cache: false,
              success: function($detail){
			 
                   var str =$detail;                
                  //alert(str);
                  $("#book_id_no").html(str);
				  for_exam();
				  for_list();
				  
              }
           });

    }
</script>

<script type="text/javascript">
   function fill_detail(value){
           
			$.ajax({
			  address: "POST",
              url: access_link+"library/ajax_search_book_classwise.php?id="+value+"",
              cache: false,
              success: function(detail){
			  //alert(detail);
                 var str =detail;
		  var res = str.split("|?|");
	    $("#student_roll_no").val(value); 
		  $("#student_name").val(res[0]); 
		  $("#student_class").val(res[1]); 
          $("#student_section").val(res[2]);  
          
        
      
              }
           });

    }
	
function fill_bookdetail(){
var book_id=document.getElementById('book_id').value;
if(book_id==''){
alert('This book is not available right now');
$("#book_title").val(''); 
	$("#book_author_name").val('');
	$("#book_class_name").val('');
}else{
	$.ajax({
	address: "POST",
	url: access_link+"library/ajax_search_book_details.php?book_id="+book_id+"",
	cache: false,
	success: function(detail){
	var res = detail.split("|?|");
	$("#book_title").val(res[0]); 
	$("#book_author_name").val(res[1]);
	$("#book_class_name").val(res[2]);
	fill_stddetail();
	}
	});
	}
}

function search_student_details(){
var roll_no=document.getElementById('student_details').value;
//alert(roll_no);
	$.ajax({
	address: "POST",
	url: access_link+"library/search_student_details.php?student_roll_no="+roll_no+"",
	cache: false,
	success: function(detail){
	//alert(detail);
	var res = detail.split("|?|");
	$("#student_class_and_section").val(res[1]); 
	$("#student_roll_no").val(res[2]);
	$("#student_name").val(res[0]); 
	$("#subject_code").val(res[7]);
	$("#course_code").val(res[8]);
	}
	});
}
</script> 

<script>
function validation(){
var book_id=document.getElementById('book_id').value;
if(book_id==''){
 return false
}else{
  return true

}
}
  $("#my_form").submit(function(e){
  e.preventDefault();

    var formdata = new FormData(this);
    $("#myModal_close").click();
  //window.scrollTo(0, 0);
   //get_content(loader_div);
        $.ajax({
            url: access_link+"library/view_book_library_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
			$('#modal-default').modal('hide');
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   if(res[2]=='view'){
				   alert('Successfully Complete');
				   get_content('library/view_book_library');
				   }else{
				   alert('Sorry ! can not Issue Same Book to Same Student !!!');
				   get_content('library/view_book_library');
				   }
            }
			}
         });
      });
</script>
 
    <section class="content-header">
      <h1>
       Library Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="javascript:get_content('library/library')"><i class="fa fa-book"></i> Library</a></li>
        <li class="active">View Book</li>
      </ol>
	 
    </section>

	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
	
	
	<div class="modal fade" id="modal-default">
 
		<div class="modal-dialog">
		
		<div class="modal-content">
	
		<div class="modal-header">
			
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    <span aria-hidden="true">&times;</span></button>
	    <h4 class="modal-title">Issue Book</h4>
		</div>
		<form method="post" id="my_form" >
	    <div class="modal-body">
		
		
				<div class="col-md-12" >
				<div class="form-group" >
					  <label>Book No <font style="color:red"><b>*</b></font></label>
					  <select name="book_id" id="book_id" class="select2" onchange="fill_bookdetail();" style="width:100%" required>
					  <option value="">Select Book</option>
					        <?php

							$qry="select * from school_library_book";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$book_title=$row22['book_title'];
							$subject_code=$row22['subject_code'];
							$subject_name=get_subject_name($subject_code);
							$author_name=$row22['author_name'];
							$course_code=$row22['course_code'];
							$course_name=get_course_name($course_code);
							$no_of_copies=$row22['no_of_copy'];
							$book_id_no=$row22['book_id_no'];
							if($no_of_copies<=0){?>
							<option value=""><?php echo $subject_name." can not issue right now"; ?></option>
							
							<?php } else {?>
							<option value="<?php echo $book_id_no; ?>"><?php echo $subject_name."[".$book_id_no."][".$course_name."][".$author_name.']'; ?></option>
							<?php } ?>
							<?php
							}
							?>
					  </select>
				</div>
				</div>
				<div class="col-md-6" >
					<div class="form-group">
					  <label>Book Title</label>
					  <input type="text" class="form-control" name="book_title" id="book_title" value="" placeholder="Enter Name" readonly />
					</div>
				</div>
				<div class="col-md-6" >
					  <div class="form-group" >
					  <label>Author Name</label>
					  <input type="text" name="book_author_name" id="book_author_name" placeholder="Author Name" value="" class="form-control" readonly />
					  <input type="hidden" name="" id="book_class_name" class="form-control" />
					</div>
				</div>
			<div class="col-md-12">
			<div class="form-group">
					  <label>Borrower's Name<font size="2" style="font-weight: normal;">
					  (Search by Name,Unique Id,Course,Subject,Father Name,Father Contact Number) </font><span style="color:red;">*</span></label>
					  <select name="" class="select2" onchange="search_student_details();" id="student_details" style="width:100%" required>
					  <option value="">Select student</option>
					        <?php
						
							$qry="select * from student_admission_info where student_status='Active'";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$student_roll_no=$row22['student_roll_no'];
							$student_name=$row22['student_name'];
							// $student_class=$row22['student_class'];
							$course_code=$row22['course_code'];
							$course_name=get_course_name($course_code);
							//$student_section=$row22['student_class_section'];
							$subject_code=$row22['subject_code'];
                            $subject_name=get_subject_name($subject_code);
							$student_father_name=$row22['student_father_name'];
							$student_father_contact_number=$row22['student_father_contact_number'];
							?>
							<option value="<?php echo $student_roll_no; ?>"><?php echo $student_name."[".$student_roll_no."]-"."[".$course_name."-".$subject_name."]-[".$student_father_name."-".$student_father_contact_number."]"; ?></option>
							<?php
							}
							?>
					  </select>
					</div>
			</div>
			<input type="hidden" name="student_name" id="student_name"/>
				<div class="col-md-6">
					<div class="form-group" >
						<label>Borrower's Course & Subject</label>
						<input type="text"  name="student_course_and_subject" placeholder="Student Course and subject"  id="student_class_and_section" class="form-control" readonly/>
					</div>
				</div>
				<div class="col-md-6">				
					<div class="form-group" id="search-box" >
						<label>Borrower's ID</label>
						<input type="text" autocomplete="off" class="form-control" name="student_roll_no" id="student_roll_no" onblur="for_name(this.value);" placeholder="student id" readonly/>
					    <div class="result"></div>
					</div>
				</div>
				<input type="hidden" name="course_code" id="course_code">
				<input type="hidden" name="subject_code" id="subject_code">
				<input type="hidden" class="form-control" name="status" value="Active" readonly />
				
			<div class="col-md-6" >			
            <div class="form-group" >
					  <label>Date Of Issue<font style="color:red"><b>*</b></font></label>
					  <input type="date" class="form-control" name="issue_date" value="<?php echo date('Y-m-d'); ?>" placeholder="Enter today's date" required >
					</div>
			</div>
			<div class="col-md-6" >		
				<div class="form-group">
				  <label>Due Date<font style="color:red"><b>*</b></font></label>
				  <input type="date" class="form-control" name="date_of_return" placeholder="Enter publisher name" required >
				</div>
			</div>		 
					
		  </div>
		  <div class="modal-footer">
		  <button type="button" class="btn btn-default pull-left" id="myModal_close" data-dismiss="modal">Close</button>
		  <input type="submit" name="submit" value="save" class="btn btn-primary" onclick="return validation();">
		  </div>
		  </form>
		  </div>
		  <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		  </div>
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
         
          <!-- /.box -->

          <div class="box">
        <div class="box-header">
			<div class="box-header with-border col-md-12" style="float: left;">
				<h3 class="box-title">View Books Details</h3>
            <button type="button" name="finish" class="btn btn-primary" value=""  data-toggle="modal"  data-target="#modal-default" style="float: right;">Issue Book</button>
			</div>
        </div>
            <!-- /.box-header -->	   
			   
            <div class="box-body table-responsive">
			
			   
		
             <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
               <tr>
				  <th>S.No</th>
				  <th>Accession No./Book No.</th>
                  <th>Book Title</th>
				  <th>Courses</th>
                  <th>Subject</th>
                  <th>Author</th>
                  <th>Vendor Name</th>
				  <th>Publication</th>
				  <th>No Of Copy</th>
				  <th>Cost</th>
				  <th>Publication Date</th>
                  <th><center>ACTION</center></th>
                </tr>
                </thead>
                  <tbody>
               
				<?php 
				$sql="select * from school_library_book where school_library_book_status='Active'";
				$serial_no=0;
				$ex=mysqli_query($conn37,$sql);
				while($row=mysqli_fetch_assoc($ex)){
				$id=$row['id'];
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
				
				$serial_no++;
				?>
			<tr>
	        <th><?php echo $serial_no; ?></th>
	        <th><?php echo $book_id_no; ?></th>
	        <th><?php echo $book_title; ?></th>
	        <th><?php echo $course_name;?></th>
			<th><?php echo $subject_name;?></th>
			<th><?php echo $author_name; ?></th>
	        <th><?php echo $vendor_name; ?></th>
		    <th><?php echo $publish_name; ?></th>
			<th><?php echo $no_of_copy; ?></th>
			<th><?php echo $cost; ?></th>
			<th><?php echo $publish_date; ?></th>
			
		
		<th>
		<button type="button" <?php if($no_of_copy<=0){ echo "disabled"; } ?> class="btn btn-info" onclick="post_content('library/issue_book','<?php echo 'id='.$book_id_no; ?>');" >Issue</button>
		<button type="button" class="btn btn-success" onclick="post_content('library/edit_book','<?php echo 'id='.$book_id_no; ?>');" ><?php echo $language['Edit']; ?></button>
		<button type="button" class="btn btn-danger" onclick="return valid('<?php echo $id; ?>');" ><?php echo $language['Delete']; ?></button>
		</th>
	   </tr>
				
			<?php } ?>
                </tr>

                </tbody>
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>