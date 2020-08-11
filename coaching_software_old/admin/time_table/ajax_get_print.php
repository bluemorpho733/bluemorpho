<?php include("../attachment/session.php");
$course_id=$_GET['Courses_id'];
?>
	<div class="form-group">
		<label>Print Timetable</label>
		<a href="../../COACHING-PRO/coaching_software/pdf/pdf/time_table/time_table_pdf.php?courses=<?php echo $course_id; ?>" class="form-control text-center btn btn-success" style="color: #fff;"  target="_blank">Print</a>
	</div>