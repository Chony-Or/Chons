<?php 
include 'header.php';
?>

<?php 

$server = "localhost"; // connect to sql
$username = "root";
$password ="";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);// connection

if(isset($_GET['submit']))
{
    
}

if(isset($_GET['id']))
{

    $Sugar_Level = $_GET["Sugar_Level"];
    $Id = $_GET['id'];
	$getAddons = "Select * from addons_tbl where Is_Active";
	$Addons = $connection->query($getAddons); // query to get all information from database
	$Addons = $Addons->fetch_all(MYSQLI_ASSOC);

    $getProductMilkshake = "Select * from product_tbl where Is_Active and Product_IDP =  {$Id} ";
	$ProductMilkshake = $connection->query($getProductMilkshake );  // query to get all information from database
	$ProductMilkshake = $ProductMilkshake->fetch_all(MYSQLI_ASSOC);

    $getProductSize = "Select * from size_tbl where Is_Active and Product_IDP =  {$Id} ";
	$ProductSize = $connection->query($getProductSize );  // query to get all information from database
	$ProductSize = $ProductSize->fetch_all(MYSQLI_ASSOC);

    //$getOrder = "INSERT INTO order_tbl(Order_ID,Product_IDP,Customer_ID,Size_ID,Sugar_Level,Created_by,Addons,Quantity,Amount) VALUES
    //('{$Order_ID}','{$Product_IDP}','{$Customer_ID}','{$Size_ID}','{$Sugar_Level}','{$Created_by}','{$Addons}','{$Quantity}','{$Amount}')";
   // $Order = $connection->query($getOrder); // query for the orders all data will be inserted to order_tbl databse
}?>

<head>
    <link rel="stylesheet" href="orderSection.css" type="text/css">
    <link rel="stylesheet" href="http://flatlogic.github.io/awesome-bootstrap-checkbox/demo/ ..">
</head>

