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
		$Product_Details = $_POST["Product_Details"];
		$Size_Regular = $_POST["Regular"];
		$Size_Large = $_POST["Large"];
		$Size_Extra = $_POST["ExtraLarge"];
        //$Amount = $_POST["Amount"];


		$target_dir = "../FINAL/src/"; //for picture uploading
		$Product_Picture = $target_dir . str_replace(" ","",basename($_FILES["Product_Picture"]["name"])) ;//to replace spaces specific character in string 
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($Product_Picture,PATHINFO_EXTENSION));

		$check = getimagesize($_FILES["Product_Picture"]["tmp_name"]);

		if (file_exists($Product_Picture)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		else
		{
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			move_uploaded_file($_FILES["Product_Picture"]["tmp_name"], $Product_Picture);

			$sqlvar ="INSERT INTO product_tbl(Product_Stocks,Product_Name,Product_Code,Product_Category,Product_Details,Product_Picture) VALUES
			('{$Product_Stocks}','{$Product_Name}','{$Product_Code}','{$Product_Category}','{$Product_Details}','{$Product_Picture}')";

			
			if ($connection->query($sqlvar) === TRUE) {
				$last_id = $connection->insert_id;
				
				$insertRegular = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Regular}','REGULAR')";

				
				$insertLarge = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Large}','LARGE')";

				
				$insertExtra = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Extra}','Extra Large')";

				$connection->query($insertRegular);
				$connection->query($insertLarge);
				$connection->query($insertExtra);

			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			
		}
	}	
?>
<body>
	<style>
		table,td{padding :15px;
		}
		</style>

	<table>
	
	<form action="product.php" method="POST" enctype="multipart/form-data">
<tr>
      
		<td><label for="Product_Stocks" style= "color:black">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks"></td>
</tr>
<tr>
		
       <td> <label for="Product_Name" style= "color:black">Product Name: </label>
		<input type="Text"	name="Product_Name"></td>
</tr>
<tr>
		<td><label for="Product_Code" style= "color:black">Product Code: </label>
		<input type="Text"	name="Product_Code"></td>
</tr>
<tr>
		<td><label for="Product_Category" style= "color:black">Product Category: </label>
		<input type="Text"	name="Product_Category"></td>
</tr>
<tr>
		<td><label for="Product_Details" style= "color:black">Product Details: </label>
		<Input type="Text" name="Product_Details"></td>

</tr>
		<td><label for="Size_Description" style= "color:black">Price for Regular: </label>
		<input type="Text"	name="Regular"></td>
</tr>
<tr>
		<td><label for="Size_Description" style= "color:black">Price for Large: </label>
		<input type="Text"	name="Large"></td>
</tr>
<tr>
		<td><label for="Size_Description" style= "color:black">Product Extra-Large: </label>
		<Input type="Text" name="ExtraLarge"></td>
</tr>

<tr>
		<td> <label for="Product_Picture" style= "color:black">Product Picture source: </label>
		<input type="file" name="Product_Picture" id="fileToUpload" style= "color:black"> </td>
</tr>
<tr>	
		<td><input type="Submit" name="Submit"></td>
</tr>		
	</form>
</table>


</body>
<?php include "includes/footer.php" ?>