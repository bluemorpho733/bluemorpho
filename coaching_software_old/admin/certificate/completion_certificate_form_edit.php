<?php include("../attachment/session.php")?>
<script type="text/javascript">
      $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"certificate/completion_certificate_form_edit_api.php",
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
				   get_content('certificate/completion_certificate_list');
            }
			}
         });
      });
</script>   
    <section class="content-header">
      <h1>
          <?php echo $language['Certificate Management']; ?>
		<small><?php echo $language['Control Panel']; ?></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:get_content('certificate/certificate')"><i class="fa fa-certificate"></i> Certificate</a></li>
        <li><a href="javascript:get_content('certificate/completion_certificate_list')"><?php echo $language['Cc List']; ?></a></li>
        <li class="active">Completion Certificate Edit</li>
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
              <h3 class="box-title">Completion Certificate Edit</h3>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Registration form--------------------------------------------------->
		
			<?php
			$s_no=$_GET['id'];

			
			$qry="select * from completion_certificate where s_no='$s_no' and student_completion_status='Active'";
			$run=mysqli_query($conn37,$qry);
			$serial_no=0;
			while($row22=mysqli_fetch_assoc($run)){
			$s_no=$row22['s_no'];
			$completion_student_name = $row22['completion_student_name'];
			$completion_student_father_name = $row22['completion_student_father_name'];
			$completion_coaching_name = $row22['completion_coaching_name'];
			$completion_current_year_from = $row22['completion_current_year_from'];
			$completion_current_year_to = $row22['completion_current_year_to'];
			$completion_type = $row22['completion_type'];
			$completion_issue_date1=$row22['completion_issue_date'];
			$completion_issue_date2=explode("-",$completion_issue_date1);
			$completion_issue_date=$completion_issue_date2[2]."-".$completion_issue_date2[1]."-".$completion_issue_date2[0];
			$completion_student_roll_no = $row22['completion_student_roll_no'];
	        }
			?>	
		
            <div class="box-body">
			
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
			 <input type="hidden"  name="s_no"  value="<?php echo $s_no; ?>" >
			
			          <div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Student Name']; ?></label>
						  <input type="text"  name="completion_student_name"  value="<?php echo $completion_student_name; ?>" placeholder="Student Name"   id="student_name" class="form-control" readonly>
					    </div>
					  </div>
					  
					  <div class="col-md-3 ">
						<div class="form-group">
						  <label><?php echo $language['Father Name']; ?></label>
						  <input type="text"  name="completion_student_name"  value="<?php echo $completion_student_father_name; ?>" placeholder="Student Name"   id="student_name" class="form-control" readonly>
					    </div>
					  </div>
			
					<div class="col-md-3">	
					  <div class="form-group" >
						<label><?php echo $language['Student Roll No']; ?></label>
						<input type="text" name="completion_student_roll_no"  value="<?php echo $completion_student_roll_no; ?>" placeholder="student Roll No."  id="school_roll_no" class="form-control" readonly>
					  </div>
				    </div>
					  
					<div class="col-md-3">	
					      <div class="form-group">
						  <label>Coaching Name</label>
						  <input type="text" name="completion_coaching_name"  value="<?php echo $completion_coaching_name; ?>" placeholder="Coaching Name"  id="school_roll_no" class="form-control">					      </div>
				    </div>
				    <div class="col-md-3">
					    <div class="form-group">
						<label><?php echo $language['During Year']; ?></label>
						<div class="col-sm-12">
						  <div class="col-sm-6">
							<input type="text" name="completion_current_year_from"  class="form-control" placeholder="From" value="<?php echo $completion_current_year_from; ?>"  />
						  </div>
						  <div class="col-sm-6">
						    <input type="text" class="form-control" name="completion_current_year_to" placeholder="To" value="<?php echo $completion_current_year_to; ?>" /><br/>
                          </div>
						</div>
						</div>
				    </div>
					<div class="col-md-3">	
						<div class="form-group">
						  <label>Completion Type</label>
						  <input type="text"  name="completion_type" placeholder="Completion Type" value="<?php echo $completion_type; ?>" class="form-control">
						</div>
					</div>
				 
					  <div class="col-md-3">	
						<div class="form-group">
						 <label><?php echo $language['Issued Date']; ?></label>
						  <input type="date"  name="completion_issue_date" id="" placeholder="Organized Date" value="<?php echo $completion_issue_date; ?>" class="form-control">
						</div>
					  </div>
				 
					  <div class="col-md-12">
					   <br/><center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn  my_background_color" /></center><br/>
					  </div>
				
				
		</form>	
		<div class="col-md-12">
		        
		  </div>
	</div>
<!---------------------------------------------End Registration form--------------------------------------------------------->
		  <!-- /.box-body -->
          </div>
    </div>
</section>

  