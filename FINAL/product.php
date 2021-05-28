<?php 
include 'header.php';
?>
<?php
//session_start();
var_dump($_SESSION); 
?>

<?php 


$server = "localhost"; // connect to sql
$username = "root";
$password ="";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);// connection


if(isset($_GET['code']))
{
    $code = $_GET['code'];
	$getProductlist = "Select * from product_tbl where Is_Active and Product_Category = '{$code}'";
	$Productlist = $connection->query($getProductlist ); // execute the query to the database 
	$Productlist = $Productlist->fetch_all(MYSQLI_ASSOC);
}
 ?>

<head>
    <link rel="stylesheet" href="menuSection.css" type="text/css">
</head>

<body class="bodycolor">

    <!--Menu Section-->
    <div class="jumbotron">
        <br>
        <h1 class="milkshake" style="font-family: 'Comfortaa'; color: #725527; margin-top: 80px; margin-left: 15%;"><?php echo $Productlist[0]["Product_Category"] ?></h1><br>
        <center><hr style="width: 71%; border-top: 1px solid black;">
    </div>

    <br><br>
    <div class="container">
        
        <div class="row">

        <?php foreach ($Productlist as $key => $MilkshakeValue): ?>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="product_details.php?id=<?php echo $MilkshakeValue['Product_ID']?>">

                            <img src="<?php echo $MilkshakeValue['Product_Picture']?>" class="centerimage">

                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b><?php echo $MilkshakeValue["Product_Name"] ?> </b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
            
        </div>
        
    </div>
    <br><br><br><br><br>   
    <!--End Menu Section-->

</body>

<?php 
include 'footer.php';
?>

  