<?php include("../attachment/session.php");
 include("../attachment/image_compression_upload.php");
  
  $id = $_POST['s_no'];
  $book_id_no=$_POST['book_id_no'];
  $book_title=$_POST['book_title'];
  $author=$_POST['author'];
  $course_code=$_POST['course_code'];
  $subject_code=$_POST['subject_code'];
  $publish_date=$_POST['publish_date'];
  $publish_name=$_POST['publish_name'];
  $no_of_copy=$_POST['no_of_copy']; 
  $Vendor_name=$_POST['Vendor_name']; 
  $book_cost=$_POST['book_cost']; 
  $subject='';

   $query="update school_library_book set book_id_no='$book_id_no',book_title='$book_title',author_name='$author',vendor_name='$Vendor_name',course_code='$course_code',subject_code='$subject_code',publish_date='$publish_date',publish_name='$publish_name',no_of_copy='$no_of_copy',price ='$book_cost',subject_name='$subject' where book_id_no='$book_id_no'";
if(mysqli_query($conn37,$query))
{
echo "|?|success|?|";
}
?>