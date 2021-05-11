<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php
if (isset($_GET['id']))
{
	$Id = $_GET['id'];
	$getAddons = "Select * from addons_tbl where Is_Active and addons_ID = {$Id}";
	$Addons = $connection->query($getAddons);
	$Addons = $Addons->fetch_all(MYSQLI_ASSOC);
	var_dump($getAddons);
}	

if (isset($_POST['Submit'])) 
{
	$Addons_Name = $_POST["Addons_Name"];
	$Addons_Price = $_POST["Addons_Price"];
	$Addons_Stocks = $_POST["Addons_Stocks"];

	$sqlvar ="UPDATE addons_tbl SET Addons_Name ='{$Addons_Name}',Addons_Price ='{$Addons_Price}',Addons_Stocks = '{$Addons_Stocks}' WHERE Addons_ID = {$Id}";

	var_dump($connection->query($sqlvar));
	var_dump($sqlvar);

	$getAddons = "Select * from addons_tbl where Is_Active and Addons_ID = {$Id}";
	$Addons = $connection->query($getAddons);
	$Addons = $Addons->fetch_all(MYSQLI_ASSOC);

    var_dump($Addons);
}
?>
<body>

	<form action="<?php echo "editaddons.php?id={$Id}" ?>" method="POST">
        

        <label for="Addons_Name">Addon's Name: </label>
		<input type="Text"	name="Addons_Name" value="<?php echo $Addons[0]['Addons_Name'] ?>">
        
        <label for="Addons_Price">Addon's Price: </label>
		<input type="Text"	name="Addons_Price" value="<?php echo $Addons[0]['Addons_Price'] ?>">

        <label for="Addons_Stocks">Addon's Stocks: </label>
		<input type="Text"	name="Addons_Stocks" value="<?php echo $Addons[0]['Addons_Stocks'] ?>">

		<input type="Submit"	name="Submit">
	</form>

</body>
<?php include "includes/footer.php" ?>