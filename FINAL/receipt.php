<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);
session_start();
?>

<?php

// if (isset($_SESSION["customerInfo"]['id'])) // update if the customer checkout
// {
//     $id = $_SESSION["customerInfo"]['id'];

// 	$sqlupdate ="UPDATE customer_tbl SET Is_Checkout = 1 WHERE Customer_ID = {$id}";
// 	$connection->query($sqlupdate);
//     var_dump($sqlupdate);
// }


if(isset($_SESSION["customerInfo"]['Id']))
{
        //fetch order

        $TotalAmount = 0;
        $customer_id = $_SESSION["customerInfo"]['Id'];
        $getCustomerOrder = "Select * from order_tbl as A Left Join product_tbl as B on B.Product_IDP = A.Product_IDP  where A.Customer_ID = {$customer_id} and A.Is_Active";
        $Orderlist = $connection->query($getCustomerOrder ); // execute the query to the database 
	    $Orderlist = $Orderlist->fetch_all(MYSQLI_ASSOC);

        //for computation of the totalamount of order
        foreach ($Orderlist as $key => $orderTotalAmount) 
       {
           $TotalAmount += $orderTotalAmount['Amount'];
       }


       
        $getCustomerInfo = "Select * from customer_tbl where Customer_ID = {$customer_id}";
        $customerInfo = $connection->query($getCustomerInfo ); // execute the query to the database 
	    $customerInfo = $customerInfo->fetch_all(MYSQLI_ASSOC);

        $sqlupdate ="UPDATE customer_tbl SET Is_Checkout = 1 WHERE Customer_ID = {$customer_id}";
        $connection->query($sqlupdate);
        

        $sqlvar ="UPDATE customer_tbl SET Is_Active = 0 WHERE Customer_ID = {$customer_id}";
        $connection->query($sqlvar);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>company invoice - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
    	body{
    margin-top:20px;
    color: #8A5A56;
}
.text-secondary-d1 {
    color: #8A5A56!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #FADADD;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #FADADD!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: #FADADD!important;
}

.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}









    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    
    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i></i>
                            <span class="text-default-d3">Lhoyzki Receipt</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />
           
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-grey align-middle ml-5"><?php echo $customerInfo[0]['F_Name']?> &nbsp<?php echo $customerInfo[0]['L_Name']?><br></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Address: &nbsp
                                <span class="text-600 text-110 text-grey align-middle"><?php echo $customerInfo[0]['Cust_Address']?></span>
                            </div>

                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600 ml-5"><?php echo  $customerInfo[0]['Cust_Num']?></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            </div>

                            <div class="my-2"> <span class="text-600 text-90">Order ID:</span><?php echo $customerInfo[0]['Customer_ID']?></div>

                            <div class="my-2"> <span class="text-600 text-90">Issue Date:</span> <?php echo $customerInfo[0]['Date_Created']?></div>

                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-dark bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Product</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        <div class="col-2">Amount</div>
                    </div>
                <?php $counter = 0 ?> 
                  <?php foreach($Orderlist as $key => $OrderlistVal):?>
                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?php echo ++$counter ?></div>
                            <div class="col-9 col-sm-5"><?php echo $OrderlistVal['Product_Name']?></div>
                            <div class="d-none d-sm-block col-2"><?php echo $OrderlistVal['Quantity']?></div>
                            <div class="d-none d-sm-block col-2 text-95"> ₱ <?php echo number_format($OrderlistVal['Amount']/$OrderlistVal['Quantity'],2)?></div>
                            <div class="col-2 text-secondary-d2"> ₱ <?php echo number_format($OrderlistVal['Amount'],2)?></div>
                        </div>
                    </div>
                    <?php endforeach ?>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-3 text-grey text-90 order-first order-sm-last">
                        <!-- <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last"> -->
                            <!-- <div class="row my-2 align-items-center bgc-primary-l3 p-2"> -->

                                <div class="col-10 text-right align-items-center bgc-primary-l3 p-2">
                                    Total Amount:
                                </div>
                                <div class="col-2">
                                    <span class="text-150 text-success-d3 opacity-2"> ₱ <?php echo number_format($TotalAmount,2) ?></span>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your purchase</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="HomePage.php" method="POST">
        <center>
        <input name="submit"  type="submit" value="CONTINUE SHOPPING">
       <!-- <B>CONTINUE SHOPPING</B></button><br><br> -->
        </center>
    </form>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
<?php 
session_destroy();
?>