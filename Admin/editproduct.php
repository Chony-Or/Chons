<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php
if (isset($_GET['id']))
{
	$Id = $_GET['id'];
	$getProduct = "Select * from product_tbl where Is_Active and Product_ID = {$Id}";
	$Product = $connection->query($getProduct);
	$Product = $Product->fetch_all(MYSQLI_ASSOC);
	
}	

if (isset($_POST['Submit'])) 
{
	$Product_Stocks = $_POST["Product_Stocks"];
	$Product_Name = $_POST["Product_Name"];
	$Product_Code = $_POST["Product_Code"];
	$Product_Category = $_POST["Product_Category"];

	$sqlvar ="UPDATE product_tbl SET Product_Stocks = '{$Product_Stocks}',Product_Name ='{$Product_Name}',Product_Code ='{$Product_Code}',Product_Category ='{$Product_Category}' WHERE Product_ID = {$Id}";

	var_dump($connection->query($sqlvar));
	var_dump($sqlvar);

	$getProduct = "Select * from product_tbl where Is_Active and Product_ID = {$Id}";
	$Product = $connection->query($getProduct);
	$Product = $Product->fetch_all(MYSQLI_ASSOC);
}
?>
<body>

	<form action="<?php echo "editproduct.php?id={$Id}" ?>" method="POST">
        <label for="Product_Stocks">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks" value="<?php echo $Product[0]['Product_Stocks'] ?>">

        <label for="Product_Name">Product Name: </label>
		<input type="Text"	name="Product_Name" value="<?php echo $Product[0]['Product_Name'] ?>">

        <label for="Product_Code">Product Code: </label>
		<input type="Text"	name="Product_Code" value="<?php echo $Product[0]['Product_Code'] ?>">

        <label for="Product_Category">Product Category: </label>
		<input type="Text"	name="Product_Category" value="<?php echo $Product[0]['Product_Category'] ?>">

		<input type="Submit"	name="Submit">
	</form>

</body>
<?php include "includes/footer.php" ?>