<?php
  require("../model/dbConnection.php");
  require("../model/dbFunctions.php");
  require("./filterInput.php");
  echo "check1";
  if (!empty([$_POST])) {
    echo "check2";
    echo $_POST['BookID'];
    $bookID = inputFilter($_POST['BookID']);
    echo $bookID;
    deleteBook($bookID);
    echo "works?";
    header('location:../view/main.php');
  } else {
    echo "failed";
  }

?>