<?php 
include 'header.php';
?>

<head>
<link rel="stylesheet" href="HomePage.css" type="text/css">
<link rel="stylesheet" href="orderSection.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <div style="margin-top: 150px;margin-bottom:45px;padding: 45px">
    <form action="order.php" method="POST">

    <h2 style="font-family: 'Courier';">SHOPPING CART</h2>

    <table class="table table-hover" border=0px>

        <tr style="font-weight:900; font-size:14px; color: white; background-color:#8a5f56">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
        </tr>
        <tr style="font-weight:900; font-size:14px; ">
        
                <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >Choco Fudge Milkshake</th>
                <th style="text-align: center"><br><br>₱90.00</th>
                
                <th style="text-align: center"><br><br>
                        <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input style="text-align:center; width: 30% ; height: 28px; " id=Input type=number min=1 max=100 value=1>
                        <button class="quant" type="button" onclick="increment()"><b>+</b></button>
                <script>
	function increment() {
	document.getElementById('Input').stepUp();
		}
	function decrement() {
	document.getElementById('Input').stepDown();
		}
	</script>
                </th>
                <div >
                <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                
               <button style="margin-left:10px;padding: 0;border: none;background: none; ">
               <i class="material-icons">delete</i></button>
              </th>
               
        </tr>
 <tr style="font-weight:900; font-size:14px; ">
        
                <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >Choco Fudge Milkshake</th>
                <th style="text-align: center"><br><br>₱90.00</th>
                
                <th style="text-align: center"><br><br>
                        <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input style="text-align:center; width: 30% ; height: 27px;" id=Input type=number min=1 max=100 value=1>
                        <button class="quant" type="button" onclick="increment()"><b>+</b></button>
                <script>
	function increment() {
	document.getElementById('Input').stepUp();
		}
	function decrement() {
	document.getElementById('Input').stepDown();
		}
	</script>
                </th>
                <div >
                <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                
               <button style="margin-left:10px;padding: 0;border: none;background: none; ">
               <i class="material-icons">delete</i></button>
              </th>
               
        </tr>
         <tr style="font-weight:900; font-size:14px; ">
        
                <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >Choco Fudge Milkshake</th>
                <th style="text-align: center"><br><br>₱90.00</th>
                
                <th style="text-align: center"><br><br>
                        <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                        <input style="text-align:center; width: 30% ; height: 27px; " id=Input type=number min=1 max=100 value=1>
                        <button class="quant" type="button" onclick="increment()"><b>+</b></button>
                <script>
	function increment() {
	document.getElementById('Input').stepUp();
		}
	function decrement() {
	document.getElementById('Input').stepDown();
		}
	</script>
                </th>
                <div >
                <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                
               <button style="margin-left:10px;padding: 0;border: none;background: none; ">
               <i class="material-icons">delete</i></button>
              </th>
               
        </tr>


        </table>
        
        
           <h1 style="font-family: 'Courier'; text-align:right; font-size:25px; margin-right:20px; margin-top:20px;">TOTAL 
           <b style="color:#3CB371; font-size:25px;" >₱90.00</b>
              </h1>

            <div>  <button type="button" style=" font-family: 'Consolas'; font-size:7px; margin-left:930px; width:150px; height:40px; border-radius:5px; background-color:#8a5f56; color:white">
              <a href="HomePage.php" style="color: #F0FFF0; text-decoration: none;"></a><b>CONTINUE SHOPPING</b></button>

              <button type="button" style=" font-family: 'Consolas';margin-left:20px;font-size:20px; width:150px; height:40px; border-radius:5px; background-color:#8a5f56; color:white">
              <b>CHECKOUT</b></button></div>
        

   
    
    </form>
    </div>

</body>

<?php 
include 'footer.php';
?>