<?php include("../attachment/session.php"); ?>
<?php
include("../attachment/image_compression_upload.php");

  $exam_stuff_class=$_POST['course_code'];
  $exam_stuff_subject=$_POST['subject_code'];
  $exam_stuff_document_name=$_POST['exam_stuff_document_name'];
  $exam_stuff_date=$_POST['exam_stuff_date'];

  $upload_file=$_FILES['upload_file']['name'];

  $quer="insert into library_exam_stuff(course_code,subject_code,exam_stuff_document_name,exam_stuff_date) values('$exam_stuff_class','$exam_stuff_subject','$exam_stuff_document_name','$exam_stuff_date')";

if(mysqli_query($conn37,$quer)){

    $last_id=mysql_insert_id();

    $query11="insert into library_exam_stuff_document(stuff_s_no) values('$last_id')";
    mysqli_query($conn37,$query11);
    
    if($upload_file!=''){
	$imagename = $_FILES['upload_file']['name'];
	$size = $_FILES['upload_file']['size'];
    $uploadedfile = $_FILES['upload_file']['tmp_name'];
	
	camera_code($size,$imagename,$uploadedfile,$last_id,"stuff_image","library_exam_stuff_document","stuff_s_no");
	}
    
	echo "|?|success|?|";
	
}

?>