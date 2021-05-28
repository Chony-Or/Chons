<?php 
include 'header.php';
?>
<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);
session_start();
?>

<?php

if (!isset($_SESSION["customerInfo"]))
{
        header("Location: Customerinfo.php");
}
// var_dump($_SESSION["customerInfo"]);
if(isset($_POST['ProductId']))
{
  var_dump($_SESSION["customerInfo"]);
  var_dump($_POST);
  //insert customer info
 
  $customer_info = implode("','",$_SESSION["customerInfo"]); //converting array to string 

  // implode have 2 parameters 1 parameter is the string layout for seperation 2nd is the array to be converted to string

  // sample array [1,2,3] implode("','",[1,2,3]) = "1','2','3" 

  if(!isset($_SESSION["customerInfo"]['Id'])) //validate if customer successfully added in db
  {
        $sqlvar = "INSERT INTO customer_tbl(L_Name,F_Name,Cust_Num,Cust_Address) VALUES
        ('{$customer_info}')"; 
        $insert_customer = $connection->query($sqlvar);
        $_SESSION["customerInfo"]['Id'] = $connection->insert_id; //get Customer Id then create session that hold the customer id
  }

  if(isset($_SESSION["customerInfo"]['Id']))
  {
        //insert order
        $adons = $_POST['addons'];
        $addons_price = $_POST['addons_price'];
        $SizePrice = $_POST['SizePrice'];
        $amount = 0;
        $adonsAmount = 0;

       foreach ($adons as $key => $adonVal) 
       {
           $adonsAmount += $addons_price[$adonVal];
       }

       $amount = $_POST['Quantity'] * ($SizePrice[$_POST['sizes']] + $adonsAmount  );


        $order_details = array(
                                'Product_ID'=> $_POST['ProductId'],
                                'Customer_ID'=>$_SESSION["customerInfo"]['Id'],
                                'Size_ID'=>$_POST['sizes'],
                                'Sugar_Level'=>$_POST['Sugar_Level'],
                                'Addons'=>implode(",",$adons),
                                'Quantity'=>$_POST['Quantity'],
                                'Amount'=>$amount,
                        );

        // var_dump($order_details);
        
        $order_info = implode("','",$order_details ); 

        $insertOrder = "INSERT INTO `order_tbl`( `Product_ID`, `Customer_ID`, `Size_ID`, `Sugar_Level`,  `Addons`, `Quantity`, `Amount`) 
                        VALUES ('{$order_info}')";
        $connection->query($insertOrder);
        
  }
    
}

if(isset($_SESSION["customerInfo"]['Id']))
{
        //fetch order
        $customer_id = $_SESSION["customerInfo"]['Id'];
        $getCustomerOrder = "Select * from order_tbl as A Left Join product_tbl as B on B.Product_ID = A.Product_ID  where A.Customer_ID = {$customer_id}";
        $Orderlist = $connection->query($getCustomerOrder ); // execute the query to the database 
	$Orderlist = $Orderlist->fetch_all(MYSQLI_ASSOC);

}

?>
<head>
        <link rel="stylesheet" href="HomePage.css" type="text/css">
        <link rel="stylesheet" href="orderSection.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <div class="container-fluid" style="margin-top: 50px; margin-bottom:45px; padding: 100px">
        <form method="POST">

                <h2 style="font-family: 'Courier';">SHOPPING CART</h2>

                <table class="table table-hover" border=0px>
                
                <tr style="font-weight:900; font-size:14px; color: white; background-color:#8a5f56">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                </tr>
        
                <tbody id="table">
                        <?php foreach($Orderlist as $key => $OrderlistVal):?>
                                <tr style="font-weight:900; font-size:14px; ">
                                
                                        <th><img src="<?php echo $OrderlistVal['Product_Picture']?>" style="width:80px; height:80px;" ><?php echo $OrderlistVal['Product_Name']?></th>
                                        <th style="text-align: center"><br><br>₱<?php echo $OrderlistVal['Amount']/$OrderlistVal['Quantity']?></th>
                                        <th style="text-align: center"><br><br>
                                                <!-- <button class="quant"  type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button> -->
                                                <input style="text-align:center; width: 30% ; height: 28px; " id=Input type=number min=1 max=100 value="<?php echo $OrderlistVal['Quantity']?>">
                                                <!-- <button class="quant" type="button" onclick="increment()"><b>+</b></button> -->
                        
                                        </th>
                                
                                        <th style="text-align: center; margin-top:15px; "><br>₱<?php echo $OrderlistVal['Amount']?>
                                                <button type="button" style="margin-left:10px;padding: 0;border: none;background: none; " onclick="deleteRow(this)">
                                                <i class="material-icons">delete</i></button>
                                        </th>
                                </tr>
                        <?php endforeach?>
        </tbody>
        </table>

        <div class="mx-auto;" style="font-size:25px; text-align:right;margin-left:67% ;margin-top:5%;margin-bottom:2%">TOTAL <b style="color:#3CB371; font-size:30px;" >₱90.00</b>
         </div>

        <div style = "text-align:right;">
        <a href=HomePage.php><button type="button" style="width:150px; height:40px; border-radius:4px; margin-right:5px; background-color:#8a5f56; color:white"><b>Continue Shopping</b></button></a>
        
        <a href=receipt.php> <button type="button" style="width:110px; height:40px; border-radius:4px; background-color:#8a5f56; color:white"><b>Checkout</b></button></a>
        </div>



        <script>
        function deleteRow(btn) 
        {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        }
	</script>
        

   
    
    </form>
    </div>

</body>

<?php 
include 'footer.php';
?>