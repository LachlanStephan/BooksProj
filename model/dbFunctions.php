<?php

// new user 
function newUser($firstName, $lastName, $email, $username, $password, $accessRole) 
{
  global $conn;
  try {
    $stmt = $conn->prepare("INSERT INTO users(firstName, lastName, email, username, password, accessRole) VALUES(:firstName, :lastName, :email, :username, :password, :accessRole)");
    $stmt->bindValue(':firstName', $firstName);
    $stmt->bindValue(':lastName', $lastName);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':accessRole', $accessRole);
    $stmt->execute();
  }
  catch (PDOException $ex) {
    throw $ex;
  }
}

// check the login
function checkLogin($username, $password) {
  global $conn;
  try {
    $stmt = $conn->prepare("SELECT userID, username, accessRole, password FROM users WHERE username=:user");
    $stmt->bindParam(':user', $username);
    $stmt->execute();
    $row = $stmt -> fetch();
    if (password_verify($password, $row['password'])) {
      
      // Assign session variables 
      $_SESSION["adminUser"] = $username;
      $_SESSION['userID'] = $row['userID'];
      $_SESSION['role'] = $row["accessRole"];
      $_SESSION["user"] = 'yes'; 
      return true;
    } 
  }
  catch (PDOException $ex) {
    throw $ex;
  }    
  return false;
};

// insert book and author
function addBookAuthor($Name, $Surname, $Nationality, $BirthYear, $DeathYear, $BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten) {
  global $conn;
  try {
    $conn-> beginTransaction();
    // prepare statement with named placeholders
    $stmt = $conn->prepare("INSERT INTO author(Name, Surname, Nationality, BirthYear, DeathYear) VALUES (:name, :surname, :nation, :bYear, :dYear)");
    $stmt->bindValue(':name', $Name);
    $stmt->bindValue(':surname', $Surname);
    $stmt->bindValue(':nation', $Nationality);
    $stmt->bindValue(':bYear', $BirthYear);
    $stmt->bindValue(':dYear', $DeathYear);
    $stmt->execute();
    $AuthorID = $conn->lastInsertID();

    $stmt = $conn->prepare("INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID) VALUES(:bookT, :originalT, :yop, :genre, :sold, :languageW, :author)");
    $stmt->bindValue(':bookT', $BookTitle);
    echo "smthELSE";
    $stmt->bindValue(':originalT', $OriginalTitle);
    $stmt->bindValue(':yop', $YearofPublication);
    $stmt->bindValue(':genre', $Genre);
    $stmt->bindValue(':sold', $MillionsSold);
    $stmt->bindValue(':languageW', $LanguageWritten);
    $stmt->bindValue(':author', $AuthorID);
    $stmt->execute();
    $conn->commit();
  }
  catch (PDOException $ex) {
    $conn->rollback();
    throw $ex;
  }    
  
}

// function to add exisiting author 
function existingAuthor($BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten, $AuthorID) {
  global $conn;
  try {
    $conn -> beginTransaction();
    $stmt = $conn->prepare("INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID) VALUES(:bookT, :originalT, :yop, :genre, :sold, :languageW, :author)");
    echo "check1";
    $stmt->bindValue(':bookT', $BookTitle);
    echo "check2";
    $stmt->bindValue(':originalT', $OriginalTitle);
    echo "check3";
    $stmt->bindValue(':yop', $YearofPublication);
    $stmt->bindValue(':genre', $Genre);
    $stmt->bindValue(':sold', $MillionsSold);
    $stmt->bindValue(':languageW', $LanguageWritten);
    $stmt->bindValue(':author', $AuthorID);
    echo "check4";
    $stmt->execute();
    echo "works?";
    $conn->commit();
    echo "check5";

} catch (PDOException $ex) {
  $conn->rollback();
  throw $ex;
}  
} 

// display all authors 
function selectAllAuthors() {
  global $conn;
  try {
    $stmt = $conn->prepare('SELECT AuthorID, Name, Surname FROM author');
    $stmt->execute();
    $result = $stmt-> fetchAll();
    return $result;
  } 
  catch (PDOException $ex) {
    throw $ex;
  }
}

// delete a book
function deleteBook($bookID) {
  global $conn;
  try {
    $stmt = $conn->prepare("DELETE FROM book WHERE BookID = :bookID");
    $stmt->bindValue(':bookID', $bookID);
    $stmt->execute();
  }
  catch (PDOException $ex) {
  throw $ex;
  }
}

// display the books
  function selectAllBooks() {
    global $conn;
    try {
      $comingSoon = '../images/comingSoon.jpeg';
      $stmt = $conn->prepare('SELECT * FROM book INNER JOIN author ON book.authorID = author.authorID');
      $stmt->execute();
      $result = $stmt->fetchAll();
      $numRows = $stmt->rowCount();
      if ($numRows < 1) {
        echo "table is empty";
    } 
       else {
        foreach($result as $row) {
          if ($row['coverImagePath'] == null) {
            $row['coverImagePath'] = $comingSoon;
          } 
          echo "<div class='bookCard'><img src='../images/".$row['coverImagePath'] . "'> <br>" .$row['BookTitle'] . " - " .$row['Name'].  $row['Surname']. " <br> " .$row['YearofPublication']. " - " ."Year of Publication" ." <br>   " .$row['MillionsSold']." - " ."Millions sold" ." <br> " .$row['DateCreated']." - " ."Date created" ." <br> " .$row['TimeUpdated']." - " ."Time updated" ." <br> " .$row['BookID'] ."<br><form action='../controller/processBookDelete.php' method='POST'><input name='BookID' type='number' value='".$row["BookID"]."' hidden><button type='submit'>Delete</button></form><form action='../view/updateBookAuthor.php' method='POST'><input name='BookU' type='number' value='" .$row['BookID']."' hidden><button type='submit'>Update book</button></form></div>";
        }  
      }
    }
    catch (PDOException $ex) {
    throw $ex;
    }
  }
  
  // select single book
  function singleBook($bookID) {
    global $conn;
    try {
      $stmt = $conn->prepare('SELECT * FROM book WHERE bookID = :bookID');
      $stmt->bindValue(':bookID', $bookID);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    } catch (PDOException $ex) {
      throw $ex;
    }
  }


  // update the books
  function updateBookAuthor($BookTitle, $OriginalTitle, $YearofPublication, $Genre, $MillionsSold, $LanguageWritten, $bookID) {
    global $conn;
    try {
      echo "fCHECK";
      $sql = "UPDATE book SET BookTitle='" .$BookTitle."', OriginalTitle='" .$OriginalTitle. "', YearofPublication='" .$YearofPublication. "', Genre='" .$Genre. "', MillionsSold='" .$MillionsSold. "', LanguageWritten='" .$LanguageWritten. "' WHERE BookID= '" .$bookID. "' ";
      $stmt = $conn->prepare($sql);
      $stmt->execute(); 

    } catch (PDOException $ex) {
      throw $ex;
    }
  }

  ?>

