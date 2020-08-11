<?php include("../attachment/session.php"); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php echo $language['Fees Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
	  <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> <?php echo $language['Home']; ?></a></li>
	  <li><a href="javascript:get_content('fees_installmentwise/fees')"><i class="fa fa-money"></i> <?php echo $language['Fees']; ?></a></li>
	  <li class="active"> <?php echo $language['Student Fee List']; ?></li>
      </ol>
    </section>

<script>
function reset_fee1(student_roll_no){
var myval=confirm("Are You Sure You Want to Reset Fee of This Student !!!");
if(myval==true){
reset_fee(student_roll_no);
}
}

function set_fee1(student_roll_no){
var myval=confirm("Are You Want to set Fee of This Student ?");
if(myval==true){
reset_fee(student_roll_no);
}
}

function reset_fee(student_roll_no){
post_content('fees_installmentwise/set_fees','student_roll_no='+student_roll_no);   
}
</script>

<script>
function valid(student_roll_no){   
var myval=confirm("Are you sure want to delete this record !!!!");
if(myval==true){
delete2(student_roll_no);       
}            
else  {      
return false;
}       
} 
function delete2(student_roll_no){
$("#get_content").html(loader_div);
$.ajax({
type: "POST",
url: access_link+"fees_installmentwise/set_fee_delete.php?student_roll_no="+student_roll_no+"",
cache: false,
success: function(detail){
var res=detail.split("|?|");
if(res[1]=='success'){
alert('Successfully Deleted');
get_content('fees_installmentwise/student_admission_fee_list');
}else{
alert(detail); 
}
}
});
}

</script>

	<!---******************************************************************************************************-->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
            <h3 class="box-title"><?php echo $language['Student Fee']; ?></h3>
			
            </div>
 <div class="box-body ">
	<div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                <div class="box-header"></div>
			
		<div class="box-body table-responsive" id="search_list">
				  <table id="example1" class="table table-bordered table-striped">
						<thead class="my_background_color">
								<tr>
								  <th>#</th>
								  <th><?php echo $language['Student Name']; ?></th>
								  <th>Course</th>
								  <th>Subject</th>
								  <th><?php echo $language['Student Roll No']; ?></th>
                                  <th>Date</th>
								  <th>Fee Status</th>
								  <th>Fee Detail</th>
								  <th>Reset Fee</th>
								  <th>Delete Fee</th>
								</tr>
						</thead>
					<tbody >
					
						<?php
						$que="select * from student_admission_info where student_status='Active' and session_value='$session1'  ORDER BY s_no DESC";
						$run=mysqli_query($conn37,$que);
						$serial_no=0;
						while($row=mysqli_fetch_assoc($run)){
						$s_no=$row['s_no'];
						$course_code=$row['course_code'];
						$my_subject_name=$row['my_subject_name'];
						$student_name=$row['student_name'];
						$student_father_name=$row['student_father_name'];
						$student_date_of_birth=$row['student_date_of_birth'];
						$student_roll_no=$row['student_roll_no'];
						$coaching_roll_no=$row['coaching_roll_no'];
						$student_date_of_admission=$row['student_date_of_admission'];
						$student_admission_number=$row['student_admission_number'];
						
					    $student_fee_status="<center><b style='color:red;'>NOT SET</b></center>";
						$style="disabled";
						$set_reset='Set Fee';
						$on_click='set_fee1';
						$last_updated_date=date('d-m-Y');
						
						$que22="select * from student_fee_structure where student_roll_no='$student_roll_no'";
						$run22=mysqli_query($conn37,$que22);
						while($row22=mysqli_fetch_assoc($run22)){
						$update_change=$row22['update_change'];
                        if($row22['last_updated_date']=='0000-00-00'){
                        $last_updated_date=date('d-m-Y');
                        }else{
						$last_updated_date = date("d-m-Y", strtotime($row22['last_updated_date']));
                        }
						
						if($row22['fee_status']=='Active'){
						$student_fee_status="<center><b style='color:green;'>SET</b></center>";
						$style="";
						$set_reset='Reset Fee';
						$on_click='reset_fee1';
						}elseif($row22['fee_status']=='Deleted'){
						$student_fee_status="<center><b style='color:Blue;'>DELETED</b></center>";
						$style="disabled";
						$set_reset='Reset Fee';
						$on_click='reset_fee1';
						}else{
						$student_fee_status="<center><b style='color:red;'>NOT SET</b></center>";
						$style="disabled";
						$set_reset='Set Fee';
						}
						}
						
						
						$que2="select * from coaching_courses where coaching_info_courses_code='$course_code'";
						$run2=mysqli_query($conn37,$que2);
						while($row2=mysqli_fetch_assoc($run2)){
						$coaching_info_courses_name=$row2['coaching_info_courses_name'];
						}
						
						$subject_code_array=explode(',', $my_subject_name);
						
						for($a=0;$a<count($subject_code_array);$a++){
						$que3="select * from coaching_subject where subject_code='$subject_code_array[$a]' ";
						$run3=mysqli_query($conn37,$que3);
						while($row3=mysqli_fetch_assoc($run3)){
						$subject_name[$a]=$row3['subject_name'];
						}
						}
						
						$serial_no++;
						?>
						<tr>
						  <td><?php echo $serial_no; ?></td>
						  <td><?php echo $student_name; ?></td>
						  <td><?php echo $coaching_info_courses_name; ?></td>
						  <td><?php for($a=0;$a<count($subject_code_array);$a++){ echo '['.$subject_name[$a].'] '; }?></td>
						  <td><?php echo $coaching_roll_no; ?></td>
                          <td><?php echo $last_updated_date; ?></td>
						  <td><?php echo $student_fee_status; ?></td>
						  <td><button type="button"  onclick="post_content('fees_installmentwise/set_fees_student','<?php echo 'student_roll_no='.$student_roll_no; ?>')" class="btn btn-default my_background_color" <?php echo $style; ?> >Fee Detail</button></td>
						  <td><button type="button"  value="Reset Fee" onclick="<?php echo $on_click; ?>('<?php echo $student_roll_no; ?>');" class="btn  my_background_color" ><?php echo $set_reset; ?></button></td>
						  <td><button type="button" onclick="return valid('<?php echo $student_roll_no; ?>');" class="btn btn-default my_background_color" <?php echo $style; ?>>Delete Fee</button></td>
						</tr>
						<?php }  ?>
					</tbody>
				 </table>
			</div>
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script>
$(function () {
$('#example1').DataTable()
})

</script>