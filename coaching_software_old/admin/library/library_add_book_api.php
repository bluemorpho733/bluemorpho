<?php include("../attachment/session.php");
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
  $sql="select * from school_library_book where school_library_book_status='Active' and book_id_no='$book_id_no'";
  $ex=mysqli_query($conn37,$sql);

  
	 if(mysqli_num_rows($ex)<1){
 
  echo $query="insert into school_library_book(book_id_no,book_title,author_name,vendor_name,course_code,subject_code,publish_date,publish_name,no_of_copy,price,subject_name) values ('$book_id_no','$book_title','$author','$Vendor_name','$course_code','$subject_code','$publish_date','$publish_name','$no_of_copy','$book_cost','$subject')";

	//$update_by_insert_sql_column ,$update_by_insert_sql_value;
  //,session_value  ,'$session1',
  $run = mysqli_query($conn37,$query) or die(mysqli_error($conn37));
if($run){
echo "|?|success|?|view|?|";

}
}else{
	echo "|?|success|?|alert|?|";

}



	?>
