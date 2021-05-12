<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

$target_dir = "src/";
$target_file = $target_dir . str_replace(" ","",basename($_FILES["fileToUpload"]["name"])) ;//to replace spaces specific character in string 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  else
  {
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="file_upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>