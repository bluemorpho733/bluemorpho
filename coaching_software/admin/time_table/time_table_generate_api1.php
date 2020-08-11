<?php include("../attachment/session.php");

$course_code=$_POST['course_code'];
$update_change=$_POST['update_change'];
//$last_updated_date=$_POST['last_updated_date'];
$last_updated_date=date("Y-m-d");
$batch_name1=$_POST['batch_name1'];
$batch_code1=$_POST['batch_code1'];
$subject_name1=$_POST['subject_name1'];
$subject_code1=$_POST['subject_code1'];
$batch_start_time1=$_POST['batch_start_time1'];
$batch_end_time1=$_POST['batch_end_time1'];
$teacher_name_monday=$_POST['teacher_name_monday'];
$teacher_name_tuesday=$_POST['teacher_name_tuesday'];
$teacher_name_wednesday=$_POST['teacher_name_wednesday'];
$teacher_name_thursday=$_POST['teacher_name_thursday'];
$teacher_name_friday=$_POST['teacher_name_friday'];
$teacher_name_saturday=$_POST['teacher_name_saturday'];
$teacher_name_sunday=$_POST['teacher_name_sunday'];

$count=count($batch_name1);
for($i=0; $i<$count; $i++){
$sql=mysqli_query($conn37,"select * from course_time_table where batch_code='$batch_code1[$i]'");
$number=mysqli_num_rows($sql);
if($number>0){
$update=mysqli_query($conn37,"update course_time_table set course_code='$course_code',subject_name='$subject_name1[$i]',subject_code='$subject_code1[$i]',batch_name='$batch_name1[$i]',batch_code='$batch_code1[$i]',batch_time_from='$batch_start_time1[$i]',batch_time_to='$batch_end_time1[$i]',batch_coloum_teacher_monday='$teacher_name_monday[$i]',batch_coloum_teacher_tuesday='$teacher_name_tuesday[$i]',batch_coloum_teacher_wednesday='$teacher_name_wednesday[$i]',batch_coloum_teacher_thursday='$teacher_name_thursday[$i]',batch_coloum_teacher_friday='$teacher_name_friday[$i]',batch_coloum_teacher_saturday='$teacher_name_saturday[$i]',batch_coloum_teacher_sunday='$teacher_name_sunday[$i]',update_change='$update_change',last_updated_date='$last_updated_date' where batch_code='$batch_code1[$i]'");
echo "|?|success|?|";
}else{
$que1="INSERT INTO course_time_table(course_code,subject_name,subject_code,batch_name,batch_code,batch_time_from, batch_time_to,batch_coloum_teacher_monday,batch_coloum_teacher_tuesday,batch_coloum_teacher_wednesday, batch_coloum_teacher_thursday,batch_coloum_teacher_friday,batch_coloum_teacher_saturday, batch_coloum_teacher_sunday,update_change,last_updated_date) VALUES ('$course_code','$subject_name1[$i]','$subject_code1[$i]','$batch_name1[$i]','$batch_code1[$i]','$batch_start_time1[$i]','$batch_end_time1[$i]','$teacher_name_monday[$i]','$teacher_name_tuesday[$i]','$teacher_name_wednesday[$i]','$teacher_name_thursday[$i]','$teacher_name_friday[$i]','$teacher_name_saturday[$i]','$teacher_name_sunday[$i]','$update_change','$last_updated_date')";
mysqli_query($conn37,$que1);
echo "|?|success|?|";
}

}


?>

