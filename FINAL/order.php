<?php 
include 'header.php';
?>

<head>
        <link rel="stylesheet" href="HomePage.css" type="text/css">
        <link rel="stylesheet" href="orderSection.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <div class="container-fluid" style="margin-top: 50px; margin-bottom:45px; padding: 100px">
        <form action="order.php" method="POST">

                <h2 style="font-family: 'Courier';">SHOPPING CART</h2>

                <table class="table table-hover" border=0px>

                <tr style="font-weight:900; font-size:14px; color: white; background-color:#8a5f56">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                </tr>
        
                <tbody id="table">
                <tr style="font-weight:900; font-size:14px; ">
                
                        <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >Choco Fudge Milkshake</th>
                        <th style="text-align: center"><br><br>₱90.00</th>
                        <th style="text-align: center"><br><br>
                                <button class="quant"  type="button" style="margin-left: 4px "  onclick="decrement()"><b>-</b></button>
                                <input style="text-align:center; width: 30% ; height: 28px; " id=Input type=number min=1 max=100 value=1>
                                <button class="quant" type="button" onclick="increment()"><b>+</b></button>
        
                        </th>
                
                        <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                
                                <button type="button" style="margin-left:10px;padding: 0;border: none;background: none; " onclick="deleteRow(this)">
                                <i class="material-icons">delete</i></button>
                        </th>
                </tr>
                <tr style="font-weight:900; font-size:14px; ">
                
                        <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >Cookies N Cream Milkshake</th>
                        <th style="text-align: center"><br><br>₱90.00</th>  
                        <th style="text-align: center"><br><br>
                                <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement1()"><b>-</b></button>
                                <input style="text-align:center; width: 30% ; height: 27px;" id=Input1 type=number min=1 max=100 value=1>
                                <button class="quant" type="button" onclick="increment1()"><b>+</b></button>
                        </th>
                        <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                                <button type="button"  style="margin-left:10px;padding: 0;border: none;background: none; " onclick="deleteRow(this)">
                                <i class="material-icons">delete</i></button>
                        </th>
                </tr>
                <tr style="font-weight:900; font-size:14px; ">
                        <th><img src="img/ChocoFudgeWToppings1.png" style="width:80px; height:80px;" >BlackForest Milkshake</th>
                        <th style="text-align: center"><br><br>₱90.00</th>
                        <th style="text-align: center"><br><br>
                                <button class="quant" type="button" style="margin-left: 4px "  onclick="decrement2()"><b>-</b></button>
                                <input style="text-align:center; width: 30% ; height: 27px; " id=Input2 type=number min=1 max=100 value=1>
                                <button class="quant" type="button" onclick="increment2()"><b>+</b></button>
                        </th>
                        <th style="text-align: center; margin-top:15px; "><br>₱90.00</div>
                                <button type="button"  style="margin-left:10px;padding: 0;border: none;background: none; " onclick="deleteRow(this)" >
                                <i class="material-icons">delete</i></button>
                        </th>
                </tr>
        </tbody>
        </table>

        <div class="mx-auto;" style="font-size:25px; text-align:right;margin-left:67% ;margin-top:5%;margin-bottom:2%">TOTAL <b style="color:#3CB371; font-size:30px;" >₱90.00</b>
         </div>

        <div style = "text-align:right;">
        <button type="button" style="width:150px; height:40px; border-radius:4px; margin-right:5px; background-color:#8a5f56; color:white"><b>Continue Shopping</b></button>
        
        <button type="button" style="width:110px; height:40px; border-radius:4px; background-color:#8a5f56; color:white"><b>Checkout</b></button>
        </div>

        <script>
	function increment() {
	document.getElementById('Input').stepUp();
		}
	function decrement() {
	document.getElementById('Input').stepDown();
		}

         function increment1() {
	document.getElementById('Input1').stepUp();
		}
	function decrement1() {
	document.getElementById('Input1').stepDown();
		}
  
        function increment2() {
	document.getElementById('Input2').stepUp();
		}
	function decrement2() {
	document.getElementById('Input2').stepDown();
		}
  

      
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