<?php include("../attachment/session.php"); ?>
<table id="example1" class="table table-bordered table-striped">
<thead style="background-color:#A7AAA2;">
<tr>
  <th>S No</th>
  <th>Employee Name</th>
  <th>Category</th>
  <th>Designation</th>
  <th>In Time</th>
  <th>Out Time</th>
  <th>Total Time</th>
</tr>
</thead>
<tbody>
<?php
$current_date1=date('d');
$current_month1=date('m');
$current_year1=date('Y');
date_default_timezone_set('Asia/Calcutta');
$current_time=date('Y-m-d H:i:s');
$column_name='intime_'.$current_date1;

$quer="select * from staff_attendance where `$column_name`!='0000-00-00 00:00:00' and month='$current_month1' and year='$current_year1' and session_value='$session1' ORDER BY `$column_name` DESC";
$runn=mysqli_query($conn37,$quer) or die(mysqli_error($conn37));
$serial=0;
while($row=mysqli_fetch_assoc($runn)){

$staff_name = $row['staff_name'];
$staff_type = $row['staff_type'];
$staff_designation = $row['staff_designation'];

for($i=$current_date1;$i<=$current_date1;$i++){

$in_time=$row['intime_'.$i];
$out_time=$row['outtime_'.$i];				

if($out_time!='0000-00-00 00:00:00'){
$dateDiff = intval((strtotime($out_time)-strtotime($in_time))/60);

$hours = intval($dateDiff/60);
$minutes = $dateDiff%60;
}else{

$dateDiff = intval((strtotime($current_time)-strtotime($in_time))/60);

$hours = intval($dateDiff/60);
$minutes = $dateDiff%60;
}
$in_time=explode(" ",$in_time);
$out_time=explode(" ",$out_time);

}

$serial++;
?>
<tr  align='center' >

<th><?php echo $serial.'.'; ?></th>
<th><?php echo $staff_name; ?></th>
<th><?php echo $staff_type; ?></th>
<th><?php echo $staff_designation; ?></th>
<th><?php echo $in_time[1]; ?></th>
<th><?php echo $out_time[1]; ?></th>
<th><?php echo $hours.":".$minutes." Hours"; ?></th>

</tr>
<?php
}
?>
</tbody>

</table>
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