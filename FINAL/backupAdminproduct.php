<?php

$server = "localhost"; // connect to sql
$username = "root";
$password ="";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);// connection
if (isset($_POST['Submit']))
	{
		$Product_Stocks = $_POST["Product_Stocks"];
		$Product_Name = $_POST["Product_Name"];
		$Product_Code = $_POST["Product_Code"];
		$Product_Category = $_POST["Product_Category"];

		$sqlvar ="INSERT INTO product_tbl(Product_Stocks,Product_Name,Product_Code,Product_Category) VALUES

			('{$Product_Stocks}','{$Product_Name}','{$Product_Code}','{$Product_Category}')";

		var_dump($connection->query($sqlvar));
		var_dump($sqlvar);
		
	}	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Adminproduct.php" method="POST">
        <label for="Product_Stocks">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks">

        <label for="Product_Name">Product Name: </label>
		<input type="Text"	name="Product_Name">

        <label for="Product_Code">Product Code: </label>
		<input type="Text"	name="Product_Code">

        <label for="Product_Category">Product Category: </label>
		<input type="Text"	name="Product_Category">

		<input type="Submit"	name="Submit">
	</form>
</body>
</html>
