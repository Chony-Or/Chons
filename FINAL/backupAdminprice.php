<?php
$server = "localhost"; // connect to sql
$username = "root";
$password ="";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);// connection

$getproduct = "Select * from product_tbl"; // This line will display all the contents of the table
$product = $connection->query($getproduct);

//var_dump($product);
//var_dump($product->fetch_assoc());

if (isset($_POST['Submit']))
	{
		$Product_Price = $_POST["Product_Price"];
		$Product_ID = $_POST["Product_ID"];

		$sqlvar ="INSERT INTO price_tbl(Product_Price,Product_ID) VALUES

			('{$Product_Price}','{$Product_ID}')";

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
	<form action="Adminprice.php" method="POST">
        <label for="Product_Price">Product Price: </label> <!-- input for the price-->
		<input type="Text"	name="Product_Price">

        <select name="Product_ID"> <!-- this line is for the drop down box-->
        <?php while($row = $product->fetch_assoc()):?> <!-- get all values from a table --> 

          <option value="<?php echo $row['Product_ID']?>"><!-- This line will display the specific data in the drop downbox -->  
		   <?php echo $row['Product_Name']?> 
		   </option> 

        <?php endwhile; ?>
        </select>
		<input type="Submit"	name="Submit">
	</form>
</body>
</html>
