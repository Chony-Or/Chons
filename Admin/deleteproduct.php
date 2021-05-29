<?php include "includes/redirection.php" ?>
<?php include "includes/db_connection.php" ?>
<?php

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];

	$sqlvar ="UPDATE product_tbl SET Is_Active = 0, Date_Deleted = now() WHERE Product_IDP = $id";

	$connection->query($sqlvar);
    header("Location: productlist.php");
}
?>
