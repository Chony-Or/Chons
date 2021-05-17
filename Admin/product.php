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
        //$Amount = $_POST["Amount"];


		$target_dir = "../FINAL/src/";
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

			var_dump($connection->query($sqlvar));
			var_dump($sqlvar);

		}
	}	

?>
<body>

	<form action="product.php" method="POST" enctype="multipart/form-data">
        <label for="Product_Stocks">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks">

        <label for="Product_Name">Product Name: </label>
		<input type="Text"	name="Product_Name">

        <label for="Product_Code">Product Code: </label>
		<input type="Text"	name="Product_Code">

        <label for="Product_Category">Product Category: </label>
		<input type="Text"	name="Product_Category">

		<label for="Product_Details">Product Details: </label>
		<Input type="Text" name="Product_Details">

		<label for="Product_Picture">Product Picture source: </label>
		<input type="file" name="Product_Picture" id="fileToUpload">

		<input type="Submit"	name="Submit">
	</form>


</body>
<?php include "includes/footer.php" ?>