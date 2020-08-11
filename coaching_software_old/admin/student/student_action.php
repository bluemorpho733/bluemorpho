<?php include("../attachment/session.php")?>
<script type="text/javascript">
   function fill_detail(value){
           $("#student_name").val('Loading....'); 
		  $("#student_class").val('Loading....'); 
            $("#student_section").val('Loading....');  
                $("#school_roll_no").val('Loading....'); 
			$.ajax({
			  address: "POST",
              url: access_link+"student/ajax_search_student_box.php?id="+value+"",
              cache: false,
              success: function(detail){
			  //alert(detail);
                 var str =detail;
		  var res = str.split("|?|");
		 $("#student_roll_no").val(value); 
		 $("#student_roll_no1").val(value); 
		 $("#student_roll_no2").val(value); 
		 $("#student_roll_no5").val(value); 
		 $("#student_roll_no6").val(value); 
		  $("#student_name").val(res[0]); 
		  $("#student_name1").val(res[0]); 
		  $("#student_class").val(res[1]); 
		  $("#student_class2").val(res[1]); 
            $("#student_section").val(res[2]);  
                $("#school_roll_no").val(res[3]); 
$("#pay_fee1").prop('disabled', false);
$("#fee_detail").prop('disabled', false);
$("#tc_generate").prop('disabled', false);
$("#penalty").prop('disabled', false);
$("#assign_rfid").prop('disabled', false);
$("#attendance").prop('disabled', false);
$("#marksheet").prop('disabled', false);
$("#exam_wise_marksheet").prop('disabled', false);
$("#id_card_generate").prop('disabled', false);	
$("#student_edit1").prop('disabled', false);				
$("#student").prop('disabled', false);				
$("#parent").prop('disabled', false);				


        for_exam();
      
              }
           });

    }
	 function set_id_card(value1){
	   document.getElementById("id_card_design").value =value1;
	    student_id_card_function();  
        
	   }
	   	   function for_exam(){

         	var student_class= document.getElementById('student_class').value;
       $.ajax({
			  type: "POST",
              url: access_link+"student/ajax_get_exam_type.php?class_name="+student_class+"",
              cache: false,
              success: function($detail){

                   var str =$detail;                
                  $("#exam_type23").html(str);

              }
           });

    }
	function get_identity(id){
$('#student_parent').val(id);
if(id=='student'){
$('#gallery').hide();
$('#parent_gallery').hide();
$('#upload_photo').hide();
$('#dropdown_select').val('');
$('#img_list').hide();
$('#camera').hide();
$('#save_image').hide();
$('#take_snapshots').hide();
$('#retake').hide();
}else if(id=='parent'){
$('#gallery').hide();
$('#parent_gallery').hide();
$('#upload_photo').hide();
$('#dropdown_select').val('');
$('#img_list').hide();
$('#camera').hide();
$('#save_image').hide();
$('#take_snapshots').hide();
$('#retake').hide();
}
}
 $("#my_form1").submit(function(e){
        e.preventDefault();
$("#modal_close_button").click();
    var formdata = new FormData(this);
        $.ajax({
            url: access_link+"student/student_action_assign_rfid_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
			
               var res=detail.split("|?|");
			   if(res[2]=='view'){
				   alert('Successfully Complete');
				   get_content('student/student_action');
            }else{
			  alert('Invalid Card No');
				   get_content('student/student_action');
			}
			}
         });
      });
	  
	  function pay_fee(foldername){
	  	var student_roll_no= document.getElementById('student_roll_no').value;
		var content1='student_roll_no='+student_roll_no;
		post_content(foldername+'/student_fee_add_form',content1);
	  }	 
	  function fee_detail1(foldername){

	  	var student_roll_no= document.getElementById('student_roll_no').value;
		var content1='student_roll_no='+student_roll_no;
		post_content(foldername+'/student_fee_list_particular',content1);
	  }		  
	  
	  function tc_generate1(){

	  	var student_roll_no= document.getElementById('student_roll_no').value;
		var content1='student_roll_no1='+student_roll_no;
		post_content('certificate/tc_form_cbse',content1);
	  }	  function pay_penalty(){

	  	var student_roll_no= document.getElementById('student_roll_no').value;
		var content1='student_roll_no1='+student_roll_no;
		post_content('penalty/penalty_action',content1);
	  }	  function student_edit_function(){
	
	  	var student_roll_no= document.getElementById('student_roll_no').value;
		var content1='student_roll_no='+student_roll_no;
		post_content('student/student_admission',content1);
	  }	
	  function student_attendance_function(){
	
	  	var student_roll_no= document.getElementById('student_roll_no').value;
	  	var student_class= document.getElementById('student_class').value;
	  	var section= document.getElementById('student_section').value;
	  	var name= document.getElementById('student_name').value;
	  	var current_month= document.getElementById('current_month').value;
	  	var year= document.getElementById('year').value;
		var content1='id='+student_roll_no+'&class='+student_class+'&section='+section+'&current_month='+current_month+'&year='+year+'&name='+name;
		post_content('attendance/student_attendance_view',content1);
	  }	  
	  	  function student_attendance_function(){
	
	  	var student_roll_no= document.getElementById('student_roll_no').value;
	  	var student_class= document.getElementById('student_class').value;
	  	var section= document.getElementById('student_section').value;
	  	var name= document.getElementById('student_name').value;
	  	var current_month= document.getElementById('current_month').value;
	  	var year= document.getElementById('year').value;
		var content1='id='+student_roll_no+'&class='+student_class+'&section='+section+'&current_month='+current_month+'&year='+year+'&name='+name;
		post_content('attendance/student_attendance_view',content1);
	  }	  
	  	  function student_marksheet_function(){
		var marksheet_final_pdf= document.getElementById('marksheet_final_pdf').value;
	  	var pdf_path= document.getElementById('pdf_path').value;
	  	var student_roll_no= document.getElementById('student_roll_no').value;
	  	var student_class= document.getElementById('student_class').value;
window.open(pdf_path+"marksheet_page/"+marksheet_final_pdf+"?roll_no="+student_roll_no+"&class="+student_class,'_blank');
	  }	 	  	
	  function student_examwise_marksheet_function(){
		  	var marksheet_exam_wise_pdf= document.getElementById('marksheet_exam_wise_pdf').value;
	  	var pdf_path= document.getElementById('pdf_path').value;
	  	var student_roll_no= document.getElementById('student_roll_no').value;
	  	var student_class= document.getElementById('student_class').value;
	  	var exam_type= document.getElementById('exam_type23').value;
   window.open(pdf_path+"marksheet_page/"+marksheet_exam_wise_pdf+"?roll_no="+student_roll_no+"&class="+student_class+"&exam_type="+exam_type,'_blank');
	  }	  

	   function student_id_card_function(){
	  	var id_card_design= document.getElementById('id_card_student_pdf').value;
	  	var pdf_path= document.getElementById('pdf_path').value;
	  	var student_roll_no= document.getElementById('student_roll_no').value;
   window.open(pdf_path+"id_card_page/"+id_card_design+"?school_id_card_info="+student_roll_no,'_blank');
	  }	  
	  
