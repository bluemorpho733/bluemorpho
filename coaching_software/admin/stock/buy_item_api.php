<?php include("../attachment/session.php");

	$item_product_name = $_POST['item_product_name'];
	$item_quantity = $_POST['item_quantity'];
	$item_purchase_rate = $_POST['item_purchase_rate'];
	$total_purchase_amount = $_POST['total_purchase_amount'];
	$shop_name = $_POST['shop_name'];
	$contact_person_name = $_POST['contact_person_name'];

$quer="insert into stock_buy_table_1(item_product_name,item_quantity,item_purchase_rate,total_purchase_amount,shop_name,contact_person_name,total_stock,purchase_status)
	values('$item_product_name','$item_quantity','$item_purchase_rate','$total_purchase_amount','$shop_name','$contact_person_name','$item_quantity','Active')";
 
if(mysqli_query($conn37,$quer)){
echo "|?|success|?|";
}
?>