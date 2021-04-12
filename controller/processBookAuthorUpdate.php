<?php

require("../model/dbConnection.php");
require("../model/dbFunctions.php");
require("./filterInput.php");

  if(!empty([$_POST])) {

    // get rid of author rows except for ID
    $bookID = $_POST['idPass'];
    $BookTitle = inputFilter($_POST['bookTitle']);
    $OriginalTitle = inputFilter($_POST['bookOT']);
    $YearofPublication = inputFilter($_POST['yop']);
    $Genre = inputFilter($_POST['genre']);
    $MillionsSold = inputFilter($_POST['sold']);
    $LanguageWritten = inputFilter($_POST['bookL']);
    // $AuthorID = inputFilter($_POST['author']); 
    $bookID = inputFilter($_POST['idPass']);
    updateBookAuthor($BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten, $bookID);
    header('Location:../view/main.php');
  } else {
    echo "this could not be updated";
  }

?>