<?php 
include 'header.php';
?>

<?php 


$server = "localhost"; // connect to sql
$username = "root";
$password ="";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);// connection

if(isset($_GET['id']))
{
    $Id = $_GET['id'];
	$getAddons = "Select * from addons_tbl where Is_Active";
	$Addons = $connection->query($getAddons);
	$Addons = $Addons->fetch_all(MYSQLI_ASSOC);

    $getProductMilkshake = "Select * from product_tbl where Is_Active and Product_ID =  {$Id} ";
	$ProductMilkshake = $connection->query($getProductMilkshake );
	$ProductMilkshake = $ProductMilkshake->fetch_all(MYSQLI_ASSOC);
}
 ?>

<head>
  <link rel="stylesheet" href="orderSection.css" type="text/css">
</head>

<body class="fixed-bg">

    <br><br><br><br><br><br><br>
    <!--Milkshake Seperate Per Product Page-->
    <div class="container" style="margin-top:30px">
        
        <div class="row">
    
            <div class="col-md-6">
                <img src="<?php echo $ProductMilkshake[0]['Product_Picture']?>" class="centerimage">
            </div>
    
            <div class="col-md-6">
            <div class="semi-card">
            
                        <div class="textcolor">
                            <h2 style="margin-left: 7px; margin-top:5px"><?php echo $ProductMilkshake[0]['Product_Name'] ?></h2><hr style="border-top: 1px solid;">
                            <p style="font-size:15px; margin-left: 10px"><?php echo $ProductMilkshake[0]['Product_Details'] ?></p><br>
                            
                     <form action="product_details.php" method="POST">

                        <div style="margin-left: 7px" aria-required="true"> <b style="font-size:15px;">Available Size/s:</b><br><br>
                        
                        <input type="radio" style="margin-left: 15px " id="small" name="sizes" value="small">
                        <label for="small" style="font-size:13px; padding:5px ">REGULAR <i style="margin-left: 350px" > +₱110.00</i></label><br>
                        <input type="radio" style="margin-left: 15px " id="medium" name="sizes" value="medium" >
                        <label for="medium" style="font-size:13px; padding:5px">LARGE <i style="margin-left: 368px" > +₱125.00</i></label><br>
                        <input type="radio" style="margin-left: 15px " id="large" name="sizes" value="large">
                        <label for="large"  style="font-size:13px; padding:5px">EXTRA LARGE <i style="margin-left: 328px" > +₱140.00</i></label><br>
                            <br><br></div>
 
                        <div style="margin-left: 7px " ><b style="font-size:15px;">Sugar Level/s:</b><br><br>

                            <input type="radio" style="margin-left: 15px " id="1h" name="slevel" value="100">
                            <label for="1h" style="font-size:13px; padding:5px">  100%   </label>
                            <input type="radio" id="7payb" name="slevel" value="75">
                            <label for="7payb" style="font-size:13px; padding:5px">   75% </label>
                            <input type="radio" id="pipti" name="slevel" value="50">
                            <label for="pipti" style="font-size:13px; padding:5px">   50% </label>
                            <input type="radio" id="2payb" name="slevel" value="25">
                            <label for="2payb" style="font-size:13px; padding:5px">   25% </label>
                            <input type="radio" id="zero" name="slevel" value="0">
                            <label for="zero" style="font-size:13px; padding:5px">   0%  </label><br>
                                <br><br>
                        </div>

                        <b style="font-size:15px; margin-left: 7px ">Add ons:</b><br><br>
                        <?php foreach ($Addons as $key => $AddonsValue): ?>
                            <table style="width: 100%">
                            <td><input type="checkbox" style="margin-left: 15px; margin-right: 15px" id="<?php echo $AddonsValue['Addons_Name'] ?>" name="addons[]" value="<?php echo $AddonsValue['Addons_ID'] ?>">
                            <label for="<?php echo $AddonsValue['Addons_Name'] ?>" style="font-size:14px;  padding:5px"><?php echo $AddonsValue['Addons_Name'] ?></label></td>
                           
                            <td><p style="text-align:right; margin-right: 15px">+₱<?php echo $AddonsValue['Addons_Price'] ?></p></td>
                        </table>
                     
                        <?php endforeach?> <!-- for the return value of addons name and price -->
                        
                   
                        <b for="quan" style="font-size:15px; margin-left: 7px ">Quantity :</b>
                        <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input style="text-align:center; width: 15% ; height: 25px;" id=Input type=number min=1 max=100 value=1>
                        <button class="quant" type="button" onclick="increment()"><b>+</b></button>

						<script>
							function increment() {
							document.getElementById('Input').stepUp();
						}
							function decrement() {
							document.getElementById('Input').stepDown();
						}
						</script>
							
                            <button class="addcart"  type="submit">
                            <a class="nav-link" href="milkshAvocado.php" ><img src="https://img.icons8.com/material-rounded/22/000000/shopping-cart.png"/>ADD TO CART</a></button><br><br>
							
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
