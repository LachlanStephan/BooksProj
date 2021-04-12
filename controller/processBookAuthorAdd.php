<?php 
require("../model/dbConnection.php");
require("../model/dbFunctions.php");
require("./filterInput.php");
echo "test1";
 

if (!empty([$_POST])) {
  echo "hello";
    $BookTitle = inputFilter($_POST['bookTitle']);
    $OriginalTitle = inputFilter($_POST['bookOT']);
    $YearofPublication = inputFilter($_POST['yop']);
    $Genre = inputFilter($_POST['genre']);
    $MillionsSold = inputFilter($_POST['sold']);
    $LanguageWritten = inputFilter($_POST['bookL']);
    $AuthorID = inputFilter($_POST['author']);

    if ($_POST['author'] > 0) { // EXISTING AUTHOR
     existingAuthor($BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten, $AuthorID);
     header('Location:../view/main.php');
    }
  
  else { // NEW AUTHOR 
    //  sanitise input
    echo $_POST['name'];
    $Name = inputFilter($_POST['name']);
    $Surname = inputFilter($_POST['surname']);
    $Nationality = inputFilter($_POST['nation']);
    $BirthYear = inputFilter($_POST['birthYear']);
    $DeathYear = inputFilter($_POST['deathYear']);
    header('Location:../view/main.php');
    addBookAuthor($Name, $Surname, $Nationality, $BirthYear, $DeathYear, $BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten);
  }
}
?>