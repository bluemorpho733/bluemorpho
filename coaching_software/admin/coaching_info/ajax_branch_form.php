 <?php include("../attachment/session.php");
 
$data=$_GET['data'];
 
$que="select * from login";
$run=mysqli_query($conn37,$que) or die(mysqli_error($conn37));
while($row=mysqli_fetch_assoc($run)){
$branch_code = $row['branch_code'];
}

if($data=='A'){
?>               
				
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Name<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_branch_name"   placeholder="Branch Name"  value="" class="form-control" maxlength="40" required>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Code<font style="color:red"><b>*</b></font></label>
						   <input type="text"  name="coaching_info_branch_code"   placeholder="Branch Code"  value="<?php echo $branch_code; ?>" class="form-control" maxlength="40" readonly>
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch City</label>
						   <input type="text"  name="coaching_info_branch_city"   placeholder="Branch City"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Address</label>
						   <input type="text"  name="coaching_info_branch_address"   placeholder="Branch Address"  value="" class="form-control" maxlength="70" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Contact No.</label>
						   <input type="text"  name="coaching_info_branch_contact_number"   placeholder="Branch Contact No."  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-4 ">
						<div class="form-group">
						  <label>Branch Head</label>
						   <input type="text"  name="coaching_info_branch_head"   placeholder="Branch Head"  value="" class="form-control" maxlength="40" >
						</div>
				</div>
				<div class="col-md-12">
				  <center><input type="submit" name="submit" value="<?php echo $language['Submit']; ?>" class="btn btn-primary" /></center>
				</div>
<?php }else{ }?>	
			