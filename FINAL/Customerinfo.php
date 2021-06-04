<?php 
include 'header.php';
?>
<?php
//session_start();
?>

<?php 

$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);

if(isset($_POST['Submit']))
{
    $_SESSION['customerInfo'] = array ("
                        L_Name"=>$_POST["L_Name"],
                        "F_Name"=>$_POST["F_Name"],
                        "Cust_Num"=>$_POST["Cust_Num"],
                        "Cust_Address"=> $_POST["Cust_Address"]);

    header("Location: HomePage.php");
    //$L_Name = $_POST["L_Name"];
    //$F_Name = $_POST["F_Name"];
    //$Cust_Num = $_POST["Cust_Num"];
    //$Cust_Address = $_POST["Cust_Address"];

    //$sqlvar = "INSERT INTO customer_tbl(L_Name,F_Name,Cust_Num,Cust_Address) VALUES
    //('{$L_Name}','{$F_Name}','{$Cust_Num}','{$Cust_Address}')";

    //var_dump($connection->query($sqlvar));
    //var_dump($sqlvar);
}
?>

<head>
    <title>Customer Information</title>
    <link rel="stylesheet" href="orderSection.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <center>
    <div class="login-form">

        <form action="Customerinfo.php" method="POST">

            <p class="text-canter">Contact Information</p>   

            <div class="form-group">
                <input type="text" class="form-control" name="L_Name" placeholder="Lastname" required="required" minlength ="0" maxlength = "20"><br><br>
            </div>  

            <div class="form-group">
                <input type="text" class="form-control" name="F_Name" placeholder="Firstname" required="required"  minlength ="0" maxlength = "20"><br><br>
            </div> 
            
            <div class="-formgroup">
                <input type="number" class="form-control" name="Cust_Num" placeholder="Phone number" required="required"min="1" max="11"><br><br>
            </div> 
            
            <div class="form-group">
                <input type="text" class="form-control" name="Cust_Address" placeholder="Address" required="required"  minlength ="0" maxlength = "100"><br><br>
            </div> 
    
            <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary btn-lg btn-block">CONTINUE</button><br><br>
            </div> 

        </form>
    </div>

</body>
</html>

<?php 
include 'footer.php';
?>S