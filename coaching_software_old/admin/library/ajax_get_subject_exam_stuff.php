<option value="" >Select Subject</option>
<?php
                    $course=$_GET['value'];
					include("../../con73/con37.php");
					include("function.php");
                    $query="select * from library_exam_stuff where course_code='$course' Group By course_code";
                    $res=mysqli_query($conn37,$query);
                    while($row=mysqli_fetch_assoc($res)){
					$subject_code=$row['subject_code'];
					$subject_name=get_subject_name($subject_code);

?>
					<option value="<?php echo $subject_code; ?>"><?php echo $subject_name; ?></option>
					
<?php } ?>