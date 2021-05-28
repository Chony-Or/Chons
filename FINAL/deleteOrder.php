
<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);
?>
<?php

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];

	$sqlvar ="UPDATE order_tbl SET Is_Active = 0, Date_Deleted = now() WHERE order_ID = $id";

	$connection->query($sqlvar);
    header("Location: order.php");
}
?>
