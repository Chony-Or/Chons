<?php 
include 'header.php';
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
                <img src="img/5Avocado(bg).png" class="centerimage">
            </div>
    
            <div class="col-md-6">
            <div class="semi-card">
            
                        <div class="textcolor">
                            <h2 style="margin-left: 7px; margin-top:5px">Avocado Milkshake</h2><hr style="border-top: 1px solid;">
                            <p style="font-size:15px; margin-left: 10px">Taste the creamy shake that is made of milk and avocado with love that will satisfy your avo-cravings.</p><br>
                            
                     <form action="milkshAvocado.php" method="POST">

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
                                <label for="small" style="font-size:13px; padding:5px">  100%   </label>
                                <input type="radio" id="7payb" name="slevel" value="75">
                                <label for="medium" style="font-size:13px; padding:5px">   75% </label>
                                <input type="radio" id="pipti" name="slevel" value="50">
                                <label for="large" style="font-size:13px; padding:5px">   50% </label>
                                <input type="radio" id="2payb" name="slevel" value="25">
                                <label for="large" style="font-size:13px; padding:5px">   25% </label>
                                <input type="radio" id="zero" name="slevel" value="0">
                                <label for="large" style="font-size:13px; padding:5px">   0%  </label><br>
                                    <br><br>
                            </div>



                        <b style="font-size:15px; margin-left: 7px ">Add ons:</b><br><br>

                            <input type="checkbox" style="margin-left: 15px " id="blackpearl" name="blackpearl" value="blackpearl">
                            <label for="blackpearl" style="font-size:14px;  padding:5px">Black Pearl <i style="margin-left: 350px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="oreo" name="oreo" value="oreo">
                            <label for="oreo" style="font-size:14px;  padding:5px">Oreo <i style="margin-left: 384px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="mallows" name="mallows" value="mallows">
                            <label for="mallows" style="font-size:14px;  padding:5px">Mallows <i style="margin-left: 364px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="chocochips" name="chocochips" value="chocochips">
                            <label for="chocochips" style="font-size:14px; padding:5px">Choco Chips <i style="margin-left: 338px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="nata" name="nata" value="nata">
                            <label for="nata" style="font-size:14px; padding:5px">Nata <i style="margin-left: 386px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="cream" name="cream" value="cream">
                            <label for="cream" style="font-size:14px; padding:5px">Cream Cheese <i style="margin-left: 327px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="pudding" name="pudding" value="pudding">
                            <label for="pudding" style="font-size:14px; padding:5px">Pudding <i style="margin-left: 363px">+₱15.00</i></label><br>
                            <input type="checkbox" style="margin-left: 15px " id="red" name="red" value="red beans">
                            <label for="red" style="font-size:14px; padding:5px">Red Beans <i style="margin-left: 352px">+₱15.00</i></label><br><br>

                        <b for="quan" style="font-size:15px; margin-left: 7px ">Quantity :</b>
                        <button class="quant" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input style="text-align:center; width: 15% ; height: 25px;" id=Input type=number min=1 max=100 value=1>
                        <button class="quant"  onclick="increment()"><b>+</b></button>

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
