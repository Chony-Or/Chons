<?php 
include 'header.php';
?>

<?php 

$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);

if(isset($_POST['Submit']))
{
    $L_Name = $_POST["L_Name"];
    $F_Name = $_POST["F_Name"];
    $Cust_Num = $_POST["Cust_Num"];
    $Cust_Address = $_POST["Cust_Address"];

    $sqlvar = "INSERT INTO customer_tbl(L_Name,F_Name,Cust_Num,Cust_Address) VALUES
    ('{$L_Name}','{$F_Name}','{$Cust_Num}','{$Cust_Address}')";

    var_dump($connection->query($sqlvar));
    var_dump($sqlvar);
}
?>

<head>
    <link rel="stylesheet" href="HomePage.css" type="text/css">
    <link rel="stylesheet" href="orderSection.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <center>
    <div class="container-fluid" style="margin-top: 90px; margin-bottom: 40px">

        <form action="Customerinfo.php" method="POST">

            <div class="box-container" style="background-color: #ececec; border-radius: 40px">

                <p style="font-family: 'Verdana'; font-size: 30px;">Contact Information</p>
                <div style="margin-top: 70px"></p>

                    <table>
                        <tr>
                            <td>
                                <label for="L_Name" name="L_Name">Last Name: </label>
                            </td>
                            <td>
                                <input type="Text" name="L_Name"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="F_Name" name="F_Name">First Name: </label>
                            </td>
                            <th>
                                <input type="Text" name="F_Name"><br><br>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <label for="Cust_Num" name="Cust_Num">Customer Number: &nbsp;&nbsp;&nbsp;</label>
                            </td>
                            <td>
                                <input type="Text" name="Cust_Num"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Cust_Address" name="Cust_Address">Customer Address: &nbsp;&nbsp;&nbsp;</label>
                            </td>
                            <td>
                                <input type="text" name="Cust_Address"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br><br>
                                <input type="Submit" name="Submit">
                                <br><br><br><br>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>

        </form>
    </div>
</body>
</html>

<?php 
include 'footer.php';
?>