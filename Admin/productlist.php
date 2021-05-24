<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>

<?php 
	$getProduct = "Select * from product_tbl where Is_Active";
	$Product = $connection->query($getProduct);
	$Product = $Product->fetch_all(MYSQLI_ASSOC);

 ?>

 

<body>


<a class="btn btn-dark" href="product.php" style = "float:right;">ADD NEW PRODUCT</a></br>
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Code</th>
			<th>Category</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
		<?php foreach ($Product as $key => $ProductValue): ?>
		<tr>
			<td><?php echo $ProductValue['Product_Name'] ?></td>
			<td><?php echo $ProductValue['Product_Code'] ?></td>
			<td><?php echo $ProductValue['Product_Category'] ?></td>
			<td><?php echo $ProductValue['Product_Stocks'] ?></td>
			<td>
			
			<a class="btn btn-warning" href="editproduct.php?id=<?php echo $ProductValue['Product_ID']  ?>">EDIT</a>
			<a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $ProductValue['Product_ID'] ?>">DELETE</a>
				
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
</body>
<?php include "includes/footer.php" ?>