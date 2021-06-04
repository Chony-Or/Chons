<?php //include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php


if (isset($_POST['Submit']))
	{

		
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
			move_uploaded_file($_FILES["Product_Picture"]["tmp_name"], $Product_Picture);// store location of the picture

			$sqlvar ="INSERT INTO product_tbl(Product_Name,Product_Code,Product_Category,Product_Details,Product_Picture) VALUES
			('{$Product_Name}','{$Product_Code}','{$Product_Category}','{$Product_Details}','{$Product_Picture}')";
			

			if (mysqli_query($connection, $sqlvar)) 
			{ 
				echo '<p style="color:black;"> Successfully record added </p>';
			}

			else 
			{ echo '<p style="color:black;"> Error adding record </p>' . mysqli_error($connection);
			}

			
			if ($connection->query($sqlvar) === TRUE) {
				$last_id = $connection->insert_id;
				
				$insertRegular = "INSERT INTO size_tbl(Product_IDP, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Regular}','REGULAR')";

				
				$insertLarge = "INSERT INTO size_tbl(Product_IDP, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Large}','LARGE')";

				
				$insertExtra = "INSERT INTO size_tbl(Product_IDP, Amount, Size_Description) VALUES
				('{$last_id}','{$Size_Extra}','EXTRA LARGE')";

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
    font-size: 20px;
    background: #ececec;
    box-shadow: 9px 12px 9px 0px rgb(134 134 134);
    padding: 100px;	
    position:absolute;	
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
  margin: 8px 116%;
  border: none;
  border-radius: 10px;
  cursor: pointer;

}
		</style>
	
	<div class= "product-form">
	
	<form action="product.php" method="POST" enctype="multipart/form-data">
	<table>
      <!-- <tr>
		<td><label for="Product_Stocks" style= "color:black">Product Stocks: </label></td>
		<td><input type="Text"	name="Product_Stocks"></td>
		</tr> -->
		<tr>
       <td><label for="Product_Name" style= "color:black">Product Name: </label></td>
	   <td><input type="Text"	name="Product_Name"></td>
		</tr>
		<tr>
		<td><label for="Product_Code" style= "color:black">Product Code: </label></td>
		<td><input type="Text"	name="Product_Code"></td>
		</tr>
		<tr>	
		<td><label for="Product_Category" style= "color:black">Product Category: </label></td>
		<td><input type="Text"	name="Product_Category"></td>
		</tr>
		<tr>
		<td><label for="Product_Details" style= "color:black">Product Details: </label></td>
		<td><Input type="Text" name="Product_Details"></td>
		</tr>
		<tr>
		<td><label for="Size_Description" style= "color:black">Price for Regular: </label></td>
		<td><input type="Text"	name="Regular"></td>
		</tr>
		<tr>
		<td><label for="Size_Description" style= "color:black">Price for Large: </label></td>
		<td><input type="Text"	name="Large"></td>
		</tr>
		<tr>
		<td><label for="Size_Description" style= "color:black">Product Extra-Large: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
		<td><Input type="Text" name="ExtraLarge"></td>
		</tr>
		<tr>
		<td><label for="Product_Picture" style= "color:black">Product Picture source:</label></td>
		<td><input type="file" name="Product_Picture" id="fileToUpload" style= "color:black"></td>
		</tr>
		<tr>
	    <td> <br><input type="Submit" name="Submit"></br></td>
		</tr>
		</table>
	</form>
	
	</div>




</body>
<?php include "includes/footer.php" ?>