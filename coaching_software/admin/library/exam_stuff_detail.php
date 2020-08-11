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
url: access_link+"library/exam_stuff_delete.php?id="+id+"",
cache: false,
success: function(detail){
	  var res=detail.split("|?|");
			   if(res[1]=='success'){
				  alert('Successfully Deleted');
				  get_content('library/exam_stuff_add');
			   }else{
               alert(detail); 
			   }
}
});
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
        <li class="active">Exam Stuff Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title">Exam Stuff List</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
    <div class="box-body table-responsive">
	    <table  id="example1" class="table table-bordered table-striped ">
        <thead class="my_background_color">
          <tr>
              <th><?php echo $language['S No']; ?></th>
              <th><?php echo $language['Courses']; ?></th>
              <th><?php echo $language['Subject']; ?></th>
              <th><?php echo $language['Document Name']; ?></th>
              <th><?php echo $language['Date']; ?></th>
              <th>Image</th>
              <th><?php echo $language['Delete']; ?></th>
          </tr>
        </thead>
<?php
  $class = $_GET['class'];
  $subject = $_GET['subject'];
  $document = $_GET['document'];  
  $serial_no = 0;
  $select = "select * from library_exam_stuff where course_code='$class' and subject_code='$subject' and exam_stuff_document_name='$document'";
  $run=mysqli_query($conn37,$select);
while($row=mysqli_fetch_assoc($run))
 {
  $s_no=$row['id'];
  $course_code = $row['course_code'];
	$course_name = get_course_name($course_code);
  $subject_code = $row['subject_code'];
	$subject_name = get_subject_name($subject_code);
	$exam_stuff_document_name = $row['exam_stuff_document_name'];
	$exam_stuff_date = $row['exam_stuff_date'];
	$serial_no++;
  
    $que1="select * from library_exam_stuff_document where stuff_s_no='$s_no'";
    $run1=mysqli_query($conn37,$que1);
    if(mysqli_num_rows($run1)<1){
    $query23423="insert into library_exam_stuff_document(stuff_s_no) values('$s_no')";
    mysqli_query($conn37,$query23423);
    }
    while($row1=mysqli_fetch_assoc($run1)){
    $stuff_image=$row1['stuff_image'];
    }
     
    ?>
  <tr align='center'>
  <th><?php echo $serial_no; ?></th>
  <th><?php echo $course_name; ?></th>
  <th><?php echo $subject_name; ?></th>
  <th><?php echo $exam_stuff_document_name; ?></th>
  <th><?php echo $exam_stuff_date; ?></th>

  <th><img src="<?php if($stuff_image!=''){ echo 'data:image;base64,'.$stuff_image; }else{ echo $school_software_path."images/student_blank.png"; }  ?>" height="50" width="50"></th>
  <th><button type="button" class="btn btn-default" onclick="return valid('<?php echo $s_no; ?>');"><?php echo $language['Delete']; ?></button></th>
</tr>

	<?php } ?>
</table>
</div>
<!---------------------------------------------End Registration form---------------------------------------->
<!-- /.box-body -->
    </div>
  </div>
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