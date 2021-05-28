<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);
session_start();

if(isset($_SESSION["customerInfo"]['Id']))
{
        //fetch order
        $customer_id = $_SESSION["customerInfo"]['Id'];
        $getActiveOrder = "Select * from order_tbl where Is_Active and Customer_ID = {$customer_id}";
        $activeOrder = mysqli_query($connection, $getActiveOrder);
        var_dump($activeOrder);

    if ($activeOrder)
    {
        // it return number of rows in the table.
        $row = mysqli_num_rows($activeOrder);
          
           if ($row)
              {
              echo "Number of row in the table : " . $row;
              }
        // close the result.
        //mysqli_free_result($activeOrder);
    }
}

?>
<html>
    <body>
        <p> test: <?php echo $row ?></p>
    </body>
</html>
