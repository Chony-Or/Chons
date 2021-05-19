<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php
if (isset($_GET['id']))
{
	$Id = $_GET['id'];
	$getProduct = "Select * from product_tbl where Is_Active and Product_ID = {$Id}";
	$getRegular = "Select * from size_tbl where Is_Active and Product_ID = {$Id} and Size_Description = 'REGULAR'";
	$getLarge = "Select * from size_tbl where Is_Active and Product_ID = {$Id} and Size_Description = 'LARGE'";
	$getExtra = "Select * from size_tbl where Is_Active and Product_ID = {$Id} and Size_Description = 'EXTRA LARGE'";

		
	$Product = $connection->query($getProduct);
	$Product = $Product->fetch_all(MYSQLI_ASSOC);
	
	$SizeRegular = $connection->query($getRegular);
	$SizeRegular = $SizeRegular->fetch_all(MYSQLI_ASSOC);

	$SizeLarge = $connection->query($getLarge);
	$SizeLarge = $SizeLarge->fetch_all(MYSQLI_ASSOC);

	$SizeExtra = $connection->query($getExtra);
	$SizeExtra = $SizeExtra->fetch_all(MYSQLI_ASSOC);

}	

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
$hdPic = $_POST["hiddenpic"];


$target_dir = "../FINAL/src/";
$Product_Picture = $target_dir . str_replace(" ","",basename($_FILES["Product_Picture"]["name"])) ;//to replace spaces specific character in string 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($Product_Picture,PATHINFO_EXTENSION));
// var_dump($_FILES["Product_Picture"]["tmp_name"]);

if (file_exists($Product_Picture) && $_FILES["Product_Picture"]["name"] != "") {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
else
{
	// $check = getimagesize($_FILES["Product_Picture"]["tmp_name"]);
	// if($check !== false) {
	// 	echo "File is an image - " . $check["mime"] . ".";
	// 	$uploadOk = 1;
	// } else {
	// 	echo "File is not an image.";
	// 	$uploadOk = 0;
	// }
	if($_FILES["Product_Picture"]["tmp_name"] != "")
	move_uploaded_file($_FILES["Product_Picture"]["tmp_name"], $Product_Picture);

	$Product_Picture = $_FILES["Product_Picture"]["tmp_name"] != ""?$Product_Picture:$hdPic ;

	$sqlvar ="UPDATE product_tbl SET Product_Picture = '{$Product_Picture}', Product_Stocks = '{$Product_Stocks}',Product_Name ='{$Product_Name}',Product_Code ='{$Product_Code}',Product_Category ='{$Product_Category}',Product_Details ='{$Product_Details}' WHERE Product_ID = {$Id}";
	$connection->query($sqlvar);


	if (count($SizeRegular))
	{
		$insertRegular = "UPDATE size_tbl SET Amount = '{$Size_Regular}'  WHERE Product_ID = {$Id} and Size_Description = 'REGULAR'";
	}
	else{
		$insertRegular = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
		('{$Id}','{$Size_Regular}','REGULAR')";
	}
	$connection->query($insertRegular);

	if (count($SizeLarge))
	{
		$insertLarge = "UPDATE size_tbl SET Amount = '{$Size_Large}'  WHERE Product_ID = {$Id} and Size_Description = 'LARGE'";
	}
	else{
		$insertLarge = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
		('{$Id}','{$Size_Large}','LARGE')";
	}
	$connection->query($insertLarge);

	
	if (count($SizeExtra))
	{
		$insertExtra = "UPDATE size_tbl SET Amount = '{$Size_Extra}'  WHERE Product_ID = {$Id} and Size_Description = 'EXTRA LARGE'";
	}
	else{
		$insertExtra = "INSERT INTO size_tbl(Product_ID, Amount, Size_Description) VALUES
		('{$Id}','{$Size_Extra}','EXTRA LARGE')";
	}
	$connection->query($insertExtra);
	
}

	$getProduct = "Select * from product_tbl where Is_Active and Product_ID = {$Id}";
	$Product = $connection->query($getProduct);
	$Product = $Product->fetch_all(MYSQLI_ASSOC);
}
?>
<body>

	<form action="<?php echo "editproduct.php?id={$Id}" ?>" method="POST" enctype="multipart/form-data">
        <label for="Product_Stocks">Product Stocks: </label>
		<input type="Text"	name="Product_Stocks" value="<?php echo $Product[0]['Product_Stocks'] ?>">

        <label for="Product_Name">Product Name: </label>
		<input type="Text"	name="Product_Name" value="<?php echo $Product[0]['Product_Name'] ?>">

        <label for="Product_Code">Product Code: </label>
		<input type="Text"	name="Product_Code" value="<?php echo $Product[0]['Product_Code'] ?>">

        <label for="Product_Category">Product Category: </label>
		<input type="Text"	name="Product_Category" value="<?php echo $Product[0]['Product_Category'] ?>">

		<label for="Product_Details">Product Details: </label>
		<Input type="Text" name="Product_Details" value="<?php echo $Product[0]['Product_Details']?>">


		<label for="Size_Description">Price for Regular: </label>
		<input type="Text"	name="Regular" value="<?php //echo $SizeRegular[0]['Amount']?>">

        <label for="Size_Description">Price for Large: </label>
		<input type="Text"	name="Large" value="<?php //echo $SizeLarge[0]['Amount']?>">

		<label for="Size_Description">Product Extra-Large: </label>
		<Input type="Text" name="ExtraLarge" value="<?php //echo $SizeExtra[0]['Amount']?>">

		<input type ="hidden" name="hiddenpic" value=<?php echo $Product[0]['Product_Picture']?>>

		<label for="Product_Picture">Product Picture source: </label>
		<input type="file" name="Product_Picture" id="fileToUpload">

		<input type="Submit"	name="Submit">
	</form>

</body>
<?php include "includes/footer.php" ?>