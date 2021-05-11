<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>
<?php var_dump($_SESSION); ?>
<?php
if (isset($_POST['Submit']))
	{
		$Addons_Price = $_POST["Addons_Price"];
		$Addons_Name = $_POST["Addons_Name"];
		$Addons_Stocks = $_POST["Addons_Stocks"];


		$sqlvar ="INSERT INTO addons_tbl(Addons_Price,Addons_Name,Addons_Stocks) VALUES

			('{$Addons_Price}','{$Addons_Name}','{$Addons_Stocks}')";

		var_dump($connection->query($sqlvar));
		var_dump($sqlvar);
		
	}	
?>
<body>

	<form action="addons.php" method="POST">
  

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