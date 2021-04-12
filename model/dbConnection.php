<?php

  $dbusername = 'AdminBooksDB1';
  $dbpassword = "go";


  try {
    $conn = new PDO("mysql:host=localhost:8889;dbname=booksDB1", $dbusername, $dbpassword);
    //set attributes 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // echo "success";
  }

  catch(PDOException $e)
  {
    $error_message = $e->getMessage();
    ?>
    <h1>Database connection error</h1>
    <p>There was an error connecting to the database</p>
    <!-- display the error message -->
    <p>Error message: <?php echo $error_message; ?></p>
    <?php
    exit();
  }


