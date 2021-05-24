<?php //include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
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
			

			if (mysqli_query($connection, $sqlvar)) 
			{ 
				echo '<p style="color:black;"> Successfully record added </p>';
			}

			else 
			{ echo '<p style="color:black;"> Error adding record </p>' . mysqli_error($connection);
			}

			
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
		.product-form form{
			color: #7a7a7a;
	border-radius: 40px;
	width: 60%;
	margin-bottom: 50px;
    font-size: 30px;
    background: #ececec;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 100px;	
    position: relative;	
		}
		.product-form {
	height: 100%;
	margin: auto;
	padding: 150px 100px;
	display: flex;
	flex-direction:column;
	justify-content: center;
	align-items: center;
		}
	input[type=submit] {
  width: 50%;
  background-color: #7a7a7a ;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
		</style>
	
	<div class= "product-form">
	
	<form action="product.php" method="POST" enctype="multipart/form-data">
	<table>
      <tr>
		<td><label for="Product_Stocks" style= "color:black">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks"></td>
		</tr>
		<tr>
       <td><label for="Product_Name" style= "color:black">Product Name: </label>
		<input type="Text"	name="Product_Name"></td>
		</tr>
		<tr>
		<label for="Product_Code" style= "color:black">Product Code: </label>
		<input type="Text"	name="Product_Code">
		</tr>
		<tr>	
		<td><label for="Product_Category" style= "color:black">Product Category: </label>
		<input type="Text"	name="Product_Category"></td>
		</tr>
		<tr>
		<td><label for="Product_Details" style= "color:black">Product Details: </label>
		<Input type="Text" name="Product_Details"></td>
		</tr>
		<tr>
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
		 <td><label for="Product_Picture" style= "color:black">Product Picture source: </label>
		<input type="file" name="Product_Picture" id="fileToUpload" style= "color:black"></td>
		</tr>
		<tr>
	    <td><input type="Submit" name="Submit"></td>
		</tr>
		</table>
	</form>
	
	</div>




</body>
<?php include "includes/footer.php" ?>