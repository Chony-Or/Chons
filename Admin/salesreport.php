<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>

<?php

        //fetch order
        $getCustomerOrder =
         "Select *, C.Date_Created as Date
         from order_tbl as A 
        Left Join product_tbl as B on B.Product_IDP = A.Product_IDP
        Left Join customer_tbl as C on C.Customer_ID = A.Customer_ID";
        $customerlist = $connection->query($getCustomerOrder); // execute the query to the database 
	    $customerlist = $customerlist->fetch_all(MYSQLI_ASSOC);
?>


<body> 

    <h4 style="color: black; font-weight: bold">Sales Report</h4>
    <h5 style="color: gray; margin-bottom: 20px">Lhoyzki Milkshake & Milktea</h5>
    <hr style="height: 2px; border-width: 0; color: black; background-color: black">

    
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Customer</th>
                <th scope="col">Location</th>
                <th scope="col">Product</th>
                <th scope="col">Product Description</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($customerlist as $key => $saleval):?>
            <tr>
                <th scope="row"><?php echo ++$counter?></th>
                <td><?php echo $saleval['Date'] ?></td>
                <td><?php echo $saleval['F_Name']?></td>
                <td><?php echo $saleval['Cust_Address']?></td>
                <td><?php echo $saleval['Product_Category']?></td>
                <td><?php echo $saleval['Product_Name']?></td>
                <td>₱<?php echo number_format($saleval['Amount'],2)?></td>
                <td ><center><?php echo $saleval['Quantity']?></center></td>
                <td>₱ <?php echo number_format($saleval['Amount']*$saleval['Quantity'],2)?></td>
                
            </tr>
        <?php endforeach?>
        </tbody>
    </table>

</body>
<?php include "includes/footer.php" ?>