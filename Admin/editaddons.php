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
<style>
		.edit-add form{
			color: #7a7a7a;
	border-radius: 50px;
	width: 30%;
	margin-bottom: 50px;
    background: #ececec;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 50px;	
    position:absolute;	
		}
		.edit-add{
	height: 100%;
	margin: auto;
	padding: 150px 100px;
	display: flex;
	flex-direction:column;
	justify-content: center;
	align-items: center;
		}
	input[type=submit] {
  width: 70%;
  background-color: #7a7a7a ;
  color: white;
  padding: 14px 20px;
  margin: 8px 135%;
  border: none;
  border-radius: 10px;
  cursor: pointer;

}
		</style>
	<div class ="edit-add">
	<form action="<?php echo "editaddons.php?id={$Id}" ?>" method="POST">
        <table>
		<tr>
        <td><label for="Addons_Name" style= "color:black; font-size: 20px;">Addon's Name: </label></td>
		<td><input type="Text"	name="Addons_Name" style= "font-size: 20px;" value="<?php echo $Addons[0]['Addons_Name'] ?>"></td>
        </tr>
		<tr>
        <td><label for="Addons_Price" style= "color:black; font-size: 20px;">Addon's Price: </label></td>
		<td><input type="Text"	name="Addons_Price" style= "font-size: 20px;" value="<?php echo $Addons[0]['Addons_Price'] ?>"></td>
		</tr>
		<tr>
		<td> <label for="Addons_Stocks" style= "color:black; font-size: 20px;">Addon's Stocks: </label></td>
		<td><input type="Text"	name="Addons_Stocks" style= "font-size: 20px;" value="<?php echo $Addons[0]['Addons_Stocks'] ?>"></td>
		</tr>
		<tr>
		<td><br><input type="Submit"name="Submit"></br><td>
		</tr>
		</table>
	</form>
</div>
</body>
<?php include "includes/footer.php" ?>