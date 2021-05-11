<?php

$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);

if (isset($_POST['Submit']))
{

    $Addons_Price =$_POST["Addons_Price"];
    $Addons_Descripition =$_POST["Addons_Name"];
    $Addons_Stocks =$_POST["Addons_Stocks"];

    $sqlvar = "INSERT INTO addons_tbl(Addons_Price,Addons_Name,Addons_Stocks) VALUES
            ('{$Addons_Price}','{$Addons_Descripition}','{$Addons_Stocks}')";

var_dump($connection->query($sqlvar));
var_dump($sqlvar);
}
?>

<!DOCTYPE html>
<head></head>
<body>
<form action = "Adminaddons.php" method = "POST">

<label name="Addons_Name">Addon's Name: </label>
<input type="Text" name="Addons_Name">
<label name="Addons_Price">Addon's Price: </label>
<input type="Text" name="Addons_Price">
<label name="Addons_Stocks">Addon's Stock</label>
<input type="Text" name="Addons_Stocks">
<input type="Submit" name="Submit">
</form>

</body>



</html>

