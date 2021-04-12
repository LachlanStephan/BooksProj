<?php 
session_start();
require("../model/dbConnection.php");
require("../model/dbFunctions.php");
  // upload image to images folder 
  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = '../images/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $filePath = "upload/".$fileName;
          // insertCI();
          // $mysqli -> query('INSERT INTO book(coverImagePath) VALUES ("$filePath")');
          echo "u1";
          header("Location: ../view/main.php?uploadsuccess");
        } else {
          echo "this file was too large";
        }
      } else {
        echo "there was an error uploading the file";
      }
    } else {
      echo "you cannot upload files of this type";
    }
    
  }

?>