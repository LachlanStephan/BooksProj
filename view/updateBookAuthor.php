

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require('../model/dbConnection.php');
	require('../model/dbFunctions.php');

	session_start();
	if (!isset($_SESSION['userID'])) {
		header('Location:../index.php');
	}

	?>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<div class="sampleFormBox">
			<form action="../controller/processBookAuthorUpdate.php" method="POST"> 
				<fieldset>
<?php 
	$bookID = $_POST['BookU'];
	echo "did this come through?".$bookID;
	$singleBook = singleBook($bookID);
?>
					<legend>Update book</legend>
					<br>
					<label for="bookT">Update book title</label>
					<input type="text" name="bookTitle" value="<?php echo $singleBook['BookTitle']?>" required>

					<label for="bookOT">Update original book title</label>
					<input type="text" name="bookOT" value="<?php echo $singleBook['OriginalTitle'] ?>">

					<label for="yop">update year of publicaton</label>
					<input type="text" name="yop" value="<?php echo $singleBook['YearofPublication'] ?>">

					<label for="genre">Update genre</label>
					<input type="text" name="genre" value="<?php echo $singleBook['Genre'] ?>">

					<label for="sold">Update how many millions were sold?</label>
					<input type="text" name="sold" value="<?php echo $singleBook['MillionsSold'] ?>">

					<label for="bookL">Update Language written</label>
					<input type="text" name="bookL" value="<?php echo $singleBook['LanguageWritten'] ?>">

					<?php
						echo "<label for='idPass'>This is the ID number</label>";
						echo "<input name='idPass' type='number' value='$bookID'.</input>";
					?>	

					<!-- <label for="author">Update author</label>
					<select name="author" id="author">
					<option value="0">--</option> -->

			
					<?php 
						// $author = selectAllAuthors();
						// foreach($author as $row) {
						//	echo "<option value=".$row['AuthorID'].">".$row['Name'].",".$row['Surname']."</option>";
						//	}
					?>
					</select> 
				
					<br>
					<input type="submit">
					<br>
					<a href="./main.php">Home</a>
		
				</fieldset>
			</form>
		</div>
</body>

</html>
