<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>

<?php 
	$getAddons = "Select * from addons_tbl where Is_Active";
	$Addons = $connection->query($getAddons);
	$Addons = $Addons->fetch_all(MYSQLI_ASSOC);//

    //var_dump($Addons);
 ?>

<body>

	<table class="table table-bordered">
		<tr>
			<th>Addon's Name</th>
			<th>Addon's Price</th>
			<!-- <th>Addon's Stocks</th> -->
            <th>Action</th>

		</tr>
		<?php foreach ($Addons as $key => $AddonsValue): ?>
		<tr>
			<td><?php echo $AddonsValue['Addons_Name'] ?></td>
			<td><?php echo $AddonsValue['Addons_Price'] ?></td>
			<!-- <td><?php echo $AddonsValue['Addons_Stocks'] ?></td> -->
			<td>
			<form action="addonslist.php" method="POST">
				<a class="btn btn-warning" href="editaddons.php?id=<?php echo $AddonsValue['Addons_ID']  ?>">Edit</a>
				<a class="btn btn-danger" href="addonslist.php?id=<?php echo $AddonsValue['Addons_ID'] ?>"> Delete</a>
                </form>
            </td>
		</tr>
		<?php endforeach ?>
	</table>

</body>
<?php include "includes/footer.php" ?>