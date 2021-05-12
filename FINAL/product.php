<?php 
include 'header.php';
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
	$getProductMilkshake = "Select * from product_tbl where Is_Active and Product_Category = '{$code}'";
	$ProductMilkshake = $connection->query($getProductMilkshake );
	$ProductMilkshake = $ProductMilkshake->fetch_all(MYSQLI_ASSOC);
}
 ?>

<head>
    <link rel="stylesheet" href="menuSection.css" type="text/css">
</head>

<body class="bodycolor">

    <!--Menu Section-->
    <div class="jumbotron">
        <br>
        <h1 class="milkshake" style="font-family: 'Fantasy'; color: #725527; margin-top: 80px; margin-left: 15%;">MILKSHAKE</h1><br>
        <center><hr style="width: 71%; border-top: 1px solid black;">
    </div>

    <br><br>
    <div class="container">
        
        <div class="row">

        <?php foreach ($ProductMilkshake as $key => $MilkshakeValue): ?>

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
            


            <!--
            
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="milkshChocoKisses.php">
                            <img src="img/ChocoKissesWToppings.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Choco Kisses Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="milkshBlackForest.php">
                        <img src="img/CookiesNCream.png" class="centerimage">
                    </a>
                    <br><br>
                    <div class="textcolor"><center><h4><b>Black Forest Milkshake</b></h4></center><br>
                    <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                
                <div class="card">
                    <div class="card-body">
                        <a href="milkshCNC.php">
                            <img src="img/CookiesNCream.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Cookies N Cream Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshCoffeeCrumble.php">
                            <img src="img/ChocoKissesWToppings.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Coffee Crumble Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshMelon.php">
                            <img src="img/MelonMS.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Melon Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshAvocado.php">
                            <img src="img/AvocadoMS.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Avocado Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshBukoPandan.php">
                            <img src="img/BukoPandanWToppings.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Buko Pandan Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshUbe.php">
                            <img src="img/UbeMS.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Ube Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshStrawberry.php">
                            <img src="img/StrawberryMS.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Strawberry Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <a href="milkshBuko.php">
                            <img src="img/BukoMS.png" class="centerimage">
                        </a>
                        <br><br>
                        <div class="textcolor"><center><h4><b>Buko Milkshake</b></h4></center><br>
                        <center></center></div>
                    </div>
                </div>
            </div>
            -->
        </div>
        
    </div>
    <br><br><br><br><br>   
    <!--End Menu Section-->

</body>

<?php 
include 'footer.php';
?>

  