<?php 
	require('../model/dbConnection.php');
	require('../model/dbFunctions.php');

	session_start();
	if (!isset($_SESSION['userID'])) {
		header('Location../index.php');
	}

	?>
  
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="../controller/upload.php" method="POST" enctype="multipart/form-data">
    		<label for="file">Cover image</label>
				<input type="file" name="file" id="coverImg">
        <button type="submit" name="submit" value="upload">Upload</button>
        <br>
        <br>
        <a href="./main.php">Home</a>

    </form>
  </body>
  </html>
  
  
  