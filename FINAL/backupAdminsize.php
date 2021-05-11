<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "lhoyzki_ordering";

$connection = new mysqli($server,$username,$password,$DB);

$getproduct = "Select * from product_tbl"; // This line will display all the contents of the table
$product = $connection->query($getproduct);

if (isset($_POST['Submit']))
{
    $Amount = $_POST["Amount"];
    $Size_Description = $_POST["Size_Description"];
    $Product_ID = $_POST["Product_ID"];
    
    $sqlvar = "INSERT INTO size_tbl(Product_ID,Amount,Size_Description) VALUES
                ('{$Product_ID}','{$Amount}','{$Size_Description}')";

    var_dump($connection->query($sqlvar));
    var_dump($sqlvar);
}
?>

<!DOCTYPE html>
<head></head>
<body>
<form action="Adminsize.php" method="POST">

    <select name="Product_ID"> <!-- this line is for the drop down box-->
        <?php while($row = $product->fetch_assoc()):?> <!-- get all values from a table --> 

          <option value="<?php echo $row['Product_ID']?>"><!-- This line will display the specific data in the drop downbox -->  
		   <?php echo $row['Product_Name']?> 
		   </option> 

        <?php endwhile; ?>
    </select>
    

    <label name="Amount">Size Price: </label>
    <input type="Text" name="Amount">


    <label name="Size_Description">Size: </label>
    <Select name="Size_Description" id="Size_Description">
    <option value="Small">Small</option>
    <option value="Large">Large</option>
    <option value="Extra Large">Extra Large</option>
    </Select> 



    <input type="Submit" name="Submit">

</form>



</body>
</html>