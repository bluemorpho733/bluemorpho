<?php include("../attachment/session.php")?> <!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Attendance Form , School Attendance Management Software (Simption School Management Software</title>
		
		<meta name="keywords" content="School Management Software, Hostel management Software, best Hostel Software, School Hostel Software, Hostel ERP Software, Hostel Student management Software, Hostel management"/>
       
	   <meta name="description" content="Simption Tech Pvt Ltd Provides a School management Software That Contains Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application."/>

    <link rel="shortcut icon" type="image/icon" href="../../images/favicon.png"/>
	
	<meta property="article:publisher" content="https://www.facebook.com/simptiontechpvtltd/" />
	<meta name="msvalidate.01" content="C676B6D610F3665D3D6AFE5BFA86FAC5" />
<meta name="twitter:site" content="@simption_tech" />
<META NAME="ROBOTS" CONTENT="ALL">
<meta name="author" content="Simption Tech Pvt Ltd">
<meta name="designer" content="http://www.simption.com">
<meta name="robots" content="default, follow, all">
<meta name="rating" content="General">
<meta name="classification" content="Simption School Management Software"/>
<meta name="Language" content="us-en"/> 
<meta name="Audience" content="All"/> 
<meta name="distribution" content="Global"/> 
<meta name="googlebot" content="index, follow"/>
<meta name="Revisit-After" content="1 days"/> 
<meta name="google-site-verification" content="googleffc254dfcdc26a00" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="category" content="Simption School Management Software is a best software For School Management. Simption School Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
 <link rel="canonical" href="http://simptiontechpvtltd.blogspot.in/2017/07/new-latest-gst-software-updated-for.html"/>
   

<meta property="og:url"           content="http://www.school.simption.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Simption School Management Software" />
	<meta property="og:description"   content="Simption School Management Software is a best software For School Management. Simption School Software Contains various panel like Student management, Hostel management Software,Fees Management,Staff Management,Examination Management ,Attendance Management ,Account Management,Enquiry Management,Reminder Management ,Homework Management,Time Table Management,Complaint Management,SMS Service,Gallery,Stock Management,Certificate Management,Govt. Requirements,Leave Management ,Holiday Management ,Paper Setter,Sports Management ,Event Management ,Downloads,Bus Management ,Session Management,Library Management ,Hostel Management,Backup Management,Offline Facility,Teacher Panel,Account Panel,Library Panel,Bus Panel,Hostel Panel,Management Panel,Student/Parent Android
Application,Teacher Android Application,Bus Driver Android Application." />
	<meta property="og:image"         content="https://lh3.googleusercontent.com/-bJcXHC79Mdo/WGzq4GKuqiI/AAAAAAAAAfQ/IzvLYf3eib0gTEPzMP5TayWQtE8RhicCwCJoC/w426-h298/simptionbanner.jpg" /> 

   <?php include("../attachment/link_css.php")?>

</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper"> <?php include("../attachment/header.php")?>  <?php include("../attachment/sidebar.php")?>


  
  
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
	 <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="attendance.php"><i class="fa fa-child"></i> Attendance</a></li>
	  <li><a href="emp_attendance_select.php"><i class="fa fa-child"></i> Employee Attendance Select</a></li>
	 <li class="active">Employee Attendance Form</li>
      </ol>
    </section>


	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        
		<div class="col-xs-2"></div>
		<div class="col-xs-8">
         
          <?php
			$staff_type=$_GET['staff_type'];
			$staff_attendance_date=$_GET['date'];
			$month=$_GET['month'];

			$staff_attendance_date2=explode('-',$staff_attendance_date);
			$staff_attendance_date3=$staff_attendance_date2[2]."-".$staff_attendance_date2[1]."-".$staff_attendance_date2[0];
			$staff_attendance_date4=$staff_attendance_date2[2];
			$year=$staff_attendance_date2[0];
		  ?>
		  
		  <form  method="post" enctype="multipart/form-data">
		  <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff Attendance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12">
			  <div class="col-md-2"></div>
			  <div class="col-md-4"><h4>Attendance Date : <?php echo $staff_attendance_date3; ?></h4></div>
			  <div class="col-md-4"><h4>Staff Type : <?php echo $staff_type; ?></h4></div>
			  <div class="col-md-2"></div>
			  </div>
			  <div class="col-md-12">
			  <table id="example1" class="table table-bordered table-striped">
                <thead class="my_background_color">
                <tr>
                  <th>Serial No.</th>
                  <th>Staff Name</th>
                  <th>Unique Id</th>
                  <th>Staff Attendance</th>
                </tr>
                </thead>
                <tbody>
				<?php
				

				$que="select * from staff_attendance where staff_type='$staff_type' and month='$month' and year='$year' and session_value='$session1'";
				$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
				$serial_no=0;
				while($row=mysqli_fetch_assoc($run)){

						$s_no=$row['s_no'];
						$staff_id = $row['staff_id'];
						$staff_name = $row['staff_name'];
						
					$serial_no++;
				?>
                <tr>
                  <td><?php echo $serial_no; ?></td>
                  <td><?php echo $staff_name; ?></td>
                  <td><?php echo $staff_id; ?><input type="hidden" name="staff_id[]" value="<?php echo $staff_id; ?>" readonly /></td>
                  <td>
				  <select name="staff_attendance[]" >
				  <option value="P">P</option>
				  <option value="P/2">P/2</option>
				  <option value="A">A</option>
				  <option value="L">L</option>
				  </select>
				  </td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
			  </div>
			  <div class="col-md-12">
			  <center><button type="submit" name="submit1" class="btn btn-primary">Submit</button></center>
			  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </form>
		
		</div>
		<div class="col-xs-2"></div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    
  </div>
  
	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
 <?php include("../attachment/footer.php")?>
 <?php include("../attachment/sidebar_2.php")?>
</div>
 <?php include("../attachment/link_js.php")?>


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
</body>
</html>

<?php
if(isset($_POST['submit1'])){
$staff_id=$_POST['staff_id'];
$staff_attendance=$_POST['staff_attendance'];
date_default_timezone_set('Asia/Calcutta');
$in_time=date('Y-m-d H:i:s');
$col_name='intime_'.$staff_attendance_date4;

$count=count($staff_id);
for($i=0;$i<$count;$i++){

$query="update staff_attendance set `$col_name`='$in_time', `$staff_attendance_date4`='$staff_attendance[$i]',$update_by_update_sql where staff_type='$staff_type' and month='$month' and year='$year' and staff_id='$staff_id[$i]' and session_value='$session1'";
if(mysqli_query($conn37,$query)){
echo "<script>window.open('emp_attendance_list.php?staff_type=$staff_type&current_month=$month&year=$year&date=$staff_attendance_date','_self');</script>";
}

}
}
?>