<body>

    <!--Milkshake Seperate Per Product Page-->
    <div class="container">
        
        <div class="row">
    
            <div class="col-md-6">
                <img src="<?php echo $ProductMilkshake[0]['Product_Picture']?>" class="centerimage">
            </div>
    
            <div class="col-md-6">
            <div class="semi-card">
            
                <div class="textcolor">
                    <br><h2 style="margin-left: 15px"><?php echo $ProductMilkshake[0]['Product_Name'] ?></h2><br>
                    <p style="margin-left: 15px; font-size: 14px; "><?php echo $ProductMilkshake[0]['Product_Details'] ?></p><br>
                            
                    <form action="order.php" method="POST">

                        <div style="margin-left: 15px" aria-required="true"><b style="font-size:15px;">Available Size/s:</b><br><br>
                        <input type="hidden" name="ProductId" required="required"  value="<?php echo $ProductMilkshake[0]['Product_IDP']?>">
                        <?php foreach($ProductSize as $key => $SizeValue): ?>   <!-- get all price and sizes from the database -->
                        <table style="width: 100%">
                            <td>
                                <input type="hidden" name="SizePrice[<?php echo $SizeValue['Size_ID'] ?>]" required="required" value="<?php echo $SizeValue['Amount'] ?>">
                                <input type="radio" style="margin-left: 15px; margin-right: 15px" required="required" name="sizes" id="<?php echo $SizeValue['Size_Description'] ?>" value="<?php echo $SizeValue['Size_ID'] ?>">
                                <label for="<?php echo $SizeValue['Size_Description'] ?>" style="font-size:14px;  padding:5px"><?php echo $SizeValue['Size_Description'] ?></label></td>
                           
                            <td><p style="text-align:right; margin-right: 15px">+???<?php echo $SizeValue['Amount'] ?></p></td>
                        </table>

                            <?php endforeach ?>
                            <!--
                            <input type="radio" style="margin-left: 15px " id="small" name="sizes" value="small">
                            <label for="small" style="font-size:13px; padding:5px ">REGULAR <i style="margin-left: 350px" > +???110.00</i></label><br>
                            <input type="radio" style="margin-left: 15px " id="medium" name="sizes" value="medium" >
                            <label for="medium" style="font-size:13px; padding:5px">LARGE <i style="margin-left: 368px" > +???125.00</i></label><br>
                            <input type="radio" style="margin-left: 15px " id="large" name="sizes" value="large">
                            <label for="large"  style="font-size:13px; padding:5px">EXTRA LARGE <i style="margin-left: 328px" > +???140.00</i></label><br>-->
                        <br>
                        </div>
 
                        <div style="margin-left: 15px"><b style="font-size: 15px;">Sugar Level/s:</b>
                            <table style="width: 70%; margin-left: 15px">
                            <tr>
                                <td>
                                    <input type="radio" id="1h" name="Sugar_Level" required="required" value="100">
                                    <label for="1h" style="font-size: 14px; padding:5px">100%</label>
                                </td>
                                <td>
                                    <input type="radio" id="7payb" name="Sugar_Level" required="required" value="75">
                                    <label for="7payb" style="font-size: 14px; padding:5px">75%</label>
                                </td>
                                <td>
                                    <input type="radio" id="pipti" name="Sugar_Level" required="required" value="50">
                                    <label for="pipti" style="font-size: 14px; padding:5px">50%</label>
                                </td>
                                <td>
                                    <input type="radio" id="2payb" name="Sugar_Level" required="required" value="25">
                                    <label for="2payb" style="font-size: 14px; padding:5px">25%</label>
                                </td>
                                <td>
                                    <input type="radio" id="zero" name="Sugar_Level" required="required" value="0">
                                    <label for="zero" style="font-size: 14px; padding:5px">0%</label>
                                </td>
                            </tr>
                            <br><br>
                            </table><br>
                        </div>

                        <b style="margin-left: 15px; font-size: 15px;">Add ons:</b><br><br> 
                        <?php foreach ($Addons as $key => $AddonsValue): ?>        <!--addons part connected from database -->
                            
                            <table style="width: 100%">
                                <td>
                                    <label class="checkbox-circle">
                                        <input type="checkbox" style="margin-left: 25px; margin-right: 15px" id="<?php echo $AddonsValue['Addons_Name'] ?>" name="addons[]" value="<?php echo $AddonsValue['Addons_ID'] ?>">
                                   
                                        <input type="hidden"  name="addons_price[<?php echo $AddonsValue['Addons_ID'] ?>]" value="<?php echo $AddonsValue['Addons_Price'] ?>">
                                    </label>
                                    <label for="<?php echo $AddonsValue['Addons_Name'] ?>" style="font-size:14px;  padding:5px"><?php echo $AddonsValue['Addons_Name'] ?></label>
                                </td>
                                <td>
                                    <p style="text-align:right; margin-right: 15px">+???<?php echo $AddonsValue['Addons_Price'] ?></p>
                                </td>
                        </table>
                     
                        <?php endforeach?> <!-- for the return value of addons name and price -->
                        
                   
                        <br><b for="quan" style="font-size:15px; margin-left: 15px">Quantity :</b>
                        <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input name="Quantity" style="text-align:center; width: 15% ; height: 25px;" required="required" id=Input type=number min=1 max=100 value=1>
                        <button class="quant" type="button" onclick="increment()"><b>+</b></button>

						<script>
							function increment() {
							document.getElementById('Input').stepUp();
						}
							function decrement() {
							document.getElementById('Input').stepDown();
						}
						</script>
							
                            <button class="addcart"  type="submit" value="submit">
                            <a class="nav-link">  <img src="https://img.icons8.com/material-rounded/22/000000/shopping-cart.png"/>ADD TO CART</a></button><br><br>
							
                        </div>
                    </form>
                    </div>
                </div>
                <br><br>
            
                </div>
                <br>
                  
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <!--End Milkshake Seperate Per Product Page--> 
</body>

<?php 
include 'footer.php';
?>