</script> 

<?php
		$qry="select * from school_info_general";
		$rest=mysqli_query($conn37,$qry);
		while($row22=mysqli_fetch_assoc($rest)){
		$fees_type=$row22['fees_type'];
		}
		if($fees_type=='installmentwise' || $fees_type=='monthly' || $fees_type=='yearly'){
			$folder_name='fees_'.$fees_type;
		}else{
			$folder_name='fees';
		}
		?>

    <section class="content-header">
      <h1>
         <?php echo $language['Student Management']; ?>
        <small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
 <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
	  <li class="active"><?php echo $language['One Click']; ?></li>
      </ol>
    </section>
	

	
	
	<!---*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h3 class="box-title"><?php echo $language['Student Action']; ?></h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			<?php
											$que="select * from school_info_pdf_info";
$run=mysqli_query($conn37,$que);
while($row=mysqli_fetch_assoc($run)){
	$id_card_student_pdf = $row['id_card_student_pdf'];
	$marksheet_final_pdf = $row['marksheet_final_pdf'];
	$marksheet_exam_wise_pdf = $row['marksheet_exam_wise_pdf'];
}
			?>
            <div class="box-body">
	
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
			<input type="hidden"  id="current_month" value="<?php echo date('m'); ?>" >
			<input type="hidden"  id="pdf_path" value="<?php echo $pdf_path; ?>" >
			<input type="hidden"  id="id_card_student_pdf" value="<?php echo $id_card_student_pdf; ?>" >
			<input type="hidden"  id="marksheet_final_pdf" value="<?php echo $marksheet_final_pdf; ?>" >
			<input type="hidden"  id="marksheet_exam_wise_pdf" value="<?php echo $marksheet_exam_wise_pdf; ?>" >
			<input type="hidden"  id="year" value="<?php echo date('Y'); ?>" >
			<div class="col-md-12">
			<div class="col-md-6 ">				
					<div class="form-group" >
					  <label><?php echo $language['Search Student']; ?><font size="2" style="font-weight: normal;"></label>
					  <select name="" class="form-control select2" onchange="fill_detail(this.value);" id="student_roll_no" required>
					  <option value=""><?php echo $language['Select student']; ?></option>
					        <?php
							$qry="select * from student_admission_info where student_status='Active' and session_value='$session1' ";
							$rest=mysqli_query($conn37,$qry);
							while($row22=mysqli_fetch_assoc($rest)){
							$student_roll_no=$row22['student_roll_no'];
							$school_roll_no=$row22['school_roll_no'];
							$student_name=$row22['student_name'];
							$student_class=$row22['student_class'];
							$student_section=$row22['student_class_section'];
							$student_father_name=$row22['student_father_name'];
							$student_father_contact_number=$row22['student_father_contact_number'];
							$student_admission_number=$row22['student_admission_number'];
							?>
							<option value="<?php echo $student_roll_no; ?>"><?php echo $student_name."[".$student_admission_number."]-[".$school_roll_no."]-[".$student_class."-".$student_section."]-[".$student_father_name."-".$student_father_contact_number."]"; ?></option>
							<?php
							}
							?>
					  </select>
					</div>
			</div>
			</div>
			
			
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Student Name']; ?></label>
						   <input type="text"  name="student_name" placeholder="<?php echo $language['Student Name']; ?>"  id="student_name" class="form-control" readonly>
						
						</div>
							</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Class']; ?></label>
						   <input type="text"  name="student_class" placeholder="<?php echo $language['Class']; ?>"  id="student_class" class="form-control" readonly>
						
						</div>
							</div>
				<div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Student Section']; ?></label>
						   <input type="text"  name="student_section" placeholder="<?php echo $language['Student Section']; ?>"  id="student_section" class="form-control" readonly>
						  
						</div>
							</div>
							<div class="col-md-3 ">	
					<div class="form-group" >
					  <label><?php echo $language['Student Roll No']; ?></label>
					  <input type="hidden"  name="student_roll_no" placeholder="<?php echo $language['Student Roll No']; ?>"  id="student_roll_no" class="form-control" readonly>
					  <input type="text"   placeholder="<?php echo $language['Student Roll No']; ?>"  id="school_roll_no" class="form-control" readonly>
					</div>
				  </div>
				  
			<div class="col-md-12">
				  <div class="col-md-3">
				  <button type="button" onclick="pay_fee('<?php echo $folder_name; ?>');"  id="pay_fee1" class="btn btn-default my_background_color form-control"  disabled><?php echo $language['Pay Fees']; ?></button>
				  </div>
				  <div class="col-md-3">
				  <button type="button" id="fee_detail" onclick="fee_detail1('<?php echo $folder_name; ?>');" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Fees Details']; ?></button>
				  </div>
				  <div class="col-md-2" style="display:none">
				  <button type="button" onclick="tc_generate1()"  id="tc_generate" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Tc Generate']; ?></button>
				  </div>
				  <div class="col-md-3">
				  <button type="button" onclick="pay_penalty()" name="Penalty" id="penalty" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Penalty']; ?></button>
				  </div>
				 <div class="col-md-3">
				  <button  type="button" onclick="student_edit_function()"   id="student_edit1" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Student Edit']; ?></button>
				  </div>
			      </div>
				<div class="col-md-12">
				      <div class="col-md-3">
				  <button type="button" id="assign_rfid" class="btn btn-default my_background_color form-control"  data-toggle="modal" data-target="#modal-default" title="select student" disabled>
                            <?php echo $language['Assign Rfid Card']; ?></button>
				  </div>
				 
				  <div class="col-md-3">
				  <button type="button"  onclick="student_attendance_function();" id="attendance" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Attendance']; ?></button>
				  </div>
				  <div class="col-md-3" style="display:none">
				  <button type="submit" onclick="student_marksheet_function();" id="marksheet" class="btn btn-default my_background_color form-control" title="select student" disabled><?php echo $language['Full MarkSheet']; ?></button>
				  </div>	

				  
				  <div class="col-md-2" style="display:none">
				  <button type="button" onclick="for_exam();" id="exam_wise_marksheet"  class="btn btn-default my_background_color form-control"  data-toggle="modal" data-target="#modal-default1" title="select student" disabled>
                            <?php echo $language['Exam Wise Marksheet']; ?></button>
				  </div>
				  <div class="col-md-3" >
				    <button type="button"  onclick="student_id_card_function();" id="id_card_generate" class="btn btn-default my_background_color form-control"  title="select student" disabled>
                            <?php echo $language['Id Card Generate']; ?></button>
			       </div> 
				
		</form>	
		<div class="col-md-12">		        
		</div>
	
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>

    
  </div>

			         		<form role="form"  method="post" enctype="multipart/form-data" id="my_form1">
	                         <div class="modal fade" id="modal-default">
							 <div class="modal-dialog">
							 <div class="modal-content">
							 <div class="modal-header my_background_color">
							 <button type="button" class="close" data-dismiss="modal" id="modal_close_button" aria-label="Close">
							 <span aria-hidden="true">&times;</span></button>
							 <center><h4 class="modal-title"><b><?php echo $language['ADD RFID CARD NO']; ?></b></h4></center>
							 </div>
							 <div class="modal-body">
									 
						     <div class="form-group">
						     <label><?php echo $language['Student Name']; ?><font style="color:red"><b>*</b></font></label>
						     <input type="text" class="form-control" name="student_name1" id="student_name1"  readonly />
						     </div>
				
						
					         <div class="form-group">
					         <label><?php echo $language['Roll No']; ?></label>
					         <input type="text" class="form-control" name="student_roll_no1" id="student_roll_no1"  readonly>
							 </div>
					  		
							 <div class="form-group">
						     <label><?php echo $language['Add Rfid']; ?></label>
						     <input type="text" name="student_rf_id_number"  class="form-control"  />
						     </div>
					
					
										
							 </div>
							 <div class="modal-footer ">
							 <button type="button" class="btn btn-default pull-left my_background_color" data-dismiss="modal"><?php echo $language['Close']; ?></button>
							 <input type="submit" name="rf_id_card" value="<?php echo $language['Submit']; ?>" class="btn btn-primary my_background_color" >
							 </div>
							 </div>
							 </div>
							 </div>
					      </form>			
			              <!-- modal-box-end -->
						  <form role="form"  method="post" enctype="multipart/form-data">
	                         <div class="modal fade" id="modal-default1">
							 <div class="modal-dialog">
							 <div class="modal-content">
							 <div class="modal-header my_background_color">
							 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span></button>
							 <center><h4 class="modal-title"><b><?php echo $language['Choose Exam Type']; ?></b></h4></center>
							 </div>
							 <div class="modal-body">
									 
						     <div class="form-group">
						     <label><?php echo $language['Exam Type']; ?></label>
						     <select type="text" class="form-control" id='exam_type23' name="exam_type"   required />
					   
							 </select>
						     </div>
				             <input type="hidden" class="form-control" name="student_roll_no2" id="student_roll_no2">
				             <input type="hidden" class="form-control" name="student_class2" id="student_class2">				
							 </div>
							 <div class="modal-footer ">
							 <button type="button" class="btn btn-default pull-left my_background_color" data-dismiss="modal"><?php echo $language['Close']; ?></button>
							 <input type="button"onclick="student_examwise_marksheet_function();" value="<?php echo $language['Submit']; ?>" class="btn btn-primary my_background_color" >
							 </div>
							 </div>
							 </div>
							 </div>
					      </form>			
			          
	
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
