<?php include("../attachment/session.php");

	$item_product_name = $_POST['item_product_name'];
	$item_brand_name = $_POST['item_brand_name'];
	$item_description = $_POST['item_description'];
	
echo $quer="insert into stock_item_table(item_product_name,item_brand_name,item_description,item_status)values('$item_product_name','$item_brand_name','$item_description','Active')";

if(mysqli_query($conn37,$quer)){
echo "|?|success|?|";
}
?>