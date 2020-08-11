<?php include("../attachment/session.php");
 $book_id_no=$_POST['book_id'];
 $book_title=$_POST['book_title'];
 $book_author_name=$_POST['book_author_name'];
 $student_full_name=$_POST['student_name'];
 $student_course_and_subject=$_POST['student_course_and_subject'];
 $student_roll_no=$_POST['student_roll_no'];
 $issue_date=$_POST['issue_date'];
 $return_date=$_POST['date_of_return'];
 $status=$_POST['status'];
 $course_code=$_POST['course_code'];
 $subject_code=$_POST['subject_code'];

 $chk_qry="select * from issue_book where book_id_no='$book_id_no' and student_roll_no='$student_roll_no' and status='Active'";
 $chk_res=mysqli_query($conn37,$chk_qry)or die(mysqli_error($conn37));
 if(mysqli_num_rows($chk_res)<1){
  $qry2="select * from school_library_book where book_id_no='$book_id_no'";
				  $result=mysqli_query($conn37,$qry2);
				  while($row=mysqli_fetch_assoc($result)){
				  echo $no_of_copy=$row["no_of_copy"];
				  $copy_left=$no_of_copy-1;
				  }
 
   $query="insert into issue_book(book_id_no,student_roll_no,issue_date,due_date,course_code,author_name,status,book_title,student_name,session_value,$update_by_insert_sql_column) values ('$book_id_no','$student_roll_no','$issue_date','$return_date','$course_code','$book_author_name','$status','$book_title','$student_full_name','$session1',$update_by_insert_sql_value)";
 mysqli_query($conn37,$query);
 
  $query1="update school_library_book set no_of_copy='$copy_left',$update_by_update_sql  where book_id_no='$book_id_no'"; 
	if(mysqli_query($conn37,$query1)){
	 echo "|?|success|?|view|?|"; 
	
	
	}
	}else{
	echo "|?|success|?|alert|?|";
	}
 
 ?>
 