<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>

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
            <tr>
                <th scope="row">1</th>
                <td>3 June 2021</td>
                <td>Chony Or</td>
                <td>Rizal, Makati</td>
                <td>Milktea</td>
                <td>Wintermelon</td>
                <td>₱130</td>
                <td>2</td>
                <td>₱260</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>4 June 2021</td>
                <td>Aia Valles</td>
                <td>Comembo, Makati</td>
                <td>Milktea</td>
                <td>Matcha</td>
                <td>₱145</td>
                <td>2</td>
                <td>₱290</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>5 June 2021</td>
                <td>Chas Sanqui</td>
                <td>Diego Silang, Taguig</td>
                <td>Milkshake</td>
                <td>Melon</td>
                <td>₱110</td>
                <td>3</td>
                <td>₱330</td>
            </tr>
        </tbody>
    </table>

</body>
<?php include "includes/footer.php" ?>