<?php

ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

echo "OK";

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($_FILES);
echo '</pre>';

//Dat duong dan phu hop trong May tinh
$target_dir = "E:/doing/code_doing/php-web-full-stack/uploads/";

if(!file_exists($target_dir)){
  die("Folder không tồn tại: ".$target_dir);
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

//Lay duoi file
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo "<br> Duoi file (file extension): ". $imageFileType;
//a.PNG => a.png

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  
  if($check !== false) {
    echo "<br>File is an image - " . $check["mime"] . ".";
	  $uploadOk = 1;
  } 
  else {
    echo "<br>File is not an image.";
	  $uploadOk = 0;
  }

}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<br>Sorry, file already exists.";
  $uploadOk = 0;
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "<br> Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

//Bo qua cac loi de hoan thanh viec upload
$uploadOk = 1;

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  //Di chuyen file vao folder mong muon:
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

<br>

<!-- Hien thi file tren web -->

<img style="width: 300px" 
src="/uploads/<?php 
echo basename($_FILES["fileToUpload"]["name"]) 
?>">

