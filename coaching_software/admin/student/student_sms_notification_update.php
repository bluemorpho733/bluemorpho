<?php include("../attachment/session.php"); ?>
  <script type="text/javascript">
   function for_section(value){
 $('#student_class_section').html("<option value='' >Loading....</option>"); 
       $.ajax({
			  type: "POST",
              url: access_link+"student/ajax_class_section.php?class_name="+value+"",
              cache: false,
              success: function($detail){
                   var str =$detail;                
                 
                  $("#student_class_section").html(str);
				
				  
              }
           });

    }

function for_search11(){
var student_class=document.getElementById('student_class').value;
var student_class_section=document.getElementById('student_class_section').value;
if(student_class!='' || student_class_section!=''){
$('#for_student_list').html(loader_div);
$.ajax({
type: "POST",
url: access_link+"student/ajax_student_sms_notification_update.php?student_class="+student_class+"&student_class_section="+student_class_section+"",
success: function(detail){
$('#for_student_list').html(detail);
  }
});

}else{
$('#for_student_list').html('');
}
}

   function for_check(id){
   if($('#'+id).prop("checked") == true){
	$("."+id).each(function() {
	$(this).prop('checked',true);
	});
}else{
	$("."+id).each(function() {
	$(this).prop('checked',false);
	});
}
   }
   
   function validation(){
   var add=0;
   $(".checked1").each(function() {
	if($(this).prop("checked") == true){
	add=add+1;
	}
	});
    if(add>0){
	return true;
	}else{
	alert("Please Select Atleast One Student !!!");
	return false;
	}
   }
      	      $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
 window.scrollTo(0, 0);
     $("#get_content").html(loader_div);
        $.ajax({
            url: access_link+"student/student_sms_notification_update_api.php",
            type: "POST",
            data: formdata,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(detail){
			
               var res=detail.split("|?|");
			   if(res[1]=='success'){
				   alert('Successfully Complete');
				   get_content('student/student_sms_notification_update');
            }
			}
         });
      });
</script>

 <form role="form"  method="post" enctype="multipart/form-data" id="my_form">
    <section class="content-header">
      <h1>
        Student SMS/Notification Update
		<small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
      		<li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="javascript:get_content('student/students')"><i class="fa fa-graduation-cap"></i> <?php echo $language['Student']; ?></a></li>
        <li class="active">Student SMS/Notification Update</li>
      </ol>
    </section>
	<!---*****************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
			
            <div class="box-body">
			  <div class="box-body table-responsive">
              <div class="col-sm-12">&nbsp;</div>
              <div class="col-sm-12">
			  
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
			  <div class="container-fluid">
			  
			  <div class="panel panel-default">
			  <div class="panel-body">
			   
				<div class="col-sm-6">
				<label>Class</label>
				        <select name="student_class" onchange="for_section(this.value);for_search11();" id="student_class" class="form-control"><option value="">Select Class</option>
						    <?php 
                               $class37=$_SESSION['class_name37'];
                               $class371=explode('|?|',$class37);
                               $total_class=count($class371);
                               for($q=0;$q<$total_class;$q++){
                               $class_name=$class371[$q]; ?>
                               <option value="<?php echo $class_name; ?>"><?php echo $class_name; ?></option>
                            <?php } ?>
					    </select>
				</div>	
				<div class="col-sm-6">
				<label>Section</label>
				<select name="student_class_section" id="student_class_section" style="width:100%;" class="form-control" onchange="for_search11();">
				<option value="">Select Section</option>
				</select>
				</div>	
			  </div>
			  </div>
			  </div>
			  </div>
			  <div class="col-sm-2"></div>
  
  <div class="col-sm-12" id="for_student_list">
  
  </div>
  
        </div>
        <!-- /.col -->
      </div>
			
			</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
           </div>
     </div>
     </section>

  </form>	
