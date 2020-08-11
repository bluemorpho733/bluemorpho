<?php include("../attachment/session.php"); ?>
<script>
 function purchase_calculation(){
   var quantity=document.getElementById("item_quantity").value;
   var rate=document.getElementById("item_purchase_rate").value;
   
	if(quantity>0 && rate>0){
	var total=parseFloat(quantity)*parseFloat(rate);
	document.getElementById("total_purchase_amount").value=total;
	}else{
	document.getElementById("total_purchase_amount").value='0';
	}
 }
 			 $("#my_form").submit(function(e){
        e.preventDefault();

    var formdata = new FormData(this);
window.scrollTo(0, 0);
    get_content(loader_div);
        $.ajax({
            url: access_link+"stock/buy_item_api.php",
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
				   get_content('stock/purchase_list');
            }
			}
         });
      });
</script>

    <section class="content-header">
      <h1>
        <?php echo $language['Stock Management'];?>
        <small><?php echo $language['Control Panel'];?></small>
      </h1>
      <ol class="breadcrumb">
             <li><a href="javascript:get_content('index_content')"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:get_content('stock/stock')"><i class="fa fa-money"></i> <?php echo $language['Stock Management']; ?></a></li>
        <li class="active"><?php echo $language['Purchase Item'];?></li>
        </ol>
    </section>

	
	
	<!---**************************************************************************************************************************************************************************************************************************************************-->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	       <!-- general form elements disabled -->
          <div class="box box-primary my_border_top">
            <div class="box-header with-border ">
              <h1 class="box-title"><b><?php echo $language['Purchase Item'];?></b></h1>
            </div>
            <!-- /.box-header -->
<!------------------------------------------------Start Personal Detail------------------------------------->
			
            <div class="box-body "  >
			<form role="form" method="post" enctype="multipart/form-data" id="my_form">
			
			<?php
			$s_no=$_GET['id'];
			
			$que3="select * from stock_item_table where s_no='$s_no'";
			$run3=mysqli_query($conn37,$que3) or die(mysqli_error($conn37));
			while($row3=mysqli_fetch_assoc($run3)){
			$item_product_name=$row3['item_product_name'];
			}
			?>
			
			<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Product Name'];?></label>
					  <input type="text"  name="item_product_name" value="<?php echo $item_product_name; ?>" readonly class="form-control">
					</div>
			</div>
		
			<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Quantity'];?> <font style="color:red"><b>*</b></font></label>
					  <input type="text"  name="item_quantity" placeholder="0" oninput="purchase_calculation();" id="item_quantity";  value="" class="form-control" required>
					</div>
			</div>  
				
			<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Rate'];?> <font style="color:red"><b>*</b></font></label>
					  <input type="text"  name="item_purchase_rate" placeholder="0.00" oninput="purchase_calculation();" id="item_purchase_rate" value="" class="form-control" required>
					</div>
			</div>
				
			<div class="col-md-3 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Total Amount'];?> <font style="color:red"><b>*</b></font></label>
					  <input type="text"  name="total_purchase_amount" placeholder="0.00" id="total_purchase_amount"; value="" class="form-control" readonly>
					</div>
			</div>
			
			<div class="col-md-6 ">				
					<div class="form-group" >
					  <label ><?php echo $language['Shop Name'];?> <font style="color:red"><b>*</b></font></label>
					  <input type="text"  name="shop_name" placeholder="<?php echo $language['Shop Name'];?>" id="shop_name";  value="" class="form-control" required>
					</div>
			</div>  
			
			<div class="col-md-6">				
					<div class="form-group" >
					  <label ><?php echo $language['Contact Person Name'];?> <font style="color:red"><b>*</b></font></label>
					  <input type="text"  name="contact_person_name" placeholder="<?php echo $language['Contact Person Name'];?>" id="contact_person_name";  value="" class="form-control" required>
					</div>
			</div>  
			
		<br><br><br><br><br><br>
		<div class="col-md-12">
		        <center><input type="submit" name="finish" value="<?php echo $language['Submit'];?>" class="btn  my_background_color" /></center>
		</div>	
			
	</form>	

          
		  </div>
    </div>
</section>
