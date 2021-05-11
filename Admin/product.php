<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php var_dump($_SESSION); ?>
<?php
if (isset($_POST['Submit']))
	{
		$Product_Stocks = $_POST["Product_Stocks"];
		$Product_Name = $_POST["Product_Name"];
		$Product_Code = $_POST["Product_Code"];
		$Product_Category = $_POST["Product_Category"];
        $Amount = $_POST["Amount"];

		$sqlvar ="INSERT INTO product_tbl(Product_Stocks,Product_Name,Product_Code,Product_Category) VALUES

			('{$Product_Stocks}','{$Product_Name}','{$Product_Code}','{$Product_Category}')";

		var_dump($connection->query($sqlvar));
		var_dump($sqlvar);
		
	}	
?>
<body>

	<form action="product.php" method="POST">
        <label for="Product_Stocks">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks">

        <label for="Product_Name">Product Name: </label>
		<input type="Text"	name="Product_Name">

        <label for="Product_Code">Product Code: </label>
		<input type="Text"	name="Product_Code">

        <label for="Product_Category">Product Category: </label>
		<input type="Text"	name="Product_Category">

        <label for="Size_Description">Size: </label>
        <input type="Text" name="Size_Description">

        <label for="Amount">Amount: </label>
        <input type="text" name="Amount">

        <label for="Addons_Name">Addons </label>
        <input type="text" name="Addons_Name">

        <label for="Addons_Price"> Addon's Price</label>
        <input type="Text" name="Addons_Price">

        <label for="Addons_Stocks"> Addon's Stocks</label>
        <input type="Text" name="Addons_Stocks">

		<input type="Submit"	name="Submit">
	</form>


</body>
<?php include "includes/footer.php" ?>