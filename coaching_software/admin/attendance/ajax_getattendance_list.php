<?php include("../attachment/session.php"); ?> 
<?php
$month=$_GET['month'];
$year=$_GET['year'];
$class=$_GET['s_class'];
$section=$_GET['section'];
if($section=='All' || $section==''){
$condition="";
}else{
$condition=" and attendance_section='$section'";
}
?>
<tr>
  <td><button type="button" class="btn btn-success">DATE : </button></td>
  <td colspan="2">
  <?php
  $date0=$year.'-'.$month.'-01';
  $count = date(' t ', strtotime($date0) );
  for($i=1;$i<=$count;$i++){
  $a=$i;
  ?>
  <button style="width:40px;" type="button" class="btn btn-success"><?php echo $a; ?></button>
  <?php } ?>
  <button style="width:80px;" type="button" class="btn btn-primary">Present</button>
  <button style="width:80px;" type="button" class="btn btn-danger">Absent</button>
  <button style="width:80px;" type="button" class="btn btn-warning">Leave</button>
  <button style="width:80px;" type="button" class="btn btn-info">Holiday</button>
  </td>
</tr>
<?php
$que="select * from student_attendance where attendance_class='$class' and month='$month' and session_value='$session1'$condition$filter37 ORDER BY attendance_name ASC";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
if(mysqli_num_rows($run)>0){
while($row=mysqli_fetch_assoc($run)){
	$unique_id = $row['attendance_roll_no'];
	$attendance_name = $row['attendance_name'];
	$date2=$year.'-'.$month.'-01';
	$number = date(' t ', strtotime($date2) );
	$day_name = date(' N ', strtotime($date2) );
	$day_diff=8-$day_name;
?>
<tr>
  <td><?php echo $attendance_name; ?></td>
  <td colspan="2">
  <?php
  $total_present=0;
  $total_absent=0;
  $total_holiday=0;
  $total_leave=0;
  for($i=1;$i<=$number ;$i++){

  if($i<10){
  $x='0'.$i;
  $a=$row['0'.$i];
  $b=$a;
  if($a==''){
  $a=strtoupper('0'.$i);
  }
  }else{
  $x=$i;
  $a=$row[$i];
  $b=$a;
  if($a==''){
  $a=strtoupper($i);
  }
  }

if($i==$day_diff || $i==$day_diff+7 || $i==$day_diff+14 || $i==$day_diff+21 || $i==$day_diff+28){
  $a="S";
  }
$date3=$x.'-'.$month.'-'.$year;
$que6="select * from holiday_manage where holiday_date='$date3'";
$result=mysqli_query($conn37,$que6) or die(mysqli_error($conn37));
while($row5=mysqli_fetch_assoc($result)){
$a="H";
$h= $row5['holiday_name'];
}
if($a=='P'){
  $total_present=$total_present+1;
  }elseif($a=='P/2'){
   $total_present=$total_present+0.5;
  }elseif($a=='A'){
  $total_absent++;
  }elseif($a=='L'){
  $total_leave++;
  }elseif($a=='H'){
  $total_holiday++;
  }
  ?> 
  <button type="button" class="<?php if($a=='P'){ echo 'btn btn-primary'; }elseif($a=='A'){ echo 'btn btn-danger'; }elseif($a=='H'){ echo 'btn btn-info'; }elseif($a=='P/2'){ echo 'btn'; }elseif($a=='L'){ echo 'btn btn-warning'; }elseif($a=='S'){ echo 'btn btn-success'; }elseif($b==''){ echo 'btn'; } ?>" title="<?php if($a=='P'){ echo 'Present'; }elseif($a=='A'){ echo 'Absent'; }elseif($a=='L'){ echo 'Leave'; }elseif($a=='H'){ echo $h; }elseif($a=='S'){ echo 'Sunday'; }elseif($b==''){ echo 'Not Fill'; } ?>" style="width:40px;<?php if($a=='P/2'){ echo 'background-image: url(../../images/halfday.jpg);'; } ?>"><?php echo $a; ?></button>

<?php } ?>
  <button style="width:80px;" type="button" class="btn btn-primary"><?php echo $total_present; ?></button>
  <button style="width:80px;" type="button" class="btn btn-danger"><?php echo $total_absent; ?></button>
  <button style="width:80px;" type="button" class="btn btn-warning"><?php echo $total_leave; ?></button>
  <button style="width:80px;" type="button" class="btn btn-info"><?php echo $total_holiday; ?></button>
  </td>
</tr>
<?php } }else{ ?>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2">
  <center><h2>Data Not Found !!!</h2></center>
  </td>
</tr>
<?php } ?>